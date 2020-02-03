<?php

class ClientesControlador extends ControllerBase {

    public function index() {        

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $clientes = $ClientesModel->getTodosClientes();

        include 'vistas/configuracion/clientes/default.php';                        

    }        


    public function nuevo(){        		

        include 'vistas/configuracion/clientes/insertar.php';        

    } 


    public function editar(){                        

        $this->model->cargar("ClientesModel.php", 'configuracion');
        $ClientesModel = new ClientesModel();          

        $cliente = $ClientesModel->getDatosCliente($_POST['id_cliente']);        

        include 'vistas/configuracion/clientes/editar.php';               

    }
    

    public function insertar() {

        $this->model->cargar("ClientesModel.php", 'configuracion');
        $clientesModel = new ClientesModel();                      

        $resp = $clientesModel->insertarCliente(
            $_POST["tipodocumento_cliente"], 
            $_POST["documento_cliente"], 
            $_POST["nombres_cliente"], 
            $_POST["apellidos_cliente"], 
            $_POST["direccionresidencia_cliente"], 
            $_POST["direccioncorrespondencia_cliente"],
            $_POST["telefono_cliente"], 
            $_POST["celular_cliente"], 
            $_POST["correo_cliente"], 
            $_POST["ciudad_cliente"], 
            $_POST["pais_cliente"],
            $_POST["genero_cliente"],
            $_POST["estadocivil_cliente"],
            $_POST["hijos_cliente"],
            $_POST["fechanacimiento_cliente"],
            $_POST["educacion_cliente"],
            $_POST["ocupacion_cliente"],
            $_POST["estado_cliente"],
            $_POST["paginaweb_cliente"],
            $_POST["tipo_cliente"]
        );        

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
        
    }
        

    public function guardar() {

        $this->model->cargar("ClientesModel.php", 'configuracion');
        $clientesModel = new ClientesModel();                

         $resp = $clientesModel->editarCliente(
                $_POST["id_cliente"], 
                $_POST["tipodocumento_cliente"], 
                $_POST["documento_cliente"], 
                $_POST["nombres_cliente"], 
                $_POST["apellidos_cliente"], 
                $_POST["direccionresidencia_cliente"], 
                $_POST["direccioncorrespondencia_cliente"],
                $_POST["telefono_cliente"], 
                $_POST["celular_cliente"], 
                $_POST["correo_cliente"], 
                $_POST["ciudad_cliente"], 
                $_POST["pais_cliente"],
                $_POST["genero_cliente"],
                $_POST["estadocivil_cliente"],
                $_POST["hijos_cliente"],
                $_POST["fechanacimiento_cliente"],
                $_POST["educacion_cliente"],
                $_POST["ocupacion_cliente"],
                $_POST["estado_cliente"],
                $_POST["paginaweb_cliente"],
                $_POST["tipo_cliente"]
        );     

         if( $resp != 0 ){			     

             echo 1;             

        }else{			     

            echo 0;	            

        }          

    }         

    public function eliminar() {        

        $this->model->cargar("ClientesModel.php", "configuracion");
        $clientesModel = new ClientesModel();        

        $clientesModel->eliminarCliente($_POST["id_cliente"]);        

        echo "1";                

    }           

 }

?>