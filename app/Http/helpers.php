<?php

use App\Empleado;
use App\Incidencia;
use Carbon\Carbon;

function valida_entrada($num_empleado, $fecha, $entrada){
    $empleado = Empleado::get_empleado($num_empleado);
    $empleado_entrada = substr($empleado->horario,0,5);
    $empleado_salida = substr($empleado->horario,8);
    $fecha = fecha_ymd($fecha);

    $minutoAnadir=10;

    $segundos_horaInicial=strtotime($empleado_entrada);

    $segundos_minutoAnadir=$minutoAnadir*60;

    $nuevaHora=date("H:i:sa",$segundos_horaInicial+$segundos_minutoAnadir);


    //dd($nuevaHora);

    $incidencia = Incidencia::where('employee_id', '=', $empleado->emp_id)
            ->whereRaw('? between fecha_inicio and fecha_final', [$fecha])
            ->whereNotIn('codigodeincidencia_id', [41,15])
            ->first();

    if ($incidencia) {
        $code = Codigo_De_Incidencia::find($incidencia->codigodeincidencia_id);
        if (!$entrada) {
            return $code->code;
        }
    }
    if ($entrada >= $nuevaHora && $incidencia) {
         return "<b><font  color='red'>".$entrada."</font></b> (".$code->code.")";

    }
     if ($entrada >= $nuevaHora && !$incidencia) {
         return "<b><font  color='red'>".$entrada."</font></b>";

    }


    return $entrada;

}
function isweekend($date){
    $date = Carbon::parse($date);

    if($date->isWeekend()) {
        return "true";
    }
}
