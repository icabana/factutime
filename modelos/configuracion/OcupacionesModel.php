<?php

class OcupacionesModel extends ModelBase {

    function getTodos(){
        
        $query = "select    ocupaciones.id_ocupacion, 
                            ocupaciones.nombre_ocupacion
            	                 
                        from ocupaciones
                        
                        ORDER BY ocupaciones.nombre_ocupacion";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_ocupacion){
        
        $query = "select    ocupaciones.id_ocupacion, 
                            ocupaciones.nombre_ocupacion
            	                 
                        from ocupaciones
                             
                        where ocupaciones.id_ocupacion = '".$id_ocupacion."'
                        
                        ORDER BY ocupaciones.nombre_ocupacion";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>