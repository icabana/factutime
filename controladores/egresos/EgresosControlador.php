<?php

class EgresosControlador extends ControllerBase {

    public function index() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();

        $egresos = $EgresosModel->getTodosEgresos();        

        include 'vistas/egresos/default.php';                        

    }      
    

    public function nuevo(){         

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();         

        $this->model->cargar("MetodosModel.php", "configuracion");
        $MetodosModel = new MetodosModel();         
        $metodos = $MetodosModel->getTodos();  
        
        include 'vistas/egresos/insertar.php';

    }
    

    public function editar(){

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);
        
        $this->model->cargar("MetodosModel.php", "configuracion");
        $MetodosModel = new MetodosModel();            
        $metodos = $MetodosModel->getTodos();
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include 'vistas/egresos/editar.php';

    }
    

    public function insertar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();   

        $params = Parametros::singleton();                     

        $consecutivo = $EgresosModel->getConsecutivo();

        if($consecutivo == "" || $consecutivo == "0"){
            $consecutivo = $params->valor('CONSECUTIVO_EGRESO');
        }

        $resp = $EgresosModel->insertar(
            $consecutivo + 1,
            $_POST["metodo_egreso"], 
            $_POST["fecha_egreso"], 
            $_POST["proveedor_egreso"], 
            $_POST["valor_egreso"], 
            $_POST["concepto_egreso"], 
            $_POST["numtransaccion_egreso"],
            $_POST["numcheque_egreso"],
            $_POST["banco_egreso"]
            
        );   
            
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }

    }
    

    public function guardar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();           

        $params = Parametros::singleton();          

        $resp = $EgresosModel->guardar(
            $_POST["id_egreso"], 
            $_POST["metodo_egreso"], 
            $_POST["fecha_egreso"], 
            $_POST["proveedor_egreso"], 
            $_POST["valor_egreso"], 
            $_POST["concepto_egreso"], 
            $_POST["numtransaccion_egreso"],
            $_POST["numcheque_egreso"],
            $_POST["banco_egreso"]
        );  

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
        
    }        
    

    public function eliminar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $egresosModel = new EgresosModel();

        $egresosModel->eliminar($_POST["id_egreso"]);        

        echo "1";                

    }    


    public function buscarProveedor() {

        $this->model->cargar("ProveedoresModel.php", "actores");
        $ProveedoresModel = new ProveedoresModel();

        $proveedores = $ProveedoresModel->getProveedoresLIKE($_POST['texto']);

        include("vistas/egresos/tabla_proveedores.php");    

      }   
        

    public function cargarReportes() {     

        include 'vistas/egresos/reportes.php';                               

    } 
       

    public function imprimirEgresoCarta(){

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();

        $this->model->cargar("ProveedoresModel.php", "actores");
        $ProveedoresModel = new ProveedoresModel();

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);        
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/reportes/carta.php");                    

        $dirPdf = "archivos/reportes/egreso_carta_".$_POST['id_egreso'].".pdf";          

        $this->pdf->Output(''.$dirPdf.'');            

        echo "urlRuta=".$dirPdf;          

    }
        

    public function imprimirEgreso2(){         

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();        

        $this->model->cargar("ProveedoresModel.php", "actores");
        $ProveedoresModel = new ProveedoresModel();

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/reportes/egreso2.php");                    

        $dirPdf = "archivos/reportes/egreso_mediacarta_".$_POST['id_egreso'].".pdf";          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;

    }     
    

     public function imprimirEgreso3(){
         
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();        

        $this->model->cargar("ProveedoresModel.php", "actores");
        $ProveedoresModel = new ProveedoresModel();          

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/reportes/egreso3.php");                    

        $dirPdf = "archivos/reportes/egreso_ticket_".$_POST['id_egreso'].".pdf";          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;

    }    

 }

?>