<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use App\Models\Tema;
use Illuminate\Http\Request;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('albumes.index',['albumes'=>Album::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temas = Tema::all();
        return view('albumes.create',['temas' => $temas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = New album();
        $album->titulo = $request->titulo;
        $album->año =$request->año;
        $album->save();
        if($request->temas){
            foreach($request->temas as $tema){
                if(!Tema::find($tema)->artistas->isEmpty())
                $album->temas()->attach($tema);
                else{
                    $album->delete();
                    session()->flash('error', 'Un álbum no puede contener temas que no pertenezcan a un artista');
                    return redirect()-> route('albumes.index');
                }
        }

        }
        return redirect()-> route('albumes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $temas = $album->temas;
        $duracion = 0;
        foreach($temas as $tema){
            $duracion+=$tema->duracion;
        }

        return view('albumes.show',['album'=>$album,'duracion' =>$duracion]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albumes.edit',["album"=>$album]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $album->update(["titulo"=>$request->titulo,
                        'año' => $request->año]);
        return redirect()-> route('albumes.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {

            $album->delete();


        return redirect()-> route('albumes.index');
    }

}
