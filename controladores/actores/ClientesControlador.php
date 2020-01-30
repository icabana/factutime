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
            $_POST["nombre"], 
            $_POST["tipodocumento_cliente"], 
            $_POST["documento"], 
            $_POST["contacto"], 
            $_POST["direccion1"], 
            $_POST["direccion2"], 
            $_POST["telefono"], 
            $_POST["celular"], 
            $_POST["correo1"], 
            $_POST["correo2"], 
            $_POST["ciudad"], 
            $_POST["precio_cliente"]
        );        

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
        
    }
    

    public function insertar2() {      

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();     

        $resp = $ClientesModel->insertarCliente(
            $_POST["nombre_cliente"], 
            $_POST["tipodocumento_cliente"], 
            $_POST["documento_cliente"], 
            $_POST["contacto_cliente"], 
            $_POST["direccion1_cliente"], 
            $_POST["direccion2_cliente"], 
            $_POST["telefono_cliente"], 
            $_POST["celular_cliente"], 
            $_POST["correo1_cliente"], 
            $_POST["correo2_cliente"],
            $_POST["ciudad_cliente"], 
            $_POST["precio_cliente"]
        );   
        

        $datos = $ClientesModel->getDatosCliente($resp);                

        $array[] = array('id'=>$datos['ID_CLIENTE'],'nombre'=>$datos['NOMBRE_CLIENTE'],'direccion1'=>$datos['DIRECCION1_CLIENTE'],'direccion2'=>$datos['DIRECCION2_CLIENTE'],'telefono'=>$datos['TELEFONO_CLIENTE'],'celular'=>$datos['CELULAR_CLIENTE'],'correo1'=>$datos['CORREO1_CLIENTE'],'correo2'=>$datos['CORREO2_CLIENTE'],'ciudad'=>$datos['CIUDAD_CLIENTE']);
      
        echo json_encode($array);         

    }
        

    public function guardar() {

        $this->model->cargar("ClientesModel.php", 'configuracion');
        $clientesModel = new ClientesModel();                

         $resp = $clientesModel->editarCliente(
                $_POST["id"], 
                $_POST["nombre"], 
                $_POST["documento"], 
                $_POST["contacto"], 
                $_POST["direccion1"], 
                $_POST["direccion2"], 
                $_POST["telefono"], 
                $_POST["celular"], 
                $_POST["correo1"], 
                $_POST["correo2"], 
                $_POST["ciudad"], 
                $_POST["precio_cliente"]
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

