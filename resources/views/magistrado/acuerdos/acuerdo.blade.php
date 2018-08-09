@extends('layouts.app2')
@section('style')

@endsection
@section('navegacion')
<ul class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
</ul>
<br>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><h4><b>Expedientes con Acuerdo Redactado</b></h4></center></div>
			<div class="box-body">
				<table class="table table-stripped table-bordered table-hover" id="tabla">
					<thead>
						<th>Expediente</th>
						<th>Demandante</th>
						<th>Demandado</th>
						<th></th>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection