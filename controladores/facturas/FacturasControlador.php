<?php

class FacturasControlador extends ControllerBase {

    public function index() {

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();

        $facturas = $FacturasModel->getTodos();

        include 'vistas/facturas/default.php';

    }  


    public function nuevo(){

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();

        $this->model->cargar("ClientesModel.php", "actores");
        $ClientesModel = new ClientesModel();

        $this->model->cargar("TerminosModel.php", "actores");
        $TerminosModel = new TerminosModel();
        $terminos = $TerminosModel->getTodosTerminos();

        $id_factura = $FacturasModel->insertarFactura($_POST['tipo']);

        $clientes = $ClientesModel->getTodosClientes();

        $this->model->cargar("CategoriasModel.php", "actores");
        $CategoriasModel = new CategoriasModel();

        $this->model->cargar("SubCategoriasModel.php", "actores");
        $SubCategoriasModel = new SubCategoriasModel();

        $this->model->cargar("UnidadesModel.php", "actores");
        $UnidadesModel = new UnidadesModel();

        $this->model->cargar("ImpuestosModel.php", "actores");
        $ImpuestosModel = new ImpuestosModel();

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();
        $impuestos = $ImpuestosModel->getTodosImpuestos();

        include 'vistas/facturas/insertar.php';

    }
    

    public function editar(){

        $this->model->cargar("FacturasModel.php", "facturas");        
        $FacturasModel = new FacturasModel();

        $this->model->cargar("IngresosModel.php", "ingresos");        
        $IngresosModel = new IngresosModel();

        $this->model->cargar("ClientesModel.php", "actores");
        $ClientesModel = new ClientesModel();

        $clientes = $ClientesModel->getTodosClientes();

        $datos_factura = $FacturasModel->getDatosFactura($_POST['id_factura']);        
        $todas_facturas = $FacturasModel->getFacturasPorCliente($datos_factura['CLIENTE_FACTURA']);        
        
        $todos_ingresos = $IngresosModel->getIngresosPorCliente($datos_factura['CLIENTE_FACTURA']);
        
        $this->model->cargar("TerminosModel.php", "actores");
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

        include 'vistas/facturas/editar.php';

    }
    

    public function insertar() {

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();   

        $params = Parametros::singleton();

        $consecutivo = $FacturasModel->getConsecutivo();

        if($consecutivo == "" || $consecutivo == "0"){
            $consecutivo = $params->valor('CONSECUTIVO');
        }

        $resp = $FacturasModel->editarFactura(
            $consecutivo + 1,
            $_POST["id_factura"], 
            $_POST["vendedor"], 
            $_POST["cliente"], 
            $_POST["termino"], 
            $_POST["subtotal"], 
            $_POST["descuento"], 
            $_POST["iva19"], 
            $_POST["iva5"], 
            $_POST["total"], 
            $_POST["descripcion"], 
            $_POST["fecha"], 
            $_POST["fecha2"], 
            $_POST["vencimiento"], 
            $_POST["tipopago"], 
        );   
           
        if( $resp != 0 ){            
            
            $asunto = utf8_decode("Notificación Nueva Factura");     
            $factura = $FacturasModel->getDatosFactura($_POST["id_factura"]); 
            $fechas = new Fechas();                
            $mensaje = "Se ha creado un nuevo contrato, el cual se especifica a continuación: <br><br>";            $mensaje .= "FACTURA NÚMERO: ". $factura['CONSECUTIVO_FACTURA']."<br>";
            
            $mensaje .= "NOMBRE DEL CLIENTE: ".$factura['NOMBRES_ESTUDIANTE']." ".$factura['APELLIDOS_ESTUDIANTE']."<br>";
            
            $mensaje .= "VALOR DE LA FACTURA: $". number_format($factura['TOTAL_FACTURA'],0,',','.')."<br>";
                                                
            $mensaje .= "<br><br>"; 
                        
            $correo1 = "ismael.cabana@gmail.com";
            $nombre1 = "Ismael Cabana";
                        
            //echo $this->EnviarCorreo($mensaje, $asunto, '', $correo1, $nombre1);
            

            echo 1;

        }else{

            echo 0;			

        }      

    }
    

    public function guardar() {

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();   

        $params = Parametros::singleton();

        $resp = $FacturasModel->editarFacPedCot(
            $_POST["id_factura"], 
            $_POST["cliente"], 
            $_POST["vendedor"], 
            $_POST["termino"], 
            $_POST["descripcion"], 
            $_POST["fecha"], 
            $_POST["fecha2"], 
            $_POST["vencimiento"], 
            $_POST["tipopago"]
        );   

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      

    }


    public function eliminarFactura() {

        $this->model->cargar("FacturasModel.php", "facturas");
        $facturasModel = new FacturasModel();

        $facturasModel->eliminarFactura($_POST["id_factura"]);

        echo "1";        
    
    }    

    
 }

?>