function eliminard(id){
	var rol=$('#roldocumento').val();
	var mensaje = confirm("¿Estás seguro que deseas eliminar éste tipo de documento?");
	//Detectamos si el usuario acepto el mensaje
	if (mensaje) {
		$.ajax({
			url:"/"+rol+"/eliminardocumento",
			type:"get",
			data:{id:id},
			success:function(data){
				data=JSON.parse(data);
				$('#listadoc2>').remove();
				if(data.tipoac2.length==0){
					$('#listadoc2').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
				}else{
					$.each(data.tipoac2,function(index,val){
						$('#listadoc2').append("<li><div class='menu-info'><p><a href='#' onclick='restaurard("+val.id+");' title='Restablecer éste tipo de documento'><i class='fa fa-check' style='color:green;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
					});
				}
				$('#listadoc>').remove();
				if(data.tipoac.length==0){
					$('#listadoc').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
				}else{
					
					$.each(data.tipoac,function(index,val){
						$('#listadoc').append("<li ondblclick='modificard("+val.id+");'><div class='menu-info'><p><a href='#'' onclick='eliminard("+val.id+");' title='Eliminar éste tipo de documento'><i class='fa fa-times' style='color:red;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
					});
				}
			}
		});
	console.log("se elimina registro")
	}
	//Detectamos si el usuario denegó el mensaje
}
function restaurard(id){
	var rol=$('#roldocumento').val();
	var mensaje = confirm("¿Estás seguro que deseas reestablecer éste tipo de documento?");
	//Detectamos si el usuario acepto el mensaje
	if (mensaje) {
		$.ajax({
			url:"/"+rol+"/restaurardocumento",
			type:"get",
			data:{id:id},
			success:function(data){
				data=JSON.parse(data);
				$('#listadoc2>').remove();
				if(data.tipoac2.length==0){
						$('#listadoc2').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
				}else{
					$.each(data.tipoac2,function(index,val){
						$('#listadoc2').append("<li><div class='menu-info'><p><a href='#'' onclick='restaurard("+val.id+");' title='Restablecer éste tipo de documento'><i class='fa fa-check' style='color:green;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
					});
				}
				if(data.tipoac.length==0){
						$('#listadoc').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
				}else{
					$('#listadoc>').remove();
					$.each(data.tipoac,function(index,val){
						$('#listadoc').append("<li ondblclick='modificard("+val.id+");'><div class='menu-info'><p><a href='#'' onclick='eliminard("+val.id+");' title='Eliminar éste tipo de documento'><i class='fa fa-times' style='color:red;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
					});
				}
			}
		});
	console.log("se habilita registro")
	}
}
function agregardoc(){
	var tipo=$('#adddoc').val();
	if(tipo.length==0){
		$('#adddoc').attr("placeholder","Debe escribir un valor");
		$('#adddoc').focus();
	}else{
		var rol=$('#roldocumento').val();
		var mensaje=confirm("¿Estás seguro que deseas agregar este tipo de documento?");
		if(mensaje){
			$.ajax({
				type:"get",
				url:"/"+rol+"/agregardocumento",
				data:{tipo:tipo},
				success:function(data){
					data=JSON.parse(data);
					$('#adddoc').val("");
					$('#listadoc2>').remove();
					if(data.tipoac2.length==0){
							$('#listadoc2').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
					}else{
						$.each(data.tipoac2,function(index,val){
							$('#listadoc2').append("<li><div class='menu-info'><p><a href='#'' onclick='restaurard("+val.id+");' title='Restablecer éste tipo de documento'><i class='fa fa-check' style='color:green;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
						});
					}
					if(data.tipoac.length==0){
							$('#listadoc').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
					}else{
						$('#listadoc>').remove();
						$.each(data.tipoac,function(index,val){
							$('#listadoc').append("<li><div class='menu-info'><p><a href='#'' onclick='eliminard("+val.id+");' title='Eliminar éste tipo de documento'><i class='fa fa-times' style='color:red;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
						});
					}
				}
			});
		}else{
			$('#adddoc').val("");
		}
	}
}
function modificard(id){
	console.log(id);
	var rol=$('#roldocumento').val();
	$.ajax({
		type:"get",
		url:"/"+rol+"/gettipodoc",
		data:{id:id},
		success:function(data){
			data=JSON.parse(data);
			console.log(data);
			$('#formactua').prop('hidden',false);
			$('#formadd').prop('hidden',true);
			$('#moddoc').val(data);
			$('#iddocto').val(id);
		}
	});
}
function saved(){
	var id=$('#iddocto').val();
	var texto=$('#moddoc').val();
	var rol=$('#roldocumento').val();
	$.ajax({
		type:"get",
		url:"/"+rol+"/gettipodoc",
		data:{id:id},
		success:function(data){
			data=JSON.parse(data);
			console.log(data);
			if(texto!=data){
				$.ajax({
					url:"/"+rol+"/actualizartipo",
					type:"get",
					data:{id:id,tipo:texto},
					success:function(data){
						data=JSON.parse(data);
						$('#listadoc2>').remove();
						if(data.tipoac2.length==0){
								$('#listadoc2').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
						}else{
							$.each(data.tipoac2,function(index,val){
								$('#listadoc2').append("<li ><div class='menu-info'><p><a href='#'' onclick='restaurard("+val.id+");' title='Restablecer éste tipo de documento'><i class='fa fa-check' style='color:green;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
							});
						}
						if(data.tipoac.length==0){
								$('#listadoc').append("<li><div class='menu-info'><p>No existen elementos para mostrar</p></div></li>");
						}else{
							$('#listadoc>').remove();
							$.each(data.tipoac,function(index,val){
								$('#listadoc').append("<li ondblclick='modificard("+val.id+");'><div class='menu-info'><p><a href='#'' onclick='eliminard("+val.id+");' title='Eliminar éste tipo de documento'><i class='fa fa-times' style='color:red;'></i></a> &nbsp;"+val.Tipo+"</p></div></li>");
							});
						}
						cancelar();
					},
				});
			}else{
				console.log("no se actualizar");
				cancelar();
			}
		}
	});
	
}
function gettipo(id){

}
function cancelard(){
	$('#formactua').prop('hidden',true);
	$('#formadd').prop('hidden',false);
	$('#moddoc').val();
	$('#iddocto').val();
}
$(document).ready(function(){
	$('#formactua').prop('hidden',true);
});
