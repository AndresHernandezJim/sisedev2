@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active"><i class="fa fa-inbox"></i> Entradas</li>
</ol>
<br>
@endsection
@section('content')
@if(Session::has('exito'))
    <input type="hidden" name="exito" value="1" id="exito">
@else
    <input type="hidden" name="exito" value="0" id="exito">
@endif
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><b>Nuevas entradas</b></center></div>
			<div class="box-body">
				<table id="example" class="table table-stripped table-bordered">
					<thead>
						<th>Expediente</th>
						<th>Fecha</th>
						<th>Demandado</th>
						<th>Demandante</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($exp as $k)
						<tr data-child-value="{{$k->id}}">
							<td class="details-control" style="color: blue; text-align: center; font-weight: bold;"><center><a  class="btn btn-primary" data-toggle="popover" data-content="Visauliza los documentos registrados para el expediente" rel="popover" id="nexp" title="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a></center></td>
							<td>{{$k->fecha}}</td>
							<td>{{$k->rdemandante}}</td>
							<td>{{$k->Demandante}}</td>
							<td>
								<a href="#" onclick="aceptar({{$k->id}},{{$k->id_demandante}});" class="btn btn-info btn-xs" data-toggle="popover" data-content="Si los documentos son correctos, se puede procesar la demanda" rel="popover" data-placement="left" title="Procesar Demanda"><i class="fa fa-check"></i> Procesar</a>
								<a href="#" onclick="mensaje({{$k->id}},{{$k->id_demandante}});" class="btn bg-navy btn-xs" data-toggle="popover" data-content="En caso de requerir una modificación o aclaración de los documentos, puede mencionarlo al usuario"  data-placement="left" rel="popover" title="Mensaje para el usuario"><i class="fa fa-envelope"></i> mensaje</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="aceptar">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h5 class="modal-title">Procesar Demanda</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        	<div class="row">
        		&emsp;<span>Para procesar la demanda es necesario establecer los siguientes elementos</span>
        	</div>
        	<br>
        	<div class="row">
            <input type="hidden" id="id_exp1">
            <input type="hidden" id="id_usuario1">
        		<div class="col-md-6">
        			<div class="form-group">
        				<label for="">Tipo de Demanda</label>
        				<select name="tipod" id="tipod" class="form-control">
        					<option value="1">Nulidad</option>
        					<option value="2">Responsabilidad Patrimonial</option>
        					<option value="3">Afirmativa Ficta</option>
        					<option value="4">Negativa Ficta</option>
        					<option value="5">Responsabilidad Administrativa Grave</option>
        				</select>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        			<div class="form-group">
        				<label for="">Observaciones</label>
        				<textarea id="obs" cols="30" rows="5" class="form-control" maxlength="255"></textarea>
        				<span class="pull-right" id="contador2" style="color:#666666;">Restante: 255 caracteres</span>
            			<input type="hidden" id="cantidad2" value="255">
        			</div>
        	</div>
        	<div class="row">
        		<br>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="aceptardemanda();">Guardar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensaje para el usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Destinatario:</label>
            <input type="text" class="form-control" id="recipient-name" readonly>
          </div>
          <input type="hidden" id="id_demandante">
          <input type="hidden" id="id_exp2">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea class="form-control" id="message-text" cols="30" rows="5" maxlength="240"></textarea>
            <span class="pull-right" id="contador" style="color:#666666;">Restante: 240 caracteres</span>
            <input type="hidden" id="cantidad" value="235">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="sendmesage();">Enviar</button>
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
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/ohsnap.min.js"></script>
<script>
$('#message-text').keyup(function(){
	var cantidad=$('#cantidad').val();
	var escrito=$('#message-text').val();
	escrito=escrito.length;
	var restantes=cantidad-escrito;
	if(restantes==0){
		$('#contador').attr('style','color:red;');
		$('#contador').text('Restante:0 caracteres')
	}else{
		$('#contador').attr('style','color:#666666;');
		$('#contador').text("Restante:"+restantes+" caracteres");
	}
});
$('#obs').keyup(function(){
	var cantidad=$('#cantidad2').val();
	var escrito=$('#obs').val();
	escrito=escrito.length;
	var restantes=cantidad-escrito;
	if(restantes==0){
		$('#contador2').attr('style','color:red;');
		$('#contador2').text('Restante:0 caracteres')
	}else{
		$('#contador2').attr('style','color:#666666;');
		$('#contador2').text("Restante:"+restantes+" caracteres");
	}
});
function mensaje(id,id2){
	$.ajax({
		url:"/oficialpartes/demanda/getname",
		type:"get",
		data:{id:id2},
		success:function(data){
			data=JSON.parse(data);
			$('#recipient-name').val(data.nombre);
		}
	});
	$('#id_demandante').val(id2);
  $('#id_exp2').val(id);
	$('#mensaje').modal('show');
}
function aceptar(id,id2){
  $('#id_exp1').val(id);
  $('#id_usuario1').val(id2);
	$('#aceptar').modal('show');
}
function sendmesage(){ //enviar notificacion al usuario
  var men=$('#message-text').val();
  var id_de=$('#id_demandante').val();
  var id_exp=$('#id_exp2').val();
  $.ajax({
    type:"get",
    url:"/oficialpartes/demanda/sendmesage",
    data:{id_dema:id_de,men:men,id_exp:id_exp},
    success:function(data){
      data=JSON.parse(data);
      console.log(data);
      $('#message-text').val("");
      $('#mensaje').modal('hide');
      ohSnap('Se ha notificado tu mensaje al usuario '+data.nombre,{'color':'green'});
      setTimeout(location.reload(true),8000);
    }
  });
}
function aceptardemanda(){ //aceptar y procesar la demanda
  var id_exp=$('#id_exp1').val();
  var obs=$('#obs').val();
  var tipod=$('#tipod').val();
  var id_usuario=$('#id_usuario1').val();
  $.ajax({
    type:"get",
    url:"/oficialpartes/demanda/validar",
    data:{id_exp:id_exp,obs:obs,tipod:tipod,id_deman:id_usuario},
    success:function(data){
      data=JSON.parse(data);
      console.log(data);
      $('#aceptar').modal('hide');
      ohSnap('El expediente '+data.expediente+'/'+data.serie+'se validó, comienza el proceso',{'color':'green'});
      setTimeout(location.reload(true),8000);
    }
  });

}
$('[data-toggle="popover"]').popover({ trigger: "hover" ,placement:'top'});
$(function(){
  $("#date").datepicker({ minDate: 0 });
  $("#datelim").datepicker({ minDate: 0 });
});
function format(id_expediente,data) {
  var $table = $('<table>'), $tr, $td;
  $table.addClass('table');
  $table.addClass('styTable');
  $table.addClass('table-sm');
  $table.addClass('table-responsive');
  $table.addClass('table-hover');
  $table.addClass('table-bordered');
  $tr = $('<tr>').appendTo($table);
  $th = $('<th>').appendTo($tr).text('Folio').prop('width', "30px;");
  $th = $('<th>').appendTo($tr).text('Recibido').prop('width', '30x;');
  $th = $('<th>').appendTo($tr).text('Archivo').prop('width', '50px;');
  $th = $('<th>').appendTo($tr).text('Tipo de documento').prop('width', '40px;');
  $th = $('<th>').appendTo($tr).prop('width', '50px;');
  for (var i = 0, anexo; anexo = data.anexos[i]; i++) {
      $tr = $('<tr>').appendTo($table);
      $td = $('<td>').appendTo($tr).text(anexo.Folio);
      $td = $('<td>').appendTo($tr).text(anexo.FechaUp);
      $td = $('<td>').appendTo($tr).text(anexo.NomFile);
      $td = $('<td>').appendTo($tr).text(anexo.Tipo);
      $td = $('<td>').appendTo($tr);
      $a =$('<a class="btn bg-navy btn-xsmall">').appendTo($td)
      .prop('href','#')
      .text('Ver Documento ')
      .attr('data-toggle','modal')
      .attr('data-target','#myModalmostrar')
      .attr('onclick','mostrar("'+anexo.PathAnexo+'","'+anexo.NomFile+'")');
      $span =$('<span>').appendTo($a)
      .prop('aria-hidden','true');
      $span.addClass('glyphicon');
      $span.addClass('glyphicon-file');
  }
  return $table[0].outerHTML;
}
$(function () {
  var table = $('#example').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
      "emptyTable": "No hay información",
      "info":"Del _START_ al _END_ de _TOTAL_ Expedientes",
      "infoEmpty": "Del 0 al 0 de 0 Expedientes",
      "infoFiltered": "(Filtrado de _MAX_ total Expedientes)",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "searchPlaceholder":    "Elemento a buscar",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
      }
  },"lengthMenu":       [[10, 20, 25, 50,100, -1], [ 10, 20, 25, 50,100, "Todos"]]
});
// Add event listener for opening and closing details
$('#example').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row(tr);
    if (row.child.isShown()) {
          // This row is already open - close it
          row.child.hide();
          tr.removeClass('shown');
        } else {
          // Open this row
          var id_expediente = tr.data('child-value');
          $.ajax({
            'type'  : 'GET',
            'url'   : "/user/demandas/recuperar",
            'data'  : {
            'expediente' : id_expediente
            },
            'error':function(jqXHR){
              console.log(jqXHR.responseText);
            },
            'success': function(data, textStatus, jqXHR) {
              data=JSON.parse(data);
              row.child(format(id_expediente,data)).show();
              tr.addClass('shown');
            }
          });
        }
      });
});
$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
});

function mostrar(folder, file) {
        var object =$ ('#object');
        object.attr('data','/'+folder+'/'+file);
        var param =$('#param');
        param.attr('name','src');
        param.attr('value','/'+folder+'/'+file);
}
$(document).on("click", ".btn-enviar", function () {
    var id = $(this).data('id');
    $(".modal-body #id_exp").val( id );
});
$(function() {
	 $('[data-toggle="tooltip"]').tooltip();
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
</script>
@endsection