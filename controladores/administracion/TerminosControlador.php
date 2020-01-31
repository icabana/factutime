<?php

class TerminosControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("TerminosModel.php", "administracion");
        $TerminosModel = new TerminosModel();

        $terminos = $TerminosModel->getTodosTerminos();

        include 'vistas/administracion/terminos/default.php';                        

    }    
    

    public function nuevo(){        		

        include 'vistas/administracion/terminos/insertar.php';        

    }   


    public function editar(){                        

        $this->model->cargar("TerminosModel.php", 'administracion');
        $TerminosModel = new TerminosModel();          

        $termino = $TerminosModel->getDatosTermino($_POST['id_termino']);        

        include 'vistas/administracion/terminos/editar.php';               

    }  
   

    public function insertar() {      

        $this->model->cargar("TerminosModel.php", "administracion");
        $TerminosModel = new TerminosModel();                      

        $resp = $TerminosModel->insertarTermino(
            $_POST["codigo"], 
            $_POST["nombre"]
        );      

        if( $resp != 0 ){

            echo 1;

        }else{

            echo 0;			

        }              

    }

    

    public function guardar() {        

        $this->model->cargar("TerminosModel.php", 'administracion');
        $terminosModel = new TerminosModel();                

        $resp = $terminosModel->editarTermino(
            $_POST["id"], 
            $_POST["codigo"], 
            $_POST["nombre"]
        );         

        if( $resp != 0 ){			     

             echo 1;             

        }else{		     

            echo 0;	            

        }          

    }    
     

    public function eliminar() {        

        $this->model->cargar("TerminosModel.php", "administracion");
        $terminosModel = new TerminosModel();        

        $terminosModel->eliminarTermino($_POST["id_termino"]);        

        echo "1";                

    }      

 }

?>