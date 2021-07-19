<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $with = ['departamento'];
    protected $withCount = ['departamento'];

    protected $fillable = ['num_empleado', 'name', 'father_lastname', 'mother_lastname', 'fecha_ingreso', 'deparment_id', 'condicion_id', 'puesto_id', 'horario_id', 'num_plaza', 'num_seguro','jornada_id', 'lactancia', 'comisionado', 'estancia'];

    protected $dates = ['fecha_ingreso'];

    public function getfullnameAttribute($value)
    {
       return $this->father_lastname. ' ' . $this->mother_lastname. ' ' .$this->name;
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'deparment_id');
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id');
    }


    public function getAntiguedadAttribute($value){
        return $this->fecha_ingreso->diff(now())->format('%y Años, %m meses y %d dias');
    }





}
