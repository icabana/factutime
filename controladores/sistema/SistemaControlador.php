<?php

class SistemaControlador extends ControllerBase {

    public function validarUsuario() {
        		
        $nick = preg_replace("[^A-Za-z0-9]", "", $_POST['nick']);
        $password = preg_replace("[^A-Za-z0-9]", "", $_POST['password']);

        $this->model->cargar("UsuariosModel.php", "configuracion");
        $UsuariosModel = new UsuariosModel();                

        $usuario = $UsuariosModel->validar($nick, $password);

        if ( is_array( $usuario ) ) {

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nick_usuario'] = $usuario['nick_usuario'];
            $_SESSION['nombre_rol'] = $usuario['nombre_rol'];

        } else {
            
            echo '0';

        }   
        
    }

    public function Inicio(){
		
	$plantilla = $this->config->get('plantillas').$this->params->valor('TEMPLATE');
        $vistas = $this->config->get('vistas');

        if ( !isset($_SESSION['id_usuario']) ) {
            
            session_destroy();
            $this->plantilla->index();           
                
        } else {
            
            $this->model->cargar("UsuariosModel.php", "configuracion");
            $UsuariosModel = new UsuariosModel();
       
            $data['usuario'] = $UsuariosModel->getDatos($_SESSION['id_usuario']);
            $data['datos_usuario'] = $UsuariosModel->getDatos($_SESSION['id_usuario']); 
            $data['usuarios'] = $UsuariosModel->getTodos();	
            
            $this->plantilla->index($data);
            
        }
    }

    public function session() {
        $params = Parametros::singleton();
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $this->model->cargar("UsuariosModel.php");
            $UsuariosModel = new UsuariosModel();
            $data['usuario'] = $UsuariosModel->getUsuario($id_usuario);

            $this->view->vista("../plantillas/".$params->valor('TEMPLATE')."/session.php", $data);
        }
    }

    public function cargaInicial() {
	$params = Parametros::singleton();
        if (isset($_SESSION['id_usuario'])) {
            $this->view->vista( "inicio/cargaInicial.php", array(), $_POST['modulo']);
        }
    }
 
    public function cerrar(){
        
    	$_SESSION = array();
    	session_unset();
        session_destroy();   
		
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
        echo "http://".$host.$uri."/";        
        
    }
    
}

?>