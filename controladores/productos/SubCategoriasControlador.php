<?php

class SubCategoriasControlador extends ControllerBase {

    public function cargarTablaSubCategorias() {
        
        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();

        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();

        include 'vistas/configuracion/subcategorias/default.php';
                        
    }    
    
    public function abrirCrearSubCategoria(){
        		
        include 'vistas/configuracion/subcategorias/insertar.php';
        
    }
     
    
    public function abrirEditarSubCategoria(){
                        
        $this->model->cargar("SubCategoriasModel.php", 'configuracion');
        $SubCategoriasModel = new SubCategoriasModel();  
        
        $subcategoria = $SubCategoriasModel->getDatosSubCategoria($_POST['id_subcategoria']);
        
        include 'vistas/configuracion/subcategorias/editar.php';
               
    }
    
    
    public function insertarSubCategoria() {
      
        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();     
                 
        $resp = $SubCategoriasModel->insertarSubCategoria($_POST["codigo"], $_POST["descripcion"]);        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function editarSubCategoria() {
        
        $this->model->cargar("SubCategoriasModel.php", 'configuracion');
        $subcategoriasModel = new SubCategoriasModel();
                
         $resp = $subcategoriasModel->editarSubCategoria(
                   $_POST["id"], $_POST["codigo"], $_POST["descripcion"]
            );
            
     
         if( $resp != 0 ){
			     
             echo 1;
             
        }else{
			     
            echo 0;	
            
        }  
        
    }    
     
    public function eliminarSubCategoria() {
        
        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $subcategoriasModel = new SubCategoriasModel();
        
        $subcategoriasModel->eliminarSubCategoria($_POST["id_subcategoria"]);
        
        echo "1";        
        
    }    
   
    
 }
?>
