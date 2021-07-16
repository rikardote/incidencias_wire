<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Qna;

class Qnas extends Component
{
    public $qnas;

    protected $rules = [
        'qna.qna' => 'required',
        'qna.year' => 'required',
        'qna.description' => 'required',
        'qna.active' => 'required',
    ];

    public function mount()
    {
        $this->qnas = Qna::orderBy('year', 'desc')->orderBy('qna', 'desc')->where('active', '1')->get();
    }

    public function render()
    {
        return view('livewire.qnas');
    }
}
