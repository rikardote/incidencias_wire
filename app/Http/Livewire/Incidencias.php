<?php

namespace App\Http\Livewire;

use App\Models\Incidencia;
use App\Models\Empleado;
use Livewire\Component;

class Incidencias extends Component
{
    public $empleados;
    public $empleado;
    public $usuarios;
    public $qna_id = "184";
    public $incidencias;
    public $search = "";
    public $buscar, $picked;


    public function mount()
    {
        $this->buscar = "";
        $this->empleados = [];
        $this->picked = true;
        $this->incidencias = [];
    }

    public function render()
    {

        return view('livewire.incidencias');

    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:2"
        ]);

        $this->empleados = Empleado::select('num_empleado', 'father_lastname', 'name', 'mother_lastname')
            ->where("name", "like", trim($this->buscar) . "%")
            ->orWhere("father_lastname", "like", trim($this->buscar) . "%")
            ->orWhere("mother_lastname", "like", trim($this->buscar) . "%")
            ->orWhere("num_empleado", "like", trim($this->buscar) . "%")
            ->take(15)
            ->get();

    }

    public function asignarUsuario($num_empleado)
    {
        $this->picked = true;

        $this->buscar = $num_empleado;
        if($this->picked){
            $this->empleado = Empleado::with(['horario', 'puesto', 'departamento', 'jornada'])
            ->where('num_empleado', $num_empleado)
            ->first();

            if(!$this->empleado)
            {
            $this->empleado = [];
            }
            else {
                $this->incidencias = Incidencia::getIncidencias($this->empleado->id, $this->qna_id);
            }
        }

    }




}
