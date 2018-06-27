@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
<link rel="stylesheet" href="/css/zoom.css">
@endsection
@section('content')
<div class="row">
	<ol class="breadcrumb">
	    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	    <li class="active">Acuerdos</li>
	 </ol>
</div>
@if(Session::has('exito2'))
    <input type="hidden" name="exito" value="1" id="exito">
@else
    <input type="hidden" name="exito" value="0" id="exito">
@endif
<div class="row">
    <div class="col-md-6">
        <div id="ohsnap"></div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><h4>Acuerdos</h4></center></div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<th>Expediente</th>
                                <th>Fecha</th>
					            <th>Demandado</th>
					            <th>Demandante</th>
                                <th>Resumen</th>
					            <th>Actividad</th>
                                <th>Estado</th>

							</thead>
							<tbody>
								@foreach($expediente as $k)
								<tr data-child-value="{{$k->id}}">
									<td class="details-control" style="color: blue; text-align: center; font-weight: bold;"><a class="btn btn-primary btn-sm" title="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a></td>
            						<td>{{$k->fecha}}</td>
            						<td>{{$k->rdemandado}}</td>
            						<td>{{$k->demandante}} <br>{{$k->rdemandante}}</td>
                                    <td>{{$k->resumen}}</td>
						            <td style="text-align: center;">
                                        @if($k->status >5)
                                        <a href="#" class="btn btn-info btn-xs" disabled title="El Expediente ya ha sido Enviado para Notificar">
						                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Notificado</a>
                                        @else
                                        <a href="#" class="btn btn-info btn-xs" onclick="notificar2({{$k->id}},{{$k->serie}});"  title="Enviar el Expediente al Actuario para Notificar">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Notificar</a>
                                        @endif
						            </td>
                                    <td>
                                        <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                                        @if($k->status>5)
                                            <img src="{{$k->avatar}}" title="{{$k->oficiales}}" class="img-circle zoom" alt="{{$k->oficiales}}">
                                        @endif
                                    </td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="enviarA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		    <div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       <h5 class="modal-title" id="myModalLabel">Turnar al Actuario:</h5>
		    </div>
		    <div class="modal-body">
		        <div class="modal-body">
			        <form method="POST" action="">
			          	<input type="hidden" id="id_expA" >
			          	<input type="hidden" id="modDestino"  value="4">
			          	<input type="hidden" id="id_log2" value="{{Auth::user()->id}}" >
			          	<input type="hidden" id="idtiposeg" value="7"> <!--tipo de seguimiento-->
			          	<div class="form-group">
			            <select class="form-control" id="id_ac">
			              @foreach($actuario as $ac)
                            @if($rolid==3)
                                @if($ac->id==5)
			                        <option  selected value="{{$ac->id}}">{{$ac->nombre}}</option>
                                @else
                                 <option value="{{$ac->id}}">{{$ac->nombre}}</option>
                                @endif
                            @else
                                @if($ac->id==6)
                                    <option  selected value="{{$ac->id}}">{{$ac->nombre}}</option>
                                @else
                                    <option  value="{{$ac->id}}">{{$ac->nombre}}</option>
                                @endif
                            @endif
			              @endforeach
			            </select>
			          	</div>
				        <div class="form-group">
				           <a href="#" onclick="enviaractuario();" class="btn btn-primary" style="width: 150px;">Enviar</a>
				        </div>
			        </form>
		        </div>
		    </div>
		</div>
	</div>
</div>
<div class="modal fade" id="Proyectista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  	<div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h5 class="modal-title" id="myModalLabel">Turnar al Proyectista:</h5>
		    </div>
		    <div class="modal-body">
                <input type="hidden" id="id_expp">
                <input type="hidden" id="modDestino2"  value="5">
                <input type="hidden" id="id_log2" value="{{Auth::user()->id}}">
                <input type="hidden" id="idtiposeg2" value="11">
                <div class="form-group">
                    <label for="">Seleccione el Proyectista</label>
                    <select class="form-control" id="id_pr">
                        @foreach ($proyectista as  $k)
                            <option value="{{$k->id}}">{{$k->nombre}}</option>   
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <a href="#" onclick="enviarproyectista();" class="btn btn-primary" style="width: 150px;">Enviar</a>
                </div>
		    </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agregarpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><h5><b>Notificar...</b></h5></center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form enctype="multipart/form-data" action="/actuario/notificar" method="POST">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-1">
                                    <label for="">Cargar acta de notificación (.pdf)</label>
                                    {!! csrf_field() !!}
                                    <input type="hidden"  id="id_exppdf" name="expediente">
                                    <input type="hidden" id="id_tipo" name="id_tipo" value="31">
                                    <input type="hidden" name="id_log" value="{{Auth::user()->id}}">
                                    <input type="hidden" id="serie" name="serie">
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary" required>
                                                Cargar&hellip; <input type="file" name="pdf_file" required style="display: none;"  accept="application/pdf">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label for="">Involucrados: </label>
                                    <table id="tabla1" class="table table-sm table-bordered table-striped">
                                        <thead class="thead-dark">
                                           <th>Nombre</th>
                                           <th>Email</th>
                                           <th>Rol</th>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                    <input type="hidden" id="demandado" name="id_demandado">
                                    <input type="hidden" id="demandante" name="id_demandante">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha:</label>
                                        <input  type="date" id="fecha" name="date" class="form-control" required value="@php  $date=date('Y-m-d'); echo $date @endphp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha limite:</label>
                                        <input  type="date" id="fechalim" name="datelim" required value="@php  $date=date('Y-m-d'); echo $date @endphp" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observaciones:</label>
                                        <textarea rows="4" cols="50" name="obs" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-8">
                                    <button type="submit" class="btn btn-primary pull-rigth" style="width: 100%; margin-top: 50px;">Enviar</button>
                                </div>
                            </div>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-16">
                    <div class="widget-box">
                        <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" style="padding: 0px;">
                                <div class="panel-body" id="editar_resul" style="padding: 0px;">
                                    <object id="object" type="application/pdf" data="" width="100%" height="650">
                                        <param id="param" name="src" value="" />
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                            
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/ohsnap.min.js"></script>
<script src="/js/acuerdos2.js"></script>
@endsection