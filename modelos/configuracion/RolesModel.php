<?php

class RolesModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select 
                    roles.id_rol, 
                    roles.nombre_rol
                
                    from roles";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_rol) {
       
        $query = "select 	
                    roles.id_rol, 
                    roles.nombre_rol
                
                    from roles

                    where roles.id_rol='".$id_rol."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }
    
    function insertar(                               
                        $nombre_rol
                    ){
                
        $query = "INSERT INTO roles (
                                nombre_rol
                            )
                            VALUES(
                                '".$nombre_rol."'
                            );";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editar(
                    $id_rol, 
                    $nombre_rol
                ) {
        
        $query = "  UPDATE roles SET nombre_rol = '". $nombre_rol ."'           
                    WHERE id_rol = '" . $id_rol . "'";
       
        return $this->modificarRegistros($query);
       
    }
    
    function eliminar($id_rol) {
        
        $query = "DELETE FROM roles WHERE id_rol = '". $id_rol ."'";        
        $this->modificarRegistros($query);

    }
    
}

?>