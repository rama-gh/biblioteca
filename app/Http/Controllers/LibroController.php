<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Autor;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        $autores = Autor::all();
        
        //para retornar sin vista:
        //return compact('libros','autores');

        return  view('libros', compact('libros','autores')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) : string{
        
        $request->validate([
            'nombre' => 'required|max:50',
            'id' => 'required|unique:libros',
            'anio' => 'required|numeric'
            /*---------------falta validar el idAutor---------------*/

        ]);

        $nuevoLibro = new Libro;
        
        $nuevoLibro->nombre = $request->nombre;
        $nuevoLibro->id = $request->id;
        $nuevoLibro->anio = $request->anio;
        $nuevoLibro->estado = 1;

        $idAutorConsulta = Autor::select('id')->where('nombre', 'Alejandro')->first();
        $idAutor = $idAutorConsulta['id'];
        
        $nuevoLibro->idAutor = $idAutor;          
        $nuevoLibro->save();

        //return "Libro creado";
        return back()->with('mensaje', 'Libro Agregado!');

    }
            

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Libro::findOrFail($id);

    }

    /**
     * Edit and store the specified resource.
     *
     * @param  request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $libro = Libro::findOrFail($request->id);

        $libro->nombre = $request->nombre;
        $libro->anio = $request->anio;
        $libro->idAutor = $request->idAutor;

        $libro->save();

        return view('editLibro', compact('libro'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : string
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return "Libro eliminado correctamente";

    }
}
