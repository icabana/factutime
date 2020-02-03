<?php

class EstadoscivilModel extends ModelBase {

    function getTodos(){
        
        $query = "select    estadoscivil.id_estadocivil, 
                            estadoscivil.nombre_estadocivil
            	                 
                        from estadoscivil
                        
                        ORDER BY estadoscivil.nombre_estadocivil";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_estadocivil){
        
        $query = "select    estadoscivil.id_estadocivil, 
                            estadoscivil.nombre_estadocivil
            	                 
                        from estadoscivil
                             
                        where estadoscivil.id_estadocivil = '".$id_estadocivil."'
                        
                        ORDER BY estadoscivil.nombre_estadocivil";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>