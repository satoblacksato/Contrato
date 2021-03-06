<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Distribution;
use App\Programa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    /*  $empleados = Empleado::search($request->nombre)->get();*/
      $empleados = Empleado::search($request->apellido)->orderBy('id','ASC')->paginate(10);
      return view('admin.empleado.index')->with('empleados',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $reparticiones = Distribution::pluck('nombre','id');
      $programas=Programa::pluck('nombre','id');
        return view('admin.empleado.create')->with('reparticiones',$reparticiones)->with('programas',$programas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {

      try {

      $empleado = new Empleado($request->all());

     $empleado->save();
      flash("Se creo el Consultor " . $empleado->nombre .",".$empleado->apellido. " correctamente!")->success();
    }catch (\Illuminate\Database\QueryException $e){
  flash("ATENCION!!! NO SE PUDO CREAR A EL CONSULTOR :".$empleado->nombre. ",".$empleado->apellido." El campo DNI y CUIT solo acepta numeros enteros")->error();
  }
      return redirect(route('empleado.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $empleado = Empleado::find($id);


      return view('admin.empleado.show')->with('empleado',$empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reparticiones = Distribution::pluck('nombre','id');
        $programas = Programa::pluck('nombre','id');
        $empleado=Empleado::find($id);
        $empleado->programa;
        $empleado->distribution;
        return view('admin.empleado.edit')->with('empleado',$empleado)->with('reparticiones',$reparticiones)->with('programas',$programas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, $id)
    {
      try {

      $empleado=Empleado::find($id);
      $empleado->fill($request->all());
      $empleado->save();
      flash("Se actualizo el Consultor  " . $empleado->nombre. ",".$empleado->apellido." correctamente!")->warning();
      }catch (\Illuminate\Database\QueryException $e){
  flash("ATENCION!!! NO SE PUDO EDITAR A EL CONSULTOR :".$empleado->nombre. ",".$empleado->apellido." El campo DNI y CUIT solo acepta numeros enteros")->error();
  }

       return redirect(route('empleado.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empleado=Empleado::find($id);
      flash("Se elimino el Empleado  " . $empleado->nombre.",".$empleado->apellido. " correctamente!")->error();
      $empleado->contratos()->forceDelete();
      $empleado->forceDelete();
      return redirect(route('empleado.index'));
    }
}
