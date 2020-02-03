<?php

class ClientesModel extends ModelBase {  

    function getTodosClientes() {        

     $query = "select 	
		        acto_clientes.id_cliente, 
                acto_clientes.tipodocumento_cliente,
                acto_clientes.documento_cliente,
                acto_clientes.nombres_cliente,
                acto_clientes.apellidos_cliente,
                concat( clientes.nombres_cliente,' ',clientes.apellidos_cliente) as nombre_cliente,
                acto_clientes.direccionresidencia_cliente,
                acto_clientes.direccioncorrespondencia_cliente,
                acto_clientes.telefono_cliente,
                acto_clientes.celular_cliente,
                acto_clientes.correo_cliente,
                acto_clientes.ciudad_cliente,
                acto_clientes.pais_cliente,
                acto_clientes.genero_cliente,
                acto_clientes.estadocivil_cliente,
                acto_clientes.hijos_cliente,
                acto_clientes.fechanacimiento_cliente,
                acto_clientes.educacion_cliente,
                acto_clientes.ocupacion_cliente,
                acto_clientes.estado_cliente,
                acto_clientes.paginaweb_cliente,
                acto_clientes.tipo_cliente,
            
                tiposdocumento.nombre_tipodocumento,

                paises.nombre_pais,

                generos.nombre_genero,

                estadoscivil.nombre_estadocivil,

                educaciones.nombre_educacion,

                ocupaciones.nombre_ocupacion,

                estados.nombre_estado,

                actos_tipos.nombre_tipo,

                from acto_clientes
                    left join tiposdocumento on clientes.tipodocumento_cliente = tiposdocumento.id_tipodocumento
                    left join paises on clientes.pais_cliente = paises.id_pais       
                    left join generos on clientes.genero_cliente = generos.id_genero
                    left join estadoscivil on clientes.estadocivil_cliente = estadoscivil.id_estadocivil
                    left join educaciones on clientes.educacion_cliente = educaciones.id_educacion
                    left join ocupaciones on clientes.ocupacion_cliente = ocupaciones.id_ocupacion
                    left join estados on clientes.estado_cliente = estados.id_estado
                    left join acto_tipos on clientes.tipo_cliente = acto_tipos.id_tipo";

                $consulta = $this->consulta($query);
               return $consulta;                    

    }  
  

    function getClientesLIKE($texto) {       

     $query = "select 	
     acto_clientes.id_cliente, 
     acto_clientes.tipodocumento_cliente,
     acto_clientes.documento_cliente,
     acto_clientes.nombres_cliente,
     acto_clientes.apellidos_cliente,
     concat( clientes.nombres_cliente,' ',clientes.apellidos_cliente) as nombre_cliente,
     acto_clientes.direccionresidencia_cliente,
     acto_clientes.direccioncorrespondencia_cliente,
     acto_clientes.telefono_cliente,
     acto_clientes.celular_cliente,
     acto_clientes.correo_cliente,
     acto_clientes.ciudad_cliente,
     acto_clientes.pais_cliente,
     acto_clientes.genero_cliente,
     acto_clientes.estadocivil_cliente,
     acto_clientes.hijos_cliente,
     acto_clientes.fechanacimiento_cliente,
     acto_clientes.educacion_cliente,
     acto_clientes.ocupacion_cliente,
     acto_clientes.estado_cliente,
     acto_clientes.paginaweb_cliente,
     acto_clientes.tipo_cliente,
 
     tiposdocumento.nombre_tipodocumento,

     paises.nombre_pais,

     generos.nombre_genero,

     estadoscivil.nombre_estadocivil,

     educaciones.nombre_educacion,

     ocupaciones.nombre_ocupacion,

     estados.nombre_estado,

     actos_tipos.nombre_tipo,

     from acto_clientes
         left join tiposdocumento on clientes.tipodocumento_cliente = tiposdocumento.id_tipodocumento
         left join paises on clientes.pais_cliente = paises.id_pais       
         left join generos on clientes.genero_cliente = generos.id_genero
         left join estadoscivil on clientes.estadocivil_cliente = estadoscivil.id_estadocivil
         left join educaciones on clientes.educacion_cliente = educaciones.id_educacion
         left join ocupaciones on clientes.ocupacion_cliente = ocupaciones.id_ocupacion
         left join estados on clientes.estado_cliente = estados.id_estado
         left join acto_tipos on clientes.tipo_cliente = acto_tipos.id_tipo

                where acto_clientes.NOMBRE_cliente LIKE '%".$texto."%'" ;        

                $consulta = $this->consulta($query);
               return $consulta;                     

    }  
  

    function getDatosCliente($ID_cliente) {       

     $query = "select 	
		        acto_clientes.id_cliente, 
                acto_clientes.tipodocumento_cliente,
                acto_clientes.documento_cliente,
                acto_clientes.nombres_cliente,
                acto_clientes.apellidos_cliente,
                concat( clientes.nombres_cliente,' ',clientes.apellidos_cliente) as nombre_cliente,
                acto_clientes.direccionresidencia_cliente,
                acto_clientes.direccioncorrespondencia_cliente,
                acto_clientes.telefono_cliente,
                acto_clientes.celular_cliente,
                acto_clientes.correo_cliente,
                acto_clientes.ciudad_cliente,
                acto_clientes.pais_cliente,
                acto_clientes.genero_cliente,
                acto_clientes.estadocivil_cliente,
                acto_clientes.hijos_cliente,
                acto_clientes.fechanacimiento_cliente,
                acto_clientes.educacion_cliente,
                acto_clientes.ocupacion_cliente,
                acto_clientes.estado_cliente,
                acto_clientes.paginaweb_cliente,
                acto_clientes.tipo_cliente,
            
                tiposdocumento.nombre_tipodocumento,

                paises.nombre_pais,

                generos.nombre_genero,

                estadoscivil.nombre_estadocivil,

                educaciones.nombre_educacion,

                ocupaciones.nombre_ocupacion,

                estados.nombre_estado,

                actos_tipos.nombre_tipo,

                from acto_clientes
                    left join tiposdocumento on clientes.tipodocumento_cliente = tiposdocumento.id_tipodocumento
                    left join paises on clientes.pais_cliente = paises.id_pais       
                    left join generos on clientes.genero_cliente = generos.id_genero
                    left join estadoscivil on clientes.estadocivil_cliente = estadoscivil.id_estadocivil
                    left join educaciones on clientes.educacion_cliente = educaciones.id_educacion
                    left join ocupaciones on clientes.ocupacion_cliente = ocupaciones.id_ocupacion
                    left join estados on clientes.estado_cliente = estados.id_estado
                    left join acto_tipos on clientes.tipo_cliente = acto_tipos.id_tipo

                where acto_clientes.ID_cliente='".$ID_cliente."'";        

         $consulta = $this->consulta($query);
        return $consulta[0];            

    }   

