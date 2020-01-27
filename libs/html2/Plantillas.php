<?php


class Plantillas extends ControllerBase {
	
	public $ruta;
	
	function __construct()
    {
        
    }
    
    public function html( $nombreArchivo ) {
    	
        $config = Config::singleton();
		$params = Parametros::singleton();

        include( $config->get('plantillas').$params->valor('TEMPLATE'). '/' . $nombreArchivo );
        
    }
	
	public function ruta() {
    	
        $config = Config::singleton();
		$params = Parametros::singleton();

        return $this->ruta = $config->get('plantillas').$params->valor('TEMPLATE'). '/';
        
    }
	
	public function index($vars = null) {

		$config = Config::singleton();
		$params = Parametros::singleton();
		$errores = Errores::singleton();

        $tmpl = $this->ruta(). 'index.php';
        
		$vars['plantilla'] = $this;		
		
        //Si no existe el fichero en cuestion, buscamos en las vistas        
        if (file_exists($tmpl) == false)
        {           	
        		$errores->nombreVista = $name;
				$errores->nombreModulo = $modulo;
				$errores->error103();				
				return false;
        }

        //Si hay variables para asignar, las pasamos una a una.
        if(is_array($vars))
        {
            foreach ($vars as $key => $value)
            {
                $$key = $value;
            }
        }
        
		//Finalmente, incluimos la plantilla.
        include($tmpl);
		
			
    }

   
    
}

?>