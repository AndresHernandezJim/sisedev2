
$(document).ready(function(){
	var rol=7;
	var cantidad=0;
	var cantidad2=0;
	var tam=0.0;
	$('#datosdemandate').prop('hidden',true);
	$('#collapsecard1').collapse('show');
	$('#agregar').on('click',function(){
		$('#modal1').modal('show');
		$('#busqueda2').focus();
	});
	$('#orden').on('change',function(){
		console.log('cambio el orden de la demanda');
		rol=$('#orden').val();
		console.log(rol);
		$( '#sdemandante option  ' ).remove();
		$('#datosdemandate>').remove();
	});
	$('#demandante').on('click',function(){
		$('#modal2').modal('show');
		$('#busqueda').focus();
	});
	 $("input:file").change(function (){
	 	if (typeof FileReader !== "undefined") {
	    var size = document.getElementById('archivo0').files[0].size;
	    // check file size
	    console.log(size);
		    if(size>8388608){
		    	ohSnap("El tamaño del archivo no puede exceder los 8 MB",{'color':'red'});
		    	clearFileInput(document.getElementById("archivo0"));
      		 	$('#archivo0').focus();
		    }
		}
     });
	$('#demandante').on('keyup',function(){
		$('#modal2').modal('show');
	});
	$('#busqueda').on('keyup',function(){
		var buscar=$('#busqueda').val();
		if(rol==7){
			$.ajax({
				type:'get',
				url:'/oficialpartes/demanda/nueva/getusuario',
				data:{
					busqueda:buscar,rol:rol
				},
				success:function(data){
					$( '#sdemandante option  ' ).remove();
					data = JSON.parse(data);
					console.log(data);
					$('#sdemandante').append('<option selected disabled>Seleccione al Demandante</option>');
					$.each(data, function(index,val){
							$('#sdemandante').append('<option value="'+val.id+'">'+val.Nombre+'</option>');
					});
				}
			});
		}
		if(rol==9){
			$.ajax({
				type:'get',
				url:'/oficialpartes/demanda/nueva/getusuario',
				data:{
					busqueda:buscar,rol:rol
				},
				success:function(data){
					$( '#sdemandante option  ' ).remove();
					data = JSON.parse(data);
					console.log(data);
					$('#sdemandante').append('<option selected disabled>Seleccione al Demandante</option>');
					$.each(data, function(index,val){
							$('#sdemandante').append('<option value="'+val.id+'">'+val.razon_social+'</option>');
					});
				}
			});
		}
	});
	$('#busqueda2').on('keyup',function(){
		var buscar=$('#busqueda2').val();
		if(rol==7){
			$.ajax({
				type:'get',
				url:'/oficialpartes/demanda/nueva/getusuario',
				data:{
					busqueda:buscar,rol:9
				},
				success:function(data){
					$( '#sdemandado option  ' ).remove();
					data = JSON.parse(data);
					console.log(data);
					$('#sdemandado').append('<option selected disabled>Seleccione al Demandado</option>');
					$.each(data, function(index,val){
							$('#sdemandado').append('<option value="'+val.id+'">'+val.razon_social+'</option>');
					});
				}
			});
		}
		if(rol==9){
			$.ajax({
				type:'get',
				url:'/oficialpartes/demanda/nueva/getusuario',
				data:{
					busqueda:buscar,rol:7
				},
				success:function(data){
					$( '#sdemandado option  ' ).remove();
					data = JSON.parse(data);
					console.log(data);
					$('#sdemandado').append('<option selected disabled>Seleccione al Demandado</option>');
					$.each(data, function(index,val){
							$('#sdemandado').append('<option value="'+val.id+'">'+val.Nombre+'</option>');
					});
				}
			});
			
		}
	});
	$('#sdemandante').on('change',function(){
		var id=$('#sdemandante').val();
		console.log(id);
		if(!id){
			$('#datosdemandate').prop('hidden',true);
		}else{
			if(rol==7){
				$('#datosdemandate>').remove();
				$('#datosdemandate').append("<div class='col-md-6'><label>Nombre</label><input type='text' id='nombre1' class='form-control' readonly></div><div class='col-md-6'><label id='rs'>Razon Social</label><input type='text' id='razonsocial1' class='form-control' readonly></div>");
				$.ajax({
					type:'get',
					url:'/oficialpartes/demanda/getdemandante',
					data:{id:id},
					success:function(data){
						data=JSON.parse(data);
						console.log(data);
						$('#id_demandante').val(data.id);
						$('#nombre1').val(data.Nombre);
						$('#razonsocial1').val(data.razon_social);
						$('#demandante').val(data.Nombre);
					}
				});
			}
			if(rol==9){
				$('#datosdemandate>').remove();
				$('#datosdemandate').append("<div class='col-md-12'><label >Institución</label><input type='text' class='form-control' id='razon-social'></div>");
				$.ajax({
					type:'get',
					url:'/oficialpartes/demanda/getdemandante',
					data:{id:id},
					success:function(data){
						data=JSON.parse(data);
						console.log(data);
						$('#id_demandante').val(data.id);
						$('#demandante').val(data.razon_social);
					}
				});
			}
			$('#datosdemandate').prop('hidden',false);
		}	
	});
	$('#sdemandado').on('change',function(){
		var id=$('#sdemandado').val();
		if(!id){
			$('#datosdemandado').prop('hidden',true);
		}else{
			if(rol==9){
				$('#datosdemandado>').remove();
				$('#datosdemandado').append("");
				$.ajax({
					type:'get',
					url:'/oficialpartes/demanda/getdemandante',
					data:{id:id},
					success:function(data){
						data=JSON.parse(data);
						console.log(data);
						$('#id_demandado').val(data.id);
						$('#agregar').val(data.Nombre);
					}
				});

			}
			if(rol==7){ //cambios aqui
				$('#datosdemandado>').remove();
				$('#datosdemandado').append("<div class='row'><div class='col-md-12'><label >Institución</label><input type='text' class='form-control' id='razon-social2'></div><br></div>");
				$.ajax({
					type:'get',
					url:'/oficialpartes/demanda/getdemandante',
					data:{id:id},
					success:function(data){
						data=JSON.parse(data);
						console.log(data);
						$('#id_demandado').val(data.id);
						$('#razon-social2').val(data.razon_social);
						$('#agregar').val(data.razon_social);
					}
				});
			}
			$('#datosdemandado').prop('hidden',false);
		}	
	});
	$('#agregar1').on('click',function(){
		console.log('se añade archivo');
		$.ajax({
			type:'get',
			url:'/oficialpartes/demanda/gettipo',
			success:function(data){
				data=JSON.parse(data);
				var options="";
				$.each(data, function(index,val){
							options+='<option value="'+val.id+'">'+val.Tipo+'</option>';
						});
				$('#extra').append("<div class='row' id='f"+cantidad+"'><div class='col-md-6 '><div class='form-group'><br><input type='file' class='form-control archivo' name='file[]' accept='application/pdf'></div></div><div class='col-md-3'><div class='form-group'><label class='form-label'>Tipo de documento</label><select name='tipo[]' id='' class='form-control'>"+options+"</select></div></div><div class='col-md-1'><br><a class='btn btn-danger btn-small'onclick='eliminar(f"+cantidad+");' title='Eliminar Documento'><i class='fa fa-trash'></i></a></div></div>");
				cantidad+=1;
			}
		});
	});	
});
function eliminar(id){
  	id.remove();
}

