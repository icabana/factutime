<?php

class UnidadesControlador extends ControllerBase {

    public function cargarTablaUnidades() {
        
        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();

        $unidades = $UnidadesModel->getTodosUnidades();

        include 'vistas/configuracion/unidades/default.php';
                        
    }    
    
    public function abrirCrearUnidad(){
        		
        include 'vistas/configuracion/unidades/insertar.php';
        
    }
     
    
    public function abrirEditarUnidad(){
                        
        $this->model->cargar("UnidadesModel.php", 'configuracion');
        $UnidadesModel = new UnidadesModel();  
        
        $unidad = $UnidadesModel->getDatosUnidad($_POST['id_unidad']);
        
        include 'vistas/configuracion/unidades/editar.php';
               
    }
    
    
    public function insertarUnidad() {
      
        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();     
                 
        $resp = $UnidadesModel->insertarUnidad($_POST["codigo"], $_POST["descripcion"]);        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function editarUnidad() {
        
        $this->model->cargar("UnidadesModel.php", 'configuracion');
        $unidadesModel = new UnidadesModel();
                
         $resp = $unidadesModel->editarUnidad(
                   $_POST["id"], $_POST["codigo"], $_POST["descripcion"]
            );
            
     
         if( $resp != 0 ){
			     
             echo 1;
             
        }else{
			     
            echo 0;	
            
        }  
        
    }    
     
    public function eliminarUnidad() {
        
        $this->model->cargar("UnidadesModel.php", "configuracion");
        $unidadesModel = new UnidadesModel();
        
        $unidadesModel->eliminarUnidad($_POST["id_unidad"]);
        
        echo "1";        
        
    }    
   
    
 }
?>
