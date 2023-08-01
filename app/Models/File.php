<?php

namespace App\Models;


/**
 * Class Role
 * @package CustomerApp\Models
 */
class File extends BaseModel
{
    protected $table = 'files';
    public $timestamps = true;

    protected $appends = [
        'file_url'
    ];

    protected $fillable = [
        'file_path'
        , 'file_ext'
        , 'type'
        , 'uuid'
        , 'created_by'
        , 'file_name'
        , 'file_dir'
    ];
    public function getFileUrlAttribute(){
        return \Storage::disk('upload')->url($this->file_dir.'/'.$this->file_path);
    }

}
