<?php

class FacturasModel extends ModelBase {  

    function getTodosFacturas() {        

        $query = "select 	

		        fac_facturas.ID_FACTURA, 
                fac_facturas.CLIENTE_FACTURA,
                fac_facturas.TIPO_FACTURA,                
                fac_facturas.TIPOPAGO_FACTURA,
                fac_facturas.CONSECUTIVO_FACTURA,
                fac_facturas.FECHA_FACTURA,         
                fac_facturas.VENCIMIENTO_FACTURA,
                fac_facturas.VENDEDOR_FACTURA,
                fac_facturas.TERMINO_FACTURA,                

                fac_facturas.SUBTOTAL_FACTURA,
                fac_facturas.DESCUENTO_FACTURA,
                fac_facturas.IMPUESTO19_FACTURA,
                fac_facturas.IMPUESTO5_FACTURA,
                fac_facturas.TOTAL_FACTURA,
                fac_facturas.DESCRIPCION_FACTURA,                

                tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                tbl_estudiantes.DIRECCION_ESTUDIANTE,
                tbl_estudiantes.TELEFONO_ESTUDIANTE,
                tbl_estudiantes.CIUDAD_ESTUDIANTE                

                from fac_facturas left join tbl_estudiantes ON fac_facturas.CLIENTE_FACTURA = tbl_estudiantes.ID_ESTUDIANTE  

                where fac_facturas.CONSECUTIVO_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'FACTURAS'
            
                order by fac_facturas.CONSECUTIVO_FACTURA" ;

                $consulta = $this->consulta($query);

                return $consulta;       

               

    }  
   
    
    
    
    function getFacturasVencidas() {       

        $query = "select 	

		fac_facturas.ID_FACTURA, 
                fac_facturas.CLIENTE_FACTURA,
                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,
                fac_facturas.CONSECUTIVO_FACTURA,
                fac_facturas.CONSECUTIVO2_FACTURA,
                fac_facturas.CONSECUTIVO3_FACTURA,
                fac_facturas.CONSECUTIVO4_FACTURA,
                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,
                fac_facturas.VENCIMIENTO_FACTURA,
                fac_facturas.VENDEDOR_FACTURA,
                fac_facturas.TERMINO_FACTURA, 
                fac_facturas.SUBTOTAL_FACTURA,
                fac_facturas.DESCUENTO_FACTURA,
                fac_facturas.IMPUESTO19_FACTURA,
                fac_facturas.IMPUESTO5_FACTURA,
                fac_facturas.TOTAL_FACTURA,
                fac_facturas.DESCRIPCION_FACTURA,                

                tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                tbl_estudiantes.DIRECCION_ESTUDIANTE,
                tbl_estudiantes.TELEFONO_ESTUDIANTE,
                tbl_estudiantes.CIUDAD_ESTUDIANTE

                from fac_facturas left join tbl_estudiantes ON fac_facturas.CLIENTE_FACTURA = tbl_estudiantes.ID_ESTUDIANTE  

                where fac_facturas.CONSECUTIVO_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'FACTURAS'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }

    
    
    
    function getGastosPorProducto($PRODUCTO_FACPRO) {

     $query = "select sum(fac_productos.TOTAL_FACPRO) as total
         
                from fac_productos LEFT JOIN fac_facturas ON fac_productos.FACTURA_FACPRO = fac_facturas.ID_FACTURA

                where fac_facturas.CONSECUTIVO_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'FACTURAS' and fac_productos.PRODUCTO_FACPRO = '".$PRODUCTO_FACPRO."'" ;

                $consulta = $this->consulta($query);

               return $consulta[0]['total']; 

    }  

    
    function TotalFacturadoPorMes($MES) {

     $query = "select sum(fac_facturas.TOTAL_FACTURA) as total
         
                from fac_facturas

                where fac_facturas.CONSECUTIVO_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'FACTURAS' AND substr(FECHA_FACTURA,6,2) = '".$MES."'" ;

                $consulta = $this->consulta($query);

               return $consulta[0]['total']; 

    }  

