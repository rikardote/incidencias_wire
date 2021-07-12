<?php

namespace App\Http\Livewire;

use App\Models\Horario;
use App\Models\Jornada;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\Condicion;
use App\Models\Departamento;
use App\Models\Puesto;

class Empleados extends Component
{
    public $empleado, $tipos_de_contratacion, $image, $identificador;
    public $departamentos, $jornadas, $horarios, $puestos;
    public $estancia, $lactancia, $comisionado;
    public $search = '';
    public $readyToLoad = false;

    protected $rules = [
        'empleado.num_empleado' => 'required',
        'empleado.name' => 'required',
        'empleado.father_lastname' => 'required',
        'empleado.mother_lastname' => 'required',
        'empleado.condicion_id' => 'required',
        'empleado.fecha_ingreso' => 'required',
        'empleado.deparment_id' => 'required',
        'empleado.jornada_id' => 'required',
        'empleado.horario_id' => 'required',
        'empleado.puesto_id' => 'required',
        'empleado.estancia' => '',
        'empleado.lactancia' => '',
        'empleado.comisionado' => ''
    ];

    public function mount(){
        $this->empleado = new Empleado();
        $this->tipos_de_contratacion = Condicion::all();
        $this->departamentos = Departamento::all();
        $this->jornadas = Jornada::all();
        $this->horarios = Horario::all();
        $this->puestos = Puesto::all();
    }

    public function render()
    {
        $this->empleado = Empleado::where('num_empleado', $this->search)->first();
        return view('livewire.empleados')->with('empleado',$this->empleado);

    }
    public function loadPost(){
        $this->readyToLoad = true;
    }


    public function update(){
        $this->validate();
        $this->empleado->num_empleado = $this->search;

        $this->empleado->update();

        $this->emit('alert', 'El usuario se actualizo satisfactoriamente');
    }

    public function delete(User $user){
        $user->delete();
    }
}
