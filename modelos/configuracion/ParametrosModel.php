<?php

class ParametrosModel extends ModelBase {

    function getTodos(){
        
        $query = "select    parametros.id_parametro, 
                            parametros.nombre_parametro,                         
                            parametros.valor_parametro
            	                 
                        from parametros
                        
                        ORDER BY parametros.nombre_parametro";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_parametro){
        
        $query = "select    parametros.id_parametro, 
                            parametros.nombre_parametro,                         
                            parametros.valor_parametro
            	                 
                        from parametros
                             
                        where parametros.id_parametro = '".$id_parametro."'
                        
                        ORDER BY parametros.nombre_parametro";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }    
    
    function getValor($nombre_parametro){
        
        $query = "  select valor_parametro            	                 
                    from parametros
                    WHERE nombre_parametro='".$nombre_parametro."'";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0]['valor_parametro'];
        
    }
            
    
    function insertar(                               
        $nombre_parametro,
        $valor_parametro
    ){

        $query = "INSERT INTO parametros (
                        nombre_parametro,
                        valor_parametro
                    )
                    VALUES(
                        '".$nombre_parametro."',
                        '".$valor_parametro."'
                    );";

        return $this->crear_ultimo_id($query);       

    }


    function editar($id_parametro, $nombre_parametro, $valor_parametro){
        
        $query = "  UPDATE parametros             

                    SET nombre_parametro = '".utf8_decode($nombre_parametro)."', 
                        valor_parametro = '".utf8_decode($valor_parametro)."' 

                    WHERE id_parametro = '".$id_parametro."'";
                
        return $this->modificarRegistros($query);
        
    }
    
    function eliminar($id_parametro) {
        
        $query = "DELETE FROM parametros WHERE id_parametro = '". $id_parametro ."'";        
        $this->modificarRegistros($query);

    }

}

?>