    function insertarCliente(
                            $tipodocumento_cliente,
                            $documento_cliente,
                            $nombres_cliente,
                            $apellidos_cliente,
                            $direccionresidencia_cliente,
                            $direccioncorrespondencia_cliente,
                            $telefono_cliente,
                            $celular_cliente,
                            $correo_cliente,
                            $ciudad_cliente,
                            $pais_cliente,
                            $genero_cliente,
                            $estadocivil_cliente,
                            $hijos_cliente,
                            $fechanacimiento_cliente,
                            $educacion_cliente,
                            $ocupacion_cliente,
                            $estado_cliente,
                            $paginaweb_cliente,
                            $tipo_cliente    
                            ) {
               
         $query = "INSERT INTO acto_clientes (
                            tipodocumento_cliente,
                            documento_cliente,
                            nombres_cliente,
                            apellidos_cliente,
                            direccionresidencia_cliente,
                            direccioncorrespondencia_cliente,
                            telefono_cliente,
                            celular_cliente,
                            correo_cliente,
                            ciudad_cliente,
                            pais_cliente,
                            genero_cliente,
                            estadocivil_cliente,
                            hijos_cliente,
                            fechanacimiento_cliente,
                            educacion_cliente,
                            ocupacion_cliente,
                            estado_cliente,
                            paginaweb_cliente,
                            tipo_cliente  
                            )

		            VALUES(
                        '". $tipodocumento_cliente."', 
                        '". $documento_cliente."',
                        '". $nombres_cliente."', 
                        '". $apellidos_cliente."', 
                        '". $direccionresidencia_cliente."', 
                        '". $direccioncorrespondencia_cliente."', 
                        '". $telefono_cliente."', 
                        '". $celular_cliente."',
                        '". $correo_cliente."', 
                        '". $ciudad_cliente."', 
                        '". $pais_cliente."', 
                        '". $genero_cliente."',
                        '". $estadocivil_cliente."',
                        '". $hijos_cliente."',
                        '". $fechanacimiento_cliente."',
                        '". $educacion_cliente."',
                        '". $ocupacion_cliente."',
                        '". $estado_cliente."',
                        '". $paginaweb_cliente."',
                        '". $tipo_cliente."'
                        );";


        return $this->crear_ultimo_id($query);       


    }

    

    function editarCliente(
                            $id_cliente,
                            $tipodocumento_cliente,
                            $documento_cliente,
                            $nombres_cliente,
                            $apellidos_cliente,
                            $direccionresidencia_cliente,
                            $direccioncorrespondencia_cliente,
                            $telefono_cliente,
                            $celular_cliente,
                            $correo_cliente,
                            $ciudad_cliente,
                            $pais_cliente,
                            $genero_cliente,
                            $estadocivil_cliente,
                            $hijos_cliente,
                            $fechanacimiento_cliente,
                            $educacion_cliente,
                            $ocupacion_cliente,
                            $estado_cliente,
                            $paginaweb_cliente,
                            $tipo_cliente 
    ) {

    $query = "  UPDATE acto_clientes  
               
                SET tipodocumento_cliente = '".$tipodocumento_cliente."', 
                    documento_cliente = '".$documento_cliente."', 
                    nombres_cliente = '".$nombres_cliente."',
                    apellidos_cliente = '".$apellidos_cliente."', 
                    direccionresidencia_cliente = '".$direccionresidencia_cliente."', 
                    direccioncorrespondencia_cliente = '".$direccioncorrespondencia_cliente."', 
                    telefono_cliente = '".$telefono_cliente."', 
                    celular_cliente = '".$celular_cliente."', 
                    correo_cliente = '".$correo_cliente."', 
                    ciudad_cliente = '".$ciudad_cliente."', 
                    pais_cliente = '".$pais_cliente."', 
                    genero_cliente = '".$genero_cliente."', 
                    estadocivil_cliente = '".$estadocivil_cliente."', 
                    hijos_cliente = '".$hijos_cliente."', 
                    fechanacimiento_cliente = '".$fechanacimiento_cliente."', 
                    educacion_cliente = '".$educacion_cliente."', 
                    ocupacion_cliente = '".$ocupacion_cliente."', 
                    estado_cliente = '".$estado_cliente."', 
                    paginaweb_cliente = '".$paginaweb_cliente."',
                    tipo_cliente = '".$tipo_cliente."'

        WHERE id_cliente = '" . $id_cliente . "'";

       return $this->modificarRegistros($query);
      
    }


    function eliminarCliente($id_cliente) {

        $query = "DELETE FROM acto_clientes WHERE id_cliente = '". $id_cliente ."'";

        $this->modificarRegistros($query);

    }

}

?>