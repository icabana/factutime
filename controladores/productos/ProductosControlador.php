<?php

class ProductosControlador extends ControllerBase {


    public function cargarTablaProductos() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $productos = $ProductosModel->getTodosProductos();

        include 'vistas/configuracion/productos/default.php';                        

    }    

    public function cargarTablaPromociones() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $productos = $ProductosModel->getTodosProductosPromociones();

        include 'vistas/configuracion/productos/default_promociones.php';                        

    }    

    public function cargarTablaNuevaPromocion() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $productos = $ProductosModel->getTodosProductosSinPromocion();

        include 'vistas/configuracion/productos/default_promociones2.php';                        

    }    


    public function abrirCrearProducto(){        

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
    

    public function abrirEditarProducto(){

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
     

    

    public function abrirEditarPromocion(){

        $producto = $ProductosModel->getDatosProducto($_POST['id_producto']);
        include 'vistas/configuracion/productos/editar_promocion.php';

               

    }
     

    public function abrirCrearProducto2(){        

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

        include 'vistas/configuracion/productos/insertar2.php';        

    }
    

    public function abrirEditarProducto2(){

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

        include 'vistas/configuracion/productos/editar2.php';               

    } 
    

    public function insertarProducto() {      

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();     

        $resp = $ProductosModel->insertar(
            $_POST["tipo_producto"], 
            $_POST["codigobarra_producto"],                        
            $_POST["codigo_producto"],                        
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

        $array[] = array('id'=>$datos_producto['ID_PRODUCTO'],'codigo'=>$datos_producto['CODIGO_PRODUCTO'],'nombre'=>$datos_producto['NOMBRE_PRODUCTO']);

        echo json_encode($array);  

    }


    public function insertarProductoOriginal() {      

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();                      

        $resp = $ProductosModel->insertarProducto($_POST["codigo"], $_POST["nombre"], $_POST["precio1"]);    
      
        echo $resp;  

    }
    

    public function editarProducto() {

        $this->model->cargar("ProductosModel.php", 'configuracion');
        $productosModel = new ProductosModel();

         $resp = $productosModel->editarProducto(
            $_POST["id"], $_POST["codigo"], $_POST["nombre"], $_POST["precio1"]
        );

         if( $resp != 0 ){	

             echo 1;    

        }else{			    

            echo 0;	            

        }          

    }         

    public function eliminarProducto() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $productosModel = new ProductosModel();        

        $productosModel->eliminarProducto($_POST["id_producto"]);        

        echo "1";                

    }    

    public function eliminarPromocion() {        

        $this->model->cargar("ProductosModel.php", "configuracion");
        $productosModel = new ProductosModel();        

        $productosModel->eliminarPromocion($_POST["id_producto"]);        

        echo "1";                

    }    

 }

?>

