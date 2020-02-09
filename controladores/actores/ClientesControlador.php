<?php

class ClientesControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("ClientesModel.php", "actores");
        $ClientesModel = new ClientesModel();

        $clientes = $ClientesModel->getTodos();

        include 'vistas/actores/clientes/default.php';                        

    }        


    public function nuevo(){        		

        $this->model->cargar("TiposModel.php", "actores");
        $TiposModel = new TiposModel();
        $tipos = $TiposModel->getTodos();

        $this->model->cargar("TiposdocumentoModel.php", "configuracion");
        $TiposdocumentoModel = new TiposdocumentoModel();
        $tiposdocumento = $TiposdocumentoModel->getTodos();

        $this->model->cargar("PaisesModel.php", "configuracion");
        $PaisesModel = new PaisesModel();
        $paises = $PaisesModel->getTodos();

        $this->model->cargar("GenerosModel.php", "configuracion");
        $GenerosModel = new GenerosModel();
        $generos = $GenerosModel->getTodos();

        $this->model->cargar("EstadoscivilModel.php", "configuracion");
        $EstadoscivilModel = new EstadoscivilModel();
        $estadoscivil = $EstadoscivilModel->getTodos();
        
        $this->model->cargar("NiveleseducativosModel.php", "configuracion");
        $NivelesModel = new NivelesModel();
        $niveles = $NivelesModel->getTodos();

        $this->model->cargar("ProfesionesModel.php", "configuracion");
        $ProfesionesModel = new ProfesionesModel();
        $profesiones = $ProfesionesModel->getTodos();

        $this->model->cargar("OcupacionesModel.php", "configuracion");
        $OcupacionesModel = new OcupacionesModel();
        $ocupaciones = $OcupacionesModel->getTodos();

        include 'vistas/actores/clientes/insertar.php';        

    } 


    public function editar(){                        

        $this->model->cargar("TiposModel.php", "actores");
        $TiposModel = new TiposModel();
        $tipos = $TiposModel->getTodos();
        
        $this->model->cargar("TiposdocumentoModel.php", "configuracion");
        $TiposdocumentoModel = new TiposdocumentoModel();
        $tiposdocumento = $TiposdocumentoModel->getTodos();

        $this->model->cargar("PaisesModel.php", "configuracion");
        $PaisesModel = new PaisesModel();
        $paises = $PaisesModel->getTodos();

        $this->model->cargar("GenerosModel.php", "configuracion");
        $GenerosModel = new GenerosModel();
        $generos = $GenerosModel->getTodos();

        $this->model->cargar("EstadoscivilModel.php", "configuracion");
        $EstadoscivilModel = new EstadoscivilModel();
        $estadoscivil = $EstadoscivilModel->getTodos();

        $this->model->cargar("NiveleseducativosModel.php", "configuracion");
        $NivelesModel = new NivelesModel();
        $niveles = $NivelesModel->getTodos();

        $this->model->cargar("ProfesionesModel.php", "configuracion");
        $ProfesionesModel = new ProfesionesModel();
        $profesiones = $ProfesionesModel->getTodos();

        $this->model->cargar("OcupacionesModel.php", "configuracion");
        $OcupacionesModel = new OcupacionesModel();
        $ocupaciones = $OcupacionesModel->getTodos();

        $this->model->cargar("ClientesModel.php", 'actores');
        $ClientesModel = new ClientesModel();          
        $cliente = $ClientesModel->getDatos($_POST['id_cliente']);        

        include 'vistas/actores/clientes/editar.php';               

    }
    

    public function insertar() {

        $this->model->cargar("UsuariosModel.php", 'actores');
        $UsuariosModel = new UsuariosModel();                      

        $this->model->cargar("ClientesModel.php", 'actores');
        $ClientesModel = new ClientesModel();                      

        $resp = $UsuariosModel->insertar(
            $_POST["documento_cliente"], 
            $_POST["documento_cliente"]
        );        

        $resp = $ClientesModel->insertar(

            $_POST["tipo_cliente"],
            $_POST["tipodocumento_cliente"], 
            $_POST["documento_cliente"], 
            $_POST["nombres_cliente"], 
            $_POST["apellidos_cliente"], 

            $_POST["direccionresidencia_cliente"], 
            $_POST["direccioncorrespondencia_cliente"],
            $_POST["telefono_cliente"], 
            $_POST["celular_cliente"], 
            $_POST["correo_cliente"], 
            $_POST["paginaweb_cliente"],

            $_POST["paisorigen_cliente"],
            $_POST["ciudadorigen_cliente"], 
            $_POST["fechanacimiento_cliente"],

            $_POST["genero_cliente"],
            $_POST["estadocivil_cliente"],
            $_POST["hijos_cliente"],

            $_POST["niveleducativo_cliente"],
            $_POST["profesion_cliente"],
            $_POST["ocupacion_cliente"]

        );        

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
        
    }
        

    public function guardar() {

        $this->model->cargar("ClientesModel.php", 'actores');
        $clientesModel = new ClientesModel();                

         $resp = $clientesModel->editar(

            $_POST["id_cliente"], 

            $_POST["tipo_cliente"],
            $_POST["tipodocumento_cliente"], 
            $_POST["documento_cliente"], 
            $_POST["nombres_cliente"], 
            $_POST["apellidos_cliente"], 

            $_POST["direccionresidencia_cliente"], 
            $_POST["direccioncorrespondencia_cliente"],
            $_POST["telefono_cliente"], 
            $_POST["celular_cliente"], 
            $_POST["correo_cliente"], 
            $_POST["paginaweb_cliente"],

            $_POST["pais_cliente"],
            $_POST["ciudad_cliente"], 
            $_POST["fechanacimiento_cliente"],

            $_POST["genero_cliente"],
            $_POST["estadocivil_cliente"],
            $_POST["hijos_cliente"],

            $_POST["niveleducativo_cliente"],
            $_POST["profesion_cliente"],
            $_POST["ocupacion_cliente"]
        );     

         if( $resp != 0 ){			     

             echo 1;             

        }else{			     

            echo 0;	            

        }          

    }         

    public function eliminar() {        

        $this->model->cargar("ClientesModel.php", "actores");
        $clientesModel = new ClientesModel();        

        $clientesModel->eliminar($_POST["id_cliente"]);        

        echo "1";                

    }           

 }

?>