@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('content')
 <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="/oficialpartes/demanda">Demandas</a></li>
    <li class="active">Nueva Demanda</li>
  </ol>
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
	<form method="POST" action="/oficialpartes/demanda/registro" enctype="multipart/form-data">
		 {{ csrf_field() }}
	<div class="box-body">
		<div class="row"><!-- top -->
			<div class="col-md-2 col-md-offset-1">
				<div class="form-group">
					<label class="form-label">Año</label>
					<input type="tex" name="serie" class="form-control" value="{{$serie}}">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="form-label"><Folio>Expediente</Folio></label>
					<input type="text" name="exp" class="form-control" value="{{$exp+1}}">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="form-label">Orden de Demanda</label>
					<select name="tipo" id="orden" class="form-control">
						<option value="7">Ciudadano -> Institución </option>
						<option value="9">Institución -> Ciudadano</option>
					</select>
				</div>
				<input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="">Tipo de Demanda</label>
					<select name="tipodemanda" class="form-control">
						@foreach($tipodem as $t)
						<option value="{{$t->id}}">{{$t->tipo}}</option>}
						@endforeach
					</select>
				</div>
			</div>
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
													<label class="form-label">Demandante</label> <span style="color:red;">*</span>
													<input type="text"  class="form-control" id="demandante">
													<input type="hidden" name="id_demandante" id="id_demandante" value="0">
												</div>
											</div>
											<div class="row" id="datosdemandante">
									
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="form-label">Rol</label>
												
													<div class="form-group">
														<select class="custom-select form-control" name="roldemandante">
															<option value="1">Actor</option>
															<option value="2">Apoderado Legal</option>
															<option value="3">Demandado</option>
															<option value="4">Tercero Interesado</option>
														</select>
													</div>
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
			                    	<center><span>El tamaño de los archivos no puede ser mayor a 8 MB</span></center>	
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
											<a href="#" class="btn btn-primary btn-sm" id="agregar1"><i class="fa fa-plus" title="Añadir Documento"></i> &nbsp; Añadir</a>
										</div>
									</div>
									<div id="extra">
										
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Observaciones</label>
		                 						<textarea class="form-control" rows="4" placeholder="Ingrese las Observaciones ..." name="observaciones" ></textarea>
											</div>
										</div>
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
			<button class="btn btn-success " type="submit">Agregar</button>
		</div>
		<div class="col-md-2">
			<a href="/oficialpartes/demanda" class="btn btn-danger ">Cancelar</a>
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
<div class="modal fade" id="modal2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Agregar Demandante</h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-1">
							<label >Buscar</label>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" id="busqueda" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-1">
							<div class="form-group">
								<select id="sdemandante" class="form-control">
									<option selected disabled>Seleccione</option>
								</select>
							</div>
						</div>
						
					</div>
					<hr>
					<br>
					<div class="row" id="datosdemandate">
						
					</div>
					<hr>
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
<script src="/js/nuevademanda.js"></script>
<script>
	
</script>
@endsection