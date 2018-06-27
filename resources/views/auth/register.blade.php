@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h4>Registro de Usuario</h4></center></div>
                <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-10 col-md-offset-1">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse " data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Datos Personales
                                        </button>
                                      </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                                <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                                <div class="col-md-6">
                                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"  autofocus>

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
                                            <div class="form-group{{ $errors->has('a_paterno') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Apellido Paterno</label>

                                                <div class="col-md-6">
                                                    <input id="a_paterno" type="text" class="form-control" name="a_paterno" value="{{ old('a_paterno') }}" autofocus>

                                                    @if ($errors->has('a_paterno'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('a_paterno') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('a_materno') ? ' has-error' : '' }}">
                                                <label for="a_materno" class="col-md-4 control-label">Apellido Materno</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="a_materno" value="{{ old('a_materno') }}"  autofocus>

                                                    @if ($errors->has('a_materno'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('a_materno') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                             <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                                <label for="tel" class="col-md-4 control-label">Teléfono</label>

                                                <div class="col-md-6">
                                                    <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}"  autofocus>

                                                    @if ($errors->has('tel'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('tel') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Datos de Cuenta de Usuario
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">Correo electronico</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>

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
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirme la contraseña</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                      <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Datos de Contacto
                                        </button>
                                      </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group{{ $errors->has('domicilio') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Domicilio</label>
                                                    <div class="col-md-6">
                                                        <input id="domicilio" type="text" class="form-control" name="domicilio" placeholder="Calle y Número" required>
                                                            @if ($errors->has('domicilio'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('domicilio') }}</strong>
                                                            </span>
                                                            @endif
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
                                                        <label for="colonia" class="col-md-4 control-label">Colonia</label>
                                                        <div class="col-md-6">
                                                            <input id="colonia" type="text" class="form-control" name="colonia" required>
                                                                @if ($errors->has('colonia'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('colonia') }}</strong>
                                                                </span>
                                                                @endif
                                                        </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="municipio" class="col-md-4 control-label">Municipio</label>
                                                    <div class="col-md-6">
                                                        <select class="custom-select form-control">
                                                          <option selected>Seleccione el Municipio</option>
                                                          <option value="1">Armería</option>
                                                          <option value="2">Colima</option>
                                                          <option value="3">Comala</option>
                                                          <option value="4">Coquimatlán</option>
                                                          <option value="5">Cuahutémoc</option>
                                                          <option value="6">Ixtlahuacán</option>
                                                          <option value="7">Manzanillo</option>
                                                          <option value="8">Minatitlán</option>
                                                          <option value="9">Tecomán</option>
                                                          <option value="10">Villa de Álvarez</option>
                                                        </select>                                                           
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-9 col-md-offset-1">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="dom" name="dom2">
                                                        <label class="form-check-label" for="exampleCheck1">El domicilio para Notificar es diferente al anterior</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  id="dom2">
               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                           Registrar
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="/login" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" >
    $(document).ready(function(){
        $('#collapseOne').collapse('show');
        
        $('#dom').on('change',function(){
            var ban=false;
            if($('#dom').prop('checked')){
              ban=true;
            }else{
                ben=false;
            }
            if(ban==true){
                 $('#dom2').append("<hr><div class='row'><h4>Domicilio para notificar</h4></div><div class='row'><div class='form-group'><label for='domicilio2' class='col-md-4 control-label'>Domicilio</label><div class='col-md-6'><input id='domicilio' type='text' class='form-control' name='domicilio2' placeholder='Calle y Número' required></div></div> </div><br><div class='row'><div class='form-group'><label for='colonia' class='col-md-4 control-label'>Colonia</label><div class='col-md-6'><input id='colonia' type='text' class='form-control' name='colonia2' required></div></div><br><div class='row'><div class='form-group'><label for='municipio2' class='col-md-4 control-label'>Municipio</label><div class='col-md-6'><select class='custom-select form-control' name='municipio2'><option selected>Seleccione el Municipio</option><option value='1'>Armería</option><option value='2'>Colima</option><option value='3'>Comala</option><option value='4'>Coquimatlán</option><option value='5'>Cuahutémoc</option><option value='6'>Ixtlahuacán</option><option value='7'>Manzanillo</option><option value='8'>Minatitlán</option><option value='9'>Tecomán</option><option value='10'>Villa de Álvarez</option></select></div></div></div><br>");
             }else{
                $('#dom2 >').remove();
             }
        });
    });
    
</script>
@endsection