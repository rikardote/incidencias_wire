<?php

namespace App\Http\Livewire;

use App\Models\Incidencia;
use App\Models\Empleado;
use Livewire\Component;

class Incidencias extends Component
{
    public $empleado = [];
    public $qna_id = "184";
    public $incidencias;
    public $search = "";

    public function render()
    {
        $this->empleado = Empleado::with(['horario', 'puesto', 'departamento', 'jornada'])
            ->where('num_empleado', $this->search)
            ->first();

        if(!$this->empleado)
        {
         $this->empleado = [];
        }
        else {
            $this->incidencias = Incidencia::getIncidencias($this->empleado->id, $this->qna_id);
        }



        return view('livewire.incidencias');

    }


}
