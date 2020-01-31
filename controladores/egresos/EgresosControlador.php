<?php

class EgresosControlador extends ControllerBase {

    public function index() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();

        $egresos = $EgresosModel->getTodosEgresos();        

        include 'vistas/egresos/default.php';                        

    }      
    

    public function nuevo(){         

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();         

        $this->model->cargar("TegresosModel.php", "configuracion");
        $TegresosModel = new TegresosModel();         
        $tipos_egresos = $TegresosModel->getTodosTegresos();

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();     

        $clientes = $ClientesModel->getTodosClientes();
        $roles = $UsuarioModel->getTodosRoles();
        
        include 'vistas/egresos/insertar.php';

    }

    

    public function editar(){

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();         

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $clientes = $ClientesModel->getTodosClientes();     
        $roles = $UsuarioModel->getTodosRoles();        

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);
        $consecutivo_bd = $EgresosModel->getConsecutivo();
        
        
        $this->model->cargar("TegresosModel.php", "configuracion");
        $TegresosModel = new TegresosModel();         
        $tipos_egresos = $TegresosModel->getTodosTegresos();
        
        $tipo = $_POST['tipo'];
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include 'vistas/egresos/editar.php';

    }

    

    public function insertar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();   

        $params = Parametros::singleton();                     

        $consecutivo = $EgresosModel->getConsecutivo();

        if($consecutivo == "" || $consecutivo == "0"){
            $consecutivo = $params->valor('CONSECUTIVO_EGRESO');
        }

        $resp = $EgresosModel->guardarEgreso($_POST["fecha"], $_POST["proveedor"], $_POST["vendedor"], $_POST["valor"], $_POST["tipo_egreso"], $_POST["observaciones"], $_POST["formapago"], $_POST["numtransaccion"], $consecutivo + 1);   
            
        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }

    }
    

    public function guardar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();           

        $params = Parametros::singleton();          

        $resp = $EgresosModel->editarEgreso($_POST["id_egreso"], $_POST["fecha"], $_POST["cliente"], $_POST["vendedor"], $_POST["valor"], $_POST["tipo_egreso"], $_POST["observaciones"], $_POST["formapago"], $_POST["numtransaccion"]);  

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
        
    }        
    

    public function eliminar() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $egresosModel = new EgresosModel();

        $egresosModel->eliminarEgreso($_POST["id_egreso"]);        

        echo "1";                

    }    


    public function buscarProducto() {

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $datos_cliente = $ClientesModel->getDatosCliente($_POST['cliente']);

        $productos = $ProductosModel->getProductosLIKE($_POST['texto']);        

        $tabla_productos = "<table id='tabla_productos'  class='table table-hover'>

    

    <thead>

        <tr>         

                        

            <th><center>CODIGO</center></th> 

            <th><center>NOMBRE</center></th> 

                       

        </tr>

    </thead>

    <tbody>";

         

        foreach ($productos as $clave => $valor) {
            

            $tabla_productos .= "<tr onclick='seleccionar_producto(" . $valor['ID_PRODUCTO'] . ", \"" . ($valor['CODIGO_PRODUCTO']) . "\", \"" . (utf8_encode($valor['NOMBRE_PRODUCTO'])) . "\", \"" . (utf8_encode($valor['DESCUENTO_PRODUCTO'])) . "\", \"" . (utf8_encode($valor['IMPUESTO_PRODUCTO'])) . "\", \"" . (utf8_encode($valor['PRECIO1_PRODUCTO'])) . "\");'>";  



            $tabla_productos .= "<td><strong>" . utf8_encode($valor['CODIGO_PRODUCTO']) . "</strong></td>";

            $tabla_productos .= "<td><strong>" . utf8_encode($valor['NOMBRE_PRODUCTO']) . "</strong></td>";



            $tabla_productos .= "</tr>";

            

        }

        

       $tabla_productos .= "

</tbody></table>";

        

        echo $tabla_productos;

        

      }
    
      

    public function buscarProveedor() {

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $proveedores = $UsuarioModel->getProveedoresLIKE($_POST['texto']);

        $tabla_proveedores = "<table id='tabla_proveedores'  class='table table-hover'>

            <thead>
                <tr>         
                    <th><center>NOMBRE</center></th> 
                </tr>
            </thead>
            <tbody>";
         

        foreach ($proveedores as $clave => $valor) {            

            $tabla_proveedores .= "<tr onclick='seleccionar_proveedor(" . $valor['ID_PROVEEDOR'] . ", \"" . ($valor['NOMBRE_PROVEEDOR']) . "\", \"" . (utf8_encode($valor['DOCUMENTO_PROVEEDOR'])) . "\", \"" . (utf8_encode($valor['DIRECCION_PROVEEDOR'])) . "\", \"" . (utf8_encode($valor['TELEFONO_PROVEEDOR'])) . "\");'>";  

            $tabla_proveedores .= "<td><strong>" . utf8_encode($valor['NOMBRE_PROVEEDOR']) . "</strong></td>";
         
            $tabla_proveedores .= "</tr>";            

        }
        

       $tabla_proveedores .= "

</tbody></table>";        

        echo $tabla_proveedores;        

      }   
        

    public function cargarReportes() {     

        include 'vistas/egresos/reportes.php';                               

    } 
       

     public function imprimirEgreso(){

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();
        

        $consecutivo_bd = $EgresosModel->getConsecutivo();

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);

        
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/egreso.php");   

                 

        $dirPdf = "archivos/pdf_egreso".$_POST['id_egreso'].".pdf";

          

        $this->pdf->Output(''.$dirPdf.'');

            

        echo "urlRuta=".$dirPdf;

          

    }

        

     public function imprimirEgreso2(){
         

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();        

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();                 

        $consecutivo_bd = $EgresosModel->getConsecutivo();       

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);

        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/egreso2.php");                    

        $dirPdf = "archivos/pdf_egreso2".$_POST['id_egreso'].".pdf";          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;

    }

       

    

     public function imprimirEgreso3(){
         
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();        

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();                 

        $consecutivo_bd = $EgresosModel->getConsecutivo();       

        $egreso = $EgresosModel->getDatosEgreso($_POST['id_egreso']);
        
        $valor_en_letras = $this->convertir($egreso['VALOR_EGRESO']);
        
        include("vistas/egresos/egreso3.php");                    

        $dirPdf = "archivos/pdf_egreso3".$_POST['id_egreso'].".pdf";          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;

    }

    

 }

?>

