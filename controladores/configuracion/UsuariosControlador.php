<?php

class UsuariosControlador extends ControllerBase {

    public function index() {
        
        $this->model->cargar("UsuariosModel.php", "configuracion");
        $UsuariosModel = new UsuariosModel();

        $usuarios = $UsuariosModel->getTodos();

        include 'vistas/configuracion/usuarios/default.php';
                        
    }    
    
    public function nuevo(){
        
        $this->model->cargar("RolesModel.php", "configuracion");
        $RolesModel = new RolesModel();

        $roles = $RolesModel->getTodos();

        include 'vistas/configuracion/usuarios/insertar.php';
        
    }

         
    public function editar(){
    
        $data['operacion'] = 'editar';
                    
        $this->model->cargar("UsuariosModel.php");
        $UsuariosModel = new UsuariosModel();    

        $this->model->cargar("RolesModel.php");
        $RolesModel = new RolesModel();    
        
        $roles = $RolesModel->getTodos();       
        
        $datos = $UsuariosModel->getDatos($_POST['id_usuario']);
            
        include 'vistas/configuracion/usuarios/editar.php';
               
    }
        
    public function insertar() {
      
        $this->model->cargar("UsuariosModel.php", "configuracion");
        $UsuariosModel = new UsuariosModel();            
        
        $resp = $UsuariosModel->insertar(
                                        $_POST["nick_usuario"], 
                                        $_POST["password_usuario"], 
                                        $_POST["rol_usuario"]
                                    );        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function guardar() {
        
        $this->model->cargar("UsuariosModel.php", 'configuracion');
        $UsuariosModel = new UsuariosModel();
            
        $resp = $UsuariosModel->editar(
            $_POST["id_usuario"], 
            $_POST["nick_usuario"], 
            $_POST["password_usuario"], 
            $_POST["estado_usuario"], 
            $_POST["rol_usuario"]
        );        
      
        if( $resp != 0 ){
             echo 1;             
        }else{
            echo 0;		
        }
        
    }    
        
    public function eliminar() {
        
        $this->model->cargar("UsuariosModel.php", "configuracion");
        $UsuariosModel = new UsuariosModel();
        
        $UsuariosModel->eliminar($_POST["id_usuario"]);
        
        echo "1";        
        
    }    
   
    
 }
