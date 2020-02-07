<?php

class FacturasControlador extends ControllerBase {

     public function imprimirFactura(){

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        
        $this->model->cargar("IngresosModel.php", "ingresos");        
        $IngresosModel = new IngresosModel();           

        $datos_factura = $FacturasModel->getDatosFactura($_POST['id_factura']);        
        $todas_facturas = $FacturasModel->getFacturasPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $todos_ingresos = $IngresosModel->getIngresosPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        $terminos = $TerminosModel->getTodosTerminos();
        
        $total_facturas = 0;        
        foreach ($todas_facturas as $factura) {
            $total_facturas += $factura['TOTAL_FACTURA'];
        }
        
        $total_ingresos = 0;        
        foreach ($todos_ingresos as $ingreso) {
            $total_ingresos += $ingreso['VALOR_RECIBO'];
        }
                
        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);
        $consecutivo_bd = $FacturasModel->getConsecutivo();
        $tipo = $_POST['tipo'];
        
        
        ///CALCULAR SALDO DE ÉSTA FACTURA SELECCIONADA
        $saldo_factura = 0;
        $estado_factura = "PAGADA";
        $total_pagado = $total_ingresos;
        $total_facturas_anteriores = 0;
        
        foreach ($todas_facturas as $factura) {
                        
            if($factura['CONSECUTIVO_FACTURA'] != $datos_factura['CONSECUTIVO_FACTURA']){                
                $total_facturas_anteriores += $factura['TOTAL_FACTURA'];
            }else{
                break;
            }
            
        }
        
         //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
         $total_facturas_anteriores += $datos_factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA
        
        if($total_facturas_anteriores <= $total_pagado){
            
            $saldo_factura = 0;
            $estado_factura = "PAGADA";
            
        }else{
            
            $saldo_factura = $total_facturas_anteriores - $total_pagado;
            
            if($saldo_factura > $datos_factura['TOTAL_FACTURA']){
                $saldo_factura = $datos_factura['TOTAL_FACTURA'];
            }
            
            $estado_factura = "RESTANTE";
            
        }
    
