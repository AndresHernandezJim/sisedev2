@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><i class="fa fa-envelope"></i> Notificaciones</li>
    </ol>
    <br>
@endsection
@section('content')
  <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div id="ohsnap"></div>
        </div>
    </div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">Notificaciones</div>
			<div class="box-body">
				<div class="col-md-12">
					<table class="table table-striped table-hover  table-bordered table-sm table-responsive" id="tabla">
						<thead class="thead-dark">
							<th><center>Fecha</center></th>
							<th><center>Mensaje</center></th>
							<th><center>Creado hace</center></th>
							<th><center>Estado</center></th>
						</thead>
						<tbody>
							@foreach($mensajes2 as $k)
								<tr>
									<td><center>{{$k->fecha}}</center></td>
									<td><center>{{$k->mensaje}}</center></td>
									<td><center>{{$k->tiempo}}</center></td>
									@if($k->estatus==0)
									<td><center><a href="#" onclick="leer({{$k->id}});" class="btn btn-sm btn-success">Macar como leido</a></center></td>
									@else
									<td><center><a href="#" class="btn btn-info btn-info" disabled>Leido </a></center></td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	var table = $('#tabla').DataTable({"ordering": true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Notificaciones Registradas",
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
	function leer(id){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			type:'POST',
			url:'/oficialpartes/notificaciones/update',
			data:{_token: CSRF_TOKEN,id:id},
			success:function(data){
				data=JSON.parse(data);
				console.log(data);
				location.reload(true);
			}
		});
	}
</script>
@endsection