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
            $_POST["tipodocumento_proveedor"], 
            $_POST["documento_proveedor"], 
            $_POST["nombres_proveedor"], 
            $_POST["apellidos_proveedor"], 
            $_POST["direccionresidencia_proveedor"], 
            $_POST["direccioncorrespondencia_proveedor"],
            $_POST["telefono_proveedor"], 
            $_POST["celular_proveedor"], 
            $_POST["correo_proveedor"], 
            $_POST["ciudad_proveedor"], 
            $_POST["pais_proveedor"],
            $_POST["genero_proveedor"],
            $_POST["estadocivil_proveedor"],
            $_POST["hijos_proveedor"],
            $_POST["fechanacimiento_proveedor"],
            $_POST["educacion_proveedor"],
            $_POST["ocupacion_proveedor"],
            $_POST["estado_proveedor"],
            $_POST["paginaweb_proveedor"],
            $_POST["tipo_proveedor"]
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
                $_POST["id_proveedor"], 
                $_POST["tipodocumento_proveedor"], 
                $_POST["documento_proveedor"], 
                $_POST["nombres_proveedor"], 
                $_POST["apellidos_proveedor"], 
                $_POST["direccionresidencia_proveedor"], 
                $_POST["direccioncorrespondencia_proveedor"],
                $_POST["telefono_proveedor"], 
                $_POST["celular_proveedor"], 
                $_POST["correo_proveedor"], 
                $_POST["ciudad_proveedor"], 
                $_POST["pais_proveedor"],
                $_POST["genero_proveedor"],
                $_POST["estadocivil_proveedor"],
                $_POST["hijos_proveedor"],
                $_POST["fechanacimiento_proveedor"],
                $_POST["educacion_proveedor"],
                $_POST["ocupacion_proveedor"],
                $_POST["estado_proveedor"],
                $_POST["paginaweb_proveedor"],
                $_POST["tipo_proveedor"]
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