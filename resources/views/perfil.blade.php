@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('content')
 <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfil de usuario</li>
  </ol>
  <div class="row">
  	<div class="col-md-12">
  		<div class="box">
  			<div class="box-header"><center><h4><b>Editar perfil</b></h4></center></div>
  			<div class="box-body">
				<div class="row" id="perfil">
					<div class="col-md-3">	</div>
					<div class="col-md-6 ">
						@if(Session::has('exito'))
							<input type="hidden" name="exito" value="1" id="exito">
						@else
							<input type="hidden" name="exito" value="0" id="exito">
						@endif
				      	<div class="box box-primary">
					        <div class="box-body box-profile">
					          <img class="profile-user-img img-responsive img-circle" width="350px;" src="{{$usuario->avatar}}" alt="Fotografía de Perfil">
							<input type="hidden" id="userid" value="{{$usuario->id}}">
					          <h3 class="profile-username text-center">{{$usuario->Nombreusuario}}</h3>

					          <p class="text-muted text-center">{{$usuario->descripcion}}</p>

					          <ul class="list-group list-group-unbordered">
					            <li class="list-group-item">
					              <b>Email:</b> <a class="pull-right">{{$usuario->email}}</a>
					            </li>
					          </ul>

					          <a href="#" class="btn btn-primary btn-block" onclick="actualizar();"><b>Editar Perfil</b></a>
					        </div>
				        <!-- /.box-body -->
				      	</div>
				      <!-- /.box -->
					</div>
				</div>

				<div class="row" id="formulario">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
				            <div class="panel-heading">Actualizar Datos</div>

				            <div class="panel-body">
				                <form class="form-horizontal" method="POST" action="/oficialpartes/perfil/{{$usuario->id}}" enctype="multipart/form-data" >
				                    {{ csrf_field() }}

				                    <div class="form-group">
				                        <label for="nombre2" class="col-md-4 control-label">Nombre</label>

				                        <div class="col-md-6">
				                            <input id="nombre" type="text" class="form-control" name="nombre2" value="{{$usuario->nombre}}">
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label for="name" class="col-md-4 control-label">Apellido Paterno</label>

				                        <div class="col-md-6">
				                            <input id="a_paterno2" type="text" class="form-control" name="a_paterno2" value="{{$usuario->a_paterno}}">


				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label for="name" class="col-md-4 control-label">Apellido Materno</label>

				                        <div class="col-md-6">
				                            <input id="a-materno2" type="text" class="form-control" name="a_materno2" value="{{$usuario->a_materno}}">
				                        </div>
				                    </div>
									<input type="hidden" name="id" value="{{Auth::User()->id}}">
				                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				                        <label for="email2" class="col-md-4 control-label">Correo electronico</label>
											
				                        <div class="col-md-6">
				                            <input id="email2" type="email" class="form-control" name="email2" value="{{ $usuario->email}}" required>

				                            @if ($errors->has('email2'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('email2') }}</strong>
				                                </span>
				                            @endif
				                        </div>
				                    </div>
									<div class="form-group">
										<label for="avatar" class="col-md-4 control-label">Avatar</label>
										<div class="col-md-6">
											<input type="file" name="file" class="form-control">
										</div>
									</div>
				                    <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
				                        <label for="password2" class="col-md-4 control-label">Contraseña</label>

				                        <div class="col-md-6">
				                            <input id="password2" type="password" class="form-control" name="password" >
				                                <span class="help-block" id="perr"></span>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label for="password-confirm2" class="col-md-4 control-label">Confirme la contraseña</label>

				                        <div class="col-md-6">
				                            <input id="password-confirm2" type="password" class="form-control" name="password_confirmation2">
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <div class="col-md-6 col-md-offset-4">
				                            <input type="submit" class="btn btn-success" value="Actualizar">
				                                &nbsp;
				                            <a href="#!" class="btn btn-danger" onclick="cancelar();">Cancelar</a>
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
<script src="/js/editarperfil.js" type="text/javascript"></script>
@endsection