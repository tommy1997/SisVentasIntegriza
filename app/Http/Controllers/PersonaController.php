<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Persona;
//hacemos referencia a la clase que valida el formulario
use App\Http\Requests\PersonaFormRequest;
//apuntamos a la clase para redirigir
use Illuminate\support\Facades\Redirect;

use DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request) 
        {
            #obtengodelformulario el valorque fue escrito del componete seach
        $valor=trim($request->get('searchText'));

        $persona = DB::table('persona')
        ->where('nombre','like',"%$valor%")
        ->where('tipo_persona','=','cliente')
        ->orderBy('idpersona','desc')
        ->paginate(5);
        return view('ventas.cliente.index')
        ->with("persona",$persona);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ventas.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        //
        $persona = new Persona;
        $persona->tipo_persona='cliente';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');

        
        $persona->save();

        return Redirect::to('ventas/cliente');
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
        //
          $c=Persona::findOrNew($id);

       return view('ventas.cliente.edit')
        ->with('persona',$c);  
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaFormRequest $request, $id)
    {
        //

         $persona = Persona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();

        //Redirect::to('almacen/categoria');
        return Redirect::to('ventas/cliente');
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
         $persona = Persona::findOrFail($id);
        $persona->tipo_persona='inactivo';
        $persona->update();

        return Redirect::to('ventas/cliente');
    }
}
