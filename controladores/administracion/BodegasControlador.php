<?php

class BodegasControlador extends ControllerBase {

    public function cargarTablaBodegas() {
        
        $this->model->cargar("BodegasModel.php", "configuracion");
        $BodegasModel = new BodegasModel();

        $bodegas = $BodegasModel->getTodosBodegas();

        include 'vistas/configuracion/bodegas/default.php';
                        
    }    
    
    public function abrirCrearBodega(){
        		
        include 'vistas/configuracion/bodegas/insertar.php';
        
    }
     
    
    public function abrirEditarBodega(){
                        
        $this->model->cargar("BodegasModel.php", 'configuracion');
        $BodegasModel = new BodegasModel();  
        
        $bodega = $BodegasModel->getDatosBodega($_POST['id_bodega']);
        
        include 'vistas/configuracion/bodegas/editar.php';
               
    }
    
    
    public function insertarBodega() {
      
        $this->model->cargar("BodegasModel.php", "configuracion");
        $BodegasModel = new BodegasModel();     
                 
        $resp = $BodegasModel->insertarBodega($_POST["codigo"], $_POST["descripcion"]);        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function editarBodega() {
        
        $this->model->cargar("BodegasModel.php", 'configuracion');
        $bodegasModel = new BodegasModel();
                
         $resp = $bodegasModel->editarBodega(
                   $_POST["id"], $_POST["codigo"], $_POST["descripcion"]
            );
            
     
         if( $resp != 0 ){
			     
             echo 1;
             
        }else{
			     
            echo 0;	
            
        }  
        
    }    
     
    public function eliminarBodega() {
        
        $this->model->cargar("BodegasModel.php", "configuracion");
        $bodegasModel = new BodegasModel();
        
        $bodegasModel->eliminarBodega($_POST["id_bodega"]);
        
        echo "1";        
        
    }    
   
    
 }
?>
