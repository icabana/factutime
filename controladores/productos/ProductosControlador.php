<?php

class ProductosControlador extends ControllerBase {


    public function index() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $productos = $ProductosModel->getTodosProductos();

        include 'vistas/configuracion/productos/default.php';                        

    }    


    public function nuevo(){        

        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();        

        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();        

        $this->model->cargar("BodegasModel.php", "configuracion");
        $BodegasModel = new BodegasModel();
        

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();
        $bodegas = $BodegasModel->getTodosBodegas();        		

        include 'vistas/configuracion/productos/insertar.php';        

    } 
    

    public function editar(){

        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();

        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();
        
        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();        

        $this->model->cargar("BodegasModel.php", "configuracion");
        $BodegasModel = new BodegasModel();
        

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();
        $bodegas = $BodegasModel->getTodosBodegas();
        

        $this->model->cargar("ProductosModel.php", 'configuracion');
        $ProductosModel = new ProductosModel();          

        $producto = $ProductosModel->getDatosProducto($_POST['id_producto']);        

        include 'vistas/configuracion/productos/editar.php';               

    }     
     

    public function insertar() {      

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();     

        $resp = $ProductosModel->insertar(
            $_POST["tipo_producto"], 
            $_POST["codigo_producto"],                        
            $_POST["codigobarra_producto"],                        
            $_POST["categoria_producto"], 
            $_POST["subcategoria_producto"],  
            $_POST["nombre_producto"], 
            $_POST["descripcion_producto"], 
            $_POST["sevende_producto"], 
            $_POST["marca_producto"],
            $_POST["modelo_producto"],
            $_POST["estado_producto"], 
            $_POST["unidad_producto"],
            $_POST["precioxunidad_producto"],
            $_POST["vencimiento_producto"]
        );  
        
        
        $resp_inventario = $ProductosModel->insertar_inventario(
            $resp,
            $_POST["inicial_producto"], 
            $_POST["actual_producto"], 
            $_POST["minimo_producto"], 
            $_POST["maximo_producto"]
        );  

        
        $resp_bitacora = $ProductosModel->insertar_bitacora(
            $resp,
            $_SESSION["idUsuario"], 
            "Se registró un nuevo producto"
        ); 


        $datos_producto = $ProductosModel->getDatosProducto($resp);

        $array[] = array('id'=>$datos_producto['id_producto'],'codigo'=>$datos_producto['CODIGO_PRODUCTO'],'nombre'=>$datos_producto['NOMBRE_PRODUCTO']);

        echo json_encode($array);  

    }
    

    public function guardar() {

        $this->model->cargar("ProductosModel.php", 'configuracion');
        $productosModel = new ProductosModel();

         $resp = $productosModel->editarProducto(
                $_POST["tipo_producto"], 
                $_POST["codigo_producto"],                        
                $_POST["codigobarra_producto"],                        
                $_POST["categoria_producto"], 
                $_POST["subcategoria_producto"],  
                $_POST["nombre_producto"], 
                $_POST["descripcion_producto"],     
                $_POST["marca_producto"],
                $_POST["modelo_producto"],
                $_POST["unidad_producto"],
                $_POST["precioxunidad_producto"],
                $_POST["vencimiento_producto"],
                $_POST["estado_producto"]
        );

         if( $resp != 0 ){	

             echo 1;    

        }else{			    

            echo 0;	            

        }          

    }         
    

    public function eliminar() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $productosModel = new ProductosModel();        

        $productosModel->eliminarProducto($_POST["id_producto"]);        

        echo "1";                

    }    

 }

?>

