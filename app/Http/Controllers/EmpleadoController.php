<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmpleadoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Empleado;
use App\Empresa;
use File;
use Response;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Empleados.importarexcel');
    }

    public function import()
      {
        $empresas= Empresa::all();
        $empleados= Empleado::all();
        foreach ($empleados as $emp) {
          $emp->delete();
        }
        $public_path= public_path();
        File::delete(File::glob($public_path.'/prueba.txt'));
          Excel::import(new EmpleadoImport,request()->file('file'));
          return view('Empleados.formar_layout',compact('empresas'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function creartxt(Request $request){
           $asimilable= Empleado::all();
           $empresa= Empresa::find($request->empresa);
           $cont= Empleado::count();
           $empre= str_pad($empresa->nombre_empresa, 36);
           $abonos=str_pad($cont, 6, "0", STR_PAD_LEFT);
           $cadena1=$request->importe_total;
           $cadena_tratada1=str_replace('.', '', $cadena1);
           $importe= str_pad($cadena_tratada1, 18, "0", STR_PAD_LEFT);
           //////////////////////////////////////
           $public_path= public_path();
            $file=$public_path."/prueba.txt";
            $fp= fopen($file,"wr");
            fwrite($fp, "1".$empresa->num_cliente.$request->fecha_pago.$request->serial.$empre."PAGO DE NOMINA"."      "."05"."                                        "."C00"."\n");
            fclose($fp);
            $fp0=fopen($file, "a+");
            fwrite($fp0, "2"."1"."001".$importe."01".$empresa->num_sucursal.$empresa->num_cuenta."                    "."\n");
            fclose($fp0);
            $fp1= fopen($file,"a+");
            for ($i=0; $i <$cont ; $i++) {
              $import=number_format($asimilable[$i]->importe, 2, '.', '');
              $imp2=str_pad($import, 19, "0", STR_PAD_LEFT);
              $imp3=str_replace('.', '', $imp2);
              $emple= str_pad($asimilable[$i]->nombre_empleado, 55);
            fwrite($fp1, "3"."0"."001".$imp3."01"."000000000".$asimilable[$i]->cuenta.$request->referencia."                              ".$emple.'NOMINA'."                                 "."                         "."0000000000000"."\n");
            }
            fclose($fp1);
            $fp2=fopen($file,"a+");
            fwrite($fp2, "4"."001".$abonos.$importe."000001".$importe);
            fclose($fp2);
            return redirect()->action('EmpleadoController@gentxt');
    }
 public function gentxt(){
return view('Empleados.descargar');
 }
 public function descargar(){
   $pathtoFile ='prueba.txt';
 return response()->download($pathtoFile);
 }
}
