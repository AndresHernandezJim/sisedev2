@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
<link rel="stylesheet" href="/css/zoom.css">
@stop
@section('navegacion')
<ol class="breadcrumb">
  <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active"><i class="fa fa-list"></i> Demandas</li>
</ol>
<br>
@endsection
@section('content')
  @if(Session::has('exito2'))
      <input type="hidden" name="exito" value="1" id="exito">
  @else
      <input type="hidden" name="exito" value="0" id="exito">
  @endif
<div class="box">
	<div class="box-header">
		<div class="col-md-10"><center><h5><strong>Demandas</strong></h5></center></div>
    <div class="row">
      <div class="col-md-2 col-md-offset-10">
        <a href="/oficialpartes/demanda/nueva" class="pull-right btn  btn-success " data-toggle="popover" data-content="Registrar una nueva Demanda" rel="popover" data-placement="left" title="Nueva Demanda">Nueva Demanda</a>
      </div>
    </div>
	</div>
	<div class="box-body">
      <input type="hidden" id="rol" value="{{$rol}}">
      <div class="col-md-12 col-sm-12">
        <table class="table table-bordered table-hover table-md table-responsive" role="grid" id="tabla">
          <thead class="thead-dark">
              <th style="width: 10%;"><center>Expediente</center></th>
              <th style="width: 10%;"><center>Fecha</center></th>
              <th style="width: 20%;"><center>Demandado</center></th>
              <th style="width: 20%;"><center>Demandante</center></th>
              <th style="width: 25%;"><center>Resumen<center></th>
              <th style="width: 10%;"><center>Enviar</center></th>
              <th style="width: 5%;">Estado</th>
          </thead>
          <tbody>
            @foreach($exp as $item)
              <tr data-child-value="{{$item->id}}">
                <td class="details-control"><center><a class="btn btn-primary btn-small" data-toggle="popover" data-content="Visauliza los documentos registrados en el expediente" rel="popover" placement="top" title="Expediente {{$item->expediente}}/{{$item->serie}}">{{$item->expediente}}</a></center></td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->rdemandado}}</td>
                <td>{{$item->demandante}} <br>{{$item->rdemandante}}</td>
                <td >{{$item->resumen}}</td>
                <td>
                @if($item->status==1)
                  <a href="#" style="width: 65px;" class="btn bg-olive btn-xs " onclick="enviara({{$item->id}});" data-toggle="popover" data-content="Turnar el expediente al Secretario de Acuerdos" data-placement="left" title="Enviar Expediente">
              <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</a> <br>
                @else
                <a href="#" style="width: 65px;" class="btn btn-info btn-xs "  disabled data-toggle="popover" data-content="El expediente ya ha sido turnado a un Secretario de Acuerdos" rel="popover" data-placement="left" title="Enviar"title="">
              <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviado</a> <br>
              @endif
              <a href="#" class="btn btn-warning btn-xs" data-id="7"  style="width: 65px;" onclick="agregara({{$item->id}});"data-toggle="popover" data-content="Agregar un documento al Expediente" data-placement="left" title="Agregar">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</a></td>
              <td>
                @if($item->status==1)
                  @if($item->tiempo==0)
                  <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                  @elseif($item->tiempo<2)
                  <img src="/img/sy.png" style="width:25px;height:25px;"  title="Con Retraso" class="img-circle" alt="Con Retraso">
                  @else
                  <img src="/img/sr.png" style="width:25px;height:25px;"  title="Fuera de Tiempo" class="img-circle" alt="Fuera de tiempo">
                  @endif
                @elseif($item->status>=2)
                  @if($item->tiempo==0)
                  <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                  @elseif($item->tiempo<2)
                  <img src="/img/sy.png" style="width:25px;height:25px;"  title="Con Retraso" class="img-circle" alt="Con Retraso">
                  @else
                  <img src="/img/sr.png" style="width:25px;height:25px;"  title="Fuera de Tiempo" class="img-circle" alt="Fuera de tiempo">
                  @endif
                    @if($item->avatar!=null)
                    <img src="{{$item->avatar}}" title="{{$item->oficiales}}" class="img-circle zoom" alt="{{$item->oficiales}}">
                    @endif
                  @else
                  <img src="/img/sv.png" style="width:25px;height:25px;"  title="A tiempo" class="img-circle" alt="A tiempo">
                @endif
                
              </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
