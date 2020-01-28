<?php

class CategoriasControlador extends ControllerBase {

    public function cargarTablaCategorias() {
        
        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();

        $categorias = $CategoriasModel->getTodosCategorias();

        include 'vistas/configuracion/categorias/default.php';
                        
    }    
    
    public function abrirCrearCategoria(){
        		
        include 'vistas/configuracion/categorias/insertar.php';
        
    }
     
    
    public function abrirEditarCategoria(){
                        
        $this->model->cargar("CategoriasModel.php", 'configuracion');
        $CategoriasModel = new CategoriasModel();  
        
        $categoria = $CategoriasModel->getDatosCategoria($_POST['id_categoria']);
        
        include 'vistas/configuracion/categorias/editar.php';
               
    }
    
    
    public function insertarCategoria() {
      
        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();     
                 
        $resp = $CategoriasModel->insertarCategoria($_POST["codigo"], $_POST["descripcion"]);        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function editarCategoria() {
        
        $this->model->cargar("CategoriasModel.php", 'configuracion');
        $categoriasModel = new CategoriasModel();
                
         $resp = $categoriasModel->editarCategoria(
                   $_POST["id"], $_POST["codigo"], $_POST["descripcion"]
            );
            
     
         if( $resp != 0 ){
			     
             echo 1;
             
        }else{
			     
            echo 0;	
            
        }  
        
    }    
     
    public function eliminarCategoria() {
        
        $this->model->cargar("CategoriasModel.php", "configuracion");
        $categoriasModel = new CategoriasModel();
        
        $categoriasModel->eliminarCategoria($_POST["id_categoria"]);
        
        echo "1";        
        
    }    
   
    
 }
?>
