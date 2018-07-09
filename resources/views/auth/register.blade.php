@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Usuario</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <ul class="nav nav-tabs">
                            <li id="l1" class="active"><a data-toggle="tab" href="#cuenta"><span class="glyphicon glyphicon-edit"></span> Datos de Cuenta</a></li>
                            <li id="l2"><a data-toggle="tab" href="#usuario"><span class="glyphicon glyphicon-user"></span> Datos del Usuario</a></li>
                            <li id="l3"><a data-toggle="tab" href="#contacto"><span class="glyphicon glyphicon-envelope"></span> Domicilio</a></li>
                        </ul>     
                        <div class="tab-content">
                            <div id="cuenta" class="tab-pane fade in active">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-3 control-label">Email</label>
                                                <div class="col-md-8">
                                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-3 control-label">Contraseña</label>
                                                <div class="col-md-8">
                                                    <input type="password" name="password" id="password" class="form-control" required autofocus>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="password-confirmation" class="col-md-3 control-label">Confirmar Contraseña</label>
                                                <div class="col-md-8">
                                                    <input id="password-confirm" type="password" name="password_confirmation" id="password-confirmation" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                                <label for="nombre" class="col-md-3 control-label">Nombre</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" autofocus>
                                                    @if ($errors->has('nombre'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nombre') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('a_paterno') ? ' has-error' : '' }}">
                                                <label for="a_paterno" class="col-md-3 control-label">Apellido Paterno</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="a_paterno" id="a_paterno" class="form-control" value="{{old('a_paterno')}}" autofocus>  
                                                    @if ($errors->has('a_p'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('a_paterno') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('a_materno') ? ' has-error' : '' }}">
                                                <label for="a_materno" class="col-md-3 control-label">Apellido Materno</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="a_materno" id="a_materno" class="form-control"  value="{{ old('a_materno') }}" autofocus>
                                                    @if ($errors->has('a_m'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('a_m') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-10">
                                        <a href="#usuario" data-toggle="tab" id="btn1" class="btn btn-primary">Siguiente</a>
                                    </div>
                                </div>
                            </div>
                            <div id="usuario" class="tab-pane fade">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row"> <!-- tipo de persona -->
                                            <div class="form-group">
                                                <label for="" class="col-md-3 control-label">Tipo de persona</label>
                                                <div class="col-md-8">
                                                    <select name="tipo_persona" id="tipopersona" class="form-control">
                                                        <option value="Fisica">Física</option>
                                                        <option value="Moral">Moral</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row"> <!-- razon-social -->
                                            <div class="form-group " id="row_razon">
                                                <label for="razon" class="col-md-3 control-label">Razon Social</label>
                                                <div class="col-md-8">
                                                    <input type="text"  name="razon" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row"> <!-- Curp -->
                                            <div class="form-group">
                                                <label for="curp" class="col-md-3 control-label">CURP</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="curp" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row"><!-- celular -->
                                            <div class="form-group {{ $errors->has('cel') ? ' has-error' : '' }}"> 
                                                <label for="cel" class="col-md-3 control-label">Celular</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="cel" class="form-control" value="{{ old('cel') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row"> <!-- telefono -->
                                            <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                                                <label for="" class="col-md-3 control-label">Teléfono</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2 ">
                                        <a href="#cuenta" data-toggle="tab" class="btn btn-info">Anterior</a>
                                    </div>

                                    <div class="col-md-2 col-md-offset-7">
                                        <a href="#contacto" data-toggle="tab" class="btn btn-primary">Siguiente</a>
                                    </div>
                                </div>
                            </div>
                            <div id="contacto" class="tab-pane fade">
                                <br>
                                <div class="row">
                                   <div class="col-md-4"> <!-- columna1 -->
                                       <div class="row"> <!-- calle -->
                                           <div class="form-group {{ $errors->has('calle') ? ' has-error' : '' }}">
                                               <label for="calle" class="col-md-3 control-label">Calle</label>
                                               <div class="col-md-8">
                                                   <input type="text" name="calle" class="form-control"value="{{ old('calle') }}">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-4"> <!-- columna2 -->  
                                       <div class="row">
                                           <div class="form-group {{ $errors->has('nint') ? ' has-error' : '' }}">
                                                <label for="nint" class="col-md-3 control-label">#Interior</label>
                                               <div class="col-md-8">
                                                   <input type="text" name="nint" class="form-control" value="{{ old('nint') }}">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-4"> <!-- columna3 -->
                                       <div class="row">
                                           <div class="form-group{{ $errors->has('next') ? ' has-error' : '' }}">
                                                <label for="next" class="col-md-3 control-label">#Exterior</label>
                                               <div class="col-md-8">
                                                   <input type="text" name="next" class="form-control" value="{{ old('next') }}">
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                                                <label for="cp" class="col-md-3 control-label">CP</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="cp"  value="{{ old('cp') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
                                                <label for="Colonia" class="col-md-3 control-label">Colonia</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="colonia" value="{{ old('colonia') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('municipio') ? ' has-error' : '' }}">
                                                <label for="municipio" class="col-md-3 control-label">Municipio</label>
                                                <div class="col-md-8">
                                                    <select name="municipio" id="municipio" class="form-control" value="{{ old('municipio') }}">
                                                        <option value="Armería">Armería</option>
                                                        <option selected value="Colima">Colima</option>
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
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group {{ $errors->has('localidad') ? ' has-error' : '' }}">
                                                <label for="localidad" class="col-md-3 control-label">Localidad</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="localidad" placeholder="Ej. El trapiche" class="form-control" value="{{ old('localidad') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                       <div class="row">
                                           <label for="referencias" class="control-label">Referencias</label>
                                       </div>
                                       <div class="row">
                                           <div class="form-group {{ $errors->has('referencias') ? ' has-error' : '' }}">
                                               <textarea name="referencias" id="referencias" cols="30" rows="2" class="form-control" value="{{ old('referencias') }}"></textarea>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-1">
                                        <div class="form-group">
                                            <a href="#usuario" data-toggle="tab" class="btn btn-info">Anterior</a>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                           Registrarse
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-md-offset-1">
                                         <a href="/login" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
</script>
@endsection