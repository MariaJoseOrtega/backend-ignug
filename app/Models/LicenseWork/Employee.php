<?php

namespace App\Models\LicenseWork;

use App\Models\Authentication\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table ='license_work.employees';

    function user(){
        return $this->belongsTo(User::class);
    }

    function applications(){
        return $this->hasMany(Application::class);
    }
    function holidays(){
        return $this->hasMany(Holiday::class);
    }

}
