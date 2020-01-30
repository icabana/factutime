<?php



class ProveedoresModel extends ModelBase {
 

    function getTodosProveedores() {        

     $query = "select 	

     select 	
     acto_proveedores.id_proveedor, 
     acto_proveedores.tipodocumento_proveedor,
     acto_proveedores.documento_proveedor,
     acto_proveedores.nombres_proveedor,
     acto_proveedores.apellidos_proveedor,
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

     from acto_proveedores" ;        

                $consulta = $this->consulta($query);
               return $consulta;       
               

    }  

  

  

    function getProveedoresLIKE($texto) {

        

     $query = "select 	

			tbl_proveedores.ID_PROVEEDOR, 

                tbl_proveedores.DOCUMENTO_PROVEEDOR,

                tbl_proveedores.NOMBRE_PROVEEDOR,

                tbl_proveedores.DIRECCION_PROVEEDOR,

                tbl_proveedores.TELEFONO_PROVEEDOR,

                tbl_proveedores.CORREO_PROVEEDOR,

                tbl_proveedores.REGIMEN_PROVEEDOR               
                

                from tbl_proveedores

                

                where tbl_proveedores.NOMBRE_PROVEEDOR LIKE '%".$texto."%'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

  

    function getDatosProveedor($ID_PROVEEDOR) {

       

     $query = "select 	

		tbl_proveedores.ID_PROVEEDOR, 

                tbl_proveedores.DOCUMENTO_PROVEEDOR,

                tbl_proveedores.NOMBRE_PROVEEDOR,

                tbl_proveedores.DIRECCION_PROVEEDOR,

                tbl_proveedores.TELEFONO_PROVEEDOR,

                tbl_proveedores.CORREO_PROVEEDOR,

                tbl_proveedores.REGIMEN_PROVEEDOR                
                

                from tbl_proveedores

      

                where tbl_proveedores.ID_PROVEEDOR='".$ID_PROVEEDOR."'";

        

         $consulta = $this->consulta($query);

        return $consulta[0];    

        

    }

    

    function insertarProveedor($NOMBRE_PROVEEDOR, $TIPODOCUMENTO_PROVEEDOR, $DOCUMENTO_PROVEEDOR, $DIRECCION_PROVEEDOR, $TELEFONO_PROVEEDOR, $CORREO_PROVEEDOR, $REGIMEN_PROVEEDOR) {

                

         $query = "INSERT INTO tbl_proveedores (NOMBRE_PROVEEDOR, TIPODOCUMENTO_PROVEEDOR, DOCUMENTO_PROVEEDOR, DIRECCION_PROVEEDOR, TELEFONO_PROVEEDOR, CORREO_PROVEEDOR, REGIMEN_PROVEEDOR)

		VALUES('".utf8_decode(mb_strtoupper($NOMBRE_PROVEEDOR,'UTF-8'))."', '". $TIPODOCUMENTO_PROVEEDOR."', '". $DOCUMENTO_PROVEEDOR."', '". utf8_decode(mb_strtoupper($DIRECCION_PROVEEDOR,'UTF-8'))."', '". $TELEFONO_PROVEEDOR."', '". $CORREO_PROVEEDOR."', '". $REGIMEN_PROVEEDOR."');";

       

        return $this->crear_ultimo_id($query);       

        

    }

    

    function editarProveedor($ID_PROVEEDOR, $NOMBRE_PROVEEDOR, $DOCUMENTO_PROVEEDOR, $DIRECCION_PROVEEDOR, $TELEFONO_PROVEEDOR, $CORREO_PROVEEDOR, $REGIMEN_PROVEEDOR) {

        

       $query = "UPDATE tbl_proveedores  SET NOMBRE_PROVEEDOR = '".utf8_decode(mb_strtoupper($NOMBRE_PROVEEDOR,'UTF-8'))."', DOCUMENTO_PROVEEDOR = '".$DOCUMENTO_PROVEEDOR."', DIRECCION_PROVEEDOR = '".utf8_decode(mb_strtoupper($DIRECCION_PROVEEDOR,'UTF-8'))."', TELEFONO_PROVEEDOR = '".$TELEFONO_PROVEEDOR."', CORREO_PROVEEDOR = '".$CORREO_PROVEEDOR."', REGIMEN_PROVEEDOR = '".$REGIMEN_PROVEEDOR."'

           

        WHERE ID_PROVEEDOR = '" . $ID_PROVEEDOR . "'";

       

       return $this->modificarRegistros($query);

       

    }

    



    function eliminarProveedor($ID_PROVEEDOR) {

        

        $query = "DELETE FROM tbl_proveedores WHERE ID_PROVEEDOR = '". $ID_PROVEEDOR ."'";

        

        $this->modificarRegistros($query);



    }

    

}



?>

