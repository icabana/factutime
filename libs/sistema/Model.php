<?php
class Model
{
    function __construct()
    {
    }

    public function cargar($name, $modulo = '')
    {
        //$name es el nombre de nuestra plantilla, por ej, listado.php
        //$vars es el contenedor de nuestras variables, es un arreglo del tipo llave => valor, opcional.

		$path = '';
		
        //Traemos una instancia de nuestra clase de configuracion.
        $config = Config::singleton();
		$params = Parametros::singleton();
		$errores = Errores::singleton();

        $plantilla = $config->get('plantillas').$params->valor('TEMPLATE');
        $modelos = $config->get('modelos');
        
		//Armamos la ruta a la plantilla
		if( $modulo == '' )	$modulo = isset( $_POST['modulo'] ) ? strtolower($_POST['modulo']) : $modulo;
		$path = $plantilla .  '/html/'. $modulo . '/' . $name;        
		$vars['plantilla'] = $plantilla. '/html';
		
		
		
        //Si no existe el fichero en cuestion, buscamos en las vistas        
        if (file_exists($path) == false)
        {           	
        	$vars['plantilla'] = $plantilla ;
			$path = $modelos . $name;
			if($modulo != ''){ 
	        	$path = $modelos. $modulo . '/' . $name;
	        }	        
			
        	
			if (file_exists($path) == false)
			{
				//si tampoco se encuentra en las vistas tiramos un error 103 que la vista no existe
				//trigger_error ('Template o Vista [' . $path . '] does not exist / No se encuentra.', E_USER_NOTICE);
				$errores->nombreModelo = $name;
				$errores->nombreModulo = $modulo;
				$errores->error104();			
				return false;
			}else{
				
			}
        }
        

        //Finalmente, incluimos la plantilla.
        include_once($path);

    }

}

?>