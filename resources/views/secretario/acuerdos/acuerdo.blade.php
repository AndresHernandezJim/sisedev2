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
                                        @if($k->status >= 6)
						                <a href="#" class="btn bg-orange btn-xs" disabled title="El Expediente ya ha sido Turnado al Proyectista">
						                <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviado</a>
                                        @else
                                        <a href="#" class="btn btn-success btn-xs " onclick="enviar1({{$k->id}});" title="Turnar el Expediente al Proyectista">
                                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</a>
                                        @endif
						                
                                        <a href="#" class="btn btn-primary btn-xs " onclick="agregar({{$k->id}},{{$k->serie}})" title="Agregar un Documento al Expediente">
						                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Acuerdo</a>
						                
                                        @if($k->status >=4)
                                        <a href="#" class="btn btn-info btn-xs" disabled title="El Expediente ya ha sido Enviado para Notificar">
						                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Notificado</a>
                                        @else
                                        <a href="#" class="btn btn-info btn-xs" onclick="notificar2({{$k->id}});"  title="Enviar el Expediente al Actuario para Notificar">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Notificar</a>
                                        @endif
						            </td>
                                    <td>
                                        @if($k->status >= 2)
                                            @if($k->tiempo < 3)
                                             <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                                            @elseif($k->tiempo < 5)
                                            <img src="/img/sy.png" style="width:25px;height:25px;"  title="Con Retraso" class="img-circle" alt="Con Retraso">
                                            @else
                                            <img src="/img/sr.png" style="width:25px;height:25px;"  title="Fuera de Tiempo" class="img-circle" alt="Fuera de tiempo">
                                            @endif
                                        @endif
    
                                        @if($k->status>3)
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h5 class="modal-title" id="myModalLabel">Agregar nuevo acuerdo...</h5>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row">
                        <form enctype="multipart/form-data" action="/secretarioacuerdo/acuerdos/enviar" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-8">
                                <label for="">Cargar PDF</label>
                                <input type="hidden"  id="id_exppdf" name="expediente">
                                <input type="hidden" id="tipos" name="tiposeguimiento" value="6">
                                <input type="hidden" id="serie" name="serie">
                                <input type="hidden" value="{{Auth::user()->id}}" name="id_log">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                      <span class="btn btn-primary" required>
                                        Cargar&hellip; <input type="file" name="pdf_file" required style="display: none;" multiple accept="application/pdf">
                                      </span>
                                    </label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tipo</label>
                                    <select class="form-control" name="id_tipoa" required onclick="verifica(this.value);">
                                        @foreach ($tipoacuerdo as  $ta)
                                            <option value="{{$ta->id}}">{{$ta->Tipo}}</option>   
                                        @endforeach
                                    </select>
                                    <label for="desecha" style="display: none;" id="lbl-causa">Causa</label>
                                    <select class="form-control" id="desecha" name="desecha"  style="display: none;" >
                                        <option value="1">Desistir</option>
                                        <option value="2">Incompetencia</option>
                                        <option value="3">Falta de requerimientos</option>
                                    </select>
                 		            <br>
                                    <br>
                                    <label>Observaciones:</label>
                                    <textarea rows="4" cols="50" name="obs"></textarea>
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 50px;">Agregar</button>
                            </div>
                        </form>
                    </div>
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
<script src="/js/acuerdo.js"></script>
@endsection