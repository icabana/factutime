<?php

class ProveedoresModel extends ModelBase { 

    function getTodosProveedores() {        

     $query = "select
                acto_proveedores.id_proveedor, 
                acto_proveedores.tipodocumento_proveedor,
                acto_proveedores.documento_proveedor,
                acto_proveedores.nombres_proveedor,
                acto_proveedores.apellidos_proveedor,
                concat( proveedores.nombres_proveedor,' ',proveedores.apellidos_proveedor) as nombre_proveedor,
                acto_proveedores.direccionresidencia_proveedor,
                acto_proveedores.direccioncorrespondencia_proveedor,
                acto_proveedores.telefono_proveedor,
                acto_proveedores.celular_proveedor,
                acto_proveedores.correo_proveedor,
                acto_proveedores.ciudad_proveedor,
                acto_proveedores.pais_proveedor,
                acto_proveedores.genero_proveedor,
                acto_proveedores.estadocivil_proveedor,
                acto_proveedores.hijos_proveedor,
                acto_proveedores.fechanacimiento_proveedor,
                acto_proveedores.educacion_proveedor,
                acto_proveedores.ocupacion_proveedor,
                acto_proveedores.estado_proveedor,
                acto_proveedores.paginaweb_proveedor,
                acto_proveedores.tipo_proveedor 
                
                tiposdocumento.nombre_tipodocumento,

                paises.nombre_pais,

                generos.nombre_genero,

                estadoscivil.nombre_estadocivil,

                educaciones.nombre_educacion,

                ocupaciones.nombre_ocupacion,

                estados.nombre_estado,

                actos_tipos.nombre_tipo,

                from acto_proveedores
                    left join tiposdocumento on proveedores.tipodocumento_proveedor = tiposdocumento.id_tipodocumento
                    left join paises on proveedores.pais_proveedor = paises.id_pais       
                    left join generos on proveedores.genero_proveedor = generos.id_genero
                    left join estadoscivil on proveedores.estadocivil_proveedor = estadoscivil.id_estadocivil
                    left join educaciones on proveedores.educacion_proveedor = educaciones.id_educacion
                    left join ocupaciones on proveedores.ocupacion_proveedor = ocupaciones.id_ocupacion
                    left join estados on proveedores.estado_proveedor = estados.id_estado
                    left join acto_tipos on proveedores.tipo_proveedor = acto_tipos.id_tipo" ;        

                $consulta = $this->consulta($query);
               return $consulta;       
               

    }  
  

    function getProveedoresLIKE($texto) {
      
     $query = "select
            acto_proveedores.id_proveedor, 
            acto_proveedores.tipodocumento_proveedor,
            acto_proveedores.documento_proveedor,
            acto_proveedores.nombres_proveedor,
            acto_proveedores.apellidos_proveedor,
            concat( proveedores.nombres_proveedor,' ',proveedores.apellidos_proveedor) as nombre_proveedor,
            acto_proveedores.direccionresidencia_proveedor,
            acto_proveedores.direccioncorrespondencia_proveedor,
            acto_proveedores.telefono_proveedor,
            acto_proveedores.celular_proveedor,
            acto_proveedores.correo_proveedor,
            acto_proveedores.ciudad_proveedor,
            acto_proveedores.pais_proveedor,
            acto_proveedores.genero_proveedor,
            acto_proveedores.estadocivil_proveedor,
            acto_proveedores.hijos_proveedor,
            acto_proveedores.fechanacimiento_proveedor,
            acto_proveedores.educacion_proveedor,
            acto_proveedores.ocupacion_proveedor,
            acto_proveedores.estado_proveedor,
            acto_proveedores.paginaweb_proveedor,
            acto_proveedores.tipo_proveedor 
            
            tiposdocumento.nombre_tipodocumento,

            paises.nombre_pais,

            generos.nombre_genero,

            estadoscivil.nombre_estadocivil,

            educaciones.nombre_educacion,

            ocupaciones.nombre_ocupacion,

            estados.nombre_estado,

            actos_tipos.nombre_tipo,

            from acto_proveedores
                left join tiposdocumento on proveedores.tipodocumento_proveedor = tiposdocumento.id_tipodocumento
                left join paises on proveedores.pais_proveedor = paises.id_pais       
                left join generos on proveedores.genero_proveedor = generos.id_genero
                left join estadoscivil on proveedores.estadocivil_proveedor = estadoscivil.id_estadocivil
                left join educaciones on proveedores.educacion_proveedor = educaciones.id_educacion
                left join ocupaciones on proveedores.ocupacion_proveedor = ocupaciones.id_ocupacion
                left join estados on proveedores.estado_proveedor = estados.id_estado
                left join acto_tipos on proveedores.tipo_proveedor = acto_tipos.id_tipo

                where tbl_proveedores.nombres_proveedor LIKE '%".$texto."%'" ;

                $consulta = $this->consulta($query);

               return $consulta;       


    }  

  

