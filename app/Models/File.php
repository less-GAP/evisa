<?php

namespace App\Models;


use App\Traits\CreatedUpdatedByAdmin;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Role
 * @package CustomerApp\Models
 */
class File extends BaseModel
{
    use CreatedUpdatedByAdmin;
    protected $table = 'files';
    public $timestamps = true;

    protected $appends = [
        'file_url'
        ,'site_path'
    ];

    protected $fillable = [
        'file_path'
        , 'title'
        , 'caption'
        , 'description'
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
    public function getSitePathAttribute(){
        return 'upload/'.($this->file_dir?$this->file_dir.'/':'').$this->file_path;
    }

}
