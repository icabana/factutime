<?php

class EgresosModel extends ModelBase {
  
    function getTodosEgresos() {

    $query = "select   

                fact_egresos.id_egreso, 
                fact_egresos.consecutivo_egreso,
                fact_egresos.metodo_egreso,
                fact_egresos.fecha_egreso,
                fact_egresos.proveedor_egreso,
                fact_egresos.valor_egreso,
                fact_egresos.concepto_egreso,
                fact_egresos.numtransaccion_egreso,
                fact_egresos.numcheque_egreso,
                fact_egresos.banco_egreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_proveedores.tipo_proveedor,

                bancos.nombre_banco

                from fact_egresos 

                left join acto_proveedores ON fact_egresos.proveedor_egreso = acto_proveedores.id_proveedor
                left join fact_metodospago ON fact_egresos.metodo_egreso = fact_metodospago.id_metodo
                left join bancos ON fact_egresos.banco_egreso = bancos.id_banco" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  
  
    function getEgresosEntreFechas($FECHA1, $FECHA2) {

     $query = "select   

                fact_egresos.id_egreso, 
                fact_egresos.consecutivo_egreso,
                fact_egresos.metodo_egreso,
                fact_egresos.fecha_egreso,
                fact_egresos.proveedor_egreso,
                fact_egresos.valor_egreso,
                fact_egresos.concepto_egreso,
                fact_egresos.numtransaccion_egreso,
                fact_egresos.numcheque_egreso,
                fact_egresos.banco_egreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_proveedores.tipo_proveedor,
                
                bancos.nombre_banco

                from fact_egresos 

                left join acto_proveedores ON fact_egresos.proveedor_egreso = acto_proveedores.id_proveedor
                left join fact_metodospago ON fact_egresos.metodo_egreso = fact_metodospago.id_metodo
                left join bancos ON fact_egresos.banco_egreso = bancos.id_banco

                where 
                fact_egresos.consecutivo_egreso != '' AND 
                fact_egresos.fecha_egreso BETWEEN '".$FECHA1."' AND '".$FECHA2."'" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  
  
    function getEgresosPorCliente($proveedor_egreso) {

     $query = "select   

                fact_egresos.id_egreso, 
                fact_egresos.consecutivo_egreso,
                fact_egresos.metodo_egreso,
                fact_egresos.fecha_egreso,
                fact_egresos.proveedor_egreso,
                fact_egresos.valor_egreso,
                fact_egresos.concepto_egreso,
                fact_egresos.numtransaccion_egreso,
                fact_egresos.numcheque_egreso,
                fact_egresos.banco_egreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_proveedores.tipo_proveedor,
                
                bancos.nombre_banco

                from fact_egresos 

                left join acto_proveedores ON fact_egresos.proveedor_egreso = acto_proveedores.id_proveedor
                left join fact_metodospago ON fact_egresos.metodo_egreso = fact_metodospago.id_metodo
                left join bancos ON fact_egresos.banco_egreso = bancos.id_banco

                where fact_egresos.consecutivo_egreso != '' and proveedor_egreso = '".$proveedor_egreso."'" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }  


    function getDatosEgreso($id_egreso) {       

     $query = "select   

                fact_egresos.id_egreso, 
                fact_egresos.consecutivo_egreso,
                fact_egresos.metodo_egreso,
                fact_egresos.fecha_egreso,
                fact_egresos.proveedor_egreso,
                fact_egresos.valor_egreso,
                fact_egresos.concepto_egreso,
                fact_egresos.numtransaccion_egreso,
                fact_egresos.numcheque_egreso,
                fact_egresos.banco_egreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_proveedores.tipo_proveedor,
                
                bancos.nombre_banco

                from fact_egresos 

                left join acto_proveedores ON fact_egresos.proveedor_egreso = acto_proveedores.id_proveedor
                left join fact_metodospago ON fact_egresos.metodo_egreso = fact_metodospago.id_metodo
                left join bancos ON fact_egresos.banco_egreso = bancos.id_banco

            where fact_egresos.id_egreso = '".$id_egreso."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];            

    }


    function insertar(
                    $consecutivo_egreso,
                    $metodo_egreso, 
                    $fecha_egreso, 
                    $proveedor_egreso, 
                    $valor_egreso, 
                    $concepto_egreso, 
                    $numtransaccion_egreso, 
                    $numcheque_egreso, 
                    $banco_egreso 
        ) {       

       $query = "INSERT fact_egresos(
                            consecutivo_egreso, 
                            metodo_egreso, 
                            fecha_egreso, 
                            proveedor_egreso, 
                            valor_egreso, 
                            concepto_egreso, 
                            numtransaccion_egreso
                            numcheque_egreso
                            banco_egreso
                        ) 
                    VALUES(
                            '".$consecutivo_egreso."', 
                            '".$metodo_egreso."', 
                            '".$fecha_egreso."',
                            '".$proveedor_egreso."', 
                            '".$valor_egreso."', 
                            '".$concepto_egreso."', 
                            '".$numtransaccion_egreso."',
                            '".$numcheque_egreso."', 
                            '".$banco_egreso."', 
                    );";

       return $this->crear_ultimo_id($query);

    }


    function guardar(
                    $id_egreso,
                    $metodo_egreso, 
                    $fecha_egreso, 
                    $proveedor_egreso, 
                    $valor_egreso, 
                    $concepto_egreso, 
                    $numtransaccion_egreso, 
                    $numcheque_egreso, 
                    $banco_egreso 
    ) {

       $query = "UPDATE fact_egresos  

                    SET metodo_egreso = '".$metodo_egreso."', 
                        fecha_egreso = '".$fecha_egreso."', 
                        proveedor_egreso = '".$proveedor_egreso."', 
                        valor_egreso = '".$valor_egreso."', 
                        concepto_egreso = '".$concepto_egreso."', 
                        numtransaccion_egreso = '".$numtransaccion_egreso."',
                        numcheque_egreso = '".$numcheque_egreso."', 
                        banco_egreso = '".$banco_egreso."'

        WHERE id_egreso = '" . $id_egreso . "'";

       return $this->modificarRegistros($query);

    }


    function eliminar($id_egreso) {
        
        $query = "DELETE FROM fact_egresos WHERE id_egreso = '". $id_egreso ."'";

        $this->modificarRegistros($query);

    }


    function getConsecutivo() {

        $query  =   "select MAX(fact_egresos.consecutivo_egreso) as mayor

                    from fact_egresos";

        $consulta = $this->consulta($query);
    
        return $consulta[0]['mayor'];   

    }
    
    
    function getTotalEgresosPorMes($MES, $metodo_egreso) {

     $query = "select   sum(fact_egresos.valor_egreso) as total

                        from fact_egresos 

                        where 
                        substr(fact_egresos.fecha_egreso, 6, 2) = ".$MES." AND 
                        fact_egresos.metodo_egreso = '".$metodo_egreso."'" ;

                $consulta = $this->consulta($query);
                
               return $consulta[0]['total'];                      

    }  

    
}

?>