@extends('welcome')

@section('content')
<h3>Ingresa los datos que se te piden</h3>
<form method="post" action="{{route('creartxt')}}" enctype="multipart/form-data" file="true">
@csrf
<div class="form-row">
<div class="form-group col-md-12">
  <label for="">Selecciona la empresa: </label>
  <select class="custom-select" name="empresa">
    @foreach ($empresas as $emp)
      <option value="{{$emp->id}}">{{$emp->nombre_empresa}}</option>
    @endforeach
  </select>
</div>
<div class="form-group col-md-4">
  <label for="">Importe total</label>
  <input type="text" class="form-control" name="importe_total" placeholder="Ingresa el importe total">
</div>
<div class="form-group col-md-4">
  <label for="">Ingresa la fecha de pago:</label>
  <input type="text" class="form-control" name="fecha_pago" placeholder="DDMMAA">
</div>
<div class="form-group col-md-4">
  <label for="">Ingresa el serial:</label>
  <input type="text" class="form-control" name="serial" placeholder="0001-0099">
</div>
<div class="form-group col-md-4">
  <label for="">Ingresa la referencia alfanumerica:</label>
  <input type="text" class="form-control" name="referencia" placeholder="Ingresa la referencia alfanumerica">
</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