        $clientes = $ClientesModel->getTodosClientes();
        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);
        $consecutivo_bd = $FacturasModel->getConsecutivo();

        $factura = $FacturasModel->getDatosFactura($_POST['id_factura']);
        $admision = $FacturasModel->getInscripcionActualPorEstudiante($datos_factura['CLIENTE_FACTURA']);
        
        include("vistas/facturas/factura.php");   

        $dirPdf = "archivos/pdf_factura".$_POST['id_factura'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;

    }
    

     public function imprimirTickets(){

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();

        $this->model->cargar("IngresosModel.php", "ingresos");        
        $IngresosModel = new IngresosModel();

        $datos_factura = $FacturasModel->getDatosFactura($_POST['id_factura']);        
        $todas_facturas = $FacturasModel->getFacturasPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $todos_ingresos = $IngresosModel->getIngresosPorCliente($datos_factura['CLIENTE_FACTURA']);
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        $terminos = $TerminosModel->getTodosTerminos();
        
        $total_facturas = 0;        
        foreach ($todas_facturas as $factura) {
            $total_facturas += $factura['TOTAL_FACTURA'];
        }
        
        $total_ingresos = 0;        
        foreach ($todos_ingresos as $ingreso) {
            $total_ingresos += $ingreso['VALOR_RECIBO'];
        }
        
        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);
        $consecutivo_bd = $FacturasModel->getConsecutivo();
        $tipo = $_POST['tipo'];
        
        
        ///CALCULAR SALDO DE ÉSTA FACTURA SELECCIONADA
        $saldo_factura = 0;
        $estado_factura = "PAGADA";
        $total_pagado = $total_ingresos;
        $total_facturas_anteriores = 0;
        
        foreach ($todas_facturas as $factura) {
                        
            if($factura['CONSECUTIVO_FACTURA'] != $datos_factura['CONSECUTIVO_FACTURA']){                
                $total_facturas_anteriores += $factura['TOTAL_FACTURA'];
            }else{
                break;
            }
            
        }
        
         //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
         $total_facturas_anteriores += $datos_factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA
        
        if($total_facturas_anteriores <= $total_pagado){
            
            $saldo_factura = 0;
            $estado_factura = "PAGADA";
            
        }else{
            
            $saldo_factura = $total_facturas_anteriores - $total_pagado;
            
            if($saldo_factura > $datos_factura['TOTAL_FACTURA']){
                $saldo_factura = $datos_factura['TOTAL_FACTURA'];
            }
            
            $estado_factura = "RESTANTE";
            
        }
        
        $clientes = $ClientesModel->getTodosClientes();

        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);

        $consecutivo_bd = $FacturasModel->getConsecutivo();

        $factura = $FacturasModel->getDatosFactura($_POST['id_factura']);

        include("vistas/facturas/factura_1.php");   

        $dirPdf = "archivos/pdf_factura".$_POST['id_factura'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;

    }
    

     public function imprimirFactura2(){
                
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();

        $this->model->cargar("IngresosModel.php", "ingresos");        
        $IngresosModel = new IngresosModel();

        $datos_factura = $FacturasModel->getDatosFactura($_POST['id_factura']);        
        $todas_facturas = $FacturasModel->getFacturasPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $todos_ingresos = $IngresosModel->getIngresosPorCliente($datos_factura['CLIENTE_FACTURA']);
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        $terminos = $TerminosModel->getTodosTerminos();
        
        $total_facturas = 0;        
        foreach ($todas_facturas as $factura) {
            $total_facturas += $factura['TOTAL_FACTURA'];
        }
        
        $total_ingresos = 0;        
        foreach ($todos_ingresos as $ingreso) {
            $total_ingresos += $ingreso['VALOR_RECIBO'];
        }
        
        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);
        $consecutivo_bd = $FacturasModel->getConsecutivo();
        $tipo = $_POST['tipo'];
        
        
        ///CALCULAR SALDO DE ÉSTA FACTURA SELECCIONADA
        $saldo_factura = 0;
        $estado_factura = "PAGADA";
        $total_pagado = $total_ingresos ;
        $total_facturas_anteriores = 0;
        
        foreach ($todas_facturas as $factura) {
                        
            if($factura['CONSECUTIVO_FACTURA'] != $datos_factura['CONSECUTIVO_FACTURA']){                
                $total_facturas_anteriores += $factura['TOTAL_FACTURA'];
            }else{
                break;
            }
            
        }
        
         //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
         $total_facturas_anteriores += $datos_factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA
        
        if($total_facturas_anteriores <= $total_pagado){
            
            $saldo_factura = 0;
            $estado_factura = "PAGADA";
            
        }else{
            
            $saldo_factura = $total_facturas_anteriores - $total_pagado;
            
            if($saldo_factura > $datos_factura['TOTAL_FACTURA']){
                $saldo_factura = $datos_factura['TOTAL_FACTURA'];
            }
            
            $estado_factura = "RESTANTE";
            
        }

        $consecutivo_bd = $FacturasModel->getConsecutivo();

        $factura = $FacturasModel->getDatosFactura($_POST['id_factura']);

        $admision = $FacturasModel->getInscripcionActualPorEstudiante($datos_factura['CLIENTE_FACTURA']);

        include("vistas/facturas/factura2.php");   

        $dirPdf = "archivos/pdf_factura2".$_POST['id_factura'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');
        
        echo "urlRuta=".$dirPdf;

    }
  

     public function imprimirFactura3(){
                
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();

        $this->model->cargar("IngresosModel.php", "ingresos");        
        $IngresosModel = new IngresosModel();

        $datos_factura = $FacturasModel->getDatosFactura($_POST['id_factura']);        
        $todas_facturas = $FacturasModel->getFacturasPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $todos_ingresos = $IngresosModel->getIngresosPorCliente($datos_factura['CLIENTE_FACTURA']);
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        $terminos = $TerminosModel->getTodosTerminos();
        
        $total_facturas = 0;        
        foreach ($todas_facturas as $factura) {
            $total_facturas += $factura['TOTAL_FACTURA'];
        }
        
        $total_ingresos = 0;        
        foreach ($todos_ingresos as $ingreso) {
            $total_ingresos += $ingreso['VALOR_RECIBO'];
        }
            
        $productos = $FacturasModel->getProductosPorFactura($_POST['id_factura']);
        $consecutivo_bd = $FacturasModel->getConsecutivo();
        $tipo = $_POST['tipo'];
        
        
        ///CALCULAR SALDO DE ÉSTA FACTURA SELECCIONADA
        $saldo_factura = 0;
        $estado_factura = "PAGADA";
        $total_pagado = $total_ingresos;
        $total_facturas_anteriores = 0;
        
        foreach ($todas_facturas as $factura) {
                        
            if($factura['CONSECUTIVO_FACTURA'] != $datos_factura['CONSECUTIVO_FACTURA']){                
                $total_facturas_anteriores += $factura['TOTAL_FACTURA'];
            }else{
                break;
            }
            
        }
        
         //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
         $total_facturas_anteriores += $datos_factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA
        
        if($total_facturas_anteriores <= $total_pagado){
            
            $saldo_factura = 0;
            $estado_factura = "PAGADA";
            
        }else{
            
            $saldo_factura = $total_facturas_anteriores - $total_pagado - $total_creditos;
            
            if($saldo_factura > $datos_factura['TOTAL_FACTURA']){
                $saldo_factura = $datos_factura['TOTAL_FACTURA'];
            }
            
            $estado_factura = "RESTANTE";
            
        }

        $consecutivo_bd = $FacturasModel->getConsecutivo();

        $factura = $FacturasModel->getDatosFactura($_POST['id_factura']);

        $total_en_letras = $this->convertir($factura['TOTAL_FACTURA']);

        include("vistas/facturas/factura3.php");   

        $dirPdf = "archivos/pdf_factura3".$_POST['id_factura'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;

    }
    

 }

?>