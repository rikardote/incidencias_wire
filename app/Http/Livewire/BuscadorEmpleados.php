<?php

namespace App\Http\Livewire;

use App\Models\Empleado;
use Livewire\Component;

class BuscadorEmpleados extends Component
{
    public $buscar;
    public $usuarios;
    public $picked;

    public function mount()
    {
        $this->buscar = "";
        $this->usuarios = [];
        $this->picked = true;
    }

    public function updatedBuscar()
    {
        $this->picked = false;

        $this->validate([
            "buscar" => "required|min:2"
        ]);

        $this->usuarios = Empleado::where("name", "like", trim($this->buscar) . "%")
            ->orWhere("father_lastname", "like", trim($this->buscar) . "%")
            ->orWhere("num_empleado", "like", trim($this->buscar) . "%")
            ->take(5)
            ->get();

    }

    public function asignarUsuario($nombre)
    {
        $this->buscar = $nombre;
        $this->picked = true;
    }

    public function asignarPrimero()
    {
        $usuario = Empleado::where("name", "like", trim($this->buscar) . "%")->first();
        if($usuario)
        {
            $this->buscar = $usuario->name;
        }
        else
        {
            $this->buscar = "...";
        }
        $this->picked = true;
    }

    public function render()
    {
        return view('livewire.buscador-empleados');
    }
}
