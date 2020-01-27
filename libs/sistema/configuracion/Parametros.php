<?php
/*
Es una pequeña clase de configuración con un funcionamiento muy sencillo,
implementa el patron singleton para mantener una única instancia y poder acceder
a sus valores desde cualquier sitio.
 */
class Parametros
{
    protected $db;
	
    public static $instance;

    public function __construct() {
        $this->db = SPDO::singleton();
    }

    public function consulta($query) {
        $consulta = $this->db->prepare($query);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    function modificarRegistros($query) {
         $consulta = $this->db->prepare($query);
        
			$consulta->execute();                  
        	return $consulta->rowCount();         	
	
		return '0';
    }
	
	public function valor($param){
		$sql = "select 	valor_parametro from parametros where nombre_parametro = '".$param."' limit 0, 1";
		$resultado = $this->consulta($sql);
		$valorParam = $resultado[0]['valor_parametro'];
		return $valorParam;
	}
    
    public function set($parametro,$valor){
		$sql = "update parametros set valor_parametro = '".$valor."' where nombre_parametro='".$parametro."'";
		$resultado = $this->modificarRegistros($sql);		
		return $resultado;
	}
	
	public function compararValores($param, $valor){
		$vParam = $this->valor($param);
		if($vParam == $valor){
			return true;		
		}			
		return false;
	}

    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }




}
?>