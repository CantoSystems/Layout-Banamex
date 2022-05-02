<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = Collect([
            ["empresa" => "SERVICIOSOPTICOSINTEGRALESDEMETEPECS","cuenta" => "00000000000008765417","cliente" => "000115005603","sucursal" => "7011"],
            ["empresa" => "OFTALMOCENTERSC","cuenta" => "00000000000003095241","cliente" => "000115373565","sucursal" => "7012"]
        ]);

        $fecha_periodo = now()->toDateString();
        foreach($empresas as $empresa){
            DB::table('empresas')->insert([
                'nombre_empresa' => $empresa['empresa'],
                'num_cuenta' => $empresa['cuenta'],
                'num_cliente' => $empresa['cliente'],
                'num_sucursal' => $empresa['sucursal'],
                'created_at' => $fecha_periodo,
                'updated_at' => $fecha_periodo
            ]);
        }


    }
}
