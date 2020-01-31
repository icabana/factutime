<?php

class EstadoscivilModel extends ModelBase {

    function getTodos(){
        
        $query = "select    estadocivil.id_estadocivil, 
                            estadocivil.nombre_estadocivil
            	                 
                        from estadocivil
                        
                        ORDER BY estadocivil.nombre_estadocivil";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_estadocivil){
        
        $query = "select    estadocivil.id_estadocivil, 
                            estadocivil.nombre_estadocivil
            	                 
                        from estadocivil
                             
                        where estadocivil.id_estadocivil = '".$id_estadocivil."'
                        
                        ORDER BY estadocivil.nombre_estadocivil";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>