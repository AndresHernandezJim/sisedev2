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

@if(Session::has('exito3'))
    <input type="hidden"  value="1" id="exito3">
@else
    <input type="hidden"  value="0" id="exito3">
@endif
@if(Session::has('exito2'))
    <input type="hidden"  value="1" id="exito2">
@else
    <input type="hidden"  value="0" id="exito2">
@endif
@if(Session::has('exito'))
    <input type="hidden"  value="1" id="exito">
@else
    <input type="hidden"  value="0" id="exito">
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
									<td class="details-control"><center><a class="btn btn-primary btn-sm" data-toggle="popover" data-content="Visauliza los documentos registrados en el expediente" rel="popover" placement="top" title="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a></center></td>
            						<td>{{$k->fecha}}</td>
            						<td>{{$k->rdemandado}}</td>
            						<td>{{$k->demandante}} <br>{{$k->rdemandante}}</td>
                                    <td>{{$k->resumen}}</td>
						            <td style="text-align: center;">
                                        @if($k->status==3)
                                        <a href="#" class="btn btn-danger btn-xs" disabled data-toggle="popover" data-placement="left" data-content="Por el momento no se pueden realizar acciones, el expediente {{$k->expediente}}/{{$k->serie}} se encuentra en manos del Secretario de Acuerdos" title="No permitido">
                                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Sin acción</a>
                                        @elseif($k->status==4||$k->status==9)
                                         <a href="#" class="btn btn-info btn-xs" onclick="notificar2({{$k->id}},{{$k->serie}});" data-toggle="popover" data-placement="left" data-content="Enviar la notificación  del Expediente a los Involucrados" title="Notificar">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Notificar</a>
                                        @elseif($k->status==5)
                                        <a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="enviarsecre({{$k->id}},{{$k->secretario}});" data-toggle="popover" data-placement="left" data-content="Retornar el Expediente {{$k->expediente}}/{{$k->serie}} al Secretario de Acuerdos despues de notificar a las partes"><span class="glyphicon glyphicon-envelope"></span> Enviar</a>
                                        <a href="javascript:void(0)" class="btn bg-navy btn-sm" onclick="agregarpdf({{$k->id}},{{$k->serie}});" data-toggle="popover" data-placement="left" data-content="Agregar un nuevo documento de Notificación" title="Agregar Documento"><span class="glyphicon glyphicon-plus"></span> Documento</a>
                                        @elseif($k->status>=6)
                                        <a href="#" disabled class="btn btn-danger btn-xs " data-toggle="popover" data-placement="left"data-content="Por el momento no hay más acciones para el expediente {{$k->expediente}}/{{$k->serie}}, éste se encuentra en proceso de redaccion de Sentencia" title="No permitido"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Sin acción</a>
                                        @endif
						            </td>
                                    <td>
                                        <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                                        
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
<div class="modal fade" id="subirpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Agregar documentos-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <center><h5 class="modal-title" id="myModalLabel"><b>Agregar Documento</b></h5></center>
            </div>
            <div class="modal-body">
                    <form method="POST" action="/actuario/expedientes/subir" enctype="multipart/form-data" id="formulariodocumento">
                        {!! csrf_field() !!}
                        <input type="hidden" id="id_exps" name="id_exp">
                        <input type="hidden" name="serie" id="seriesub">
                        <input type="hidden" id="id_log2" name="id_log" value="{{Auth::user()->id}}" >
                       <div class="row">
                           <div class="col-md-10">
                               <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary" >
                                                Cargar&hellip; <input type="file" name="pdf_file"  id="archivopdf" style="display: none;"  accept="application/pdf">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                </div>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Tipo de documento</label>
                                    <select class="form-control" name="doctipo" >
                                        @foreach($tipodoc as $k)
                                            <option value="{{$k->id}}">{{$k->Tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>
                           <div class="col-md-4">
                               <div id="notapdf">
                                           
                                </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group">
                                    <label for="">Observaciones</label>
                                   <textarea name="obs" id="obs3"  class="form-control" cols="30" rows="5"></textarea>
                               </div>
                           </div>
                       </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary" style="width: 150px;">Agregar</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Esecretario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Enviar a secretario-->
	<div class="modal-dialog" role="document">
	  	<div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		     <center><h5 class="modal-title" id="myModalLabel"><b>Retornar el Expediente a:</b></h5></center>
		    </div>
		    <div class="modal-body">
                <input type="hidden" id="id_secretario" name="id_secretario">
                <input type="hidden" id="id_expp">
                <input type="hidden" id="modDestino2"  value="5">
                <input type="hidden" id="id_log2" value="{{Auth::user()->id}}">
                <input type="hidden" id="idtiposeg2" value="16">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Secretario de Acuerdos</label>
                            <input type="text" id="namesecretario" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea id="obs4" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <div class="form-group">
                            <a href="#" onclick="enviaractuario();" class="btn btn-primary" style="width: 150px;">Enviar</a>
                        </div>
                    </div>
                </div>
		    </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agregarpdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- notificar involucrados-->
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
                                    <input type="hidden" id="id_tipo" name="id_tipo" value="30">
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
                                    <input type="hidden" id="cantdd" value="0">
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
                                        <input  type="date" id="fechalim" name="datelim" required value="@php  function sumasdiasemana($fecha,$dias){$datestart= strtotime($fecha);$datesuma = 15 * 86400;$diasemana = date('N',$datestart);$totaldias = $diasemana+$dias;$findesemana = intval( $totaldias/5) *2 ; $diasabado = $totaldias % 5 ; if ($diasabado==6) $findesemana++;if ($diasabado==0)$findesemana=$findesemana-2;$total = (($dias+$findesemana) * 86400)+$datestart ; return $fechafinal = date('Y-m-d', $total);}$sumarDias=2;$entre1 = sumasdiasemana(date('Y-m-d'),$sumarDias);echo $entre1 ; @endphp" class="form-control">
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