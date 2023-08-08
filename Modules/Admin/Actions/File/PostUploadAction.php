<?php

namespace Modules\Admin\Actions\File;

use App\Models\File;
use Illuminate\Http\Request;

class PostUploadAction
{
    public function handle(Request $request)
    {
        $file = $request->file('file');
        $name = \Str::slug(substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), "."))) . '.' . $file->extension();
        $uuid = uniqid();
        $uploadPath = $uuid . '_' . $name;
        $fileDir = $request->input('dir', '');
        $file->storeAs($fileDir, $uploadPath, 'upload');
        if($request->input('id')){
            $oldFile = File::find($request->input('id'));
            if($oldFile){
                $oldFile= $oldFile->toArray();
            }
        }
        $file = File::updateOrCreate(['id' => $request->input('id')], [
            'file_path' => $uploadPath,
            'uuid' => $uuid,
            'file_dir' => $fileDir,
            'file_ext' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'file_dimension' => $file->dimensions()?($file->dimensions()[0]??'').'x'.($file->dimensions()[1]??''):'',
            'file_name' => $file->getClientOriginalName(),
            'title' => $file->getClientOriginalName()
        ]);
        if(isset($oldFile)){
            \Storage::disk('upload')->delete(!empty($oldFile['file_dir'])?$oldFile['file_dir'].'/'.$oldFile['file_path']:$oldFile['file_path']);
        }
        return $file;
    }
}
