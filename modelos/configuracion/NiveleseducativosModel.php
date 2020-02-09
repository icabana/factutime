<?php

class NivelesModel extends ModelBase {

    function getTodos(){
        
        $query  =   "
                    select      niveles.id_nivel, 
                                niveles.nombre_nivel
            	                 
                    from        niveles
                        
                    order by    niveles.nombre_nivel";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_nivel){
        
        $query  =   "
                    select      niveles.id_nivel, 
                                niveles.nombre_nivel
            	                 
                    from        niveles
                             
                    where       niveles.id_nivel = '".$id_nivel."'
                        
                    order by    niveles.nombre_nivel";
        
        $consulta = $this->consulta($query);        
        return $consulta[0];
        
    }        
  
}

?>