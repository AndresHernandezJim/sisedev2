if (document.addEventListener){
        window.addEventListener('load',verificar(),false);
}
$(document).ready(function(){
	$('#registro').prop('clickable',false);
	$('#tipo').on('change',function(){
		var tipo=$('#tipo').val();
		$('#tipoc').val(tipo);
		if(tipo==1){
			$('#razon >').remove();}
		else if(tipo==2){
			$('#razon >').remove();
			$('#razon').append("<div class='form-group'><label for='razons' class='control-label '>Razon Social</label><input type='text' name='razons' class='form-control ' required></div><br>");
		}else if(tipo==3){
			$('#razon >').remove();
			$('#razon').append("<div class='form-group'><label for='razons' class='control-label '>Razon Social</label><input type='text' name='razons' class='form-control ' required></div><br>");
		}
	});
	$('#email').on('focusout',function(){
		var correo=$('#email').val();
		$.ajax({
			type:'get',
			url:'/oficialpartes/getusedmail',
			data:{busqueda:correo},
			success:function(data){
				data=JSON.parse(data);
				if(data.id==0){
					$('#haycorreo').val(1);
					$('#mail2 >').remove();
				}else{
					$('#mail2 >').remove();
					$('#haycorreo').val(2);
					$('#mail2').append('<div class="row"><div clas="col-md-5 col-md-offset-2"><span style="color:red;" ><center>Éste correo electronico ya está en uso</center></span></div></div>');
				}
			}
		});
	});
	$('#dom').on('change',function(){
		var ban=false; 
		if($('#dom').prop('checked')){
			ban=true;}
		else{ban=false;} 
		if(ban==true){
			$('#dom2').append("<hr><div class='row'><center><h4><b>Domicilio para notificar</b></h4></center</div><br><br><div class='row'><div class='col-md-12'><div class='col-md-6'><div class='form-group'><label for='calle2' class='control-label'>Calle</label><span style='color: red;'> *</span><input id='calle2' type='text' class='form-control' name='calle2' required></div></div><div class='col-md-2'><div class='form-group'><label for='n_ext2' class='control-label '># Exterior</label><span style='color: red;'> *</span><input type='text' name='n_ext2' class='form-control' required></div></div><div class='col-md-2'><div class='form-group' ><label for='n_int2' class='control-label '># Interior</label><input type='text' name='n_int2' class='form-control'></div></div><div class='col-md-2'><div class='form-group'><label for='cp2' class='control-label'>CP.</label><span style='color: red;'> *</span><input type='text' name='cp2' class='form-control' required></div></div></div></div><br><div class='row'><div class='col-md-12'><div class='col-md-4'><div class='form-group'><label for='colonia2' class='control-label'>Colonia</label><span style='color: red;'> *</span><input id='colonia' type='text' class='form-control' name='colonia2' required></div></div><div class='col-md-4'><div class='form-group'><label  for='municipio2' class='control-label'>Municipio</label><span style='color: red;'> *</span><select class='custom-select form-control' name='municipio2'><option selected>Seleccione el Municipio</option><option value='Armería'>Armería</option><option value='Colima'>Colima</option><option value='Comala'>Comala</option><option value='Coquimatlán'>Coquimatlán</option><option value='Cuahutémoc'>Cuahutémoc</option><option value='Ixtlahuacán'>Ixtlahuacán</option><option value='Manzanillo'>Manzanillo</option><option value='Minatitlán'>Minatitlán</option><option value='Tecomán'>Tecomán</option><option value='Villa de Álvarez'>Villa de Álvarez</option></select></div></div><div class='col-md-4'><div class='form-group'><label for='localidad2' class='control-label col-md-4'>Localidad</label><input type='text' name='localidad2' class='form-control' placeholder='Ej. El trapiche, Quesería'></div></div></div></div><div class='row'><div class='col-md-12'><div class='col-md-11'><label for='referencia'>Referencias</label><span style='color: red;'> *</span><textarea name='referencia2' class='form-control' placeholder='Ej. Ninguna'></textarea></div></div></div>");}
		else{
			$('#dom2 >').remove();
		}
	});

	$('form').submit(function(e){
		e.preventDefault();
		if(validar()){
			console.log("todos los campos correctos")
			this.submit();
		}
			
	});
	function validar(){
		var nombre=$('#nombre').val();
		var ap_pa=$('#a_paterno').val();
		var tel=$('#tel').val();
		var cel=$('#cel').val();
		var calle=$('#domicilio').val();
		var next=$('#n_ext').val();
		var cp=$('#cp').val();
		var colo=$('#colonia').val();
		var mun=$('#municipio').val();
		var ref=$('#refe').val();
		var hay=$('#haycorreo').val();
		if(hay==2){
			$('#email').focus();
			notificar4();
			return false;
		}else  if(nombre.length==0){
			$('#collapseTwo').collapse();
			$('#nombre').focus();
			notificar2('Nombre');
			return false;
		}else if(ap_pa.length==0){
			$('#a_paterno').focus();
			notificar2('Apellido Paterno');	
			return false;
		}else if(calle.length==0){
			$('#collapseThree').collapse();
			$('#domicilio').focus();
			notificar2('Calle');
			return false;
		}else if(next.length==0){
			$('#n_ext').focus();
			notificar2('# Exterior');
			return false;
		}else if(cp.length==0){
			$('#cp').focus();
			notificar2('de Código Postal');
			return false;
		}else if(colo.length==0){
			$('#colonia').focus();
			notificar2('Colonia');
			return false;
		}else if(mun==0){
			$('#municipio').focus();
			notificar3('Municipio')
			return false;
		}else if(ref.length==0){
			$('#refe').focus();
			notificar2('Referencias');
			return false;
		}else{
			return true;
		}
		
	}

	function notificar2(campo){
		ohSnap('El campo '+campo+' no puede estar vacio',{'color':'red',});
	}
	function notificar3(campo){
		ohSnap('Debe seleccionar un '+campo,{'color':'red',});
	}
	function notificar4(){
		ohSnap('El correo electrónico ya se encuentra en uso',{'color':'red'});
	}
});


function notificar(){
 ohSnap('Usuario Registrado de forma correcta.', {'color': 'green','duration':5000});
}

function verificar(){
	var noti=$('#exito').val();
	console.log("valor de la notificacion "+ noti);
	if(noti==1){
		notificar();
	}
}
