@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="/magistrado/proyectos"><i class="fa fa-folder-open"></i> Proyectos</a></li>
	<li class="active"><i class="fa fa-list-ol"></i> Expediente</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><h4><b>Proyectos del expediente </b></h4></center></div>
			<div class="box-body">
				<table class="table table-sm table-stripped table-bordered table-responsive" id="tabla" name="tabla">
					<thead>
						<th><center>Identificador</center></th>
						<th><center>Creado</center></th>
						<th><center>Enviado</center></th>
						<th><center>Estado</center></th>
						<th></th>
					</thead>
					<tbody>
						@foreach($proyectos as $k)
						<tr>	
							<td>{{$k->numero}}</td>
							<td>{{$k->fecha_creacion}}</td>
							<td>{{$k->fecha_envio}}</td>
							<td>{{$k->estatus}}</td>
							<td><a href="/magistrado/proyectos/expediente/{{$exp}}/{{$k->id}}" class="btn btn-xs bg-orange">Ver proyecto <span class="gliphycon gliphycon-eye-open">	</span></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
