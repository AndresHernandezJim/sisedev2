<?php 
namespace App\Helper;
use App\tipodocumento;
class filehelper
{
	static function uploadpic($file,$id)
	{
		// subir el key al servidor
		 	$path ='/img/'.$id.'/'; // ruta destino
            $nombre = $file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path, $nombre)){
                return $path.=$nombre;
            }
            return $path=false;
	}

	static function uploadfile2($file,$idexp,$serie){
		// subir el key al servidor
           
		 	$f=date('Y');
            $path ='/Historico/'.$serie.'/'.$idexp; // ruta destino
            $nombre = $file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path.'/', $nombre)){
                return $nombre;
            }
            return false;
	}
    static function uploadfile($file,$idexp,$serie){
        // subir el key al servidor
            $f=date('Y');
            $path ='/Historico/'.$serie.'/'.$idexp; // ruta destino
            $nombre = $file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path.'/', $nombre)){
                return $nombre;
            }
            return false;
    }
	
}


 ?>