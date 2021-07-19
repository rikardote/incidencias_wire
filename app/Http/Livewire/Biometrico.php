<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Departamento;
use App\Models\Qna;
use DateTime;
use DateInterval;
use DatePeriod;
use App\Models\Empleado;
use App\Models\Horario;

class Biometrico extends Component
{
    public $empleados;
    public $daterange;


    public function render()
    {
        $dpto ='19';

        $qna_id = '188';

        $qna = Qna::where('id', $qna_id)->first();
        $fecha_inicio = $this->getFechaInicioPorQna($qna->id);
        $fecha_final = $this->getFechaFinalPorQna($fecha_inicio);

        $begin = new DateTime( $fecha_inicio );
        $end = new DateTime( $fecha_final );
        $end = $end->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $this->daterange = new DatePeriod($begin, $interval ,$end);

    	//$checadas = Checada::get_Checadas($dpto, $qna->qna, $qna->year);
        $this->empleados = Empleado::with('departamento', 'jornada','puesto', 'horario')
            ->where('deparment_id',$dpto)
            ->orderBy('num_empleado', 'ASC')
            ->get();

        return view('livewire.biometrico');
    }

    public function getFechaInicioPorQna($qna_id){
        $qna = Qna::where('id', '=', $qna_id)->first();

        $mes = ($qna->qna / 2);
        $mes_redondeado = ceil($mes);
        $mes_int = intval($mes_redondeado);

        if($qna->qna %2 == 0){
            $f_inicio = Carbon::create($qna->year, $mes_int, '16',0,0,0);
        }else{
            $f_inicio = Carbon::create($qna->year, $mes_int, '01',0,0,0);
        }

        return $f_inicio->toDateString();

    }
    public function getFechaFinalPorQna($f_inicio){
        $date     = Carbon::parse($f_inicio);
        $month =  $date->month;
        $day =  $date->day;
        $year = $date->year;

        if($day < 16) {
            $f_final = Carbon::create($year, $month, '15',0,0,0);
        }
        else {
            $f_final = $date->endOfMonth();
        }
        return $f_final->toDateString();

    }
}
