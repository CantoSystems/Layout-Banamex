@extends('welcome')

@section('content')
<h3>Nueva Empresa</h3>
  <form action="{{route('empresas.store')}}" method="post">
      @csrf
    <div class="row">
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Nombre de la Empresa"  name="nombre_empresa">
      </div>
      <br><br>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Numero de Cuenta" name="num_cuenta">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Numero de Cliente" name="num_cliente">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Numero de Sucursal" name="num_sucursal">
      </div>
    </div>
    <br><br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
