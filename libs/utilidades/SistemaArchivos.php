<?php
class SistemaArchivos {
	
	function listar_directorios_ruta($rutaDir){
	
		$listado = array();			
		if (is_dir($rutaDir)) {
			if ($dh = opendir($rutaDir)) {
				while (($file = readdir($dh)) !== false) {
					$listado[] = $ruta.$file;
					if (is_dir($ruta . $file) && $file!="." && $file!=".."){
						$listado = array_merge( $listado, $this->listar_directorios_ruta($ruta . $file . "/") );
					}else{
						
					}
				}
				closedir($dh);
			}
		}else{
			return null;
		}
		return $listado;
	} 	
	
	function listar_archivos_directorio($rutaDir){
	
		$listado = array();			
		if (is_dir($rutaDir)) {
			if ($dh = opendir($rutaDir)) {
				while (($file = readdir($dh)) !== false) {
					if (!is_dir($rutaDir . $file) && $file!="." && $file!=".."){
						$listado[] = $file;
					}
				}
				closedir($dh);
			}
		}else{
			return null;
		}
		return $listado;
	} 	
	
}
?>