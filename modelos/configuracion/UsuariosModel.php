<?php

class UsuariosModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select 
                    usuarios.id_usuario, 
                    usuarios.documento_usuario, 
                    usuarios.password_usuario
                
                    from usuarios";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_usuario) {
       
        $query = "select 	
                    usuarios.id_usuario, 
                    usuarios.documento_usuario, 
                    usuarios.password_usuario

                    from usuarios

                    where usuarios.id_usuario='".$id_usuario."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertar(                               
                        $documento_usuario, 
                        $password_usuario
                    ){
                
        $query = "INSERT INTO usuarios (
                                documento_usuario, 
                                password_usuario
                            )
                            VALUES(
                                '".$documento_usuario."', 
                                '".$password_usuario."'
                            );";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editar(
                    $id_usuario, 
                    $documento_usuario, 
                    $password_usuario
                ) {
        
        $query = "  UPDATE usuarios 
                    SET documento_usuario = '". $documento_usuario ."', 
                        password_usuario = '". $password_usuario ."'
           
                    WHERE id_usuario = '" . $id_usuario . "'";
       
       return $this->modificarRegistros($query);
       
    }
    
    function eliminar($id_usuario) {
        
        $query = "DELETE FROM usuarios WHERE id_usuario = '". $id_usuario ."'";
        
        $this->modificarRegistros($query);

    }
    
    function validar($documento_usuario, $password_usuario) {
      
        $query = "
            
            SELECT 
                usuarios.id_usuario, 
                usuarios.documento_usuario, 
                usuarios.password_usuario
        
            FROM usuarios left join perfiles
                    on usuarios.documento_usuario = perfiles.documento_perfil

            WHERE   documento_usuario = '". $documento_usuario . "' AND 
                    usuarios.password_usuario = '" . $password_usuario . "' AND 
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