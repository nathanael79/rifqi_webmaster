<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFiles extends Model
{
	protected $table = 'upload_files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'task_id', 'user_id', 'file'
    ];
    public $timestamps = false;

    public function getUser() 
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getTask() 
    {
        return $this->hasOne('App\Models\Task', 'id', 'task_id');
    }
}
