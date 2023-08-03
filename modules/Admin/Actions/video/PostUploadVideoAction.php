<?php


namespace Modules\Admin\Actions\Video;

use Illuminate\Http\Request;

class PostUploadVideoAction
{
    public function handle(Request $request)
    {
        $fileInfo = [];
        $file = $request->file('image');
        if (!empty($file)) {
            $size = $file->getSize();
            $mimeType = $file->getClientMimeType();
            $extension = $file->guessClientExtension();
            $fileName = 'videos/' . uniqid() . '-' . \Str::slug(basename(str_replace($extension, '', $file->getClientOriginalName()))) . '.' . $extension;
            $file->storeAs(
                '', $fileName, ['disk' => 'upload']
            );

            $fileInfo = [
                'name' => $fileName,
                'extension' => $extension,
                'mimeType' => $mimeType,
                'size' => $size,
                'url' => url('upload/' . $fileName, '', env('APP_ENV') == 'local' ? false : true)
            ];
        }
        return $fileInfo;
    }
}