    function getDatosProveedor($ID_PROVEEDOR) {
     
     $query = " select
                acto_proveedores.id_proveedor, 
                acto_proveedores.tipodocumento_proveedor,
                acto_proveedores.documento_proveedor,
                acto_proveedores.nombres_proveedor,
                acto_proveedores.apellidos_proveedor,
                concat( proveedores.nombres_proveedor,' ',proveedores.apellidos_proveedor) as nombre_proveedor,
                acto_proveedores.direccionresidencia_proveedor,
                acto_proveedores.direccioncorrespondencia_proveedor,
                acto_proveedores.telefono_proveedor,
                acto_proveedores.celular_proveedor,
                acto_proveedores.correo_proveedor,
                acto_proveedores.ciudad_proveedor,
                acto_proveedores.pais_proveedor,
                acto_proveedores.genero_proveedor,
                acto_proveedores.estadocivil_proveedor,
                acto_proveedores.hijos_proveedor,
                acto_proveedores.fechanacimiento_proveedor,
                acto_proveedores.educacion_proveedor,
                acto_proveedores.ocupacion_proveedor,
                acto_proveedores.estado_proveedor,
                acto_proveedores.paginaweb_proveedor,
                acto_proveedores.tipo_proveedor 
                
                tiposdocumento.nombre_tipodocumento,

                paises.nombre_pais,

                generos.nombre_genero,

                estadoscivil.nombre_estadocivil,

                educaciones.nombre_educacion,

                ocupaciones.nombre_ocupacion,

                estados.nombre_estado,

                actos_tipos.nombre_tipo,

                from acto_proveedores
                    left join tiposdocumento on proveedores.tipodocumento_proveedor = tiposdocumento.id_tipodocumento
                    left join paises on proveedores.pais_proveedor = paises.id_pais       
                    left join generos on proveedores.genero_proveedor = generos.id_genero
                    left join estadoscivil on proveedores.estadocivil_proveedor = estadoscivil.id_estadocivil
                    left join educaciones on proveedores.educacion_proveedor = educaciones.id_educacion
                    left join ocupaciones on proveedores.ocupacion_proveedor = ocupaciones.id_ocupacion
                    left join estados on proveedores.estado_proveedor = estados.id_estado
                    left join acto_tipos on proveedores.tipo_proveedor = acto_tipos.id_tipo 

                where tbl_proveedores.ID_PROVEEDOR='".$ID_PROVEEDOR."'";

         $consulta = $this->consulta($query);
        return $consulta[0];            

    }
   

