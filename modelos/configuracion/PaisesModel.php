<?php

class PaisesModel extends ModelBase {

    function getTodos(){
        
        $query = "select    paises.id_pais, 
                            paises.nombre_pais
            	                 
                        from paises
                        
                        ORDER BY paises.nombre_pais";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_pais){
        
        $query = "select    paises.id_pais, 
                            paises.nombre_pais
            	                 
                        from paises
                             
                        where paises.id_pais = '".$id_pais."'
                        
                        ORDER BY paises.nombre_pais";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
  
}

?>