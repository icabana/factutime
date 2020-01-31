<?php

class EmpleadosModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select 
                    empleados.id_empleado, 
                    empleados.dependencia_empleado, 
                    empleados.documento_empleado, 
                    empleados.tipodocumento_empleado, 
                    empleados.nombres_empleado, 
                    empleados.apellidos_empleado, 
                    concat( empleados.nombres_empleado,' ',empleados.apellidos_empleado) as nombre_empleado,
                    empleados.telefono_empleado, 
                    empleados.celular_empleado, 
                    empleados.correo_empleado, 
                    empleados.direccion_empleado, 
                    empleados.ciudad_empleado,
                    empleados.sexo_empleado,
                    empleados.estadocivil_empleado,
                    empleados.fechanacimiento_empleado,
                    empleados.lugarnacimiento_empleado,
                    empleados.usuario_empleado,

                    tiposdocumento.codigo_tipodocumento,

                    dependencias.nombre_dependencia
                
                    from empleados 
                    left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
                    left join dependencias on empleados.dependencia_empleado = dependencias.id_dependencia";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_empleado) {
       
        $query = "select 
                    empleados.id_empleado, 
                    empleados.dependencia_empleado, 
                    empleados.documento_empleado, 
                    empleados.tipodocumento_empleado, 
                    empleados.nombres_empleado, 
                    empleados.apellidos_empleado, 
                    empleados.telefono_empleado, 
                    empleados.celular_empleado, 
                    empleados.correo_empleado, 
                    empleados.direccion_empleado, 
                    empleados.ciudad_empleado,
                    empleados.sexo_empleado,
                    empleados.estadocivil_empleado,
                    empleados.fechanacimiento_empleado,
                    empleados.lugarnacimiento_empleado,
                    empleados.usuario_empleado,

                    tiposdocumento.codigo_tipodocumento,

                    usuarios.nick_usuario,
                    usuarios.password_usuario
                
                    from empleados 
                        left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
                        left join usuarios on empleados.usuario_empleado = usuarios.id_usuario

                    where empleados.id_empleado='".$id_empleado."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }

    function getEmpleadosLIKE($texto) {
       
        $query = "select 
                    empleados.id_empleado, 
                    empleados.dependencia_empleado, 
                    empleados.documento_empleado, 
                    empleados.tipodocumento_empleado, 
                    empleados.nombres_empleado, 
                    empleados.apellidos_empleado, 
                    empleados.telefono_empleado, 
                    empleados.celular_empleado, 
                    empleados.correo_empleado, 
                    empleados.direccion_empleado, 
                    empleados.ciudad_empleado,
                    empleados.sexo_empleado,
                    empleados.estadocivil_empleado,
                    empleados.fechanacimiento_empleado,
                    empleados.lugarnacimiento_empleado,
                    empleados.usuario_empleado,

                    tiposdocumento.codigo_tipodocumento
                
                    from empleados left join 
                            tiposdocumento on 
                            empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento

                    where   empleados.nombres_empleado LIKE '%".$texto."%' OR 
                            empleados.apellidos_empleado LIKE '%".$texto."%' OR
                            empleados.documento_empleado LIKE '%".$texto."%' ";
        
         $consulta = $this->consulta($query);
        return $consulta;    
        
    }
    

    function getFiltroEmpleados($dependencia, $sexo) {
       
        $consulta_dependencia = "";
        
        if($dependencia != "TODOS"){           
            $consulta_dependencia = "and empleados.dependencia_empleado = '".$dependencia."'" ;
        }else{           
            $consulta_dependencia = " " ;           
        }
       
        $consulta_sexo = "";
        
        if($sexo != "TODOS"){           
            $consulta_sexo = "and empleados.sexo_empleado = '".$sexo."'" ;
        }else{           
            $consulta_sexo = " " ;           
        }

        $query = "select 
                    empleados.id_empleado, 
                    empleados.dependencia_empleado, 
                    empleados.documento_empleado, 
                    empleados.tipodocumento_empleado, 
                    empleados.nombres_empleado, 
                    empleados.apellidos_empleado, 
                    empleados.telefono_empleado, 
                    empleados.celular_empleado, 
                    empleados.correo_empleado, 
                    empleados.direccion_empleado, 
                    empleados.ciudad_empleado,
                    empleados.sexo_empleado,
                    empleados.estadocivil_empleado,
                    empleados.fechanacimiento_empleado,
                    empleados.lugarnacimiento_empleado,
                    empleados.usuario_empleado,

                    tiposdocumento.codigo_tipodocumento
                
                    from empleados left join 
                            tiposdocumento on 
                            empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento

                    where empleados.id_empleado != '' ".$consulta_dependencia.$consulta_sexo;
        
         $consulta = $this->consulta($query);
        return $consulta;    
        
    }
    
    function existeDocumento($documento_empleado) {
       
        $query = "select count(empleados.documento_empleado) as cantidad                
                  from empleados
                  where empleados.documento_empleado = '".$documento_empleado."'";
        
        $consulta = $this->consulta($query);
        
        if($consulta[0]['cantidad']){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    function existeCorreo($correo_empleado) {
       
        $query = "select count(empleados.correo_empleado) as cantidad                
                  from empleados
                  where empleados.correo_empleado = '".$correo_empleado."'";
        
        $consulta = $this->consulta($query);
        
        if($consulta[0]['cantidad']){
            return true;
        }else{
            return false;
        }
        
    }

    function insertar(                               
                    $documento_empleado, 
                    $dependencia_empleado, 
                    $tipodocumento_empleado, 
                    $nombres_empleado, 
                    $apellidos_empleado, 
                    $telefono_empleado, 
                    $celular_empleado, 
                    $correo_empleado, 
                    $direccion_empleado, 
                    $ciudad_empleado,
                    $sexo_empleado,
                    $estadocivil_empleado,
                    $fechanacimiento_empleado,
                    $lugarnacimiento_empleado,
                    $usuario_empleado
                    ){
                
        $query = "INSERT INTO empleados (
                                documento_empleado, 
                                dependencia_empleado, 
                                tipodocumento_empleado, 
                                nombres_empleado, 
                                apellidos_empleado, 
                                telefono_empleado, 
                                celular_empleado, 
                                correo_empleado, 
                                direccion_empleado, 
                                ciudad_empleado,
                                sexo_empleado,
                                estadocivil_empleado,
                                fechanacimiento_empleado,
                                lugarnacimiento_empleado,
                                usuario_empleado
                            )
                            VALUES(
                                '".$documento_empleado."',
                                '".$dependencia_empleado."',
                                '".$tipodocumento_empleado."',
                                '".$nombres_empleado."',
                                '".$apellidos_empleado."',
                                '".$telefono_empleado."',
                                '".$celular_empleado."',
                                '".$correo_empleado."',
                                '".$direccion_empleado."',
                                '".$ciudad_empleado."',
                                '".$sexo_empleado."',
                                '".$estadocivil_empleado."',
                                '".$fechanacimiento_empleado."',
                                '".$lugarnacimiento_empleado."',
                                '".$usuario_empleado."'
                            );";
       
        return $this->crear_ultimo_id($query);       
        
    }
    
    function editar(
                    $id_empleado, 
                    $documento_empleado, 
                    $dependencia_empleado, 
                    $tipodocumento_empleado, 
                    $nombres_empleado, 
                    $apellidos_empleado, 
                    $telefono_empleado, 
                    $celular_empleado, 
                    $correo_empleado, 
                    $direccion_empleado, 
                    $ciudad_empleado,
                    $sexo_empleado,
                    $estadocivil_empleado,
                    $fechanacimiento_empleado,
                    $lugarnacimiento_empleado
                ) {
        
        $query = "  UPDATE empleados 
        
                    SET documento_empleado = '". $documento_empleado ."',
                        dependencia_empleado = '". $dependencia_empleado ."',
                        tipodocumento_empleado = '". $tipodocumento_empleado ."',
                        nombres_empleado = '". $nombres_empleado ."',
                        apellidos_empleado = '". $apellidos_empleado ."',
                        telefono_empleado = '". $telefono_empleado ."',
                        celular_empleado = '". $celular_empleado ."',
                        correo_empleado = '". $correo_empleado ."',
                        direccion_empleado = '". $direccion_empleado ."',
                        ciudad_empleado = '". $ciudad_empleado ."',
                        sexo_empleado = '". $sexo_empleado ."',
                        estadocivil_empleado = '". $estadocivil_empleado ."',
                        fechanacimiento_empleado = '". $fechanacimiento_empleado ."',
                        lugarnacimiento_empleado = '". $lugarnacimiento_empleado ."'

                    WHERE id_empleado = '" . $id_empleado . "'";
       
        return $this->modificarRegistros($query);
       
    }
    
    function eliminar($id_empleado) {
        
        $query = "DELETE FROM empleados WHERE id_empleado = '". $id_empleado ."'";        
        $this->modificarRegistros($query);

    }
    
}

?>