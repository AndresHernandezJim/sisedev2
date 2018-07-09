@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')

    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="/proyectista/expedientes"><i class="fa fa-folder-open"></i> Expedientes</a></li>
        <li><a href="/proyectista/expedientes/ver/{{$exp}}"><i class="fa fa-file"></i> Proyectos</a></li>
        <li class="active"> <i class="fa fa-file"></i> Proyecto</li>
    </ol>
<br>
@endsection
@section('content')
@if(Session::has('exito'))
    <input type="hidden"  value="1" id="exito">
@else
    <input type="hidden"  value="0" id="exito">
@endif
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header"><center><b>Ver proyecto de Sentencia</b></center></div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-5">&emsp;
					<a href="javascript:void(0)"  onclick="refrescar();" class="btn btn-info btn-xs"  data-toggle="popover" data-content="Actualizar el editor de texto. La acción elimina los cambios no guardados" rel="popover" data-placement="right" title="Refrescar pantalla"><i class="fa fa-refresh"></i></a>	
					</div>

				</div>
				<br>
				<div class="col-md-12" id="texto">
					<form action="/proyectista/proyectos/editar" method="post">
						 {{ csrf_field() }}
						<div class="row">
							<div class="col-md-11" id="texto2">
								<textarea id="editor1" class="form-control"  rows="15" name="texto">
								</textarea>
								<div class="col-md-5 col-md-offset-8">
									<small style="color: #BDC3C7;"><i class="fa fa-exclamation-circle"></i> Si el texto no se visualiza presione el boton refrescar</small>
								</div>
							</div>
							<div class="col-md-1" id="btnchat">
								<a href="javascript:void(0)" id="chat1" class="btn btn-xs bg-navy" title="Mostrar la ventana del chat y ajustar el editor">Chat</a>
							</div>
						</div>
						<br>
							<input type="hidden" value="{{$p->id_proyecto}}" id="id_proyecto" name="id_proy">
							<input type="hidden" value="{{$p->id_exp}}" name="id_exp">
			
							<div class="row">
								<div class="col-md-2 col-md-offset-3">
									@if($p->estatus==2)
									<button type="submit" disabled class="btn btn-success" title="No es posible guardar,el proyecto se encuentra en revision" id="btnsubmit">Guardar</button>
									@elseif($p->estatus==3)
									<button type="submit"  disabled class="btn btn-success" title="El proyecto ya se ha aprovado, por favor crea el pdf y subelo desde la seccion de expedientes" id="btnsubmit">Guardar</button>
									@elseif($p->estatus==4)
									<button type="submit" disabled class="btn btn-warning" title="El proyecto ha sido rechazado" id="btnsubmit">Guardar</button>
									@else
									<button type="submit" class="btn btn-success" title="Guardar Cambios al proyecto" id="btnsubmit">Guardar</button>
									@endif
									
								</div>

								<div class="col-md-2 ">
									@if($p->estatus==1 || $p->estatus==0)
									<a href="javascript:history.go(-1)" title="Cancelar la acción y regresar a la página anterior" class="btn btn-danger">Cancelar</a>
									@else
									<a href="javascript:history.go(-1)" class="btn btn-danger"  title="Regresar a la página anterior">Regresar</a>
									@endif
								</div>
								<div class="col-md-2 col-md-offset-1">
									@if($p->estatus==1)
									<a href="javascript:void(0)"  class="btn btn-primary" title="El proyecto ya se ha enviado a revisión" disabled>Enviar</a>
									@elseif($p->estatus==2)
									<a href="javascript:void(0)" class="btn btn-primary" title="El proyecto se encuentra en revision" disabled>Enviar</a>
									@elseif($p->estatus==3)
									
									@elseif($p->estatus==4)
									<a href="javascript:void(0)" class="btn btn-danger" title="El proyecto ha sido rechazado" disabled>Enviar</a>
									@else
									<a href="javascript:void(0)" id="btn_enviar" title="Enviar el proyecto al Magistrado para revisión" onclick="enviar({{$p->id_proyecto}});" class="btn btn-primary">Enviar</a>
									@endif
								</div>
							</div>
					</form>
				</div>
				<div class="col-md-4" id="wchat">
		          <!-- DIRECT CHAT PRIMARY -->
		          	<div class="box box-primary direct-chat direct-chat-primary">
		            	<div class="box-header with-border">
		              <h3 class="box-title">Chat Directo</h3>
						<input type="hidden" id="idusuario" value="{{$us}}">
		              <div class="box-tools pull-right">
		                @if($cuenta!=0)<span data-toggle="tooltip" title="{{$cuenta}} Mensajes Nuevos" class="badge bg-light-blue">{{$cuenta}}</span>@endif
		                <a href="javascript:void(0)" class="btn btn-box-tool" id="chat2" title="Cerrar ventana del chat y maximizar el editor"><i class="fa fa-times"></i></a>
		              </div>
		            	</div>
		            	<!-- /.box-header -->
		            	<div class="box-body">
		              <!-- Conversations are loaded here -->
		              <div class="direct-chat-messages" id="mensajescontenido">
		              	@foreach($chat as $c)
							@if($c->id_receptor==$us)
							 <!-- Message to the right -->
			                <div class="direct-chat-msg ">
			                  <div class="direct-chat-info clearfix">
			                    <span class="direct-chat-name pull-right">{{$c->origen}}</span>
			                    <span class="direct-chat-timestamp pull-left">{{$c->fecha}} {{$c->hora}}
			                    	@if($c->estado==1)
										<i class="fa fa-check-square" title="Visto"></i>
			                    	@else
										<i class="fa fa-check" title="Enviado"></i>
			                    	@endif</span>
			                  </div>
			                  <!-- /.direct-chat-info -->
			                  <img class="direct-chat-img" src="{{$c->foto1}}" alt="{{$c->origen}}"><!-- /.direct-chat-img -->
			                  <div class="direct-chat-text">
			                    {{$c->mensaje}}
			                  </div>
			                  <!-- /.direct-chat-text -->
			                </div>
			                <!-- /.direct-chat-msg -->
							@else
			                 <!-- Message. Default to the left -->
			                <div class="direct-chat-msg right">
			                  <div class="direct-chat-info clearfix">
			                    <span class="direct-chat-name pull-left">{{$c->origen}}</span>
			                    <span class="direct-chat-timestamp pull-right">{{$c->fecha}} {{$c->hora}}
			                    	@if($c->estado==1)
										<i class="fa fa-check-square" title="Visto"></i>
			                    	@else
										<i class="fa fa-check" title="Enviado"></i>
			                    	@endif
			                    </span>
			                  </div>
			                  <!-- /.direct-chat-info -->
			                  <img class="direct-chat-img" src="{{$c->foto1}}" alt="{{$c->origen}}"><!-- /.direct-chat-img -->
			                  <div class="direct-chat-text">
			                    {{$c->mensaje}}
			                  </div>
			                  <!-- /.direct-chat-text -->
			                </div>
			                <!-- /.direct-chat-msg -->
							@endif
		              	@endforeach

		              </div>
		              <!--/.direct-chat-messages-->

		              <!-- /.direct-chat-pane -->
		            	</div>
		            	<!-- /.box-body -->
		            	<div class="box-footer">
		              		<form id="chatmensaje">
			                	<div class="input-group">
					                <input type="hidden" name="id_receptor"  id="i_rec" value="{{$destino}}">
					                <input type="hidden" name="id_expediente" id="i_exp" value="{{$exp}}">
			                 		 <input type="text" name="message" id="chmensaje" placeholder="Escriba su mensaje..." class="form-control">
			                      		<span class="input-group-btn">
			                        		<button type="submit" class="btn btn-primary btn-flat">Enviar</button>
			                      		</span>
			                	</div>
		               		</form>
		            </div>
		            <!-- /.box-footer-->
		          </div>
		          <!--/.direct-chat -->
				</div>				

			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<center><h5 class="modal-title"><b>Enviar proyecto para revisión</b></h5></center>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="row">
        			<div class="col-md-8">
        				<div class="form-group">
        					<label for="">Magistrado</label>
        					<select name="" id="selmagistrado" class="form-control">
        						@foreach($magistrados as $m)
								<option value="{{$m->id}}">Lic. {{$m->magistrado}}</option>
        						@endforeach
        					</select>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<input type="hidden" id="id_proyectoe">
        		</div>
      		</div>
      		<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        	<a href="javascript:void(0)" onclick="enviar2();" class="btn btn-primary" title="Enviar Proyecto al Magistrado">Enviar</a>
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
<script src="/js/ohsnap.min.js"></script>
<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script >
	
