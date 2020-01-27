<?php

class View{
    function __construct(){
    }

    public function vista($name, $vars = array(), $modulo = ''){
    
        $config = Config::singleton();
        $vars['config'] = $config;	
        $params = Parametros::singleton();
        $errores = Errores::singleton();

        $vars['params'] = $params;

        $plantilla = $config->get('plantillas').$params->valor('TEMPLATE');
        $vars['rutaPlantilla'] = $plantilla.'/';
        $vistas = $config->get('vistas');
        
        //Armamos la ruta a la plantilla
        if( $modulo == '' )	$modulo = isset( $_POST['modulo'] ) ? strtolower( $_POST['modulo'] ): $modulo;
        $path = $plantilla .  '/html/'. $modulo . '/' . $name;        
        $vars['plantilla'] = $plantilla. '/html';
		       
        if (file_exists($path) == false){           	
            $vars['plantilla'] = $plantilla ;
            $path = $vistas . $name;
            if($modulo != ''){ 
                $path = $vistas. $modulo . '/' . $name;
            }	        
			
            if (file_exists($path) == false){
				
                $errores->nombreVista = $name;
                $errores->nombreModulo = $modulo;
                $errores->error103();
                echo $path;				
                return false;
            }
        }
       
        if(is_array($vars)){
            foreach ($vars as $key => $value){
                $$key = $value;
            }
        }        
		
        include($path);
    }
}

?>