<?php

class UnidadesControlador extends ControllerBase {

    public function index() {        

        $this->model->cargar("UnidadesModel.php", "administracion");
        $UnidadesModel = new UnidadesModel();

        $unidades = $UnidadesModel->getTodosUnidades();

        include 'vistas/administracion/unidades/default.php';                        

    }        

    public function nuevo(){        		

        include 'vistas/administracion/unidades/insertar.php';        

    }  
    

    public function editar(){                        

        $this->model->cargar("UnidadesModel.php", 'administracion');
        $UnidadesModel = new UnidadesModel();          

        $unidad = $UnidadesModel->getDatosUnidad($_POST['id_unidad']);        

        include 'vistas/administracion/unidades/editar.php';               

    }  


    public function insertar() {      

        $this->model->cargar("UnidadesModel.php", "administracion");
        $UnidadesModel = new UnidadesModel();                      

        $resp = $UnidadesModel->insertarUnidad($_POST["codigo"], $_POST["descripcion"]);             

        if( $resp != 0 ){

            echo 1;

        }else{

            echo 0;			

        }              

    }
    

    public function guardar() {        

        $this->model->cargar("UnidadesModel.php", 'administracion');
        $unidadesModel = new UnidadesModel();               

         $resp = $unidadesModel->editarUnidad(
                   $_POST["id"], 
                   $_POST["codigo"], 
                   $_POST["descripcion"]
            );

         if( $resp != 0 ){	     
             echo 1;    
        }else{			
            echo 0;	    
        }          

    }    
     

    public function eliminarUnidad() {        

        $this->model->cargar("UnidadesModel.php", "administracion");
        $unidadesModel = new UnidadesModel();        

        $unidadesModel->eliminarUnidad($_POST["id_unidad"]);        

        echo "1";                

    }    

 }

?>