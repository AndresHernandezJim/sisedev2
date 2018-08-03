@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
<link rel="stylesheet" href="/css/zoom.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><i class="fa fa-folder-open"></i> Expedientes</li>
</ol>
<br>
@endsection
@section('content')
@if(Session::has('exito'))
    <input type="hidden"  value="1" id="exito">
@else
    <input type="hidden"  value="0" id="exito">
@endif
@if(Session::has('exito2'))
    <input type="hidden"  value="1" id="exito2">
@else
    <input type="hidden"  value="0" id="exito2">
@endif
@if(Session::has('exito3'))
    <input type="hidden"  value="1" id="exito3">
@else
    <input type="hidden"  value="0" id="exito3">
@endif
<div class="row">
    <div class="col-md-6">
        <div id="ohsnap"></div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><h4>Expedientes</h4></center></div>
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
									<td class="details-control"><a class="btn btn-primary btn-sm" data-toggle="popover" data-content="Visauliza los documentos registrados en el expediente" rel="popover" data-placement="right" title="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a></td>
            						<td>{{$k->fecha}}</td>
            						<td>{{$k->rdemandado}}</td>
            						<td>{{$k->demandante}} <br>{{$k->rdemandante}}</td>
                                    <td>{{$k->resumen}}</td>
						            <td style="text-align: center;">
                                        <ul style=" list-style-type: none;"> 
										@if($k->status==6)
											<li><a href="/proyectista/expedientes/redactar/{{$k->id}}" class="btn btn-info btn-xs "data-toggle="popover" data-content="Redactar proyecto de sentencia para el expediente {{$k->expediente}}/{{$k->serie}}" data-placement="left" rel="popover" title="Redactar Proyecto"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Redactar Proyecto</a></li>
										@elseif($k->status==7)
											<li><a href="/proyectista/expedientes/ver/{{$k->id}}" class="btn bg-orange-active btn-xs " data-toggle="popover" data-content="Ver los Proyectos de sentencia redactados para el expediente {{$k->expediente}}/{{$k->serie}}"  data-placement="left" rel="popover" title="Ver Proyectos"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver Proyectos</a></li>
                                            <li><a href="javascript:void(0)" title="Agregar Documento" onclick="agregar({{$k->id}},{{$k->serie}});" class="btn btn-xs btn-primary" data-toggle="popover" data-content="Agregar Documento de Sentencia al expediente {{$k->expediente}}/{{$k->serie}}" data-placement="left" rel="popover"title="Agregar documento"><span class="glyphicon glyphicon-plus"></span> Documento</a></li>
										@elseif($k->status==8)
											<li><a href="javascript:void(0)" data-toggle="popover" data-content="Enviar al Actuario para la notificación de sentencia del expediente {{$k->expediente}}/{{$k->serie}}"  data-placement="left" rel="popover" title="Enviar" onclick="enviarActuario({{$k->id}});" class="btn btn-xs bg-teal-active"><span class="glyphicon glyphicon-send"></span> Enviar</a></li>
                                        	<li><a href="javascript:void(0)" data-toggle="popover" data-content="Agregar Documento de Sentencia al expediente {{$k->expediente}}/{{$k->serie}}" data-placement="left" rel="popover"title="Agregar documento" onclick="agregar({{$k->id}},{{$k->serie}});" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-plus"></span> Documento</a></li>
                                            <li><a href="/proyectista/expedientes/ver/{{$k->expediente}}" class="btn bg-orange-active btn-xs " data-toggle="popover" data-content="Ver los Proyectos de sentencia redactados para el expediente {{$k->expediente}}/{{$k->serie}}"  data-placement="left" rel="popover" title="Ver Proyectos"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver Proyectos</a></li>
                                        @elseif($k->status>4)
                                        <a href="javascript:void(0)" class="btn btn-warning btn-xs" title="Enviar al Actuario para notificar" data-toggle="popover" data-placement="left" data-content="El expediente {{$k->expediente}}/{{$k->serie}} ya ha sido enviado al Actuario para notificar la Sentencia de Demanda"><span class="glyphicon glyphicon-send"></span> Enviar</a>
										@endif
                                        </ul>
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
    
                                        @if($k->status>8)
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
<div class="modal fade" id="agregarpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <center><h5 class="modal-title" id="myModalLabel"><b>Agregar Sentencia</b></h5></center>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row">
                        <form enctype="multipart/form-data" action="/proyectista/expedientes/agregar" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-8">
                                <label for="">Cargar PDF</label>
                                <input type="hidden"  id="id_exppdf" name="expediente">
                                <input type="hidden" id="tipos" name="tiposeguimiento" value="14">
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
                                    <select class="form-control" name="id_tipoa" required>
                                        @foreach ($tipoacuerdo as  $ta)
                                            <option value="{{$ta->id}}">{{$ta->Tipo}}</option>   
                                        @endforeach
                                    </select>
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
                            <option  value="{{$ac->id}}"> Lic. {{$ac->nombre}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                           <a href="#" onclick="enviaactuario();" class="btn btn-primary" style="width: 150px;">Enviar</a>
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
<script src="/js/expedientes2.js"></script>
@endsection