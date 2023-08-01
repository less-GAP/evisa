<?php


use App\Models\File;
use Illuminate\Http\Request;

class PostUploadAction
{
    public function handle(Request $request)
    {
        $file = $request->file('file');
        $name =  \Str::slug(substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), "."))).'.'.$file->extension();
        $uuid = uniqid();
        $uploadPath = $uuid . '_' . $name;
        $fileDir=$request->input('path','');
        $file->storeAs($fileDir, $uploadPath, 'upload');
        $file = File::create([
            'file_path' => $uploadPath,
            'uuid' => $uuid,
            'file_dir' => $fileDir,
            'file_ext' => $file->getClientMimeType(),
            'created_by' => '',
            'file_name' => $file->getClientOriginalName()
        ]);
        return $file;
    }
}
