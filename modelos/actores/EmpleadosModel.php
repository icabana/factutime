<?php

class EmpleadosModel extends ModelBase {
  
    function getTodos() {
        
        $query = "select
                acto_empleados.id_empleado, 
                acto_empleados.tipodocumento_empleado,
                acto_empleados.documento_empleado,
                acto_empleados.nombres_empleado,
                acto_empleados.apellidos_empleado,
                concat( empleados.nombres_empleado,' ',empleados.apellidos_empleado) as nombre_empleado,
                acto_empleados.direccionresidencia_empleado,
                acto_empleados.direccioncorrespondencia_empleado,
                acto_empleados.telefono_empleado,
                acto_empleados.celular_empleado,
                acto_empleados.correo_empleado,
                acto_empleados.ciudad_empleado,
                acto_empleados.pais_empleado,
                acto_empleados.genero_empleado,
                acto_empleados.estadocivil_empleado,
                acto_empleados.hijos_empleado,
                acto_empleados.fechanacimiento_empleado,
                acto_empleados.educacion_empleado,
                acto_empleados.ocupacion_empleado,
                acto_empleados.estado_empleado,
                acto_empleados.paginaweb_empleado,
                acto_empleados.dependencia_empleado 
                
                tiposdocumento.nombre_tipodocumento,

                paises.nombre_pais,

                generos.nombre_genero,

                estadoscivil.nombre_estadocivil,

                educaciones.nombre_educacion,

                ocupaciones.nombre_ocupacion,

                estados.nombre_estado,

                actos_dependencias.nombre_dependencia,

                from acto_empleados
                left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
                left join paises on empleados.pais_empleado = paises.id_pais       
                left join generos on empleados.genero_empleado = generos.id_genero
                left join estadoscivil on empleados.estadocivil_empleado = estadoscivil.id_estadocivil
                left join educaciones on empleados.educacion_empleado = educaciones.id_educacion
                left join ocupaciones on empleados.ocupacion_empleado = ocupaciones.id_ocupacion
                left join estados on empleados.estado_empleado = estados.id_estado
                left join actos_dependencias on empleados.dependencia_empleado = actos_dependencias.id_dependencia";
        
        $consulta = $this->consulta($query);
        return $consulta;       
               
    }  

    function getDatos($id_empleado) {
       
        $query = "select
        acto_empleados.id_empleado, 
        acto_empleados.tipodocumento_empleado,
        acto_empleados.documento_empleado,
        acto_empleados.nombres_empleado,
        acto_empleados.apellidos_empleado,
        concat( empleados.nombres_empleado,' ',empleados.apellidos_empleado) as nombre_empleado,
        acto_empleados.direccionresidencia_empleado,
        acto_empleados.direccioncorrespondencia_empleado,
        acto_empleados.telefono_empleado,
        acto_empleados.celular_empleado,
        acto_empleados.correo_empleado,
        acto_empleados.ciudad_empleado,
        acto_empleados.pais_empleado,
        acto_empleados.genero_empleado,
        acto_empleados.estadocivil_empleado,
        acto_empleados.hijos_empleado,
        acto_empleados.fechanacimiento_empleado,
        acto_empleados.educacion_empleado,
        acto_empleados.ocupacion_empleado,
        acto_empleados.estado_empleado,
        acto_empleados.paginaweb_empleado,
        acto_empleados.dependencia_empleado 
        
        tiposdocumento.nombre_tipodocumento,

        paises.nombre_pais,

        generos.nombre_genero,

        estadoscivil.nombre_estadocivil,

        educaciones.nombre_educacion,

        ocupaciones.nombre_ocupacion,

        estados.nombre_estado,

        actos_dependencias.nombre_dependencia,

        from acto_empleados
        left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
        left join paises on empleados.pais_empleado = paises.id_pais       
        left join generos on empleados.genero_empleado = generos.id_genero
        left join estadoscivil on empleados.estadocivil_empleado = estadoscivil.id_estadocivil
        left join educaciones on empleados.educacion_empleado = educaciones.id_educacion
        left join ocupaciones on empleados.ocupacion_empleado = ocupaciones.id_ocupacion
        left join estados on empleados.estado_empleado = estados.id_estado
        left join actos_dependencias on empleados.dependencia_empleado = actos_dependencias.id_dependencia

                    where empleados.id_empleado='".$id_empleado."'";
        
         $consulta = $this->consulta($query);
        return $consulta[0];    
        
    }

