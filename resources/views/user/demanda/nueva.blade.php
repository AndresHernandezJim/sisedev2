@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="/user/demandas"><i class="fa fa-list"></i> Demandas</a></li>
	<li class="active"><i class="fa fa-pencil-square"></i> Redactar demanda</li>
</ol>
<br>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-8">
        <div id="ohsnap"></div>
    </div>
</div>
@if(Session::has('exito'))
    <input type="hidden" name="exito" value="1" id="exito">
    <input type="hidden" name="exp" value="{{$exp}}" id="exp">
@else
    <input type="hidden" name="exito" value="0" id="exito">
    <input type="hidden" name="exp" value="0" id="exp">
@endif
<div class="box box-solid">
	<div class="box-header"><center><h4>Nueva Demanda</h4></center></div>
	<form method="POST" action="/user/demandas/guardar" enctype="multipart/form-data">
		 {{ csrf_field() }}
	<div class="box-body">
		<div class="row"><!-- top -->
			<div class="col-md-2 col-md-offset-4">
				<div class="form-group">
					<label class="form-label">Año</label>
					<input type="tex" name="serie" class="form-control" value="{{$serie}}" readonly>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="form-label"><Folio>Expediente</Folio></label>
					<input type="text" name="exp" class="form-control" value="{{$exp+1}}" readonly>
				</div>
			</div>
			<input type="hidden" name="tipo" id="orden" value="7">
			<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
		</div> 
		<div class="col-md-9 col-md-offset-1">
          	<div class="box box-solid">
	            <!-- /.box-header -->
	            <div class="box-body">
	              	<div class="box-group" id="accordion">
	                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
		                <div class="panel box box-warning">
			                <div class="box-header with-border">
			                    <center><h4 class="box-title">
			                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			                        Datos Generales
			                      </a>
			                    </h4></center>
			                </div>
		                  	<div id="collapseOne" class="panel-collapse collapse in">
			                    <div class="box-body">
			                     	<div class="row">
										<div class="col-md-5 "> <!-- demandante -->
											<div class="row">
												<div class="form-group">
													<label class="form-label">Demandante</label>
													<input type="text" value="C. {{$usuario->nombre}}" class="form-control" readonly>
													<input type="hidden" name="id_demandante" id="id_demandante" value="{{$usuario->id}}">
												</div>
											</div>
											<div class="row" id="datosdemandante">
									
											</div>
											<div class="row">
												<div class="col-md-12">
													
												</div>
											</div>
										</div>
										<div class="col-md-5  col-md-offset-1"> <!-- demandado -->
											<div class="row">
												<div class="form-group">
													<div class="col-md-12">
														<label class="form-label">Demandado</label><span style="color:red;"> *</span>
														<input type='text' id='agregar' class='form-control'>
														<input type="hidden" id="id_demandado" name="id_demandado" value="0">
													</div>
												</div>
											</div>
											<br>
										</div>
									</div>
			                    </div>
		                  	</div>
		                </div>
		                <div class="panel box box-warning">
			                <div class="box-header with-border">
			                    <center><h4 class="box-title">
			                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			                        Documentos
			                      </a>
			                    </h4></center>
			                </div>
		                  	<div id="collapseTwo" class="panel-collapse collapse">
			                    <div class="box-body">
			                    	<div class="row">
			                    	<div class="col-md-12">
			                    	<center><span style="color:#95a5a6;"><small>El tamaño de los archivos no puede exeder los 8 MB</small></span></center>	
			                    	</div>	
			                    	</div>
				                    <div class="row">
										<div class="col-md-6 ">
											<div class="form-group">
												<br>
												<input type="file" id="archivo0" name="file[]" accept="application/pdf" class="form-control" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Tipo de documento</label> <span style="color:red;"> *</span>
												<select name="tipo[]"  class="form-control" >
													@foreach($tipodocumento as $k)
														@if($k->Tipo=="Demanda")
															<option value="{{$k->id}}" selected>{{$k->Tipo}}</option>
														@else
															<option value="{{$k->id}}">{{$k->Tipo}}</option>
														@endif
													
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-1">
											<br>
											<a href="javascript:void(0)" class="btn btn-primary btn-sm" id="agregar1"><i class="fa fa-plus" title="Añadir Documento"></i> &nbsp; Añadir</a>
										</div>
									</div>
									<div id="extra">
										
									</div>
			                    </div>
		                  	</div>
		                </div>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-4 col-md-offset-4">
	            		<center>
	            			<b>Los campos marcados con <span style="color:red;">*</span> son obligatorios</b>
	            		</center>
	            	</div>
	            </div>
            <!-- /.box-body -->
          	</div>
          	<!-- /.box -->
        </div>

	</div>
	<div class="box-footer">
		<div class="col-md-2 col-md-offset-4">
			<button class="btn btn-success " type="submit" title="La demanda se agrega y se envia al Oficial de partes para procesar">Agregar</button>
		</div>
		<div class="col-md-2">
			<a href="/user/demandas" class="btn btn-danger" title="Cancelar y regresar al menú anterior">Cancelar</a>
		</div>
	</div>
	</form>
</div>

<div class="modal fade" id="modal1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Agregar Demandado</h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-1">
							<label >Buscar</label>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" id="busqueda2" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-1">
							<div class="form-group">
								<select id="sdemandado" class="form-control">
									<option selected disabled>Seleccione</option>
								</select>
							</div>
						</div>
						
					</div>
					<hr>
					<br>
					<div class="row" id="datosdemandado">
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default btn-sm pull-left" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="/js/ohsnap.min.js"></script>
<script src="/js/nuevademanda2.js"></script>
<script>
	
</script>
@endsection