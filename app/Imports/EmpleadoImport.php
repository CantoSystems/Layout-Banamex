<?php

namespace App\Imports;

use App\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleado([
          'nombre_empleado' => $row['nombre_de_trabajador'],
          'cuenta' => $row['cuenta'],
          'importe' => $row['importe'],
        ]);
    }
}
