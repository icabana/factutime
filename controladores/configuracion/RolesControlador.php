<?php

class RolesControlador extends ControllerBase {

    public function index() {
        
        $this->model->cargar("RolesModel.php", "configuracion");
        $RolesModel = new RolesModel();

        $roles = $RolesModel->getTodos();

        include 'vistas/configuracion/roles/default.php';
                        
    }    
    
    public function nuevo(){
        
        $this->model->cargar("RolesModel.php", "configuracion");
        $RolesModel = new RolesModel();

        $roles = $RolesModel->getTodos();

        include 'vistas/configuracion/roles/insertar.php';
        
    }

         
    public function editar(){
    
        $data['operacion'] = 'editar';

        $this->model->cargar("RolesModel.php");
        $RolesModel = new RolesModel();    
        
        $roles = $RolesModel->getTodos();       
        
        $datos = $RolesModel->getDatos($_POST['id_rol']);
            
        include 'vistas/configuracion/roles/editar.php';
               
    }
        
    public function insertar() {
      
        $this->model->cargar("RolesModel.php", "configuracion");
        $RolesModel = new RolesModel();            
        
        $resp = $RolesModel->insertar(
                    $_POST["nombre_rol"]
                );        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function guardar() {
        
        $this->model->cargar("RolesModel.php", 'configuracion');
        $RolesModel = new RolesModel();
            
        $resp = $RolesModel->editar(
            $_POST["id_rol"], 
            $_POST["nombre_rol"]
        );        
      
        if( $resp != 0 ){
             echo 1;             
        }else{
            echo 0;		
        }
        
    }    
        
    public function eliminar() {
        
        $this->model->cargar("RolesModel.php", "configuracion");
        $RolesModel = new RolesModel();
        
        $RolesModel->eliminar($_POST["id_rol"]);
        
        echo "1";        
        
    }    
   
             
 }