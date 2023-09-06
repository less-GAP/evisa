<?php


namespace Modules\Admin\Actions\VisaApplication;


use App\Models\VisaApplication;
use App\Models\VisaApplicationApprovalHistory;
use App\Models\VisaApplicationDocument;
use App\Models\VisaApplicationHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportAction
{
    public function handle(Request $request)
    {

        try {
            $ids = explode(',', $request->input('id'));
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load(base_path('template.xlsx'));
            $activeRow = 4;
            $worksheet = $spreadsheet->getSheet(0);
            $itemCodes = [];
            foreach ($ids as $id) {
                $visaApplication = VisaApplication::find($id);
                foreach ($visaApplication->applicants as $applicant){
                    $worksheet->getRowDimension($activeRow - 1)->setRowHeight(200);
                    $worksheet->setCellValue('A' . $activeRow - 1, $activeRow-2)
                        ->setCellValue('B' . $activeRow - 1, $applicant->full_name)
                        ->setCellValue('C' . $activeRow - 1, $applicant->passport_number)
                        ->setCellValue('D' . $activeRow - 1, $applicant->nationality)
                        ->setCellValue('E' . $activeRow - 1, $applicant->email);

                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $drawing->setName($applicant->full_name.' Photo');
                    $drawing->setPath(public_path($applicant->profile_photo)); /* put your path and image here */
                    $drawing->setCoordinates('F' . $activeRow - 1);
                    $drawing->getShadow()->setVisible(true);
                    $drawing->setHeight(200);
                    $drawing->setWorksheet($worksheet);
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $drawing->setName($applicant->full_name.' Passport');
                    $drawing->setPath(public_path($applicant->passport_photo)); /* put your path and image here */
                    $drawing->setCoordinates('G' . $activeRow - 1);
                    $drawing->setHeight(200);;
                    $drawing->getShadow()->setVisible(true);
                    $drawing->setWorksheet($worksheet);
                    $activeRow++;

                }
                $visaApplication->status ='exported';
                $visaApplication->save();


            }
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            $response = new StreamedResponse(
                function () use ($writer) {
                    $writer->save('php://output');
                }
            );
            $response->headers->set('Content-Type', 'application/vnd.ms-excel');
            $response->headers->set('Content-Disposition', 'attachment;filename="Visa Application (' . Carbon::now()->format('d/m/Y') . ').xlsx"');
            $response->headers->set('Cache-Control', 'max-age=0');
            return $response;

        } catch (\Throwable $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
