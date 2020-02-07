<?php

class IngresosModel extends ModelBase {  
    
    
    function getTodos() {

        $query  =   "select   

                        fact_ingresos.id_ingreso, 
                        fact_ingresos.consecutivo_ingreso,
                        fact_ingresos.metodo_ingreso,
                        fact_ingresos.fecha_ingreso,
                        fact_ingresos.cliente_ingreso,
                        fact_ingresos.valor_ingreso,
                        fact_ingresos.concepto_ingreso,
                        fact_ingresos.numtransaccion_ingreso,
                        fact_ingresos.numcheque_ingreso,
                        fact_ingresos.banco_ingreso,                
                        
                        fact_metodospago.nombre_metodo,

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
                        acto_clientes.tipo_cliente,

                        bancos.nombre_banco

                        from fact_ingresos 

                        left join acto_clientes ON fact_ingresos.cliente_ingreso = acto_clientes.id_cliente
                        left join fact_metodospago ON fact_ingresos.metodo_ingreso = fact_metodospago.id_metodo
                        left join bancos ON fact_ingresos.banco_ingreso = bancos.id_banco" ;

                $consulta = $this->consulta($query);
               return $consulta;                      

    }    
        
    
    function getTotalIngresosPorMes($MES) {

        $query = "select sum(fac_ingresos.VALOR_RECIBO) as total
                    from fac_ingresos 
                    where substr(fac_ingresos.FECHA_RECIBO, 6, 2) = ".$MES ;

                    $consulta = $this->consulta($query);
                
                return $consulta[0]['total'];                      

    }  

    
    function getPorCliente($cliente_ingreso) {

        $query = "select   

                fact_ingresos.id_ingreso, 
                fact_ingresos.consecutivo_ingreso,
                fact_ingresos.metodo_ingreso,
                fact_ingresos.fecha_ingreso,
                fact_ingresos.cliente_ingreso,
                fact_ingresos.valor_ingreso,
                fact_ingresos.concepto_ingreso,
                fact_ingresos.numtransaccion_ingreso,
                fact_ingresos.numcheque_ingreso,
                fact_ingresos.banco_ingreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_clientes.tipo_cliente,

                bancos.nombre_banco

                from fact_ingresos 

                left join acto_clientes ON fact_ingresos.cliente_ingreso = acto_clientes.id_cliente
                left join fact_metodospago ON fact_ingresos.metodo_ingreso = fact_metodospago.id_metodo
                left join bancos ON fact_ingresos.banco_ingreso = bancos.id_banco
                    
                where fac_ingresos.CONSECUTIVO_RECIBO != '' and 
                
                fac_ingresos.cliente_ingreso = '".$cliente_ingreso."'" ;

                $consulta = $this->consulta($query);
                return $consulta;                      

    }  


    function getDatos($id_ingreso) {

        $query = "select   

                fact_ingresos.id_ingreso, 
                fact_ingresos.consecutivo_ingreso,
                fact_ingresos.metodo_ingreso,
                fact_ingresos.fecha_ingreso,
                fact_ingresos.cliente_ingreso,
                fact_ingresos.valor_ingreso,
                fact_ingresos.concepto_ingreso,
                fact_ingresos.numtransaccion_ingreso,
                fact_ingresos.numcheque_ingreso,
                fact_ingresos.banco_ingreso,                
                
                fact_metodospago.nombre_metodo,

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
                acto_clientes.tipo_cliente,

                bancos.nombre_banco

                from fact_ingresos 

                left join acto_clientes ON fact_ingresos.cliente_ingreso = acto_clientes.id_cliente
                left join fact_metodospago ON fact_ingresos.metodo_ingreso = fact_metodospago.id_metodo
                left join bancos ON fact_ingresos.banco_ingreso = bancos.id_banco
                        
                where fac_ingresos.id_ingreso = '".$id_ingreso."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];            

    }
    

    function insertar(
                $consecutivo_ingreso,
                $metodo_ingreso, 
                $fecha_ingreso, 
                $cliente_ingreso, 
                $valor_ingreso, 
                $concepto_ingreso, 
                $numtransaccion_ingreso, 
                $numcheque_ingreso, 
                $banco_ingreso 
    ) {       

        $query = "INSERT fact_ingresos(
                    consecutivo_ingreso, 
                    metodo_ingreso, 
                    fecha_ingreso, 
                    cliente_ingreso, 
                    valor_ingreso, 
                    concepto_ingreso, 
                    numtransaccion_ingreso
                    numcheque_ingreso
                    banco_ingreso
                ) 
            VALUES(
                    '".$consecutivo_ingreso."', 
                    '".$metodo_ingreso."', 
                    '".$fecha_ingreso."',
                    '".$cliente_ingreso."', 
                    '".$valor_ingreso."', 
                    '".$concepto_ingreso."', 
                    '".$numtransaccion_ingreso."',
                    '".$numcheque_ingreso."', 
                    '".$banco_ingreso."', 
            );";

            return $this->crear_ultimo_id($query);

    }


    function guardar(
            $id_ingreso,
            $metodo_ingreso, 
            $fecha_ingreso, 
            $cliente_ingreso, 
            $valor_ingreso, 
            $concepto_ingreso, 
            $numtransaccion_ingreso, 
            $numcheque_ingreso, 
            $banco_ingreso 
    ) {

        $query = "UPDATE fact_ingresos  

                SET metodo_ingreso = '".$metodo_ingreso."', 
                    fecha_ingreso = '".$fecha_ingreso."', 
                    cliente_ingreso = '".$cliente_ingreso."', 
                    valor_ingreso = '".$valor_ingreso."', 
                    concepto_ingreso = '".$concepto_ingreso."', 
                    numtransaccion_ingreso = '".$numtransaccion_ingreso."',
                    numcheque_ingreso = '".$numcheque_ingreso."', 
                    banco_ingreso = '".$banco_ingreso."'

            WHERE id_ingreso = '" . $id_ingreso . "'";

        return $this->modificarRegistros($query);

    }


    function eliminarIngreso($ID_RECIBO) {

        $query = "DELETE FROM fac_ingresos WHERE ID_RECIBO = '". $ID_RECIBO ."'";
        $this->modificarRegistros($query);

    }


}

?>