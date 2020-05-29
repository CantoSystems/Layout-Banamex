<div class="modal fade bs-example-modal-lg" tabindex="-1" id="modal-update-{{$empresa->id}}" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Editar los datos de la empresa: {{$empresa->nombre_empresa}}</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form class="" action="{{route('empresas.update', $empresa->id)}}" method="post">
@method('PATCH')
@csrf
<div class="row">
  <div class="col-md-6">
    <input type="text" class="form-control" value="{{$empresa->nombre_empresa}}"  name="nombre_empresa">
  </div>
  <br><br>
  <div class="col-md-6">
    <input type="text" class="form-control" value="{{$empresa->num_cuenta}}" name="num_cuenta">
  </div>
  <div class="col-md-6">
    <input type="text" class="form-control" value="{{$empresa->num_cliente}}" name="num_cliente">
  </div>
  <div class="col-md-6">
    <input type="text" class="form-control" value="{{$empresa->num_sucursal}}" name="num_sucursal">
  </div>
</div>
<br><br>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button class="btn btn-primary" type="submit">Continuar</button>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
