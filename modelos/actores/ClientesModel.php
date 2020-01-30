<?php

class ClientesModel extends ModelBase {  

    function getTodosClientes() {        

     $query = "select 	
		        acto_clientes.id_cliente, 
                acto_clientes.tipodocumento_cliente,
                acto_clientes.documento_cliente,
                acto_clientes.nombres_cliente,
                acto_clientes.apellidos_cliente,
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
                acto_clientes.tipo_cliente                

                from acto_clientes" ;       

                $consulta = $this->consulta($query);
               return $consulta;                    

    }  
  

    function getClientesLIKE($texto) {       

     $query = "select 	
		acto_clientes.ID_cliente, 
                acto_clientes.DOCUMENTO_cliente,
                acto_clientes.CONTACTO_cliente,
                acto_clientes.NOMBRE_cliente,
                acto_clientes.DIRECCION1_cliente,
                acto_clientes.DIRECCION2_cliente,
                acto_clientes.TELEFONO_cliente,
                acto_clientes.CELULAR_cliente,
                acto_clientes.CORREO1_cliente,
                acto_clientes.CORREO2_cliente,
                acto_clientes.CIUDAD_cliente                

                from acto_clientes                

                where acto_clientes.NOMBRE_cliente LIKE '%".$texto."%'" ;        

                $consulta = $this->consulta($query);
               return $consulta;                     

    }  

  

    function getDatosCliente($ID_cliente) {       

     $query = "select 	
		acto_clientes.ID_cliente, 
                acto_clientes.DOCUMENTO_cliente,
                acto_clientes.CONTACTO_cliente,
                acto_clientes.NOMBRE_cliente,
                acto_clientes.DIRECCION1_cliente,
                acto_clientes.DIRECCION2_cliente,
                acto_clientes.TELEFONO_cliente,
                acto_clientes.CELULAR_cliente,
                acto_clientes.CORREO1_cliente,
                acto_clientes.CORREO2_cliente,
                acto_clientes.CIUDAD_cliente                

                from acto_clientes      

                where acto_clientes.ID_cliente='".$ID_cliente."'";        

         $consulta = $this->consulta($query);
        return $consulta[0];            

    }

    

    function insertarCliente($NOMBRE_cliente, $TIPODOCUMENTO_cliente, $DOCUMENTO_cliente, $CONTACTO_cliente, $DIRECCION1_cliente, $DIRECCION2_cliente, $TELEFONO_cliente, $CELULAR_cliente, $CORREO1_cliente, $CORREO2_cliente, $CIUDAD_cliente, $PRECIO_cliente) {
               
         $query = "INSERT INTO acto_clientes (NOMBRE_cliente, TIPODOCUMENTO_cliente, DOCUMENTO_cliente, CONTACTO_cliente, DIRECCION1_cliente, DIRECCION2_cliente, TELEFONO_cliente, CELULAR_cliente, CORREO1_cliente, CORREO2_cliente, CIUDAD_cliente, PRECIO_cliente)

		VALUES('".utf8_decode(mb_strtoupper($NOMBRE_cliente,'UTF-8'))."', '". $TIPODOCUMENTO_cliente."', '". $DOCUMENTO_cliente."', '". utf8_decode(mb_strtoupper($CONTACTO_cliente,'UTF-8'))."', '". utf8_decode(mb_strtoupper($DIRECCION1_cliente,'UTF-8'))."', '". utf8_decode(mb_strtoupper($DIRECCION2_cliente,'UTF-8'))."', '". $TELEFONO_cliente."', '". $CELULAR_cliente."', '". $CORREO1_cliente."', '". $CORREO2_cliente."', '". utf8_decode(mb_strtoupper($CIUDAD_cliente,'UTF-8'))."', '". $PRECIO_cliente."');";


        return $this->crear_ultimo_id($query);       


    }

    

    function editarCliente($ID_cliente, $NOMBRE_cliente, $DOCUMENTO_cliente, $CONTACTO_cliente, $DIRECCION1_cliente, $DIRECCION2_cliente, $TELEFONO_cliente, $CELULAR_cliente, $CORREO1_cliente, $CORREO2_cliente, $CIUDAD_cliente, $PRECIO_cliente) {

       $query = "UPDATE acto_clientes  SET NOMBRE_cliente = '".utf8_decode(mb_strtoupper($NOMBRE_cliente,'UTF-8'))."', DOCUMENTO_cliente = '".$DOCUMENTO_cliente."', CONTACTO_cliente = '".utf8_decode(mb_strtoupper($CONTACTO_cliente,'UTF-8'))."', DIRECCION1_cliente = '".utf8_decode(mb_strtoupper($DIRECCION1_cliente,'UTF-8'))."', DIRECCION2_cliente = '".utf8_decode(mb_strtoupper($DIRECCION2_cliente,'UTF-8'))."', TELEFONO_cliente = '".$TELEFONO_cliente."', CELULAR_cliente = '".$CELULAR_cliente."', CORREO1_cliente = '".$CORREO1_cliente."', CORREO2_cliente = '".$CORREO2_cliente."', CIUDAD_cliente = '".utf8_decode(mb_strtoupper($CIUDAD_cliente,'UTF-8'))."', PRECIO_cliente = '".$PRECIO_cliente."'

        WHERE ID_cliente = '" . $ID_cliente . "'";

       return $this->modificarRegistros($query);

       

    }

    



    function eliminarCliente($ID_cliente) {

        

        $query = "DELETE FROM acto_clientes WHERE ID_cliente = '". $ID_cliente ."'";

        

        $this->modificarRegistros($query);



    }

    

}



?>

