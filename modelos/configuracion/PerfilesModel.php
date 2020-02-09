<?php

class PerfilesModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select 
                    perfiles.id_perfil, 
                    perfiles.documento_perfil, 
                    perfiles.rol_perfil,
                    perfiles.estado_perfil
                
                    from perfiles";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_perfil) {
       
        $query = "select 	
                    perfiles.id_perfil, 
                    perfiles.documento_perfil, 
                    perfiles.rol_perfil,
                    perfiles.estado_perfil

                    from perfiles

                    where perfiles.id_perfil='".$id_perfil."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertar(                               
                        $documento_perfil, 
                        $rol_perfil,
                        $estado_perfil
                    ){
                
        $query = "INSERT INTO perfiles (
                                documento_perfil
                                rol_perfil,
                                estado_perfil
                            )
                            VALUES(
                                '".$documento_perfil."', 
                                '".$rol_perfil."',
                                '".$estado_perfil."'
                            );";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editar(
                    $id_perfil, 
                    $rol_perfil,
                    $estado_perfil
                ) {
        
        $query = "  UPDATE perfiles 
                    SET documento_perfil = '". $documento_perfil ."', 
                        password_perfil = '". $password_perfil ."'
           
                    WHERE id_perfil = '" . $id_perfil . "'";
       
       return $this->modificarRegistros($query);
       
    }
    
    function eliminar($id_perfil) {
        
        $query = "DELETE FROM perfiles WHERE id_perfil = '". $id_perfil ."'";
        
        $this->modificarRegistros($query);

    }
    
    function validar($documento_perfil, $password_perfil) {
      
        $query = "
            
            SELECT 
                perfiles.id_perfil, 
                perfiles.documento_perfil, 
                perfiles.password_perfil
        
            FROM perfiles left join perfiles
                    on perfiles.documento_perfil = perfiles.documento_perfil

            WHERE   documento_perfil = '". $documento_perfil . "' AND 
                    perfiles.password_perfil = '" . $password_perfil . "' AND 
                    perfiles.estado_perfil = '1'";

        $consulta = $this->consulta($query);
           
        if (count($consulta) > 0) {
            return true;
        }else{
            return false;
        }

    }
    
}

?>