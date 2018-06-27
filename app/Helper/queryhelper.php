<?php 
namespace App\Helper;
use App\tipodocumento;
use App\seguimiento;
class queryhelper
{
	static function usuarios(){
		dd('usuarios');
	}
	
	static function toHours($min,$type)
	{ //obtener segundos
	 	$sec = $min * 60;
	 	//dias es la division de n segs entre 86400 segundos que representa un dia
		$dias=floor($sec/86400);
		 //mod_hora es el sobrante, en horas, de la division de días; 
		$mod_hora=$sec%86400;
		 //hora es la division entre el sobrante de horas y 3600 segundos que representa una hora;
		$horas=floor($mod_hora/3600); 
		 //mod_minuto es el sobrante, en minutos, de la division de horas; 
		$mod_minuto=$mod_hora%3600;
		 //minuto es la division entre el sobrante y 60 segundos que representa un minuto;
		$minutos=floor($mod_minuto/60);
		if($horas<=0){
		 	$text = $minutos.' min';
		}
	 	elseif($dias<=0){
	 		if($type=='round'){
	 		//nos apoyamos de la variable type para especificar si se muestra solo las horas
	 			$text = $horas.' hrs';
	 		}
			else{
			 $text = $horas." hrs ".$minutos;
			}
	 	}
	 	else{
	 		if($dias==1){
	 			//nos apoyamos de la variable type para especificar si se muestra solo los dias
		 		if($type=='round'){
		 			$text = $dias.' dia';
		 		}
		 		else{
		 			$text = $dias." dia ".$horas." hrs ".$minutos." min";
		 		}	
	 		}else{
	 			if($type=='round'){
		 			$text = $dias.' dias';
		 		}
		 		else{
		 			$text = $dias." dias ".$horas." hrs ".$minutos." min";
		 		}	
	 		}
	 		
	 	}
	 	return $text; 
	}

}
 ?>