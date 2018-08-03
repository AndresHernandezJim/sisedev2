@extends('layouts.app2')
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li ><a href="/proyectista/expedientes"><i class="fa fa-folder-open"></i> Expedientes</a></li>
    <li class="active"><i class="fa fa-pencil"></i> Redactar Proyecto</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"><center><b>Redactar Proyecto para el Expediente {{$exp}}/{{$serie}}</b></center></div>
			<div class="box-body">
				<form action="/proyectista/proyectos/guardar" method="post">
					 {{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<textarea id="editor1" class="form-control" rows="15" name="texto">
							</textarea>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Fecha de creación</label>
								<input type="date" class="form-control" value="@php  $date=date('Y-m-d'); echo $date @endphp" name="fechared">
							</div>
						</div>
					</div>
						<input type="hidden" value="{{$id_exp}}" name="id_exp">
						
						<div class="row">
							<div class="col-md-1 col-md-offset-5">
								<button type="submit" class="btn btn-success">Guardar</button>
							</div>
							<div class="col-md-1">
								<a href="/proyectista/expedientes" class="btn btn-danger">Cancelar</a>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script >
	CKEDITOR.replace('editor1');
</script>
@endsection