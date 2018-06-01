<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
	protected $table = 'residents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'class_id', 'user_id'
    ];
    public $timestamps = false;

    public function getKelas() 
    {
        return $this->hasOne('App\Models\Kelas', 'id', 'class_id');
    }

    public function getUser() 
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
