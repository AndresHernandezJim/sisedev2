$(function () {
      var rol=$('#rol').val();
      var table = $('#tabla').DataTable({"order": [[ 0, "desc" ]],"ordering": true,responsive: true,language: {
        "emptyTable": "No hay información",

        "info":"Del _START_ al _END_ de _TOTAL_ Expedientes Registrados",
        "infoEmpty": "Mostrando elementos 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder":  "Elemento a buscar",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },"lengthMenu":       [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],});
      var fila=0;
      $("#datepicker").datepicker();
      // Add event listener for opening and closing details
      $('#tabla').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
            } else {
              // Open this row
              var id_expediente = tr.data('child-value');
              console.log(id_expediente);
              $.ajax({
                'type'  : 'GET',
                'url'   : "/"+rol+"/demanda/recuperar",
                'data'  : {
                  'expediente' : id_expediente
                },
                'error':function(jqXHR){
                  console.log(jqXHR.responseText);
                },
                'success': function(data) {
                	data=JSON.parse(data);
                  row.child(format(id_expediente,data)).show();
                  tr.addClass('shown');
                }
              });
            }
          });
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
  function mostrar(folder, file) {
        var object =$ ('#object');
        object.attr('data','/'+folder+'/'+file);
        var param =$('#param');
        param.attr('name','src');
        param.attr('value','/'+folder+'/'+file);
  }
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
  $(document).on("click", ".btn-enviar", function () {
       var id = $(this).data('id');
       $(".modal-body #id_exp1").val( id );
     });

  function asignar(){
    var rol=$('#rol').val();
    var url="/"+rol+"/demanda/enviar";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var exp,log,seg,fecha,sa,obs;
    exp=$('#id_exp1').val();
    log=$('#id_log').val();
    seg=$('#idtiposeg').val();
    fecha=$('#datepicker').val();
    sa=$('#id_sa').val();
    obs=$('#obs').val();
    $.ajax({
      type:'get',
      url:url,
      datatype:'json',
      data:{_token: CSRF_TOKEN,id_exp:exp,id_log:log,idtiposeg:seg,fecha:fecha,id_sa:sa,obs:obs},
      success:function(data){
        data=JSON.parse(data);
        console.log(data);
        $('#enviarSA').modal('hide');
        location.reload(true);
        ohSnap("El expeiente "+data.expediente+" ha sido turnado al Secretario "+data.nombre+" "+data.a_paterno+" "+data.a_materno+".",{'color':'green'});
      },

    });
  }

