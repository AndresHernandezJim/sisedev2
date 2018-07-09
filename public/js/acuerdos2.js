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
        $a =$('<a class="btn bg-navy btn-xs">').appendTo($td)
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
        "emptyTable": "No existen Expedientes registrados",
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
              $.ajax({
                'type'  : 'GET',
                'url'   : "/actuario/expedientes/recuperar",
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
function enviarsecre(id,sec){
    console.log(id,sec);
    $.ajax({
      type:"get",
      url:"/actuario/getsecretario",
      data:{id:sec},
      success:function(data){
        data=JSON.parse(data);
        console.log(data);
        $('#id_secretario').val(sec);
        $('#namesecretario').val(data);
        $('#id_expp').val(id);
        $('#Esecretario').modal('show');
      }
    });
    
}	
function notificar2(id,s){
  var cant=$('#cantdd').val();
  console.log(cant);
  if(cant==0){
      $.ajax({
        type:'get',
        url:'/actuario/getinvolved',
        data:{id:id},
        success:function(data){
          data=JSON.parse(data);
          $('#tabla1 tbody').append('<tr class="table-primary"><td>'+data.demandante[0].nombre+'</td><td>'+data.demandante[0].email+'</td><td>Demandante</td></tr><tr class="table-info"><td>'+data.demandado[0].nombre+'</td><td>'+data.demandado[0].email+'</td><td>Demandado</td></tr>');
          $('#demandado').val(data.demandado[0].id_demandado);
          $('#demandante').val(data.demandante[0].id_demandante);
          $('#cantdd').val(1);
        },
      });
    }
    $('#id_exppdf').val(id);
    $('#serie').val(s);
    $('#agregarpdf').modal('show');
}
function agregarpdf(id,s){
    $('#id_exps').val(id);
    $('#seriesub').val(s);
    $('#subirpdf').modal('show');
}
function notificarsubida(){
    ohSnap('El archivo se ha añadido de forma correcta',{'color':'green'});
}
function notificarenvio(){
  ohSnap('El expediente ha sido retornado al Secretario de Acuerdos',{'color':'green'});
}
function nofiticarinvol(){
  ohSnap('Has realizado la notificación del expediente a los involucrados',{'color':'green'});
}
function verificar(){
    var noti=$('#exito').val();
    var noti2=$('#exito2').val();
    if(noti==1){
        notificarenvio();
    }
    if(noti2==1){
      notificarsubida();
    }
}
if (document.addEventListener){
    window.addEventListener('load',verificar(),false);
}
function enviaractuario(){
    var exp=$('#id_expp').val();
    var modulod=$('#modDestino2').val();
    var idusuario=$('#id_log2').val();
    var seg=$('#idtiposeg2').val();
    var secretario=$('#id_secretario').val();
    var obs=$('#obs4').val();
    var TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(TOKEN);
    $.ajax({
      type:'post',
      url:'/actuario/expedientes/retornar',
      data:{_token:TOKEN,id_exp:exp,id_log:idusuario,tiposeg:seg,id_sec:secretario,obs:obs},
      success:function(data){
        data=JSON.parse(data);
        console.log(data);
        $('#Esecretario').modal('hide');
        ohSnap("El expeiente "+data.expediente+"/"+data.serie+" ha sido retornado al Secretario "+data.nombre+" "+data.a_paterno+" "+data.a_materno+".",{'color':'green'});
        setTimeout(location.reload(true),5000);
      },

    });
}
$('#formulariodocumento').submit(function(e){
  e.preventDefault();
  if(validarsubida()){
    this.submit();
  }
});

function validarsubida(){
  var archivo=$('#archivopdf').val();
  var cant=$('#notapdf > span').length;
  if(archivo.length==0){
    if(cant==0){
      $('#notapdf').append("<span style='color:red;'>Debe seleccionar un archivo</span");
    }
      return false;
  }else{
    $('#notapdf >').remove();
    return true;
  }
}