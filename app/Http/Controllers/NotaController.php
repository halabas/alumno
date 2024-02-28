<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Nota;
use Illuminate\Http\Request;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notas.index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asignatura = Asignatura::all();
        $alumnos = Alumno::all();

        return view('notas.create',['asignaturas' =>$asignatura,'alumnos'=>$alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asignatura = Asignatura::find($request->asignatura);
        $nota = Nota::where('trimestre',$request->trimestre)->where('alumno_id',$request->alumno)->where('asignatura_id',$request->asignatura)->first();


        if ($nota != null || $request->trimestre > $asignatura->numero_de_trimestres || $request->trimestre < 1) {
            session()->flash('error','La Nota ya existe o el trimestre es incorrecto');
        }
        else{
            $nota = New Nota();
            $nota->trimestre = $request->trimestre;
            $nota->alumno_id = $request->alumno;
            $nota->asignatura_id = $request->asignatura;
            $nota->nota = $request->nota;
            $nota->save();

        }
        return redirect()-> route('notas.index');


    }


    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        return view('notas.edit',["nota"=>$nota]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        $nota->nombre = $request->nombre;
        $nota->save();
        return redirect()-> route('notas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {

            $nota->delete();


        return redirect()-> route('notas.index');
    }

}
