<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:sede.index')->only('index');
        $this->middleware('can:sede.create')->only('create');
        $this->middleware('can:sede.edit')->only('edit, update');
        $this->middleware('can:sede.destroy')->only('destroy');
    }
    /**sedes
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::all();
        return view('sede.index')->with('sedes', $sedes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sede.create');
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
            
            'nombre'=>'required|unique:sedes',
            

        ]);
        $sedes = new Sede();
        
        $sedes->nombre = $request->get('nombre');
        $sedes->descripcion = $request->get('descripcion');
        $sedes->condicion = $request->get('condicion');

        $sedes->save();

        return redirect('sedes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sede$sede)
    {
        return view('sede.show',compact('sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sede = Sede::find($id);
        return view('sede.edit')->with('sede',$sede);
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
            
            'nombre'=>'required:sedes',
            

        ]);
        $sede = Sede::find($id);

        $sede->nombre = $request->get('nombre');
        $sede->descripcion = $request->get('descripcion');
        $sede->condicion = $request->get('condicion');

        $sede->save();

        return redirect('sedes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = sede::find($id);

        $sede->delete();

        return redirect('sedes')->with('eliminar','ok');
    }
}