<?php

class TerminosControlador extends ControllerBase {

    public function cargarTablaTerminos() {
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();

        $terminos = $TerminosModel->getTodosTerminos();

        include 'vistas/configuracion/terminos/default.php';
                        
    }    
    
    public function abrirCrearTermino(){
        		
        include 'vistas/configuracion/terminos/insertar.php';
        
    }
     
    
    public function abrirEditarTermino(){
                        
        $this->model->cargar("TerminosModel.php", 'configuracion');
        $TerminosModel = new TerminosModel();  
        
        $termino = $TerminosModel->getDatosTermino($_POST['id_termino']);
        
        include 'vistas/configuracion/terminos/editar.php';
               
    }
    
    
    public function insertarTermino() {
      
        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();     
                 
        $resp = $TerminosModel->insertarTermino($_POST["codigo"], $_POST["descripcion"]);        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function editarTermino() {
        
        $this->model->cargar("TerminosModel.php", 'configuracion');
        $terminosModel = new TerminosModel();
                
         $resp = $terminosModel->editarTermino(
                   $_POST["id"], $_POST["codigo"], $_POST["descripcion"]
            );
            
     
         if( $resp != 0 ){
			     
             echo 1;
             
        }else{
			     
            echo 0;	
            
        }  
        
    }    
     
    public function eliminarTermino() {
        
        $this->model->cargar("TerminosModel.php", "configuracion");
        $terminosModel = new TerminosModel();
        
        $terminosModel->eliminarTermino($_POST["id_termino"]);
        
        echo "1";        
        
    }    
   
    
 }
?>
