<?php

namespace App\Models\LicenseWork;

use App\Models\Core\Catalogue;
use App\Models\Core\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table='license_work.applications';
    protected $fillable=[
        'date_started_at',
        'date_ended_at',
        'time_started_at',
        'time_ended_at',
        'type',
        'observations',
    ];
    // procesos de calculo

    // calcular el tiempo de la licencia o permiso
    public function calculteDate(){
        return;
    }
    public function calculteTime(){
        return;
    }
    // casts
    protected $casts=[
        'observations'=>'array',
    ];

    function states(){
        return $this->belongsToMany(State::class)
            ->withPivot('dependence_user_id')
            ->withTimestamps();
    }
    // RelationShip
    function employee(){
        return $this->belongsTo(Employee::class);
    }

    function reason(){
        return $this->belongsTo(Reason::class);
    }
    function location(){
        return $this->belongsTo(Location::class);
    }

    function form(){
        return $this->belongsTo(Form::class);
    }

}
