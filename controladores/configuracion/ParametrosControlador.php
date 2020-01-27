<?php

class ParametrosControlador extends ControllerBase {

    public function index() {
        
        $this->model->cargar("ParametrosModel.php", "configuracion");
        $ParametrosModel = new ParametrosModel();

        $parametros = $ParametrosModel->getTodos();

        include 'vistas/configuracion/parametros/default.php';
                        
    }    
    
    public function nuevo(){
        
        include 'vistas/configuracion/parametros/insertar.php';
        
    }

         
    public function editar(){
    
        $data['operacion'] = 'editar';
                    
        $this->model->cargar("ParametrosModel.php");
        $ParametrosModel = new ParametrosModel();    
        
        $datos = $ParametrosModel->getDatos($_POST['id_parametro']);
            
        include 'vistas/configuracion/parametros/editar.php';
               
    }
        
    public function insertar() {
      
        $this->model->cargar("ParametrosModel.php", "configuracion");
        $ParametrosModel = new ParametrosModel();            
        
        $resp = $ParametrosModel->insertar(
                                        $_POST["nombre_parametro"],  
                                        $_POST["valor_parametro"]
                                    );        
        
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;			
        }      
        
    }
    
    public function guardar() {
        
        $this->model->cargar("ParametrosModel.php", 'configuracion');
        $ParametrosModel = new ParametrosModel();
            
        $resp = $ParametrosModel->editar(
            $_POST["id_parametro"],  
            $_POST["nombre_parametro"],  
            $_POST["valor_parametro"]
        );        
      
        if( $resp != 0 ){
             echo 1;             
        }else{
            echo 0;		
        }
        
    }    
        
    public function eliminar() {
        
        $this->model->cargar("ParametrosModel.php", "configuracion");
        $ParametrosModel = new ParametrosModel();
        
        $ParametrosModel->eliminar($_POST["id_parametro"]);
        
        echo "1";        
        
    }    
    
 }
