<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function getResident() 
    {
        return $this->hasMany('App\Models\Resident', 'class_id', 'id');
    }

    public function getTask() 
    {
        return $this->hasMany('App\Models\Task', 'class_id', 'id');
    }
}
