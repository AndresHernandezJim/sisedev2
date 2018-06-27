$(function(){
        $("#date").datepicker();
        $("#datelim").datepicker();
  });

function verifica(id){  
  if(id == 4 ) {
      document.getElementById('desecha').style.display = "inline";
  } else {
     document.getElementById('desecha').style.display = "none";
  }
}

function format(id_expediente,data) {
    var $table = $('<table>'), $tr, $td, $th;
    $table.addClass('table ');
    $table.addClass('styTable');
    $table.addClass('table-sm');
    $table.addClass('table-responsive');
    $table.addClass('table-hover');
    $table.addClass('table-bordered');
    $tr = $('<tr>').appendTo($table);
    $th = $('<th>').appendTo($tr).text('Fecha Actividad');
    $th = $('<th>').appendTo($tr).text('Movimiento');
    $th = $('<th>').appendTo($tr).text('Módulo');
    $th = $('<th>').appendTo($tr).text('Concepto');
    $th = $('<th>').appendTo($tr).text('Documento');
    $th = $('<th>').appendTo($tr).text('Folio');
    $th = $('<th>').appendTo($tr).text('Responsable');
    $th = $('<th>').appendTo($tr).text('Comentarios');
    $th = $('<th>').appendTo($tr);
    for (var i = 0, anexo; anexo = data.anexos[i]; i++) {
        $tr = $('<tr>').appendTo($table);
        $td = $('<td>').appendTo($tr).text(anexo.fechasis);
        $td = $('<td>').appendTo($tr).text(anexo.movimiento);
        $td = $('<td>').appendTo($tr).text(anexo.modulo);
        $td = $('<td>').appendTo($tr).text(anexo.Tipo);
        $td = $('<td>').appendTo($tr).text(anexo.Tipox);
        $td = $('<td>').appendTo($tr).text(anexo.Folio);
        $td = $('<td>').appendTo($tr).text(anexo.Responsable);
        $td = $('<td>').appendTo($tr).text(anexo.Comentarios);
        $td = $('<td>').appendTo($tr);
        if(anexo.NomFile!=null){
          $a =$('<a class="btn bg-navy btn-xsmall">').appendTo($td)
          .prop('href','#')
          .text('Ver')
          .attr('data-toggle','modal')
          .attr('data-target','#myModalmostrar')
          .attr('onclick','mostrar("'+anexo.PathAnexo+'","'+anexo.NomFile+'")');
          $span =$('<span>').appendTo($a)
          .prop('aria-hidden','true');
          $span.addClass('glyphicon');
          $span.addClass('gglyphicon-file');
        }
        
    }
    return $table[0].outerHTML;
}
$(function () {
    var rol=$('#rol').val();
    var table = $('#example').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",
        "info":"Del _START_ al _END_ de _TOTAL_ Expedientes Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }});
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
             // alert(tr.data('child-value'));
              $.ajax({
                type  : 'GET',
                url   : "/"+rol+"/seguimiento/anexos",
                data  : {exp : id_expediente},
                'success': function(data) { 
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
$(document).on("click", ".btn-notifica", function () {
    var id = $(this).data('id');
    var involed = $("#slt-involucrados");
    $(".modal-body #id_exp").val( id );
    if(id!=''){           
        $.ajax({
            type: 'POST',
            url: "",
            data:{id: id},
            success: function(r){
                involed.find('option').remove();
             $(r).each(function(i,v){
                involed.append('<option value="'+ v.id_persona+'">'+v.razon+'</option>');
             });
            }
        });
    }
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