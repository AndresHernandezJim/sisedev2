@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/css/alert.css">
@endsection
@section('navegacion')
<ol class="breadcrumb">
	<li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active"><i class="fa fa-list"></i> Demandas</li>
</ol>
<br>
@endsection
@section('content')
@if(Session::has('exito'))
    <input type="hidden" name="exito" value="1" id="exito">
@else
    <input type="hidden" name="exito" value="0" id="exito">
@endif
@if(Session::has('exito2'))
    <input type="hidden" name="exito2" value="1" id="exito2">
@else
    <input type="hidden" name="exito2" value="0" id="exito2">
@endif
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-head"><center><b>Demandas</b></center></div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-2 col-md-offset-9">
						<a href="/user/demandas/nueva" class="btn btn-primary" data-toggle="popover" data-content="Presentar una nueva demanda e ingresarla al sistema" rel="popover" data-placement="left" title="Registrar nueva Demanda">Registrar Nueva Demanda</a>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<th>Expediente</th>
								<th>Demandado</th>
								<th>Resumen</th>
								<th>Creado</th>
								<th>Estado</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($expediente as $k)
								<tr data-child-value="{{$k->id}}">
									<td class="details-control"><center><a  class="btn btn-primary" data-toggle="popover" data-content="Visauliza los documentos registrados para el expediente" rel="popover" data-placement="right" id="nexp" title="Expediente {{$k->expediente}}/{{$k->serie}}">{{$k->expediente}}</a></center></td>
									<td>{{$k->razon_social}}</td>
									<td>{{$k->descripcion}}</td>
									<td>{{$k->transcurrido}}</td>
									<td>
										{{$k->status}}
									</td>
									<th>
                  <center>
                    @if($k->status==0 || $k->status==4||$k->status==9)
                    <a href="javascript:void(0)" class="btn btn-info btn-xs" onclick="agregar({{$k->id}},{{$k->serie}});" data-toggle="popover" data-content="Agrega un documento al expediente" rel="popover" data-placement="left" title="Documento"><span class="glyphicon glyphicon-plus"></span> Documento</a><br>
                    @else
                    <a href="javascript:void(0)" class="btn btn-info btn-xs" data-toggle="popover" data-content="En este momento no es posible agregar un documento al expediente,espere la notificacion del actuario" rel="popover" data-placement="left" title="Documento"><span class="glyphicon glyphicon-plus"></span> Documento</a><br>
                    @endif
                  </center>         
                  </th>
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
        <h5 class="modal-title" id="myModalLabel">Agregar nuevo documento...</h5>
      </div>
      <div class="modal-body">
        <div class="row">
         <form name="archivo" id="archivo" action="/user/demandas/anexardoc" enctype="multipart/form-data" method="post" accept-charset="utf-8">
             {!! csrf_field() !!}
            <input type="hidden"  id="id_exp2" name="id_exp">
            <input type="hidden" id="serie" name="serie">
            <div class="col-md-8">
              <label for="">Cargar PDF</label>  
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary" required>
                    Cargar&hellip; <input type="file" name="pdf_file[]" required style="display: none;" accept="application/pdf">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="">Tipo</label>
                <select class="form-control" name="id_tipo3" required>
                @foreach($tipodoc as $k)
                <option value="{{$k->id}}">{{$k->Tipo}}</option>
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
    <div class="col-md-6">
        <div id="ohsnap"></div>
    </div>
</div>
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/js/ohsnap.min.js"></script>
<script type="text/javascript">
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
  $th = $('<th>').appendTo($tr).prop('width', '60px;');
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
  }
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
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
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
function agregar(id,s){
    console.log(id);
    console.log(s);
    $('#id_exp2').val(id);
     $('#serie').val(s);
    $('#agregarpdf').modal('show');
}
function notificar(){
    ohSnap('Se ha registrado la Demanda exitosamente',{'color':'green'});
}
function notificar2(){
    ohSnap('El documento se ha registrado exitosamente',{'color':'green'});
}
function verificar(){
  var noti=$('#exito').val();
  var noti2=$('#exito2').val();
  console.log("notificacion "+ noti);
  console.log("documento "+noti2);
  if(noti==1){
    notificar();
  }
}
if (document.addEventListener){
  window.addEventListener('load',verificar(),false);
}
function enviarActuario(id){
    $('#id_expA').val(id);
    $('#enviarA').modal('show');
}
function enviaactuario(){
  var exp=$('#id_expA').val();
  var modulod=$('#modDestino').val();
  var idusuario=$('#id_log2').val();
  var seg=$('#idtiposeg').val();
  var actuario=$('#id_ac').val();
  var TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    type:'post',
    url:'/proyectista/expedientes/notificar',
    datatype:'json',
    data:{_token:TOKEN,id_exp:exp,id_log:idusuario,tiposeg:seg,id_ac:actuario},
    success:function(data){
      data=JSON.parse(data);
      //console.log(data);
      $('#enviarA').modal('hide');
      ohSnap("El expeiente "+data.expediente+"/"+data.serie+" ha sido turnado al Actuario "+data.nombre+" "+data.a_paterno+" "+data.a_materno+".",{'color':'green'});
      setTimeout(location.reload(true),5000);
    },
  });
}
</script>
@endsection