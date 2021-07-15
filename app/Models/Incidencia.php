<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = 'incidencias';

    protected $fillable = ['qna_id', 'employee_id', 'fecha_inicio', 'fecha_final', 'codigodeincidencia_id', 'periodo_id', 'token', 'diagnostico', 'medico_id', 'fecha_expedida', 'num_licencia', 'otorgado', 'pendientes', 'fecha_capturado'];

    protected $dates = ['fecha_inicio', 'fecha_final', 'fecha_capturado'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'employee_id');
    }

    public function qna()
    {
        return $this->belongsTo(Qna::class, 'qna_id');
    }

    public function codigo()
    {
        return $this->belongsTo(CodigoDeIncidencia::class, 'codigodeincidencia_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public static function getIncidencias($empleado_id, $qna_id)
    {
        return Incidencia::with(['empleado', 'qna', 'codigo', 'periodo'])
            ->where('employee_id', $empleado_id)
            ->where('qna_id', $qna_id)
            ->get();
    }


}