CKEDITOR.replace('editor1');
if (document.addEventListener){
    window.addEventListener('load',verificar(),false);
}
function notificar(){
    ohSnap('Se ha editado el Proyecto de forma correcta',{'color':'blue'});
}
function verificar(){
	var id=$('#id_proyecto').val();
	$.ajax({
		type:"get",
		url:"/proyectista/proyectos/texto",
		data:{id:id},
		success:function(data){
			data=JSON.parse(data);
			CKEDITOR.instances.editor1.setData( data.texto, function(){this.checkDirty();});
		}
	});
	var noti=$('#exito').val();
    if(noti==1){
        notificar();
    }
}
function refrescar(){
	var id=$('#id_proyecto').val();
	$.ajax({
		type:"get",
		url:"/proyectista/proyectos/texto",
		data:{id:id},
		success:function(data){
			data=JSON.parse(data);
			CKEDITOR.instances.editor1.setData( data.texto, function(){this.checkDirty();});
		}
	});
}
function enviar($id){
	$('#id_proyectoe').val($id);
	$('#exampleModal').modal('show');
}
function enviar2(){
	var idproy=$('#id_proyectoe').val();
	var id_mag=$('#selmagistrado').val();
	$.ajax({
		type:"get",
		url:"/proyectista/proyectos/enviar",
		data:{id_proy:idproy,id_mag:id_mag},
		success:function(data){
			data=JSON.parse(data);
			$('#exampleModal').modal('hide');
			ohSnap('El proyecto #'+data.proyecto.numero+" se ha enviado a "+data.usuario+" para revision",{'color':'green'});
			$('#btn_enviar').attr("disabled", true);
			$('#btn_enviar').attr('title', 'El proyecto ya se ha enviado a revisión');
		}
	});
}
function addchat(){
	var url="/proyectista/proyectos/chat";
}
$('#chatmensaje').submit(function(e){
  e.preventDefault();
  var url="/proyectista/proyectos/chat";
  var msj=$('#chmensaje').val();
  var exp=$('#i_exp').val();
  var dest=$('#i_rec').val();
  var TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
  	type:"POST",
  	url:url,
  	data:{_token:TOKEN,msj:msj,id_exp:exp,receptor:dest},
  	success:function(data){
  		data=JSON.parse(data);
  		console.log(data);
  		$('#chmensaje').val("");
  		console.log();
  		$('#mensajescontenido >').remove();
  		$.each(data, function (index, val) {
		  var origen=val.id_receptor;
		  var estado=val.estado;
		  if(origen==10){
		  	if(estado==1){
		  		$('#mensajescontenido').append( "<div class='direct-chat-msg right'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+val.origen+"</span><span class='direct-chat-timestamp pull-right'>"+val.fecha+" "+ val.hora+"<i class='fa fa-check-square'title='Visto'></i></span></div><img class='direct-chat-img' src='"+val.foto1+"' alt='"+val.origen+"'><div class='direct-chat-text'>"+val.mensaje+"</div></div>");
		  	}else{
		  		$('#mensajescontenido').append( "<div class='direct-chat-msg right'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+val.origen+"</span><span class='direct-chat-timestamp pull-right'>"+val.fecha+" "+ val.hora+"<i class='fa fa-check' title='Enviado'></i></span></div><img class='direct-chat-img' src='"+val.foto1+"' alt='"+val.origen+"'><div class='direct-chat-text'>"+val.mensaje+"</div></div>");
		  	}	
		  }else{
		  	if(estado==1){
		  		$('#mensajescontenido').append("<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+val.origen+"</span><span class='direct-chat-timestamp pull-right'>"+val.fecha+" "+ val.hora+"<i class='fa fa-check-square' title='Visto'></i></span></div><img class='direct-chat-img' src='"+val.foto1+"' alt='"+val.origen+"'><div class='direct-chat-text'>"+val.mensaje+"</div></div>");
		  	}else{
		  		$('#mensajescontenido').append("<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+val.origen+"</span><span class='direct-chat-timestamp pull-right'>"+val.fecha+" "+ val.hora+"<i class='fa fa-check' title='Enviado'></i></span></div><img class='direct-chat-img' src='"+val.foto1+"' alt='"+val.origen+"'><div class='direct-chat-text'>"+val.mensaje+"</div></div>");
		  	}
		  }
		});
  	}
  });
});
$('#wchat').hide();
$('#chat1').click(function(){
	$('#texto').attr('class','col-md-8');
	$('#wchat').show();
	$('#texto2').attr('class','col-md-12');
	$('#btnchat').hide();
});
$('#chat2').click(function(){
	$('#texto').attr('class','col-md-12');
	$('#wchat').hide();
	$('#texto2').attr('class','col-md-11');
	$('#btnchat').show();
});
</script>
@endsection