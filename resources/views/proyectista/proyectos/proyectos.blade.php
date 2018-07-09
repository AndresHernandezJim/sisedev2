@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="/proyectista/expedientes"><i class="fa fa-folder-open"></i> Expedientes</a></li>
    <li class="active"> <i class="fa fa-file"></i> Proyectos</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"><center>Proyectos redactados<center></div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-2 col-md-offset-10">
						<a href="/proyectista/proyectos/redactarnuevo/{{$exp}}" data-toggle="popover" data-content="Crear un nuevo proyecto de Sentencia para el expediente" rel="popover" data-placement="top"  title="Crear nuevo" class="btn bg-navy "><i class="fa fa-pencil"></i> Crear nuevo</a>
					</div>
				</div>
				<br>
				<div class="col-md-12">
					<table class="table table-striped table-hover  table-bordered table-sm table-responsive" id="tabla">
						<thead class="thead-dark">
							<th><center># Identificador</center></th>
							<th><center>Fecha Creación</center></th>
							<th><center>Fecha de envío</center></th>
							<th><center>Estado</center></th>
							<th></th>
						</thead>
						<tbody>
							@foreach($p as $k)
								<tr>
									<td><center>{{$k->numero}}</center></td>
									<td><center>{{$k->fecha_creacion}}</center></td>
									<td><center>{{$k->fecha_envio}}</center></td>
									<td><center>{{$k->estatus}}</center></td>
									<td><center><a href="/proyectista/proyectos/ver/{{$k->id}}_{{$k->id_exp}}" class="btn bg-orange-active"  data-toggle="popover" data-content="Visualizar el proyecto, editarlo, enviarlo al magistrado y ver los comentarios sobre el proyecto" rel="popover" data-placement="left"  title="Ver"><span class="glyphicon glyphicon-eye-open"></span> Ver</a></center></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div id="ohsnap"></div>
        </div>
    </div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	var table = $('#tabla').DataTable({"order": [[ 0, "desc" ]],"ordering": true,language: {
        "emptyTable": "No hay información",

        "info":"Del _START_ al _END_ de _TOTAL_ Proyectos Registradas",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder":  "Elemento a buscar",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },"lengthMenu":       [[10, 20, 25, 50, -1], [ 10, 20, 25, 50, "Todos"]],});
	
</script>
@endsection