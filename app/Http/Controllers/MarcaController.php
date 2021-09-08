<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:marca.index')->only('index');
        $this->middleware('can:marca.create')->only('create');
        $this->middleware('can:marca.edit')->only('edit, update');
        $this->middleware('can:marca.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
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
            
            'nombre'=>'required|unique:marcas',
            

        ]);
        $marcas = new Marca();
        
        $marcas->nombre = $request->get('nombre');
        $marcas->descripcion = $request->get('descripcion');
        $marcas->condicion = $request->get('condicion');

        $marcas->save();

        return redirect('marcas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marca$marca)
    {
        return view('marca.show',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);
        return view('marca.edit')->with('marca',$marca);
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
        $request->validate([
            
            'nombre'=>'required:marcas',
            

        ]);
        $marca = Marca::find($id);

        $marca->nombre = $request->get('nombre');
        $marca->descripcion = $request->get('descripcion');
        $marca->condicion = $request->get('condicion');

        $marca->save();

        return redirect('marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::find($id);

        $marca->delete();

        return redirect('marcas')->with('eliminar','ok');
    }
}