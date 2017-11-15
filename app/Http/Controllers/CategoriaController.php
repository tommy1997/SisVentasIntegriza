<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//hacemos referecia al modelo categoria
use App\Categoria;
//hacemos referencia a la clase que valida el formulario
use App\Http\Requests\CategoriaFormRequest;
//apuntamos a la clase para redirigir
use Illuminate\support\Facades\Redirect;


//hacemos referencia a la clase para manejo de BD
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        if ($request) 
        {
            #obtengodelformulario el valorque fue escrito del componete seach
        $valor=trim($request->get('searchText'));

        $categorias = DB::table('categoria')
        ->where('nombre','like',"%$valor%")
        ->where('condicion','=','1')
        ->orderBy('idcategoria','desc')
        ->paginate(5);
        return view('almacen.categoria.index')
        ->with("categoria",$categorias);
        }

        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //muestra el resultado capturado
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
        //
        $categoria = new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();

        return Redirect::to('almacen/categoria');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscar en la tabla categoria cuya id es la que recibe el controllador
       
        $c=Categoria::findOrNew($id);

       return view('almacen.categoria.edit')
        ->with('categoria',$c);  
  
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();

        //Redirect::to('almacen/categoria');
        return Redirect::to('almacen/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();

        return Redirect::to('almacen/categoria');
    }
}
