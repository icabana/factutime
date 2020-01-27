<?php

abstract class ModelBase {

    protected $db;

    public function __construct() {
        $this->db = SPDO::singleton();
    }
        
    public function prepararConsulta($query){
    	$consulta = null;		
    	try {
		   $consulta = $this->db->prepare($query);
		   if (!$consulta) {
			    echo "\nInformacion del Error :\n";
			    print_r( $this->db->errorInfo() );
		   }
		} catch (PDOException $e) {
		   echo "Error de Base de Datos: " . $e->getMessage() . "\r\n";
		}	
		return $consulta;
		
		
	} 

    public function consulta($query) {
        $consulta = $this->prepararConsulta($query);
        if( $consulta != null ){
			$consulta->execute();                  
        	return $consulta->fetchAll();	
		}
		return '0'; 
    }
        
    function crear_ultimo_id($query) {
        $consulta = $this->prepararConsulta($query);
        if( $consulta != null ){
            $consulta->execute();                  
            return $this->db->lastInsertId();	
            //return $consulta->rowCount();
        }else{
            return '0';
        }
    }

    function modificarRegistros($query) {
        $consulta = $this->prepararConsulta($query);
        if( $consulta != null ){
			$consulta->execute();                  
        	return $consulta->rowCount();         	
		}
		return '0';
    }


}

?>