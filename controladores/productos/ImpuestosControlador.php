<?php

class ImpuestosControlador extends ControllerBase {


    public function cargarTablaImpuestos() {        

        $this->model->cargar("ImpuestosModel.php", "configuracion");
        $ImpuestosModel = new ImpuestosModel();

        $impuestos = $ImpuestosModel->getTodosImpuestos();

        include 'vistas/configuracion/impuestos/default.php';                        

    }    
    

    public function abrirCrearImpuesto(){        		

        include 'vistas/configuracion/impuestos/insertar.php';        

    }      


    public function abrirEditarImpuesto(){                        

        $this->model->cargar("ImpuestosModel.php", 'configuracion');
        $ImpuestosModel = new ImpuestosModel();          

        $impuesto = $ImpuestosModel->getDatosImpuesto($_POST['id_impuesto']);        

        include 'vistas/configuracion/impuestos/editar.php';              

    }


    public function insertarImpuesto() {      

        $this->model->cargar("ImpuestosModel.php", "configuracion");
        $ImpuestosModel = new ImpuestosModel();                      

        $resp = $ImpuestosModel->insertarImpuesto($_POST["codigo"], $_POST["descripcion"]);     

        if( $resp != 0 ){            
            echo 1;
        }else{
            echo 0;		
        }      

    }
    

    public function editarImpuesto() {        

        $this->model->cargar("ImpuestosModel.php", 'configuracion');
        $impuestosModel = new ImpuestosModel();                

        $resp = $impuestosModel->editarImpuesto(
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
     

    public function eliminarImpuesto() {        

        $this->model->cargar("ImpuestosModel.php", "configuracion");
        $impuestosModel = new ImpuestosModel();        

        $impuestosModel->eliminarImpuesto($_POST["id_impuesto"]);        

        echo "1";                

    }        

 }

?>