    function getFacturasPorCliente($CLIENTE_FACTURA) {

     $query = "select 	
		fac_facturas.ID_FACTURA, 
                fac_facturas.CLIENTE_FACTURA,
                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,
                fac_facturas.CONSECUTIVO_FACTURA,
                fac_facturas.CONSECUTIVO2_FACTURA,
                fac_facturas.CONSECUTIVO3_FACTURA,
                fac_facturas.CONSECUTIVO4_FACTURA,
                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,
                fac_facturas.VENCIMIENTO_FACTURA,
                fac_facturas.VENDEDOR_FACTURA,
                fac_facturas.TERMINO_FACTURA,     
                fac_facturas.SUBTOTAL_FACTURA,
                fac_facturas.DESCUENTO_FACTURA,
                fac_facturas.IMPUESTO19_FACTURA,
                fac_facturas.IMPUESTO5_FACTURA,
                fac_facturas.TOTAL_FACTURA,
                fac_facturas.DESCRIPCION_FACTURA,
                

                tbl_estudiantes.NOMBRES_ESTUDIANTE,                
                tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                tbl_estudiantes.DOCUMENTO_ESTUDIANTE,
                tbl_estudiantes.DIRECCION_ESTUDIANTE,
                tbl_estudiantes.TELEFONO_ESTUDIANTE,
                tbl_estudiantes.CIUDAD_ESTUDIANTE                

                from fac_facturas left join tbl_estudiantes ON fac_facturas.CLIENTE_FACTURA = tbl_estudiantes.ID_ESTUDIANTE  

                where fac_facturas.CONSECUTIVO_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'FACTURAS' AND fac_facturas.CLIENTE_FACTURA = '".$CLIENTE_FACTURA."'
            
             order by fac_facturas.CONSECUTIVO_FACTURA" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

  

    function getTodosPedidos() {

        

     $query = "select 	

		fac_facturas.ID_FACTURA, 

                fac_facturas.CLIENTE_FACTURA,

                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,

                fac_facturas.CONSECUTIVO_FACTURA,

                fac_facturas.CONSECUTIVO2_FACTURA,

                fac_facturas.CONSECUTIVO3_FACTURA,

                fac_facturas.CONSECUTIVO4_FACTURA,

                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,

                fac_facturas.VENDEDOR_FACTURA,

                

                fac_facturas.TERMINO_FACTURA,

                fac_facturas.SUBTOTAL_FACTURA,

                fac_facturas.IMPUESTO19_FACTURA,

                fac_facturas.IMPUESTO5_FACTURA,

                fac_facturas.DESCUENTO_FACTURA,

                fac_facturas.TOTAL_FACTURA,

                fac_facturas.DESCRIPCION_FACTURA,

                

                usu_clientes.NOMBRE_CLIENTE,

                usu_clientes.DOCUMENTO_CLIENTE,

                usu_clientes.DIRECCION1_CLIENTE,

                usu_clientes.TELEFONO_CLIENTE,

                usu_clientes.CIUDAD_CLIENTE,

                

                usu_vendedores.NOMBRE_VENDEDOR,

                usu_vendedores.DOCUMENTO_VENDEDOR,

                usu_vendedores.DIRECCION1_VENDEDOR,

                usu_vendedores.TELEFONO_VENDEDOR,

                usu_vendedores.CIUDAD_VENDEDOR

                

                from fac_facturas left join usu_clientes ON fac_facturas.CLIENTE_FACTURA = usu_clientes.ID_CLIENTE

                 left join usu_vendedores ON fac_facturas.VENDEDOR_FACTURA = usu_vendedores.ID_VENDEDOR

                

                where fac_facturas.CONSECUTIVO2_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'PEDIDOS'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

    

    function getTodosCotizaciones() {

        

     $query = "select 	

		fac_facturas.ID_FACTURA, 

                fac_facturas.CLIENTE_FACTURA,

                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,

                fac_facturas.CONSECUTIVO_FACTURA,

                fac_facturas.CONSECUTIVO2_FACTURA,

                fac_facturas.CONSECUTIVO3_FACTURA,

                fac_facturas.CONSECUTIVO4_FACTURA,

                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,

                fac_facturas.VENDEDOR_FACTURA,

                

                fac_facturas.TERMINO_FACTURA,

                fac_facturas.SUBTOTAL_FACTURA,

                fac_facturas.IMPUESTO19_FACTURA,

                fac_facturas.IMPUESTO5_FACTURA,

                fac_facturas.DESCUENTO_FACTURA,

                fac_facturas.TOTAL_FACTURA,

                fac_facturas.DESCRIPCION_FACTURA,

                

                usu_clientes.NOMBRE_CLIENTE,

                usu_clientes.DOCUMENTO_CLIENTE,

                usu_clientes.DIRECCION1_CLIENTE,

                usu_clientes.TELEFONO_CLIENTE,

                usu_clientes.CIUDAD_CLIENTE,

                

                usu_vendedores.NOMBRE_VENDEDOR,

                usu_vendedores.DOCUMENTO_VENDEDOR,

                usu_vendedores.DIRECCION1_VENDEDOR,

                usu_vendedores.TELEFONO_VENDEDOR,

                usu_vendedores.CIUDAD_VENDEDOR

                

                from fac_facturas left join usu_clientes ON fac_facturas.CLIENTE_FACTURA = usu_clientes.ID_CLIENTE

                 left join usu_vendedores ON fac_facturas.VENDEDOR_FACTURA = usu_vendedores.ID_VENDEDOR

                

                where fac_facturas.CONSECUTIVO3_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'COTIZACIONES'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

      

    function getTodosDevoluciones() {

        

     $query = "select 	

		fac_facturas.ID_FACTURA, 

                fac_facturas.CLIENTE_FACTURA,

                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,

                fac_facturas.CONSECUTIVO_FACTURA,

                fac_facturas.CONSECUTIVO2_FACTURA,

                fac_facturas.CONSECUTIVO3_FACTURA,

                fac_facturas.CONSECUTIVO4_FACTURA,

                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,

                fac_facturas.VENDEDOR_FACTURA,

                

                fac_facturas.TERMINO_FACTURA,

                fac_facturas.SUBTOTAL_FACTURA,

                fac_facturas.IMPUESTO19_FACTURA,

                fac_facturas.IMPUESTO5_FACTURA,

                fac_facturas.DESCUENTO_FACTURA,

                fac_facturas.TOTAL_FACTURA,

                fac_facturas.DESCRIPCION_FACTURA,

                

                usu_clientes.NOMBRE_CLIENTE,

                usu_clientes.DOCUMENTO_CLIENTE,

                usu_clientes.DIRECCION1_CLIENTE,

                usu_clientes.TELEFONO_CLIENTE,

                usu_clientes.CIUDAD_CLIENTE,

                

                usu_vendedores.NOMBRE_VENDEDOR,

                usu_vendedores.DOCUMENTO_VENDEDOR,

                usu_vendedores.DIRECCION1_VENDEDOR,

                usu_vendedores.TELEFONO_VENDEDOR,

                usu_vendedores.CIUDAD_VENDEDOR

                

                from fac_facturas left join usu_clientes ON fac_facturas.CLIENTE_FACTURA = usu_clientes.ID_CLIENTE

                 left join usu_vendedores ON fac_facturas.VENDEDOR_FACTURA = usu_vendedores.ID_VENDEDOR

                

                where fac_facturas.CONSECUTIVO4_FACTURA != '' AND fac_facturas.TIPO_FACTURA = 'DEVOLUCIONES'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

  

    

    

    

    

    

    

    function getDatosFactura($ID_FACTURA) {

       

     $query = "select 	

		fac_facturas.ID_FACTURA, 

                fac_facturas.CLIENTE_FACTURA,

                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,

                fac_facturas.CONSECUTIVO_FACTURA,

                fac_facturas.CONSECUTIVO2_FACTURA,

                fac_facturas.CONSECUTIVO3_FACTURA,

                fac_facturas.CONSECUTIVO4_FACTURA,

                fac_facturas.FECHA_FACTURA,
                fac_facturas.FECHA2_FACTURA,

                fac_facturas.VENCIMIENTO_FACTURA,

                fac_facturas.VENDEDOR_FACTURA,

                fac_facturas.TERMINO_FACTURA,

                

                fac_facturas.SUBTOTAL_FACTURA,

                fac_facturas.DESCUENTO_FACTURA,

                fac_facturas.IMPUESTO19_FACTURA,

                fac_facturas.IMPUESTO5_FACTURA,

                fac_facturas.TOTAL_FACTURA,

                fac_facturas.DESCRIPCION_FACTURA,

                

                tbl_estudiantes.NOMBRES_ESTUDIANTE,
                
                tbl_estudiantes.APELLIDOS_ESTUDIANTE,

                tbl_estudiantes.DOCUMENTO_ESTUDIANTE,

                tbl_estudiantes.DIRECCION_ESTUDIANTE,

                tbl_estudiantes.TELEFONO_ESTUDIANTE,
                
                tbl_estudiantes.CELULAR_ESTUDIANTE,
                
                tbl_estudiantes.CORREO_ESTUDIANTE,

                tbl_estudiantes.CIUDAD_ESTUDIANTE

                

                from fac_facturas left join tbl_estudiantes ON fac_facturas.CLIENTE_FACTURA = tbl_estudiantes.ID_ESTUDIANTE   

                where fac_facturas.ID_FACTURA='".$ID_FACTURA."'";

        

         $consulta = $this->consulta($query);

        return $consulta[0];    

        

    }

    
    function getInscripcionActualPorEstudiante($ID_ESTUDIANTE){
        
       $query = "select 	
                    tbl_inscripciones.ID_INSCRIPCION,  
                    tbl_inscripciones.CODIGO_ADMISION,
                    tbl_inscripciones.ESTUDIANTE_ADMISION,
                    tbl_inscripciones.ACUDIENTE_ADMISION,
                    tbl_inscripciones.VALOR_ADMISION,
                    tbl_inscripciones.GRUPO_ADMISION,
                    tbl_inscripciones.ACADEMICA_ADMISION,
                    tbl_inscripciones.FECHA_ADMISION,
                    tbl_inscripciones.NOVEDAD_ADMISION,
                    tbl_inscripciones.POLIZA_ADMISION,
                    tbl_inscripciones.SEGURO_ADMISION,
                    tbl_inscripciones.ESTADO_ADMISION,
                    tbl_estudiantes.ID_ESTUDIANTE,
                    tbl_estudiantes.NOMBRES_ESTUDIANTE,
                    tbl_estudiantes.APELLIDOS_ESTUDIANTE,
                    
                    tbl_inscripciones.FECHAAOCL_ADMISION,
                    tbl_inscripciones.FECHAACTA_ADMISION, 
                 
                    tbl_acudientes.ID_ACUDIENTE,
                    tbl_acudientes.NOMBRES_ACUDIENTE,
                    tbl_acudientes.APELLIDOS_ACUDIENTE,

                    tbl_programas.ID_PROGRAMA,
                    tbl_programas.NOMBRE_PROGRAMA,
                    tbl_programas.CODIGO_PROGRAMA,
                
                tbl_grupos.ID_GRUPO,
                tbl_grupos.CODIGO_GRUPO,
                tbl_grupos.ANO_GRUPO,
                tbl_grupos.SEMESTRE_GRUPO,
                tbl_grupos.HORARIOINICIO_GRUPO,
                tbl_grupos.HORARIOFIN_GRUPO,
                tbl_grupos.CUOTAS_GRUPO,
                tbl_grupos.PROGRAMA_GRUPO,
                tbl_grupos.FECHAINICIO_GRUPO,
                tbl_grupos.FECHAFIN_GRUPO                
                
			from tbl_inscripciones LEFT JOIN tbl_estudiantes on tbl_inscripciones.ESTUDIANTE_ADMISION = tbl_estudiantes.ID_ESTUDIANTE LEFT JOIN tbl_acudientes ON tbl_inscripciones.ACUDIENTE_ADMISION = tbl_acudientes.ID_ACUDIENTE LEFT JOIN tbl_grupos ON tbl_inscripciones.GRUPO_ADMISION = tbl_grupos.ID_GRUPO LEFT JOIN tbl_programas ON tbl_grupos.PROGRAMA_GRUPO = tbl_programas.ID_PROGRAMA
            
			where tbl_inscripciones.ESTUDIANTE_ADMISION = '".$ID_ESTUDIANTE."' order by tbl_inscripciones.ID_INSCRIPCION desc LIMIT 1 " ;
            
        $consulta = $this->consulta($query);
        return $consulta[0];
        
    }
    
    

    function insertarFactura($TIPO_FACTURA) {

                

        $query = "INSERT INTO fac_facturas (FECHA_FACTURA, TIPO_FACTURA)

		VALUES('".  date("Y-m-d")."', '".$TIPO_FACTURA."');";

       

        return $this->crear_ultimo_id($query);       

        

    }

    

    

    

    function editarFactura($ID_FACTURA, $VENDEDOR_FACTURA, $CLIENTE_FACTURA, $TERMINO_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $FECHA2_FACTURA, $VENCIMIENTO_FACTURA, $TIPOPAGO_FACTURA, $CONSECUTIVO_FACTURA) {

       $query = "UPDATE fac_facturas  SET CLIENTE_FACTURA = '".utf8_decode($CLIENTE_FACTURA)."', VENDEDOR_FACTURA = '".utf8_decode($VENDEDOR_FACTURA)."', TERMINO_FACTURA = '".utf8_decode($TERMINO_FACTURA)."', SUBTOTAL_FACTURA = '".utf8_decode($SUBTOTAL_FACTURA)."', DESCUENTO_FACTURA = '".utf8_decode($DESCUENTO_FACTURA)."', IMPUESTO19_FACTURA = '".utf8_decode($IMPUESTO19_FACTURA)."', IMPUESTO5_FACTURA = '".utf8_decode($IMPUESTO5_FACTURA)."', TOTAL_FACTURA = '".utf8_decode($TOTAL_FACTURA)."', DESCRIPCION_FACTURA = '".utf8_decode($DESCRIPCION_FACTURA)."', CONSECUTIVO_FACTURA = '".$CONSECUTIVO_FACTURA."', FECHA_FACTURA = '".$FECHA_FACTURA."', FECHA2_FACTURA = '".$FECHA2_FACTURA."', VENCIMIENTO_FACTURA = '".$VENCIMIENTO_FACTURA."', TIPOPAGO_FACTURA = '".$TIPOPAGO_FACTURA."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    function convertirFactura($CLIENTE_FACTURA, $VENDEDOR_FACTURA, $TERMINO_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $VENCIMIENTO_FACTURA, $CONSECUTIVO_FACTURA) {

        

       $query = "INSERT fac_facturas(CLIENTE_FACTURA, VENDEDOR_FACTURA, TERMINO_FACTURA, SUBTOTAL_FACTURA, DESCUENTO_FACTURA, IMPUESTO19_FACTURA, IMPUESTO5_FACTURA, TOTAL_FACTURA, DESCRIPCION_FACTURA, FECHA_FACTURA, VENCIMIENTO_FACTURA, CONSECUTIVO_FACTURA) VALUES('".$CLIENTE_FACTURA."', '".utf8_decode($VENDEDOR_FACTURA)."', '".utf8_decode($TERMINO_FACTURA)."', '".$SUBTOTAL_FACTURA."', '".$DESCUENTO_FACTURA."', '".$IMPUESTO19_FACTURA."', '".$IMPUESTO5_FACTURA."', '".$TOTAL_FACTURA."', '".utf8_decode($DESCRIPCION_FACTURA)."', '".$FECHA_FACTURA."', '".$VENCIMIENTO_FACTURA."', '".$CONSECUTIVO_FACTURA."');";

       

       return $this->crear_ultimo_id($query);

       

    }

    

    

    

    

    

    function editarValoresFacPedCot($ID_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA) {

        

       $query = "UPDATE fac_facturas  SET SUBTOTAL_FACTURA = '".utf8_decode($SUBTOTAL_FACTURA)."', DESCUENTO_FACTURA = '".utf8_decode($DESCUENTO_FACTURA)."', IMPUESTO19_FACTURA = '".utf8_decode($IMPUESTO19_FACTURA)."', IMPUESTO5_FACTURA = '".utf8_decode($IMPUESTO5_FACTURA)."', TOTAL_FACTURA = '".utf8_decode($TOTAL_FACTURA)."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    

    

    

    function editarPedido($ID_FACTURA, $CLIENTE_FACTURA, $VENDEDOR_FACTURA, $TERMINO_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $VENCIMIENTO_FACTURA, $CONSECUTIVO2_FACTURA) {

        

       $query = "UPDATE fac_facturas  SET CLIENTE_FACTURA = '".utf8_decode($CLIENTE_FACTURA)."', VENDEDOR_FACTURA = '".utf8_decode($VENDEDOR_FACTURA)."', TERMINO_FACTURA = '".utf8_decode($TERMINO_FACTURA)."', SUBTOTAL_FACTURA = '".utf8_decode($SUBTOTAL_FACTURA)."', DESCUENTO_FACTURA = '".utf8_decode($DESCUENTO_FACTURA)."', IMPUESTO19_FACTURA = '".utf8_decode($IMPUESTO19_FACTURA)."', IMPUESTO5_FACTURA = '".utf8_decode($IMPUESTO5_FACTURA)."', TOTAL_FACTURA = '".utf8_decode($TOTAL_FACTURA)."', DESCRIPCION_FACTURA = '".utf8_decode($DESCRIPCION_FACTURA)."', CONSECUTIVO2_FACTURA = '".$CONSECUTIVO2_FACTURA."', FECHA_FACTURA = '".$FECHA_FACTURA."', VENCIMIENTO_FACTURA = '".$VENCIMIENTO_FACTURA."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    

    

    

    function editarCotizacion($ID_FACTURA, $CLIENTE_FACTURA, $VENDEDOR_FACTURA, $TERMINO_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $VENCIMIENTO_FACTURA, $CONSECUTIVO3_FACTURA) {

        

       $query = "UPDATE fac_facturas  SET CLIENTE_FACTURA = '".utf8_decode($CLIENTE_FACTURA)."', VENDEDOR_FACTURA = '".utf8_decode($VENDEDOR_FACTURA)."', TERMINO_FACTURA = '".utf8_decode($TERMINO_FACTURA)."', SUBTOTAL_FACTURA = '".utf8_decode($SUBTOTAL_FACTURA)."', DESCUENTO_FACTURA = '".utf8_decode($DESCUENTO_FACTURA)."', IMPUESTO19_FACTURA = '".utf8_decode($IMPUESTO19_FACTURA)."', IMPUESTO5_FACTURA = '".utf8_decode($IMPUESTO5_FACTURA)."', TOTAL_FACTURA = '".utf8_decode($TOTAL_FACTURA)."', DESCRIPCION_FACTURA = '".utf8_decode($DESCRIPCION_FACTURA)."', CONSECUTIVO3_FACTURA = '".$CONSECUTIVO3_FACTURA."', FECHA_FACTURA = '".$FECHA_FACTURA."', VENCIMIENTO_FACTURA = '".$VENCIMIENTO_FACTURA."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }

    

    function editarDevolucion($ID_FACTURA, $CLIENTE_FACTURA, $VENDEDOR_FACTURA, $TERMINO_FACTURA, $SUBTOTAL_FACTURA, $DESCUENTO_FACTURA, $IMPUESTO19_FACTURA, $IMPUESTO5_FACTURA, $TOTAL_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $VENCIMIENTO_FACTURA, $CONSECUTIVO4_FACTURA) {

        

       $query = "UPDATE fac_facturas  SET CLIENTE_FACTURA = '".utf8_decode($CLIENTE_FACTURA)."', VENDEDOR_FACTURA = '".utf8_decode($VENDEDOR_FACTURA)."', TERMINO_FACTURA = '".utf8_decode($TERMINO_FACTURA)."', SUBTOTAL_FACTURA = '".utf8_decode($SUBTOTAL_FACTURA)."', DESCUENTO_FACTURA = '".utf8_decode($DESCUENTO_FACTURA)."', IMPUESTO19_FACTURA = '".utf8_decode($IMPUESTO19_FACTURA)."', IMPUESTO5_FACTURA = '".utf8_decode($IMPUESTO5_FACTURA)."', TOTAL_FACTURA = '".utf8_decode($TOTAL_FACTURA)."', DESCRIPCION_FACTURA = '".utf8_decode($DESCRIPCION_FACTURA)."', CONSECUTIVO4_FACTURA = '".$CONSECUTIVO4_FACTURA."', FECHA_FACTURA = '".$FECHA_FACTURA."', VENCIMIENTO_FACTURA = '".$VENCIMIENTO_FACTURA."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }

    



    

    

    function editarFacPedCot($ID_FACTURA, $CLIENTE_FACTURA, $VENDEDOR_FACTURA, $TERMINO_FACTURA, $DESCRIPCION_FACTURA, $FECHA_FACTURA, $FECHA2_FACTURA, $VENCIMIENTO_FACTURA, $TIPOPAGO_FACTURA) {

        

       $query = "UPDATE fac_facturas  SET CLIENTE_FACTURA = '".utf8_decode($CLIENTE_FACTURA)."', VENDEDOR_FACTURA = '".utf8_decode($VENDEDOR_FACTURA)."', TERMINO_FACTURA = '".utf8_decode($TERMINO_FACTURA)."', DESCRIPCION_FACTURA = '".utf8_decode($DESCRIPCION_FACTURA)."', FECHA_FACTURA = '".$FECHA_FACTURA."', FECHA2_FACTURA = '".$FECHA2_FACTURA."', VENCIMIENTO_FACTURA = '".$VENCIMIENTO_FACTURA."', TIPOPAGO_FACTURA = '".$TIPOPAGO_FACTURA."'

           

        WHERE ID_FACTURA = '" . $ID_FACTURA . "'";

       

       return $this->modificarRegistros($query);

       

    }


    function eliminarFactura($ID_FACTURA) {

        $query = "DELETE FROM fac_facturas WHERE ID_FACTURA = '". $ID_FACTURA ."'";
        $this->modificarRegistros($query);

    }

    function eliminarProducto($ID_FACPRO) {        

        $query = "DELETE FROM fac_productos WHERE ID_FACPRO = '". $ID_FACPRO ."'";
        $this->modificarRegistros($query);

    }

    

    

    function insertarProducto($FACTURA_FACPRO, $PRODUCTO_FACPRO, $CANTIDAD_FACPRO, $PRECIOUNITARIO_FACPRO, $SUBTOTAL_FACPRO, $DESCUENTO_FACPRO, $IMPUESTO_FACPRO, $TOTAL_FACPRO) {

                

        $query = "INSERT INTO fac_productos (FACTURA_FACPRO, PRODUCTO_FACPRO, CANTIDAD_FACPRO, PRECIOUNITARIO_FACPRO, SUBTOTAL_FACPRO, DESCUENTO_FACPRO, IMPUESTO_FACPRO, TOTAL_FACPRO)

		VALUES('".$FACTURA_FACPRO."','".$PRODUCTO_FACPRO."','".$CANTIDAD_FACPRO."','".$PRECIOUNITARIO_FACPRO."','".$SUBTOTAL_FACPRO."','".$DESCUENTO_FACPRO."','".$IMPUESTO_FACPRO."','".$TOTAL_FACPRO."');";

       

        return $this->crear_ultimo_id($query);       

        

    }

    

    

    

    

    //////////

    

    

    

    function getProductosPorFactura($FACTURA_FACPRO) {

        

     $query = "select 	



                fac_productos.ID_FACPRO,

                fac_productos.FACTURA_FACPRO,

                fac_productos.PRODUCTO_FACPRO,

                fac_productos.CANTIDAD_FACPRO,

                fac_productos.PRECIOUNITARIO_FACPRO,

                fac_productos.DESCUENTO_FACPRO,

                fac_productos.IMPUESTO_FACPRO,

                fac_productos.SUBTOTAL_FACPRO,

                fac_productos.TOTAL_FACPRO,



		      fac_facturas.ID_FACTURA, 

                fac_facturas.CLIENTE_FACTURA,

                fac_facturas.CONSECUTIVO_FACTURA,

                fac_facturas.CONSECUTIVO2_FACTURA,

                fac_facturas.CONSECUTIVO3_FACTURA,

                fac_facturas.TIPO_FACTURA,
                
                fac_facturas.TIPOPAGO_FACTURA,

                fac_facturas.FECHA_FACTURA,
                
                fac_facturas.FECHA2_FACTURA,

                fac_facturas.VENDEDOR_FACTURA,

                fac_facturas.TERMINO_FACTURA,

                fac_facturas.SUBTOTAL_FACTURA,

                fac_facturas.DESCUENTO_FACTURA,

                

                fac_facturas.IMPUESTO5_FACTURA,

                fac_facturas.IMPUESTO19_FACTURA,

                fac_facturas.TOTAL_FACTURA,

                fac_facturas.DESCRIPCION_FACTURA,

                

                pro_productos.ID_PRODUCTO, 

                pro_productos.CODIGO_PRODUCTO,

                pro_productos.NOMBRE_PRODUCTO,

                pro_productos.INICIAL_PRODUCTO,

                pro_productos.ACTUAL_PRODUCTO

                

                from fac_productos left join fac_facturas ON fac_productos.FACTURA_FACPRO = fac_facturas.ID_FACTURA

                

                left join pro_productos ON fac_productos.PRODUCTO_FACPRO = pro_productos.ID_PRODUCTO

                    

                WHERE fac_productos.FACTURA_FACPRO = '".$FACTURA_FACPRO."'" ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

    

    

    

    function getConsecutivo() {

     $query = "select MAX(fac_facturas.CONSECUTIVO_FACTURA) as mayor

                from fac_facturas";

         $consulta = $this->consulta($query);
        return $consulta[0]['mayor'];    

    }

    

    function getConsecutivo2() {

       

     $query = "select MAX(fac_facturas.CONSECUTIVO2_FACTURA) as mayor

                

                from fac_facturas";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

    

    function getConsecutivo3() {

       

     $query = "select MAX(fac_facturas.CONSECUTIVO3_FACTURA) as mayor

                

                from fac_facturas";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

        

    function getConsecutivo4() {

       

     $query = "select MAX(fac_facturas.CONSECUTIVO4_FACTURA) as mayor

                

                from fac_facturas";

        

         $consulta = $this->consulta($query);

        return $consulta[0]['mayor'];    

        

    }

    

    

    

}



?>