    function getEmpleadosLIKE($texto) {
       
        $query = "select
        acto_empleados.id_empleado, 
        acto_empleados.tipodocumento_empleado,
        acto_empleados.documento_empleado,
        acto_empleados.nombres_empleado,
        acto_empleados.apellidos_empleado,
        concat( empleados.nombres_empleado,' ',empleados.apellidos_empleado) as nombre_empleado,
        acto_empleados.direccionresidencia_empleado,
        acto_empleados.direccioncorrespondencia_empleado,
        acto_empleados.telefono_empleado,
        acto_empleados.celular_empleado,
        acto_empleados.correo_empleado,
        acto_empleados.ciudad_empleado,
        acto_empleados.pais_empleado,
        acto_empleados.genero_empleado,
        acto_empleados.estadocivil_empleado,
        acto_empleados.hijos_empleado,
        acto_empleados.fechanacimiento_empleado,
        acto_empleados.educacion_empleado,
        acto_empleados.ocupacion_empleado,
        acto_empleados.estado_empleado,
        acto_empleados.paginaweb_empleado,
        acto_empleados.dependencia_empleado 
        
        tiposdocumento.nombre_tipodocumento,

        paises.nombre_pais,

        generos.nombre_genero,

        estadoscivil.nombre_estadocivil,

        educaciones.nombre_educacion,

        ocupaciones.nombre_ocupacion,

        estados.nombre_estado,

        actos_dependencias.nombre_dependencia,

        from acto_empleados
        left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
        left join paises on empleados.pais_empleado = paises.id_pais       
        left join generos on empleados.genero_empleado = generos.id_genero
        left join estadoscivil on empleados.estadocivil_empleado = estadoscivil.id_estadocivil
        left join educaciones on empleados.educacion_empleado = educaciones.id_educacion
        left join ocupaciones on empleados.ocupacion_empleado = ocupaciones.id_ocupacion
        left join estados on empleados.estado_empleado = estados.id_estado
        left join actos_dependencias on empleados.dependencia_empleado = actos_dependencias.id_dependencia

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
        acto_empleados.id_empleado, 
        acto_empleados.tipodocumento_empleado,
        acto_empleados.documento_empleado,
        acto_empleados.nombres_empleado,
        acto_empleados.apellidos_empleado,
        concat( empleados.nombres_empleado,' ',empleados.apellidos_empleado) as nombre_empleado,
        acto_empleados.direccionresidencia_empleado,
        acto_empleados.direccioncorrespondencia_empleado,
        acto_empleados.telefono_empleado,
        acto_empleados.celular_empleado,
        acto_empleados.correo_empleado,
        acto_empleados.ciudad_empleado,
        acto_empleados.pais_empleado,
        acto_empleados.genero_empleado,
        acto_empleados.estadocivil_empleado,
        acto_empleados.hijos_empleado,
        acto_empleados.fechanacimiento_empleado,
        acto_empleados.educacion_empleado,
        acto_empleados.ocupacion_empleado,
        acto_empleados.estado_empleado,
        acto_empleados.paginaweb_empleado,
        acto_empleados.dependencia_empleado 
        
        tiposdocumento.nombre_tipodocumento,

        paises.nombre_pais,

        generos.nombre_genero,

        estadoscivil.nombre_estadocivil,

        educaciones.nombre_educacion,

        ocupaciones.nombre_ocupacion,

        estados.nombre_estado,

        actos_dependencias.nombre_dependencia,

        from acto_empleados
        left join tiposdocumento on empleados.tipodocumento_empleado = tiposdocumento.id_tipodocumento
        left join paises on empleados.pais_empleado = paises.id_pais       
        left join generos on empleados.genero_empleado = generos.id_genero
        left join estadoscivil on empleados.estadocivil_empleado = estadoscivil.id_estadocivil
        left join educaciones on empleados.educacion_empleado = educaciones.id_educacion
        left join ocupaciones on empleados.ocupacion_empleado = ocupaciones.id_ocupacion
        left join estados on empleados.estado_empleado = estados.id_estado
        left join actos_dependencias on empleados.dependencia_empleado = actos_dependencias.id_dependencia

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