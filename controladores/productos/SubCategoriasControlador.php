<?php

class SubCategoriasControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("SubCategoriasModel.php", "productos");
        $SubCategoriasModel = new SubCategoriasModel();

        $subcategorias = $SubCategoriasModel->getTodos();

        include 'vistas/productos/subcategorias/default.php';                        

    }        


    public function nuevo(){        		

        include 'vistas/productos/subcategorias/insertar.php';        

    }   
    

    public function editar(){                        

        $this->model->cargar("SubCategoriasModel.php", 'productos');
        $SubCategoriasModel = new SubCategoriasModel();          

        $subcategoria = $SubCategoriasModel->getDatos($_POST['id_subcategoria']);        

        include 'vistas/productos/subcategorias/editar.php';               

    }
    

    public function insertar() {      

        $this->model->cargar("SubCategoriasModel.php", "productos");
        $SubCategoriasModel = new SubCategoriasModel();                      

        $resp = $SubCategoriasModel->insertarSubCategoria(
                                        $_POST["codigo"], 
                                        $_POST["descripcion"]
                                    );                

        if( $resp != 0 ){

            echo 1;

        }else{

            echo 0;		

        }     

    }
    

    public function guardar() {        

        $this->model->cargar("SubCategoriasModel.php", 'productos');
        $subcategoriasModel = new SubCategoriasModel();                

        $resp = $subcategoriasModel->editarSubCategoria(
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
     

    public function eliminar() {        

        $this->model->cargar("SubCategoriasModel.php", "productos");
        $subcategoriasModel = new SubCategoriasModel();        

        $subcategoriasModel->eliminarSubCategoria($_POST["id_subcategoria"]);        

        echo "1";                

    }  

 }

?>