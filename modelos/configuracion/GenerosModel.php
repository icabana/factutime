<?php

class GenerosModel extends ModelBase {

    function getTodos(){
        
        $query = "select    generos.id_genero, 
                            generos.nombre_genero
            	                 
                        from generos
                        
                        ORDER BY generos.nombre_genero";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_genero){
        
        $query = "select    generos.id_genero, 
                            generos.nombre_genero
            	                 
                    from generos
                             
                    where generos.id_genero = '".$id_genero."'
                    
                    ORDER BY generos.nombre_genero";
        
        $consulta = $this->consulta($query);

        return $consulta[0];
        
    }        
  
}

?>