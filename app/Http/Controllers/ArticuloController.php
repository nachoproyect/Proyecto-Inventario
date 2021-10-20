<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticuloCreateRequest;
use App\Http\Requests\ArticuloEditRequest;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Marca;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\BarcodeGeneratorController;
use Illuminate\Support\Collection;
use PDF;
use Illuminate\Validation\Rule;
class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:articulo.index')->only('index');
        $this->middleware('can:articulo.create')->only('create');
        $this->middleware('can:articulo.edit')->only('edit, update');
        $this->middleware('can:articulo.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos', $articulos);
    }
    public function listado()

{
    $articulos = Articulo::all();
      return view('articulos.listado')->with('articulos', $articulos);
}/*
public function generateBarcode(Request $request){
    $id = $request->get('id');
    $categorias = Categoria::orderBy('nombre')->get();
    
    $articulo = Articulo::find($id);
    return view('articulos')->with('articulo','categorias',$articulo);
}*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();    
        $marcas = Marca::orderBy('nombre')->get(); 

        return view('articulo.create', compact('categorias','marcas'));

        /*$sectors = Sector::orderBy('nombre')->get();
        return view('sector.create', compact('sectors'));

        $sedes = Sede::orderBy('nombre')->get();
        return view('sede.create', compact('sedes'));*/
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloCreateRequest $request)
    {
       // $request->validate([
            
            // 'ip'=>'unique:articulos,ip|nullable:articulos',
            //'puesto'=>'nullable:articulos',
            //'serial'=>'nullable:articulos|unique:articulos,serial',
            //'estante'=>'nullable:articulos|unique:articulos,estante',
            //'categoria_id'=>'required:articulos',
            //'marca_id'=>'required:articulos',
            //'faja'=>'nullable:articulos|unique:articulos,faja',
            //'precinto'=>'nullable:articulos|unique:articulos,precinto',

            

     //   ]);
        
        $id = IdGenerator::generate(['table' => 'articulos','field'=>'codigo', 'length' => 8, 'prefix' =>date('1')]);

        $articulos = new Articulo();

        $articulos->codigo = $id;
        $articulos->categoria_id = $request->get('categoria_id');
        $articulos->marca_id = $request->get('marca_id');
        $articulos->serial = $request->get('serial');
        $articulos->estante = $request->get('estante');
        $articulos->faja = $request->get('faja');
        $articulos->precinto = $request->get('precinto');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->estado = $request->get('estado');


        $articulos->save();

        return redirect('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        
         return view('articulo.show', compact('articulo'));
    }

    public function barra(Request $request)
    {
        
      $articulos = $request->articulos;
       return view('articulo.barras')->with('articulos', $articulos);
       
    }

  public function createPDF(){

        /* $categorias = Categoria::orderBy('nombre')->get();
         $marcas = Marca::orderBy('nombre')->get();*/
        //Recuperar todos los productos de la db
      $articulos = Articulo::all();
       
        view()->share('articulos', $articulos);
       // $articulos = $request->articulos;
      return $pdf = PDF::loadView('articulo.barras',$articulos);
       
       //return $pdf->download('archivo-pdf.pdf');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($articulo)
    {
        $categorias = Categoria::all();
       // $sectors = Sector::all();
      //  $sedes = Sede::all();
        $marcas = Marca::all();
        $articulo = Articulo::find($articulo);
        return view('articulo.edit',compact('articulo','categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloEditRequest $request, $id)
    {
      //  $request->validate([
            
           
          //  'faja'=>'unique:articulos','faja',

          //  'precinto'=>'unique:articulos','precinto',
         

     //   ]);
        $articulo = Articulo::find($id);

       

        $articulo->categoria_id = $request->get('categoria_id');        
        $articulo->marca_id = $request->get('marca_id');
        $articulo->serial = $request->get('serial');
        $articulo->estante = $request->get('estante');
        $articulo->faja = $request->get('faja');
        $articulo->precinto = $request->get('precinto');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->estado = $request->get('estado');

        $articulo->save();

        return redirect('articulos')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);

        $articulo->delete();

        return redirect('articulos')->with('eliminar','ok');
    }

    public function impresion()
    {
         $articulos = Articulo::all();
        return view('articulo.impresion')->with('articulos', $articulos);
        
         //return view('articulo.impresion', compact('articulo'));
    }
}
