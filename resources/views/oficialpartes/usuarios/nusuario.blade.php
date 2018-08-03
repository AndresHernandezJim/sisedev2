@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><i class="fa fa-user-plus"></i>Registrar Usuario</li>
  </ol> 
  <br>
@endsection
@section('content')

<div class="row">
    
</div>    
<div class="row">
    @if(Session::has('exito'))
        <input type="hidden" name="exito" value="1" id="exito">
    @else
        <input type="hidden" name="exito" value="0" id="exito">
    @endif
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div id="ohsnap"></div>
        </div>
    </div>
	<div class="col-md-10 col-md-offset-1">
        <div class="box box-solid">
            <div class="box-header with-border">
              <center><h3 class="box-title">Registro de Nuevo usuario</h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <form  method="POST" action="/oficialpartes/newuser" id="formulario">
                    {{ csrf_field() }}
                    <div class="panel box box-primary"><!-- datos usuario -->
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Datos de Cuenta de usuario
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-9 col-md-offset-1">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="email" class="col-md-3 control-label">Correo electronico</label><span style="color: red;"> *</span>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="section-blue email" autocomplete="off">
                                                </div>
                                                <input type="hidden" id="haycorreo" val="0">
                                            </div>
                                            <div >
                                                <div class="col-md-6 col-md-offset-3" id="mail2">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                         <div class="row">
                                            <div class="form-group">
                                                <label for="password" min="6" class="col-md-3 control-label">Contraseña</label><span style="color: red;"> *</span>

                                                <div class="col-md-6">
                                                    <input id="password" autocomplete="off" type="password" class="form-control" name="password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>   
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-primary"><!-- datos personales -->
                        <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Datos Personales
                          </a>
                        </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1 ">
                                                <div class="form-group">
                                                    <label for="tipo" class="control-label ">Tipo de cuenta</label>
                                                      <select  id="tipo" class="form-control">
                                                            <option value="1">Persona Fisica</option>
                                                            <option value="2">Persona Moral</option>
                                                            <option value="3">Institucion</option>
                                                        </select>
                                                </div>
                                                <input type="hidden" id="tipoc" name="tipoc" value="1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nombre" class="control-label">Nombre</label><span style="color: red;"> *</span>
                                                    <input id="nombre" type="text" class="form-control" name="nombre"  autocomplete="section-blue given-name"> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Apellido Paterno</label><span style="color: red;"> *</span>
                                                    <input id="a_paterno" type="text" class="form-control" name="a_paterno"  autocomplete="section-blue family-name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="a_materno" class="control-label">Apellido Materno</label>
                                                    <input id="a_materno" type="text" class="form-control" name="a_materno" autocomplete="section-blue additional-name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8" id="razon"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">CURP</label>
                                                    <input type="text" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}\d{2}$" title="Curp (formato: AAAA######AAAAAA##)" name="curp" minlength="18" maxlength="18"class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tel" class="control-label">Teléfono</label>
                                                    <input id="tel" type="text" class="form-control" name="tel"  autocomplete="section-blue tel">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tel" class="control-label">Teléfono célular</label>
                                                    <input id="cel" type="text" class="form-control" name="cel"  autocomplete="section-blue tel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel box box-primary"><!-- datos contacto -->
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Datos de Contacto
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="calle" class="control-label">Calle</label><span style="color: red;"> *</span>
                                            <input id="domicilio" type="text" class="form-control" name="calle" >
                                        </div> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="n_ext" class="control-label "># Exterior</label><span style="color: red;"> *</span>
                                            <input type="text" name="n_ext" class="form-control" id="n_ext">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label for="n_int" class="control-label "># Interior</label>
                                            <input type="text" name="n_int" class="form-control" id="n_int">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cp" class="control-label">CP.</label><span style="color: red;"> *</span>
                                            <input type="text" name="cp" class="form-control" autocomplete="postal-code" id="cp">
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="colonia" class="control-label">Colonia</label><span style="color: red;"> *</span>
                                            <input id="colonia" type="text" class="form-control" name="colonia" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label  for="municipio" class="control-label">Municipio</label> <span style="color: red;"> *</span>
                                            <select class="custom-select form-control" name="municipio" id="municipio">
                                              <option selected value="0">Seleccione el Municipio</option>
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
                                            <input type="text" name="localidad" class="form-control" placeholder="Ej. El trapiche, Quesería" autocomplete="addres-level2"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-11">
                                        <label for="referencia">Referencias</label><span style="color: red;"> *</span>
                                        <textarea name="referencia" class="form-control" placeholder="Ej. Ninguna" id="refe"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-9 col-md-offset-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dom" name="dom2">
                                        <label class="form-check-label" for="exampleCheck1">El domicilio para Notificar es diferente al anterior</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div  id="dom2">

                            </div>
                        </div>

                        </div>
                        <div class="row">
                            <center><p><b>Los datos marcados con <span style="color: red;">*</span> son obligatorios</b></p></center>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1 col-md-offset-4">
                                <button type="submit" class="btn btn-success" id="registro">Registrar</button> 
                            </div>
                            <div class="col-md-1 col-md-offset-1">
                                <a href="/home" class="btn btn-danger">Cancelar</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div> <!--CONTAINER-->
@endsection
@section('script')
<script src="/js/ohsnap.min.js" type="text/javascript"></script>
<script src="/js/newuser.js"></script>
@endsection