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
    public $tipos_de_contratacion, $empleado;
    public $departamentos, $jornadas, $horarios, $puestos;
    public $search = '';
    public $nuevo_empleado = false;
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
        $this->tipos_de_contratacion = Condicion::all()->pluck('id', 'condicion')->toArray();
        $this->departamentos = Departamento::all()->pluck('id', 'join')->toArray();
        $this->jornadas = Jornada::all()->pluck('id', 'jornada')->toArray();
        $this->horarios = Horario::all()->pluck('id', 'horario')->toArray();
        $this->puestos = Puesto::all()->pluck('id', 'puesto')->toArray();
    }

    public function render()
    {

        $this->empleado = Empleado::where('num_empleado', $this->search)->first();
        if(!$this->empleado)
        {
            $this->nuevo_empleado = true;
            $this->empleado = new Empleado();
            $this->empleado->num_empleado = $this->search;
        }
        else {
            $this->nuevo_empleado = false;
        }

        return view('livewire.empleados');

    }
    public function loadPost(){
        $this->readyToLoad = true;
    }

    public function save(){
        $this->validate();
        $this->empleado->save();

        $this->emit('alert', 'Empleado guardado satisfactoriamente');
    }


    public function update(){

        $this->validate();
        $this->empleado->update();

        $this->emit('alert', 'Empleado actualizado satisfactoriamente');
    }

    public function delete(User $user){
        $user->delete();
    }

    public function clear_search()
    {
        $this->reset('search');
    }
}
