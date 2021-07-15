<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $fillable = ['periodo', 'year'];

    public function getFullnameAttribute()
    {
       return $this->periodo . '/' . $this->year;
    }
    public function incidencia()
    {
        return $this->hasMany('App\Incidencia');
    }

    public function getPeriodoAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }
}
