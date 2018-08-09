@extends('layouts.app2')
@section('style')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
@stop
@section('content')
 <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Demandas</li>
  </ol>
<div class="box">
	<div class="box-head"><center><h4><strong>Demandas</strong></<h4></h4>></center></div>
	<div class="box-body">
		<div class="row">
		<!--  -->
    <input type="hidden" id="rol" value="{{$rol}}">
    <div class="col-md-12 col-sm-12">
        <table class="table table-bordered table-hover table-md table-responsive" role="grid" id="tabla">
          <thead class="thead-dark">
              <th style="width: 10%;"><center>Expediente</center></th>
              <th style="width: 10%;"><center>Fecha</center></th>
              <th style="width: 20%;"><center>Demandante</center></th>
              <th style="width: 20%;"><center>Demandado</center></th>
              <th style="width: 25%;"><center>Resumen<center></th>
              <th style="width: 5%;">Estatus</th>
          </thead>
          <tbody>
            @foreach($exp as $item)
              <tr data-child-value="{{$item->id}}">
                <td class="details-control"><center><a class="btn btn-primary btn-small">{{$item->expediente}}</a></center></td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->demandado}}</td>
                <td>{{$item->demandante}}</td>
                <td >{{$item->resumen}}</td>
              <td></td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <th style="width: 10%;"><center>Expediente</center></th>
              <th style="width: 10%;"><center>Fecha</center></th>
              <th style="width: 20%;"><center>Demandado</center></th>
              <th style="width: 20%;"><center>Demandante</center></th>
              <th style="width: 25%;"><center>Resumen<center></th>
              <th style="width: 5%;">Estado</th>
          </tfoot>
      </table>
     
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
</div>
@endsection
@section('script')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- <script src="/js/seguimiento.js" type="text/javascript"></script> -->
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
  var table = $('#tabla').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
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

</script>
@endsection