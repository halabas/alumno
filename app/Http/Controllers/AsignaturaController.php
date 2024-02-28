<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;


class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('asignaturas.index',['asignaturas'=>Asignatura::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->numero_de_trimestres < 4 && $request->numero_de_trimestres >1){
            $asignatura = New Asignatura();
            $asignatura->denominacion = $request->denominacion;
            $asignatura->numero_de_trimestres = $request->numero_de_trimestres;
            $asignatura->save();
        }
        else{
            session()->flash('error','Una asignatura tiene que tener 2 o 3 trimestres');
        }


        return redirect()-> route('asignaturas.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {


    return view('asignaturas.show',['asignatura'=>$asignatura]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit',["asignatura"=>$asignatura]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        if($request->numero_de_trimestres < 4 && $request->numero_de_trimestres >1){
            $asignatura->denominacion = $request->denominacion;
            $asignatura->numero_de_trimestres = $request->numero_de_trimestres;
            $asignatura->save();
        }
        else{
            session()->flash('error','Una asignatura tiene que tener 2 o 3 trimestres');
        }
        return redirect()-> route('asignaturas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {

            $asignatura->delete();


        return redirect()-> route('asignaturas.index');
    }

}
