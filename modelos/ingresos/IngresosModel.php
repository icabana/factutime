<?php

class IngresosModel extends ModelBase {  
    
    
    function getTodosIngresos() {

     $query = "select   fac_ingresos.ID_RECIBO, 
                        fac_ingresos.CLIENTE_RECIBO,
                        fac_ingresos.CONSECUTIVO_RECIBO,
                        fac_ingresos.FECHA_RECIBO,
                        fac_ingresos.VALOR_RECIBO,
                        fac_ingresos.FORMAPAGO_RECIBO,
                        fac_ingresos.VENDEDOR_RECIBO,
                        fac_ingresos.NUMTRANSACCION_RECIBO,
                        fac_ingresos.CONCEPTO_RECIBO,
                        fac_ingresos.OBSERVACIONES_RECIBO,
                        fac_ingresos.CAJERO_RECIBO,

                        tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                        tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                        tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                        tbl_estudiantes.DIRECCION_ESTUDIANTE,
                        tbl_estudiantes.TELEFONO_ESTUDIANTE,
                        tbl_estudiantes.CIUDAD_ESTUDIANTE

                        from fac_ingresos left join tbl_estudiantes ON fac_ingresos.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos.CONSECUTIVO_RECIBO != ''" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  
  
    
    
    function getIngresosEntreFechas($FECHA1, $FECHA2) {

     $query = "select   fac_ingresos.ID_RECIBO, 
                        fac_ingresos.CLIENTE_RECIBO,
                        fac_ingresos.CONSECUTIVO_RECIBO,
                        fac_ingresos.FECHA_RECIBO,
                        fac_ingresos.VALOR_RECIBO,
                        fac_ingresos.VENDEDOR_RECIBO,
                        fac_ingresos.FORMAPAGO_RECIBO,
                        fac_ingresos.NUMTRANSACCION_RECIBO,
                        fac_ingresos.CONCEPTO_RECIBO,
                        fac_ingresos.OBSERVACIONES_RECIBO,
                        fac_ingresos.CAJERO_RECIBO,

                        tbl_estudiantes.ID_ESTUDIANTE,                
                        tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                        tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                        tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                        tbl_estudiantes.DIRECCION_ESTUDIANTE,
                        tbl_estudiantes.TELEFONO_ESTUDIANTE,
                        tbl_estudiantes.CIUDAD_ESTUDIANTE

                        from fac_ingresos left join tbl_estudiantes ON fac_ingresos.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos.CONSECUTIVO_RECIBO != '' AND fac_ingresos.FECHA_RECIBO BETWEEN '".$FECHA1."' and '".$FECHA2."'"
             . ""
             . ""
             . "UNION
                 
select   fac_ingresos2.ID_RECIBO, 
                        fac_ingresos2.CLIENTE_RECIBO,
                        fac_ingresos2.CONSECUTIVO_RECIBO,
                        fac_ingresos2.FECHA_RECIBO,
                        fac_ingresos2.VALOR_RECIBO,
                        fac_ingresos2.VENDEDOR_RECIBO,
                        fac_ingresos2.FORMAPAGO_RECIBO,
                        fac_ingresos2.NUMTRANSACCION_RECIBO,
                        fac_ingresos2.CONCEPTO_RECIBO,
                        fac_ingresos2.OBSERVACIONES_RECIBO,
                        fac_ingresos2.CAJERO_RECIBO,

                        tbl_estudiantes.ID_ESTUDIANTE,      
                        tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                        tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                        tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                        tbl_estudiantes.DIRECCION_ESTUDIANTE,
                        tbl_estudiantes.TELEFONO_ESTUDIANTE,
                        tbl_estudiantes.CIUDAD_ESTUDIANTE

                        from fac_ingresos2 left join tbl_estudiantes ON fac_ingresos2.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos2.CONSECUTIVO_RECIBO != '' AND fac_ingresos2.FECHA_RECIBO BETWEEN '".$FECHA1."' and '".$FECHA2."'" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  
  
    
    
    function getTotalIngresosPorMes($MES) {

     $query = "select   sum(fac_ingresos.VALOR_RECIBO) as total

                        from fac_ingresos 

                        where substr(fac_ingresos.FECHA_RECIBO, 6, 2) = ".$MES ;

                $consulta = $this->consulta($query);
                
               return $consulta[0]['total'];                      

    }  
  
    
    
    
    function getIngresosPorCliente($CLIENTE_RECIBO) {

     $query = "select   fac_ingresos.ID_RECIBO, 
                        fac_ingresos.CLIENTE_RECIBO,
                        fac_ingresos.CONSECUTIVO_RECIBO,
                        fac_ingresos.FECHA_RECIBO,
                        fac_ingresos.VALOR_RECIBO,
                        fac_ingresos.FORMAPAGO_RECIBO,
                        fac_ingresos.NUMTRANSACCION_RECIBO,
                        fac_ingresos.VENDEDOR_RECIBO,
                        fac_ingresos.CONCEPTO_RECIBO,
                        fac_ingresos.OBSERVACIONES_RECIBO,
                        fac_ingresos.CAJERO_RECIBO,

                        tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                        tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                        tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                        tbl_estudiantes.DIRECCION_ESTUDIANTE,
                        tbl_estudiantes.TELEFONO_ESTUDIANTE,
                        tbl_estudiantes.CIUDAD_ESTUDIANTE

                        from fac_ingresos left join tbl_estudiantes ON fac_ingresos.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos.CONSECUTIVO_RECIBO != '' and fac_ingresos.CLIENTE_RECIBO = '".$CLIENTE_RECIBO."'" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  


    function getDatosIngreso($ID_RECIBO) {

     $query = "select   fac_ingresos.ID_RECIBO, 
                        fac_ingresos.CLIENTE_RECIBO,
                        fac_ingresos.CONSECUTIVO_RECIBO,
                        fac_ingresos.FECHA_RECIBO,
                        fac_ingresos.VALOR_RECIBO,
                        fac_ingresos.VENDEDOR_RECIBO,
                        fac_ingresos.VENDEDOR_RECIBO,
                        fac_ingresos.FORMAPAGO_RECIBO,
                        fac_ingresos.NUMTRANSACCION_RECIBO,
                        fac_ingresos.CONCEPTO_RECIBO,
                        fac_ingresos.OBSERVACIONES_RECIBO,
                        fac_ingresos.CAJERO_RECIBO,

                        tbl_estudiantes.ID_ESTUDIANTE,                
                        tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                        tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                        tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                        tbl_estudiantes.DIRECCION_ESTUDIANTE,
                        tbl_estudiantes.TELEFONO_ESTUDIANTE,
                        tbl_estudiantes.CELULAR_ESTUDIANTE,
                        tbl_estudiantes.CORREO_ESTUDIANTE,
                        tbl_estudiantes.CIUDAD_ESTUDIANTE

                        from fac_ingresos left join tbl_estudiantes ON fac_ingresos.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos.ID_RECIBO = '".$ID_RECIBO."'";

        

         $consulta = $this->consulta($query);

        return $consulta[0];    

        

    }

    

    function getDatosIngreso2($FECHA_RECIBO, $CAJERO_RECIBO, $NUMTRANSACCION_RECIBO) {       

     $query = "select   fac_ingresos.ID_RECIBO

                        from fac_ingresos left join tbl_estudiantes ON fac_ingresos.CLIENTE_RECIBO = tbl_estudiantes.ID_ESTUDIANTE  

                        where fac_ingresos.FECHA_RECIBO = '".$FECHA_RECIBO."' AND  fac_ingresos.NUMTRANSACCION_RECIBO = '".$NUMTRANSACCION_RECIBO."' AND  fac_ingresos.CAJERO_RECIBO = '".$CAJERO_RECIBO."'";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['ID_RECIBO'];    

        

    }

    

    function insertarIngreso($TIPO_RECIBO) {

                

        $query = "INSERT INTO fac_ingresos (FECHA_RECIBO, TIPO_RECIBO)

		VALUES('".  date("Y-m-d")."', '".$TIPO_RECIBO."');";

       

        return $this->crear_ultimo_id($query);       

        

    }

    

    

    

    function guardarIngreso($FECHA_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $FORMAPAGO_RECIBO, $NUMTRANSACCION_RECIBO, $VALOR_RECIBO, $CONCEPTO_RECIBO, $OBSERVACIONES_RECIBO, $CONSECUTIVO_RECIBO, $CAJERO_RECIBO) {       

       $query = "INSERT fac_ingresos(FECHA_RECIBO, CLIENTE_RECIBO, VENDEDOR_RECIBO, FORMAPAGO_RECIBO, NUMTRANSACCION_RECIBO, VALOR_RECIBO, CONCEPTO_RECIBO, OBSERVACIONES_RECIBO, CONSECUTIVO_RECIBO, CAJERO_RECIBO) VALUES('".$FECHA_RECIBO."','".$CLIENTE_RECIBO."', '".utf8_decode($VENDEDOR_RECIBO)."', '".utf8_decode($FORMAPAGO_RECIBO)."', '".$NUMTRANSACCION_RECIBO."', '".$VALOR_RECIBO."', '".utf8_decode($CONCEPTO_RECIBO)."', '".utf8_decode($OBSERVACIONES_RECIBO)."', '".$CONSECUTIVO_RECIBO."', '".utf8_decode($CAJERO_RECIBO)."');";

       return $this->crear_ultimo_id($query);

    }

    


    function editarIngreso($ID_RECIBO, $FECHA_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $FORMAPAGO_RECIBO, $NUMTRANSACCION_RECIBO, $VALOR_RECIBO, $CONCEPTO_RECIBO, $OBSERVACIONES_RECIBO, $CAJERO_RECIBO) {


       $query = "UPDATE fac_ingresos  SET FECHA_RECIBO = '".utf8_decode($FECHA_RECIBO)."', CLIENTE_RECIBO = '".$CLIENTE_RECIBO."', VENDEDOR_RECIBO = '".utf8_decode($VENDEDOR_RECIBO)."', FORMAPAGO_RECIBO = '".$FORMAPAGO_RECIBO."', NUMTRANSACCION_RECIBO = '".$NUMTRANSACCION_RECIBO."', VALOR_RECIBO = '".$VALOR_RECIBO."', CONCEPTO_RECIBO = '".utf8_decode($CONCEPTO_RECIBO)."', OBSERVACIONES_RECIBO = '".utf8_decode($OBSERVACIONES_RECIBO)."', CAJERO_RECIBO = '".utf8_decode($CAJERO_RECIBO)."'

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    
    

    

    

    

    function editarValoresFacPedCot($ID_RECIBO, $SUBTOTAL_RECIBO, $DESCUENTO_RECIBO, $IMPUESTO19_RECIBO, $IMPUESTO5_RECIBO, $TOTAL_RECIBO) {

        

       $query = "UPDATE fac_ingresos  SET SUBTOTAL_RECIBO = '".utf8_decode($SUBTOTAL_RECIBO)."', DESCUENTO_RECIBO = '".utf8_decode($DESCUENTO_RECIBO)."', IMPUESTO19_RECIBO = '".utf8_decode($IMPUESTO19_RECIBO)."', IMPUESTO5_RECIBO = '".utf8_decode($IMPUESTO5_RECIBO)."', TOTAL_RECIBO = '".utf8_decode($TOTAL_RECIBO)."'

           

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    

    

    

    function editarPedido($ID_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $TERMINO_RECIBO, $SUBTOTAL_RECIBO, $DESCUENTO_RECIBO, $IMPUESTO19_RECIBO, $IMPUESTO5_RECIBO, $TOTAL_RECIBO, $DESCRIPCION_RECIBO, $FECHA_RECIBO, $VENCIMIENTO_RECIBO, $CONSECUTIVO2_RECIBO) {

        

       $query = "UPDATE fac_ingresos  SET CLIENTE_RECIBO = '".utf8_decode($CLIENTE_RECIBO)."', VENDEDOR_RECIBO = '".utf8_decode($VENDEDOR_RECIBO)."', TERMINO_RECIBO = '".utf8_decode($TERMINO_RECIBO)."', SUBTOTAL_RECIBO = '".utf8_decode($SUBTOTAL_RECIBO)."', DESCUENTO_RECIBO = '".utf8_decode($DESCUENTO_RECIBO)."', IMPUESTO19_RECIBO = '".utf8_decode($IMPUESTO19_RECIBO)."', IMPUESTO5_RECIBO = '".utf8_decode($IMPUESTO5_RECIBO)."', TOTAL_RECIBO = '".utf8_decode($TOTAL_RECIBO)."', DESCRIPCION_RECIBO = '".utf8_decode($DESCRIPCION_RECIBO)."', CONSECUTIVO2_RECIBO = '".$CONSECUTIVO2_RECIBO."', FECHA_RECIBO = '".$FECHA_RECIBO."', VENCIMIENTO_RECIBO = '".$VENCIMIENTO_RECIBO."'

           

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    

    

    

    function editarCotizacion($ID_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $TERMINO_RECIBO, $SUBTOTAL_RECIBO, $DESCUENTO_RECIBO, $IMPUESTO19_RECIBO, $IMPUESTO5_RECIBO, $TOTAL_RECIBO, $DESCRIPCION_RECIBO, $FECHA_RECIBO, $VENCIMIENTO_RECIBO, $CONSECUTIVO3_RECIBO) {

        

       $query = "UPDATE fac_ingresos  SET CLIENTE_RECIBO = '".utf8_decode($CLIENTE_RECIBO)."', VENDEDOR_RECIBO = '".utf8_decode($VENDEDOR_RECIBO)."', TERMINO_RECIBO = '".utf8_decode($TERMINO_RECIBO)."', SUBTOTAL_RECIBO = '".utf8_decode($SUBTOTAL_RECIBO)."', DESCUENTO_RECIBO = '".utf8_decode($DESCUENTO_RECIBO)."', IMPUESTO19_RECIBO = '".utf8_decode($IMPUESTO19_RECIBO)."', IMPUESTO5_RECIBO = '".utf8_decode($IMPUESTO5_RECIBO)."', TOTAL_RECIBO = '".utf8_decode($TOTAL_RECIBO)."', DESCRIPCION_RECIBO = '".utf8_decode($DESCRIPCION_RECIBO)."', CONSECUTIVO3_RECIBO = '".$CONSECUTIVO3_RECIBO."', FECHA_RECIBO = '".$FECHA_RECIBO."', VENCIMIENTO_RECIBO = '".$VENCIMIENTO_RECIBO."'

           

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    function editarDevolucion($ID_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $TERMINO_RECIBO, $SUBTOTAL_RECIBO, $DESCUENTO_RECIBO, $IMPUESTO19_RECIBO, $IMPUESTO5_RECIBO, $TOTAL_RECIBO, $DESCRIPCION_RECIBO, $FECHA_RECIBO, $VENCIMIENTO_RECIBO, $CONSECUTIVO4_RECIBO) {

        

       $query = "UPDATE fac_ingresos  SET CLIENTE_RECIBO = '".utf8_decode($CLIENTE_RECIBO)."', VENDEDOR_RECIBO = '".utf8_decode($VENDEDOR_RECIBO)."', TERMINO_RECIBO = '".utf8_decode($TERMINO_RECIBO)."', SUBTOTAL_RECIBO = '".utf8_decode($SUBTOTAL_RECIBO)."', DESCUENTO_RECIBO = '".utf8_decode($DESCUENTO_RECIBO)."', IMPUESTO19_RECIBO = '".utf8_decode($IMPUESTO19_RECIBO)."', IMPUESTO5_RECIBO = '".utf8_decode($IMPUESTO5_RECIBO)."', TOTAL_RECIBO = '".utf8_decode($TOTAL_RECIBO)."', DESCRIPCION_RECIBO = '".utf8_decode($DESCRIPCION_RECIBO)."', CONSECUTIVO4_RECIBO = '".$CONSECUTIVO4_RECIBO."', FECHA_RECIBO = '".$FECHA_RECIBO."', VENCIMIENTO_RECIBO = '".$VENCIMIENTO_RECIBO."'

           

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    



    

    

    function editarFacPedCot($ID_RECIBO, $CLIENTE_RECIBO, $VENDEDOR_RECIBO, $TERMINO_RECIBO, $DESCRIPCION_RECIBO, $FECHA_RECIBO, $VENCIMIENTO_RECIBO) {

        

       $query = "UPDATE fac_ingresos  SET CLIENTE_RECIBO = '".utf8_decode($CLIENTE_RECIBO)."', VENDEDOR_RECIBO = '".utf8_decode($VENDEDOR_RECIBO)."', TERMINO_RECIBO = '".utf8_decode($TERMINO_RECIBO)."', DESCRIPCION_RECIBO = '".utf8_decode($DESCRIPCION_RECIBO)."', FECHA_RECIBO = '".$FECHA_RECIBO."', VENCIMIENTO_RECIBO = '".$VENCIMIENTO_RECIBO."'

           

        WHERE ID_RECIBO = '" . $ID_RECIBO . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    

    

    function eliminarIngreso($ID_RECIBO) {

        $query = "DELETE FROM fac_ingresos WHERE ID_RECIBO = '". $ID_RECIBO ."'";
        $this->modificarRegistros($query);

    }

    

    

    

    function insertarProducto($RECIBO_FACPRO, $PRODUCTO_FACPRO, $CANTIDAD_FACPRO, $PRECIOUNITARIO_FACPRO, $SUBTOTAL_FACPRO, $DESCUENTO_FACPRO, $IMPUESTO_FACPRO, $TOTAL_FACPRO) {

                

        $query = "INSERT INTO fac_productos (RECIBO_FACPRO, PRODUCTO_FACPRO, CANTIDAD_FACPRO, PRECIOUNITARIO_FACPRO, SUBTOTAL_FACPRO, DESCUENTO_FACPRO, IMPUESTO_FACPRO, TOTAL_FACPRO)

		VALUES('".$RECIBO_FACPRO."','".$PRODUCTO_FACPRO."','".$CANTIDAD_FACPRO."','".$PRECIOUNITARIO_FACPRO."','".$SUBTOTAL_FACPRO."','".$DESCUENTO_FACPRO."','".$IMPUESTO_FACPRO."','".$TOTAL_FACPRO."');";

       

        return $this->crear_ultimo_id($query);       

        

    }

    

    

    

    

    //////////

    

    

    

    function getProductosPorIngreso($RECIBO_FACPRO) {

        

     $query = "select 	



                fac_productos.ID_FACPRO,

                fac_productos.RECIBO_FACPRO,

                fac_productos.PRODUCTO_FACPRO,

                fac_productos.CANTIDAD_FACPRO,

                fac_productos.PRECIOUNITARIO_FACPRO,

                fac_productos.DESCUENTO_FACPRO,

                fac_productos.IMPUESTO_FACPRO,

                fac_productos.SUBTOTAL_FACPRO,

                fac_productos.TOTAL_FACPRO,



		fac_ingresos.ID_RECIBO, 

                fac_ingresos.CLIENTE_RECIBO,

                fac_ingresos.CONSECUTIVO_RECIBO,

                fac_ingresos.CONSECUTIVO2_RECIBO,

                fac_ingresos.CONSECUTIVO3_RECIBO,

                fac_ingresos.TIPO_RECIBO,

                fac_ingresos.FECHA_RECIBO,

                fac_ingresos.VENDEDOR_RECIBO,

                fac_ingresos.TERMINO_RECIBO,

                fac_ingresos.SUBTOTAL_RECIBO,

                fac_ingresos.DESCUENTO_RECIBO,

                

                fac_ingresos.IMPUESTO5_RECIBO,

                fac_ingresos.IMPUESTO19_RECIBO,

                fac_ingresos.TOTAL_RECIBO,

                fac_ingresos.DESCRIPCION_RECIBO,

                

                pro_productos.ID_PRODUCTO, 

                pro_productos.CODIGO_PRODUCTO,

                pro_productos.NOMBRE_PRODUCTO,

                pro_productos.INICIAL_PRODUCTO,

                pro_productos.ACTUAL_PRODUCTO

                

                from fac_productos left join fac_ingresos ON fac_productos.RECIBO_FACPRO = fac_ingresos.ID_RECIBO

                

                left join pro_productos ON fac_productos.PRODUCTO_FACPRO = pro_productos.ID_PRODUCTO

                    

                WHERE fac_productos.RECIBO_FACPRO = '".$RECIBO_FACPRO."'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

    

    

    

    function getConsecutivo() {

     $query = "select MAX(fac_ingresos.CONSECUTIVO_RECIBO) as mayor

                from fac_ingresos";

         $consulta = $this->consulta($query);
        return $consulta[0]['mayor'];    

        

    }

    

    function getConsecutivo2() {

       

     $query = "select MAX(fac_ingresos.CONSECUTIVO2_RECIBO) as mayor

                

                from fac_ingresos";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

    

    function getConsecutivo3() {

       

     $query = "select MAX(fac_ingresos.CONSECUTIVO3_RECIBO) as mayor

                

                from fac_ingresos";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

        

    function getConsecutivo4() {

       

     $query = "select MAX(fac_ingresos.CONSECUTIVO4_RECIBO) as mayor

                

                from fac_ingresos";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

    

    

    

}



?>



