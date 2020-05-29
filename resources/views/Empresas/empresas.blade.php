@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <br>
            <div class="card">
                <div class="card-header">Empresas</div>
                <div class="card-body">
                    <div style="align-content: center">
                        <a class="btn btn-success" href="{{route('empresas.create')}}" role="button">Registrar Empresa</a>
                    </div>
                    <br>
                    <table class="table" id="example1">
                        <thead class="thead-dark">
                        <tr>

                            <th scope="col">Empresa</th>
                            <th scope="col">Numero de Cuenta</th>
                            <th scope="col">Numero de Cliente</th>
                            <th scope="col">Numero de Sucursal</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{$empresa->nombre_empresa}}</td>
                                <td>{{$empresa->num_cuenta}}</td>
                                <td>{{$empresa->num_cliente}}</td>
                                <td>{{$empresa->num_sucursal}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-target="#modal-update-{{$empresa->id}}" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ url("empresas/{$empresa->id}") }}">
                                     @csrf
                                     @method('DELETE')

                                   <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                   </form>
                                </td>
                            </tr>
                            <div class="container text-left">
                            @include('empresas.modalupdate')
                            </div>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
