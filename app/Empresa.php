<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable=['nombre_empres','num_cuenta','num_sucursal','num_cliente'];
}
