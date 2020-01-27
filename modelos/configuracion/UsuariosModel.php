<?php

class UsuariosModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select 
                    usuarios.id_usuario, 
                    usuarios.nick_usuario, 
                    usuarios.password_usuario,
                    usuarios.estado_usuario,
                    usuarios.rol_usuario,
                
                    roles.nombre_rol
                
                    from usuarios LEFT JOIN roles ON usuarios.rol_usuario = roles.id_rol";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_usuario) {
       
        $query = "select 	
                    usuarios.id_usuario, 
                    usuarios.nick_usuario, 
                    usuarios.password_usuario,
                    usuarios.estado_usuario,
                    usuarios.rol_usuario,
                    
                    roles.NOMBRE_ROL as nombre_rol
                
                    from usuarios LEFT JOIN roles ON usuarios.rol_usuario = roles.id_rol

                    where usuarios.id_usuario='".$id_usuario."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertar(                               
                        $nick_usuario, 
                        $password_usuario, 
                        $rol_usuario
                    ){
                
        $query = "INSERT INTO usuarios (
                                nick_usuario, 
                                password_usuario, 
                                rol_usuario
                            )
                            VALUES(
                                '".$nick_usuario."', 
                                '".$password_usuario."', 
                                '".$rol_usuario."'
                            );";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editar(
                    $id_usuario, 
                    $nick_usuario, 
                    $password_usuario, 
                    $estado_usuario, 
                    $rol_usuario
                ) {
        
        $query = "  UPDATE usuarios SET nick_usuario = '". $nick_usuario ."', 
                                        password_usuario = '". $password_usuario ."', 
                                        estado_usuario = '". $estado_usuario ."', 
                                        rol_usuario = '". $rol_usuario ."'
           
                    WHERE id_usuario = '" . $id_usuario . "'";
       
       return $this->modificarRegistros($query);
       
    }
    
    function eliminar($id_usuario) {
        
        $query = "DELETE FROM usuarios WHERE id_usuario = '". $id_usuario ."'";
        
        $this->modificarRegistros($query);

    }
    
    function validar($nick_usuario, $password_usuario) {
      
        $query = "select 
                    usuarios.id_usuario, 
                    usuarios.nick_usuario, 
                    usuarios.password_usuario,
                    usuarios.estado_usuario,
                    usuarios.rol_usuario,
                
                    roles.nombre_rol
                
                    from usuarios LEFT JOIN roles ON usuarios.rol_usuario = roles.id_rol
        
                    WHERE   nick_usuario = '". $nick_usuario . "' AND 
                            usuarios.password_usuario = '" . $password_usuario . "' AND 
                            estado_usuario = '1'";

        $consulta = $this->consulta($query);
           
        if ($consulta) {
            return $consulta[0];
        }else{
            return 1;
        }

    }
    
}

?>