    function insertarProveedor(
                            $tipodocumento_proveedor,
                            $documento_proveedor,
                            $nombres_proveedor,
                            $apellidos_proveedor,
                            $direccionresidencia_proveedor,
                            $direccioncorrespondencia_proveedor,
                            $telefono_proveedor,
                            $celular_proveedor,
                            $correo_proveedor,
                            $ciudad_proveedor,
                            $pais_proveedor,
                            $genero_proveedor,
                            $estadocivil_proveedor,
                            $hijos_proveedor,
                            $fechanacimiento_proveedor,
                            $educacion_proveedor,
                            $ocupacion_proveedor,
                            $estado_proveedor,
                            $paginaweb_proveedor,
                            $tipo_proveedor
        ) {               

         $query = "INSERT INTO tbl_proveedores 
                            (
                                tipodocumento_proveedor,
                                documento_proveedor,
                                nombres_proveedor,
                                apellidos_proveedor,
                                direccionresidencia_proveedor,
                                direccioncorrespondencia_proveedor,
                                telefono_proveedor,
                                celular_proveedor,
                                correo_proveedor,
                                ciudad_proveedor,
                                pais_proveedor,
                                genero_proveedor,
                                estadocivil_proveedor,
                                hijos_proveedor,
                                fechanacimiento_proveedor,
                                educacion_proveedor,
                                ocupacion_proveedor,
                                estado_proveedor,
                                paginaweb_proveedor,
                                tipo_proveedor
                            )

		                VALUES(
                            '". $tipodocumento_proveedor."', 
                            '". $documento_proveedor."',
                            '". $nombres_proveedor."', 
                            '". $apellidos_proveedor."', 
                            '". $direccionresidencia_proveedor."', 
                            '". $direccioncorrespondencia_proveedor."', 
                            '". $telefono_proveedor."', 
                            '". $celular_proveedor."',
                            '". $correo_proveedor."', 
                            '". $ciudad_proveedor."', 
                            '". $pais_proveedor."', 
                            '". $genero_proveedor."',
                            '". $estadocivil_proveedor."',
                            '". $hijos_proveedor."',
                            '". $fechanacimiento_proveedor."',
                            '". $educacion_proveedor."',
                            '". $ocupacion_proveedor."',
                            '". $estado_proveedor."',
                            '". $paginaweb_proveedor."',
                            '". $tipo_proveedor."');";
     
        return $this->crear_ultimo_id($query);    

    }
    

    function editarProveedor(        
                            $id_proveedor,
                            $tipodocumento_proveedor,
                            $documento_proveedor,
                            $nombres_proveedor,
                            $apellidos_proveedor,
                            $direccionresidencia_proveedor,
                            $direccioncorrespondencia_proveedor,
                            $telefono_proveedor,
                            $celular_proveedor,
                            $correo_proveedor,
                            $ciudad_proveedor,
                            $pais_proveedor,
                            $genero_proveedor,
                            $estadocivil_proveedor,
                            $hijos_proveedor,
                            $fechanacimiento_proveedor,
                            $educacion_proveedor,
                            $ocupacion_proveedor,
                            $estado_proveedor,
                            $paginaweb_proveedor,
                            $tipo_proveedor
        ) {

        

    $query = "UPDATE tbl_proveedores  
                SET tipodocumento_proveedor = '".$tipodocumento_proveedor."', 
                    documento_proveedor = '".$documento_proveedor."', 
                    nombres_proveedor = '".$nombres_proveedor."',
                    apellidos_proveedor = '".$apellidos_proveedor."', 
                    direccionresidencia_proveedor = '".$direccionresidencia_proveedor."', 
                    direccioncorrespondencia_proveedor = '".$direccioncorrespondencia_proveedor."', 
                    telefono_proveedor = '".$telefono_proveedor."', 
                    celular_proveedor = '".$celular_proveedor."', 
                    correo_proveedor = '".$correo_proveedor."', 
                    ciudad_proveedor = '".$ciudad_proveedor."', 
                    pais_proveedor = '".$pais_proveedor."', 
                    genero_proveedor = '".$genero_proveedor."', 
                    estadocivil_proveedor = '".$estadocivil_proveedor."', 
                    hijos_proveedor = '".$hijos_proveedor."', 
                    fechanacimiento_proveedor = '".$fechanacimiento_proveedor."', 
                    educacion_proveedor = '".$educacion_proveedor."', 
                    ocupacion_proveedor = '".$ocupacion_proveedor."', 
                    estado_proveedor = '".$estado_proveedor."', 
                    paginaweb_proveedor = '".$paginaweb_proveedor."',
                    tipo_proveedor = '".$tipo_proveedor."'            

        WHERE id_proveedor = '" . $id_proveedor . "'";
       
       return $this->modificarRegistros($query);
     
    }

    function eliminarProveedor($ID_PROVEEDOR) {        

        $query = "DELETE FROM tbl_proveedores WHERE ID_PROVEEDOR = '". $ID_PROVEEDOR ."'";

        $this->modificarRegistros($query);

    }    

}

?>