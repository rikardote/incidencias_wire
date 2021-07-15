<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoDeIncidencia extends Model
{
    use HasFactory;

    protected $table = 'codigos_de_incidencias';

    protected $fillable = ['code', 'description', 'grupo'];

    public function getCodeAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }
}
