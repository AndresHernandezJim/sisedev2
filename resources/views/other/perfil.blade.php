@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
 <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><i class="fa fa-address-card-o"></i> Perfil de usuario</li>
  </ol>
  <br>
@endsection
@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="box">
  			<div class="box-header"><center><h4><b>Perfil del Usuario</b></h4></center></div>
  			<div class="box-body">
				<div class="row" id="perfil">
					<div class="col-md-10 col-md-offset-1">
						@if(Session::has('exito'))
							<input type="hidden" name="exito" value="1" id="exito">
						@else
							<input type="hidden" name="exito" value="0" id="exito">
						@endif
				      	<div class="box box-primary">
					        <div class="box-body box-profile">
					          	<img class="profile-user-img img-responsive img-circle" width="250px;" src="{{$usuario->avatar}}" alt="Fotografía de Perfil">
								<input type="hidden" id="userid" value="{{$usuario->id}}">
					         	<h3 class="profile-username text-center">{{$usuario->nombreusuario}}</h3>
					         	@if($tipo=="user")
					          	<p class="text-muted text-center">Usuario del Sistema</p>
					         	@else
					         	<p class="text-muted text-center">Representante de Institución</p>
					         	<p class="text-muted text-center">{{$persona->razon_social}}</p>
					         	@endif
					          	<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<ul class="list-group list-group-unbordered">
							            	<li class="list-group-item">
							              		<b>Email:</b> <a class="pull-right">{{$usuario->email}}</a>
							            	</li>
							            	<li class="list-group-item"> 
							            		<b>Domicilio:</b> <a class="pull-right">{{$dom->calle}} #{{$dom->next}} Colonia {{$dom->colonia}} CP {{$dom->cp}}, {{$dom->localidad}} {{$dom->municipio}},{{$dom->estado}}</a>
							            	</li>
							            	<li class="list-group-item">
							            		<b>Contacto:</b><a class="pull-right">Tel:@if($persona->telefono==null) No registrado @else {{$persona->telefono}}@endif, Cel:@if($persona->celular==null) No registrado @else{{$persona->celular}}@endif</a>
							            	</li>
							            	@if($tipo=="user")
							            		@if($persona->razon_social=null)
												<li class="list-group-item">
													<b>Razon Social</b><a class="pull-right">{{$persona->razon_social}}</a>
												</li>
								            	@endif
							            	@endif
							            </ul>
									</div>
					          	</div>
								<div class="row">
									<div class="col-md-3"></div>
								</div>
					          <a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="actualizar();"><b>Editar Perfil</b></a>
					        </div>
				        <!-- /.box-body -->
				      	</div>
				      <!-- /.box -->
					</div>
				</div>
				<div class="row" id="formulario">
					<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
				            <div class="panel-heading">Actualizar Datos</div>
				            <div class="panel-body">
				                <form  method="POST" action="/{{$tipo}}/perfil/{{$usuario->id}}" enctype="multipart/form-data" >
				                    {{ csrf_field() }}
				                    <ul class="list-group-unbordered">
				                    	<li class="list-group-item">
				                    		<center><b>Datos de usuario</b></center>
				                    		<hr>
				                    		<div class="row">
				                    			<div class="col-md-4">
				                    				<div class="form-group">
				                    					<label for="">Correo Electrónico</label>
				                    					<input type="email" name="email" value="{{$usuario->email}}" class="form-control">
				                    				</div>
				                    			</div>
				                    			<div class="col-md-4">
				                    				<div class="form-group"><label for="">Contraseña</label><input name="contra" type="password" id="password" class="form-control"></div>
				                    			</div>
				                    			<div class="col-md-4">
				                    				<div class="form-group"><label for="">Confirmación de Contraseña </label><input type="password" id="password-confirm" class="form-control"></div>
				                    			</div>
				                    		</div>
				                    		<div class="row">
				                    			<div class="col-md-4">
				                    				<div class="form-group"><label for="">Nombre</label><input type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}"></div>
				                    			</div>
				                    			<div class="col-md-4">
				                    				<div class="form-group"><label for="">Apellido Paterno</label><input type="text" class="form-control" name="a_p" value="{{$usuario->a_paterno}}"></div>
				                    			</div>
				                    			<div class="col-md-4">
				                    				<div class="form-group"><label for="">Apellido Materno</label><input type="text" class="form-control" name="a_m"value="{{$usuario->a_materno}}"></div>
				                    			</div>
				                    		</div>
				                    		<div class="row">
				                    			<div class="col-md-6">
				                    				<div class="form-group">
				                    					<label for="">Imagen de perfil</label>
				                    					<input type="file"name="foto" class="form-control" id="uploadImage" accept="image/*" onchange="PreviewImage();">
				                    				</div>
				                    			</div>
				                    			<div class="col-md-6">
				                    				<label for="Vista previa"></label>
				                    				<img id="uploadPreview" src="{{$usuario->avatar}}" width="90px;" />
				                    			</div>
				                    		</div>
				                    		<div class="row">
				                    			<div class="col-md-3">
				                    				<div class="form-group"><label for="">Teléfono</label><input type="text" class="form-control" name="tel" value="{{$persona->telefono}}"></div>
				                    			</div>
				                    			<div class="col-md-3">
				                    				<div class="form-group"><label for="">Celular</label><input type="text" class="form-control" name="cel" value="{{$persona->celular}}"></div>
				                    			</div>
				                    			@if($persona->TipodePersona=="INSTITUCION")
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Institución que representa</label>
														<input readonly type="text" name="razon_social" class="form-control" value="{{$persona->razon_social}}">
													</div>
												</div>
												@elseif($persona->TipodePersona=="Moral")
												 <div class="col-md-6">
												 	<div class="form-group">
												 		<label for="">Razon social</label>
												 		<input type="text" class="form-control" name="razon_social" value="{{$persona->razon_social}}">
												 	</div>
												 </div>
				                    			@else
				                    			<input type="hidden" name="razon_social">
				                    			@endif
				                    		</div>
				                    	</li>
				                    	<li class="list-group-item">
				                    		<center><b>Domicilio para notificar</b></center>
				                    		<hr>
				                    		<div class="row">
				                    			<div class="col-md-3">
				                    				<div class="form-group"><label for="">Calle</label><input type="text" class="form-control" name="calle" value="{{$dom->calle}}"></div>
				                    			</div>
				                    			<div class="col-md-2">
				                    				<div class="form-group"><label for=""># Interior</label><input type="text" class="form-control" name="nint" value="{{$dom->ninter}}"></div>
				                    			</div>
				                    			<div class="col-md-2">
				                    				<div class="form-group"><label for=""># Exterior</label><input type="text" class="form-control" name="next" value="{{$dom->next}}"></div>
				                    			</div>
				                    			<div class="col-md-2">
				                    				<div class="form-group"><label for="">CP</label><input type="text" class="form-control" name="cp" value="{{$dom->cp}}"></div>
				                    			</div>
				                    			<div class="col-md-2">
				                    				<div class="form-group">
				                    					<label for="">Colonia</label>
				                    					<input type="text" name="colonia" value="{{$dom->colonia}}" class="form-control">
				                    				</div>
				                    			</div>
				                    		</div>
				                    		<div class="row">
				                    			<div class="col-md-4">
			                                         <div class="form-group">
			                                            <label  for="municipio" name="muni" class="control-label">Municipio</label>
			                                            <select class="custom-select form-control" name="municipio" id="municipio">
															<option selected value="{{$dom->municipio}}">{{$dom->municipio}}</option>
				                                            <option value="Armería">Armería</option>
				                                            <option value="Colima">Colima</option>
				                                            <option value="Comala">Comala</option>
				                                            <option value="Coquimatlán">Coquimatlán</option>
				                                            <option value="Cuahutémoc">Cuahutémoc</option>
				                                            <option value="Ixtlahuacán">Ixtlahuacán</option>
				                                            <option value="Manzanillo">Manzanillo</option>
				                                            <option value="Minatitlán">Minatitlán</option>
				                                            <option value="Tecomán">Tecomán</option>
				                                            <option value="Villa de Álvarez">Villa de Álvarez</option>
			                                            </select>                                                           
			                                        </div>
			                                    </div>
			                                    <div class="col-md-4">
			                                        <div class="form-group">
			                                            <label for="localidad" class="control-label col-md-4">Localidad</label>
			                                            <input type="text" name="loca" class="form-control" value="{{$dom->localidad}}" placeholder="Ej. El trapiche, Quesería" autocomplete="addres-level2"> 
			                                        </div>
			                                    </div>
				                    		</div>
				                    		<div class="row">
				                    			<div class="col-md-12">
					                    			<div class="form-group">
					                    				<label for="">Referencias</label>
					                    				<textarea name="ref" id="" cols="30" rows="3" class="form-control" value="{{$dom->referencia}}" name="ref"></textarea>
					                    			</div>
				                    			</div>
				                    		</div>
				                    	</li>
				                    </ul>
				                    <div class="form-group">
				                        <div class="col-md-6 col-md-offset-4">
				                            <input type="submit" class="btn btn-success" value="Actualizar">
				                                &nbsp;
				                            <a href="javascript:void(0)" class="btn btn-danger" onclick="cancelar();">Cancelar</a>
				                        </div>
				                        <div class="col-md-1">
				                        	
				                        </div>
				                    </div>
				                </form>
				            </div>
					    </div>          
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-8">
						<div id="ohsnap"></div>
					</div>

				</div>
  				
  			</div>
  		</div>
  	</div>
  </div>
@endsection('content')
@section('script')
<script src="/js/ohsnap.min.js" type="text/javascript"></script>
<!-- <script src="/js/ohsnap.min.js"></script> -->
<script src="/js/editarperfil2.js" type="text/javascript"></script>
@endsection