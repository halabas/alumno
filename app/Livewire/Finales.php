<?php
namespace App\Livewire;

use App\Models\Asignatura;
use Livewire\Component;


class Finales extends Component
{
    public $notas;
    public $asignaturas;
    public $alumnos;
    public $asignaturaF;
    public $notasF;



    public function notaActual()
    {
    }

    public function nota_final($alumno){
        if($alumno->notas->where('asignatura_id',$this->asignaturaF)->count() < Asignatura::find($this->asignaturaF)->numero_de_trimestres){
            $this->notasF = 'no procede';
        }

        else{
            $this->notasF+=;
        }
    }

    public function render()
    {
        return view('livewire.finales');
    }
}