$('form').submit(function(e){
	e.preventDefault();
	console.log('se detuvo el sumbit');
	if(validar()){
		console.log("todos los campos correctos")
		this.submit();
	}
		
});
function validar(){
	var demandante=$('#id_demandante').val();
	var d1=$('#id_demandado').val();
	var rol;
	var archivo=$('#archivo0').val();
	console.log(d1);
	if(demandante==0){
		$('#demandante').focus();
		notificar('Demandante');
		return false;
	}else if(d1==0){
		notificar('Demandado');
		$('#agregar').focus();
		return false;
	}else if(archivo.length==0){collapseTwo
		$('#collapseTwo').collapse();
		notificar3('demanda');
	}else return true;
}
function notificar2(campo){
	ohSnap('El campo '+campo+' no puede estar vacio',{'color':'red',});
}
function notificar(campo){
	ohSnap('Debe seleccionar un '+campo,{'color':'red'});
}
function notificar3(campo){
	ohSnap('El documento de '+campo+' no puede estar vacio',{'color':'red'});
}

function notificar4(id){
 ohSnap('Demanda registrada de forma correcta bajo el expediente N° '+id+'/'+getFullyear()+'.', {'color': 'green','duration':5000});
}

function verificar(){
	var noti=$('#exito').val();
	console.log("valor de la notificacion "+ noti);
	if(noti==1){
		var exp=$('#exp').val();
		notificar4(exp);
	}
}
if (document.addEventListener){
        window.addEventListener('load',verificar(),false);
}
function clearFileInput(ctrl) {
  try {
    ctrl.value = null;
  } catch(ex) { }
  if (ctrl.value) {
    ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
  }
}