@extends('layouts.app2')
@section('style')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@endsection
@section('navegacion')
<ol class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active"><i class="fa fa-folder-open"></i> Proyectos</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"></div>
			<div class="box-body">
				<ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-edit"></span> Redactados</a></li>
                <li><a data-toggle="tab" href="#revision"><span class="glyphicon glyphicon-eye-open"></span> En revisión</a></li>
                <li><a data-toggle="tab" href="#aprobar"><span class="glyphicon glyphicon-ok-sign"></span> Aprobados</a></li>
                <li><a data-toggle="tab" href="#rechazar"><span class="glyphicon glyphicon-warning-sign"></span> Rechazados</a></li>
                </ul>
                <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                  <div class="row">
                  	<br>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-left:10%;width:80%; ">
                      <table class="table table-sm table-stripped table-bordered table-responsive" id="tredactados" name="table1">
                        <thead>
                          <tr>
                          	<th>Expediente</th>
                            <th>Proyecto #</th>
                            <th>Fecha Envío</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
              						@foreach($creado as $k)
              						<tr>
              							<td><center><a href="javascript:void(0)" title="Expediente {{$k->id_exp}}/{{$k->serie}}" class="btn bg-navy">{{$k->id_exp}}</a></center></td>
              							<td><center>{{$k->numero}}</center></td>
              							<td><center>{{$k->fecha_envio}}</center></td>
              							<td><center>
              								<a href="/proyectista/proyectos/ver/{{$k->id}}_{{$k->id_exp}}" class="btn bg-purple"><i class="fa fa-eye"></i> Ver</a>
              								@if($k->estatus==1)
              									<a href="javascript:void(0)" title="El expediente ya ha sido Enviado a revision" class="btn btn-info" disabled> Enviar</a>
              								@else
              									<a href="javascript:void(0)" onclick="enviar({{$k->id}});" id="btn_enviar" title="Enviar al Magistrado para revisión" class="btn btn-info">Enviar</a>
              								@endif
                            </center>
              							</td>
              						</tr>
              						@endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>

                </div>
                <div id="revision" class="tab-pane fade">
                  <div class="row">
                  <br>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-left:10%;width:80%; " >
                      <table class="table table-sm table-stripped table-bordered table-responsive" id="trev">
                        <thead>
                          <tr>
                          	<th>Expediente</th>
                            <th>Proyecto #</th>
                            <th>Fecha Envío</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
						@foreach($rev as $k)
						<tr>
							<td><center><a href="javascript:void(0)" title="Expediente {{$k->id_exp}}/{{$k->serie}}" class="btn  bg-navy">{{$k->id_exp}}</a></center></td>
							<td><center>{{$k->numero}}</center></td>
							<td><center>{{$k->fecha_envio}}</center></td>
							<td><center>
								<a href="/proyectista/proyectos/ver/{{$k->id}}_{{$k->id_exp}}" class="btn bg-purple"><i class="fa fa-eye"></i> Ver</a></center>
							</td>
						</tr>
						@endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                <div id="aprobar" class="tab-pane fade">
                  <div class="row">
                  <br>
              	  </div>
              	  <div class="row">
                    <div class="col-md-12" style="margin-left:10%;width:80%; ">
                    <table class="table table-sm table-stripped table-bordered table-responsive" id="tacept">
                      <thead>
                          <tr>
                          	<th>Expediente</th>
                            <th>Proyecto #</th>
                            <th>Fecha Envío</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
						@foreach($acep as $k)
						<tr>
							<td><center><a href="javascript:void(0)" title="Expediente {{$k->id_exp}}/{{$k->serie}}" class="btn bg-navy">{{$k->id_exp}}</a></center></td>
							<td><center>{{$k->numero}}</center></td>
							<td><center>{{$k->fecha_envio}}</center></td>
							<td><center>
								<a href="/proyectista/proyectos/ver/{{$k->id}}_{{$k->id_exp}}" class="btn bg-purple" title="Ver el proyecto #{{$k->numero}}"><i class="fa fa-eye"></i> Ver</a></center>
							</td>
						</tr>
						@endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                <div id="rechazar" class="tab-pane fade">
                  <div class="row">
                  	<br>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-left:10%;width:80%;">
                      <table class="table table-sm table-stripped table-bordered table-responsive" id="trecha" >
                        <thead>
                          <tr>
                          	<th>Expediente</th>
                            <th>Proyecto #</th>
                            <th>Fecha Envío</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
						@foreach($recha as $k)
						<tr>
							<td><center><a href="javascript:void(0)" title="Expediente {{$k->id_exp}}/{{$k->serie}}" class="btn  bg-navy">{{$k->id_exp}}</a></center></td>
							<td><center>{{$k->numero}}</center></td>
							<td><center>{{$k->fecha_envio}}</center></td>
							<td><center>
								<a href="/proyectista/proyectos/ver/{{$k->id}}_{{$k->id_exp}}" class="btn bg-purple"><i class="fa fa-eye"></i> Ver</a></center>
							</td>
						</tr>
						@endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title"><b>Enviar proyecto para revisión</b></h5></center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="">Magistrado</label>
                  <select name="" id="selmagistrado" class="form-control">
                    @foreach($magistrados as $m)
                <option value="{{$m->id}}">Lic. {{$m->magistrado}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <input type="hidden" id="id_proyectoe">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <a href="javascript:void(0)" onclick="enviar2();" class="btn btn-primary" title="Enviar Proyecto al Magistrado">Enviar</a>
          </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-8">
        <div id="ohsnap"></div>
    </div>
</div>
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/ohsnap.min.js"></script>
<script >
$(function(){
	var table = $('#tredactados').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Proyectos Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }});
	var table2 = $('#tacept').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Proyectos Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }});
	var table3 = $('#trecha').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Proyectos Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }});
    var table4 = $('#trev').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Proyectos Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }});
});
function enviar($id){
  $('#id_proyectoe').val($id);
  $('#exampleModal').modal('show');
}
function enviar2(){
  var idproy=$('#id_proyectoe').val();
  var id_mag=$('#selmagistrado').val();
  $.ajax({
    type:"get",
    url:"/proyectista/proyectos/enviar",
    data:{id_proy:idproy,id_mag:id_mag},
    success:function(data){
      data=JSON.parse(data);
      $('#exampleModal').modal('hide');
      ohSnap('El proyecto #'+data.proyecto.numero+" se ha enviado a "+data.usuario+" para revision",{'color':'green'});
      $('#btn_enviar').attr("disabled", true);
      $('#btn_enviar').attr('title', 'El proyecto ya se ha enviado a revisión');
    }
  });
}
</script>
@endsection