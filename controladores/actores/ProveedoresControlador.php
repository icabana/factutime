<?php

class ProveedoresControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("ProveedoresModel.php", "configuracion");
        $ProveedoresModel = new ProveedoresModel();

        $proveedores = $ProveedoresModel->getTodosProveedores();

        include 'vistas/configuracion/proveedores/default.php';                        

    }    
    

    public function nuevo(){        		

        include 'vistas/configuracion/proveedores/insertar.php';        

    }   
    

    public function editar(){                        

        $this->model->cargar("ProveedoresModel.php", 'configuracion');
        $ProveedoresModel = new ProveedoresModel();          

        $proveedor = $ProveedoresModel->getDatosProveedor($_POST['id_proveedor']);        

        include 'vistas/configuracion/proveedores/editar.php';               

    }   
    

    public function insertar() {      

        $this->model->cargar("ProveedoresModel.php", "configuracion");
        $ProveedoresModel = new ProveedoresModel();                      

        $resp = $ProveedoresModel->insertarProveedor(
            $_POST["nombre"], 
            $_POST["tipodocumento"], 
            $_POST["documento"], 
            $_POST["direccion"], 
            $_POST["telefono"], 
            $_POST["correo"], 
            $_POST["regimen"]
        );       
        

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }              

    }


    public function guardar() {        

        $this->model->cargar("ProveedoresModel.php", 'configuracion');
        $proveedoresModel = new ProveedoresModel();                

         $resp = $proveedoresModel->editarProveedor(
                   $_POST["id"], 
                   $_POST["nombre"], 
                   $_POST["documento"], 
                   $_POST["direccion"], 
                   $_POST["telefono"],
                   $_POST["correo"], 
                   $_POST["regimen"]
            );
     
         if( $resp != 0 ){			     

             echo 1;             

        }else{			     

            echo 0;	            

        }          

    }    
     

    public function eliminar() {        

        $this->model->cargar("ProveedoresModel.php", "configuracion");
        $proveedoresModel = new ProveedoresModel();        

        $proveedoresModel->eliminarProveedor($_POST["id_proveedor"]);        

        echo "1";                

    }    
 
    

 }

?>

