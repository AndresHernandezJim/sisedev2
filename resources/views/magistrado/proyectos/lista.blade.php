@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
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
			<div class="box-head"><center><h4><b>Expedientes con Proyecto de Sentencia</b></h4></center></div>
			<div class="box-body">
				<table class="table table-sm table-stripped table-bordered table-responsive" id="tabla" name="tabla">
          <thead>
            <tr>
              	<th>Expediente</th>
                <th>Fecha</th>
                <th>Demandando</th>
                <th>Demandante</th>
                <th></th>
             </tr>
          </thead>
          <tbody>
						@foreach($exp as $k)
						<tr>
							<td><center><a href="#" class="btn btn-info" data-toggle="popover" data-placement="rigth" data-content="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a><center></td>
							<td>{{$k->fecha}}</td>
							<td>{{$k->demandado}}</td>
							<td>{{$k->demandante}}</td>
							<td><a href="/magistrado/proyectos/expediente/{{$k->id}}" class="btn bg-orange btn-xs" data-toggle="popover" data-placement="left" data-content="Ver los Proyectos de sentencia realizados para el Expediente {{$k->expediente}}/{{$k->serie}}" title="Ver proyectos"><span class="glyphicon glyphicon-eye-open"></span> Ver proyectos</a></td>
						</tr>
						@endforeach
          </tbody>
        </table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
$(function(){
	var table = $('#tabla').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
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
</script>
@endsection
