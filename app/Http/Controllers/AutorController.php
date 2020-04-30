<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use App\Libro;


class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        
        return view('autores', compact('autores'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
        ]);
        
        $autorNuevo = new Autor; 

        $autorNuevo->nombre = $request->nombre;
        $autorNuevo->apellido = $request->apellido;

        $autorNuevo->save();

        //return "Autor agregado con exito";

        return back()->with('mensaje', 'Autor Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Autor::findOrFail($id);

    }

    /**
     * Edita registro pasado por request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $autor = Autor::findOrFail($id);

        return view('editAutor', compact('autor'));
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
        $autor = Autor::findOrFail($id);

        $autor->nombre = $request->nombre;
        $autor->apellido = $request->apellido;

        $autor->save();

        return redirect('autores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : string
    {
        $hayLibro = Libro::select('id')->where('idAutor', $id)->count();

        if($hayLibro > 0){
            return '<script language="javascript">alert("No se puede eliminar el autor, existe al menos un libro de su autoria");</script>';
        
        }
    
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return redirect('autores');

    }
}
