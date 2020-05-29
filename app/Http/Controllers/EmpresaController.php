<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas= Empresa::all();
        return view('Empresas.empresas', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa= new Empresa;
        $empresa->nombre_empresa= $request->nombre_empresa;
        $empresa->num_cuenta= $request->num_cuenta;
        $empresa->num_cliente= $request->num_cliente;
        $empresa->num_sucursal= $request->num_sucursal;
        $empresa->save();
        return redirect()->action('EmpresaController@index');
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
      $empresa= Empresa::find($id);
      $empresa->nombre_empresa= $request->nombre_empresa;
      $empresa->num_cuenta= $request->num_cuenta;
      $empresa->num_cliente= $request->num_cliente;
      $empresa->num_sucursal= $request->num_sucursal;
      $empresa->save();
      return redirect()->action('EmpresaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresa = Empresa::find($id);
      $empresa->delete();
      return redirect()->action('EmpresaController@index');
    }
}
