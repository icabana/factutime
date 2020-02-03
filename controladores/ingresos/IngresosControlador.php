<?php

class IngresosControlador extends ControllerBase {


    public function index() {

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();

        $ingresos = $IngresosModel->getTodos(); 

        include 'vistas/ingresos/default.php';                        

    }      

    public function nuevo(){         

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();           

        $this->model->cargar("MetodosModel.php", "configuracion");
        $MetodosModel = new MetodosModel();         
        $metodos = $MetodosModel->getTodos();
        
        include 'vistas/ingresos/insertar.php';        

    }
    

    public function editar(){

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();          

        $this->model->cargar("MetodosModel.php", "configuracion");
        $MetodosModel = new MetodosModel();         
        $metodos = $MetodosModel->getTodos();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();            

        $ingreso = $IngresosModel->getDatosIngreso($_POST['id_ingreso']);
        
        $valor_en_letras = $this->convertir($ingreso['VALOR_RECIBO']);
        
        include 'vistas/ingresos/editar.php';

    }

    

    public function insertar() {

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();   

        $params = Parametros::singleton();                     

        $consecutivo = $IngresosModel->getConsecutivo();

        if($consecutivo == "" || $consecutivo == "0"){
            $consecutivo = $params->valor('CONSECUTIVO_RECIBO');
        }        
     
        $resp = $IngresosModel->insertar(
            $consecutivo + 1, 
            $_POST["metodo_ingreso"], 
            $_POST["fecha_ingreso"], 
            $_POST["cliente_ingreso"], 
            $_POST["valor_ingreso"], 
            $_POST["concepto_ingreso"], 
            $_POST["numtransaccion_ingreso"], 
            $_POST["numcheque_ingreso"], 
            $_POST["banco_ingreso"]
        );   
            
        if( $resp != 0 ){
            echo $resp;
        }else{
            echo 0;	
        }       

    }

    
    public function guardar() {

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();           

        $params = Parametros::singleton();  
        
        $resp = $IngresosModel->guardar(
            $_POST["id_ingreso"], 
            $_POST["metodo_ingreso"], 
            $_POST["fecha_ingreso"], 
            $_POST["cliente_ingreso"], 
            $_POST["valor_ingreso"], 
            $_POST["concepto_ingreso"], 
            $_POST["numtransaccion_ingreso"], 
            $_POST["numcheque_ingreso"], 
            $_POST["banco_ingreso"]
        );  

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
                
    }

     
    public function eliminar() {

        $this->model->cargar("IngresosModel.php", "ingresos");
        $ingresosModel = new IngresosModel();

        $ingresosModel->eliminarIngreso($_POST["id_ingreso"]);

        echo "1";                

    }    
          

      

    public function buscarCliente() {

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $clientes = $UsuarioModel->getEstudiantesLIKE($_POST['texto']);

        include("vistas/ingresos/tabla_proveedores.php");  

      }
      

    public function cargarReportes() {                

        include 'vistas/ingresos/reportes.php';                               

    }   
    

     public function imprimirIngreso(){
         
        $this->model->cargar("FacturasModel.php", "facturas");

        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();


        $clientes = $ClientesModel->getTodosClientes();
        $terminos = $TerminosModel->getTodosTerminos();
        $roles = $UsuarioModel->getTodosRoles();

        $productos = $IngresosModel->getProductosPorIngreso($_POST['id_ingreso']);
        $consecutivo_bd = $IngresosModel->getConsecutivo();
        $ingreso = $IngresosModel->getDatosIngreso($_POST['id_ingreso']);
        
        
  $admision = $FacturasModel->getInscripcionActualPorEstudiante($ingreso['ID_ESTUDIANTE']);
        
        
        $valor_en_letras = $this->convertir($ingreso['VALOR_RECIBO']);

        include("vistas/ingresos/ingreso.php");   

        $dirPdf = "archivos/pdf_ingreso".$_POST['id_ingreso'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;


    }

    

     public function imprimirIngreso2(){                       

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();
         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();
        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
                

        $clientes = $ClientesModel->getTodosClientes();
        $terminos = $TerminosModel->getTodosTerminos();
        $roles = $UsuarioModel->getTodosRoles();
        

          $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();
        

        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();
        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();
        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();
        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
        

        $this->model->cargar("BodegasModel.php", "configuracion");
        $BodegasModel = new BodegasModel();
        

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();

        $productos = $IngresosModel->getProductosPorIngreso($_POST['id_ingreso']);        

        $consecutivo_bd = $IngresosModel->getConsecutivo();

        $ingreso = $IngresosModel->getDatosIngreso($_POST['id_ingreso']);
        
  $admision = $FacturasModel->getInscripcionActualPorEstudiante($ingreso['ID_ESTUDIANTE']);
        $valor_en_letras = $this->convertir($ingreso['VALOR_RECIBO']);        


        include("vistas/ingresos/ingreso2.php");   
                 

        $dirPdf = "archivos/pdf_ingreso2".$_POST['id_ingreso'].".pdf";
          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;          

    }
    

     public function imprimirIngreso3(){
       

        $this->model->cargar("IngresosModel.php", "ingresos");
        $IngresosModel = new IngresosModel();                

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();                

        $clientes = $ClientesModel->getTodosClientes();

        $terminos = $TerminosModel->getTodosTerminos();

        $roles = $UsuarioModel->getTodosRoles();

        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();        

        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();        
        

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();
        $productos = $IngresosModel->getProductosPorIngreso($_POST['id_ingreso']);
        $consecutivo_bd = $IngresosModel->getConsecutivo();      
        

        $ingreso = $IngresosModel->getDatosIngreso($_POST['id_ingreso']);

        $facturas = $FacturasModel->getFacturasPorCliente($ingreso['CLIENTE_RECIBO']);
        
        $total_facturado = 0;
        
        foreach ($facturas as $factura) {
            
            $total_facturado += $factura['TOTAL_FACTURA'];
            
        }
        
               
        
        $ingresos = $IngresosModel->getIngresosPorCliente($ingreso['CLIENTE_RECIBO']);
        
        $total_recibido = 0;
        
        foreach ($ingresos as $ingreso) {
            
            $total_recibido += $ingreso['VALOR_RECIBO'];
            
        }
        

        $valor_en_letras = $this->convertir($ingreso['VALOR_RECIBO']);        

        $saldo_pendiente = $total_facturado - $total_recibido;        
        

        include("vistas/ingresos/ingreso3.php");                   

        $dirPdf = "archivos/pdf_ingreso3".$_POST['id_ingreso'].".pdf";      

        $this->pdf->Output(''.$dirPdf.'');            

        echo "urlRuta=".$dirPdf;          

    }        

 }

?>