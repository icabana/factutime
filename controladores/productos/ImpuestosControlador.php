<?php

class ImpuestosControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("ImpuestosModel.php", "productos");
        $ImpuestosModel = new ImpuestosModel();

        $impuestos = $ImpuestosModel->getTodosImpuestos();

        include 'vistas/productos/impuestos/default.php';                        

    }    
    

    public function nuevo(){        		

        include 'vistas/productos/impuestos/insertar.php';        

    }      


    public function editar(){                        

        $this->model->cargar("ImpuestosModel.php", 'productos');
        $ImpuestosModel = new ImpuestosModel();          

        $impuesto = $ImpuestosModel->getDatosImpuesto($_POST['id_impuesto']);        

        include 'vistas/productos/impuestos/editar.php';              

    }


    public function insertar() {      

        $this->model->cargar("ImpuestosModel.php", "productos");
        $ImpuestosModel = new ImpuestosModel();                      

        $resp = $ImpuestosModel->insertarImpuesto(
                                        $_POST["codigo"],
                                        $_POST["descripcion"]
                                    );     

        if( $resp != 0 ){            
            echo 1;
        }else{
            echo 0;		
        }      

    }
    

    public function guardar() {        

        $this->model->cargar("ImpuestosModel.php", 'productos');
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
     

    public function eliminar() {        

        $this->model->cargar("ImpuestosModel.php", "productos");
        $impuestosModel = new ImpuestosModel();        

        $impuestosModel->eliminarImpuesto($_POST["id_impuesto"]);        

        echo "1";                

    }        

 }

?>