<div class="modal fade" id="enviarSA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Enviar al Secretario de Acuerdos...</h5>
      </div>
      <div class="modal-body">
          <input type="hidden" class="form-control" id="id_exp1" name="id_exp">
          <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id_log" id="id_log">
          <input type="hidden" name="idtiposeg" id="idtiposeg" value="4"> 
          <input type="hidden" id="expediente">
          <!--tipo de seguimiento-->
          <label> Fecha: </label>
          <input type="text" id="datepicker" name="fecha">
          <br>
                      
          <div class="form-group"> 
            <label> Secretario de acuerdos: </label> 
            <select class="form-control"  name="id_sa"id="id_sa" >
              @foreach ($secretarios as  $k)
              <option value="{{$k->id}}">{{$k->Nombre}}</option>
              @endforeach
            </select>
            <br>
            <label> Observaciones</label>
            <br>
            <textarea rows="4" cols="50" name="obs" id="obs"></textarea>
          </div>
          <div class="form-group">
            <a  class="btn btn-primary" style="width: 150px;" onclick="asignar();">Enviar</a>
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
        <h5 class="modal-title" id="myModalLabel">Agregar nuevo documento...</h5>
      </div>
      <div class="modal-body">
        <div class="row">
         <form name="archivo" id="archivo" action="/oficialpartes/demanda/anexardoc" enctype="multipart/form-data" method="post" accept-charset="utf-8">
             {!! csrf_field() !!}
            <div class="col-md-8">
              <label for="">Cargar PDF</label>
              <input type="hidden"  id="id_exp2" name="expediente">
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary" required>
                    Cargar&hellip; <input type="file" name="pdf_file[]" required style="display: none;" multiple accept="application/pdf">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="">Tipo</label>
                <select class="form-control" name="id_tipo3" required>
                @foreach($tipodocumento as $key)
                  <option value="{{$key->id}}">{{$key->Tipo}}</option>}
                  option
                @endforeach
                </select>
              </div>
             <div class="col-md-12">
                <div class="form-group">
                  <label>Observaciones</label>
                          <textarea class="form-control" rows="4" placeholder="Ingrese las Observaciones ..." name="observaciones" ></textarea>
                </div>
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
<div class="modal" id="myModalmostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-sm-16">
          <div class="widget-box">
            <div class="widget-body">
              <div class="panel-body" id="editar_resul" style="padding: 0px;">
                <div class="col-md-12">
                  <object id="object" type="application/pdf" data="" width="100%" height="600">
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
<div class="row">
  <div class="col-md-4 col-md-offset-8">
      <div id="ohsnap"></div>
  </div>
</div>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/demanda.js" type="text/javascript"></script>
<script src="/js/ohsnap.min.js"></script>
   <script>
      $(function() {
      // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });
          // We can watch for our custom `fileselect` event like this
          $(document).ready( function() {
            $(':file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
              if( input.length ) {
                input.val(log);
              } else {
                if( log ) alert(log);
              }
            });
          });
      });
      function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#blah')
          .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    function enviara(id){
       $("#id_exp1").val(id);
       var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!

      var yyyy = today.getFullYear();
      if(dd<10){
          dd='0'+dd;
      } 
      if(mm<10){
          mm='0'+mm;
      } 
      var today = mm+'/'+dd+'/'+yyyy;
       $('#datepicker').val(today);
      $('#enviarSA').modal('show');

    }
    function agregara(id){
      $('#id_exp2').val(id);
      $('#agregarpdf').modal('show');
    }
    function notificar(){
      ohSnap('El archivo se ha añadido de forma correcta',{'color':'green'});
    }
    function verificar(){
      var noti=$('#exito').val();
      console.log("valor de la notificacion "+ noti);
      if(noti==1){
        notificar();
      }
    }
    if (document.addEventListener){
            window.addEventListener('load',verificar(),false);
    }
   </script>
@endsection