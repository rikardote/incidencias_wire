<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $fillable = ['num_empleado', 'name', 'father_lastname', 'mother_lastname', 'fecha_ingreso', 'deparment_id', 'condicion_id', 'puesto_id', 'horario_id', 'num_plaza', 'num_seguro','jornada_id', 'lactancia', 'comisionado', 'estancia'];

    public function getfullnameAttribute($value)
    {
       return $this->father_lastname. ' ' . $this->mother_lastname. ' ' .$this->name;
    }

    public function getAntiguedadAttribute($value){
        $dt = Carbon::parse($this->fecha_ingreso);
        return Carbon::createFromDate($dt->year, $dt->month, $dt->day)->diff(Carbon::now())->format('%y Años, %m meses y %d dias');
    }


}
