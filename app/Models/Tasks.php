<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
	protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'class_id'
    ];
    public $timestamps = false;

    public function getKelas() 
    {
        return $this->hasOne('App\Models\Kelas', 'id', 'class_id');
    }

    public function getUploadFile() 
    {
        return $this->hasMany('App\Models\UploadFiles', 'task_id', 'id');
    }
}
