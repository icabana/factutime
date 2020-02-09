<?php

class ProfesionesModel extends ModelBase {

    function getTodos(){
        
        $query  =   "
                    select      profesiones.id_profesion, 
                                profesiones.nombre_profesion
            	                 
                    from        profesiones
                        
                    order by    profesiones.nombre_profesion";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_profesion){
        
        $query  =   "
                    select      profesiones.id_profesion, 
                                profesiones.nombre_profesion
            	                 
                    from        profesiones
                             
                    where       profesiones.id_profesion = '".$id_profesion."'
                        
                    order by    profesiones.nombre_profesion";
        
        $consulta = $this->consulta($query);        
        return $consulta[0];
        
    }        
  
}

?>