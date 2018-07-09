$(document).ready(function(){
	$('#formulario').prop('hidden',true);

	
});
function actualizar(){
		$('#perfil').prop('hidden',true);
		$('#formulario').prop('hidden',false);
		
}
function cancelar(){
		$('#perfil').prop('hidden',false);
		$('#formulario').prop('hidden',true);
}
function notificar(){
	ohSnap('Datos actualizados de forma correcta.', {'color': 'green','duration':'5000'});
}

function verificar(){
	var noti=$('#exito').val();
	if(noti==1){
		notificar();
	}
}
if (document.addEventListener){
        window.addEventListener('load',verificar(),false);
}
$('form').submit(function(e){
	e.preventDefault();
	if(validar()){
		this.submit();
	}
		
});
function validar(){
	var pas=$('#password').val();
	var pas2=$('#password-confirm').val();
	if(pas.length>0){
		if(pas.length<5){
			$('#password').focus();
			ohSnap("La contraseña debe ser de almenos 6 Caracteres",{'color':'red'});
			return false;
		}else if(pas!=pas2){
			$('#password-confirm').val();
			$('#password-confirm').focus();
			ohSnap('La contraseña y confirmación de contraseña no coinciden',{'color':'red'});	
			return false;
		}
	}else {
		return true;
	}
}
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};