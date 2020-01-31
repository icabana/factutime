<?php


class RecibosControlador extends ControllerBase {

    public function index() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();

        $recibos = $RecibosModel->getTodosRecibos(); 

        include 'vistas/recibos/default.php';                        

    }  
    

    public function abrirCrearRecibo(){         

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();         

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $id_recibo = $RecibosModel->insertarRecibo($_POST['tipo']);        

        $clientes = $ClientesModel->getTodosClientes();
        $roles = $UsuarioModel->getTodosRoles();  
        
        include 'vistas/recibos/insertar.php';        

    }

     
    function basico($numero) {
$valor = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte', 'veintiuno', 'veintidos', 'veintitres', 'veinticuatro','veinticinco','veintiséis','veintisiete','veintiocho','veintinueve');
return $valor[$numero - 1];
}
 
function decenas($n) {
$decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
70=>'setenta',80=>'ochenta',90=>'noventa');
if( $n <= 29) return $this->basico($n);
$x = $n % 10;
if ( $x == 0 ) {
return $decenas[$n];
} else return $decenas[$n - $x].' y '. $this->basico($x);
}
 
function centenas($n) {
$cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',
400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',
700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');
if( $n >= 100) {
if ( $n % 100 == 0 ) {
return $cientos[$n];
} else {
$u = (int) substr($n,0,1);
$d = (int) substr($n,1,2);
return (($u == 1)?'ciento':$cientos[$u*100]).' '.$this->decenas($d);
}
} else return $this->decenas($n);
}
 
function miles($n) {
if($n > 999) {
if( $n == 1000) {return 'mil';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-3);
$x = (int)substr($n,-3);
if($c == 1) {$cadena = 'mil '.$this->centenas($x);}
else if($x != 0) {$cadena = $this->centenas($c).' mil '.$this->centenas($x);}
else $cadena = $this->centenas($c). ' mil';
return $cadena;
}
} else return $this->centenas($n);
}
 
function millones($n) {
if($n == 1000000) {return 'un millón';}
else {
$l = strlen($n);
$c = (int)substr($n,0,$l-6);
$x = (int)substr($n,-6);
if($c == 1) {
$cadena = ' millón ';
} else {
$cadena = ' millones ';
}
return $this->miles($c).$cadena.(($x > 0)?$this->miles($x):'');
}
}
function convertir($n) {
switch (true) {
case ( $n >= 1 && $n <= 29) : return $this->basico($n); break;
case ( $n >= 30 && $n < 100) : return $this->decenas($n); break;
case ( $n >= 100 && $n < 1000) : return $this->centenas($n); break;
case ($n >= 1000 && $n <= 999999): return $this->miles($n); break;
case ($n >= 1000000): return $this->millones($n);
}
}
    

    public function abrirEditarRecibo(){

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();         

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $clientes = $ClientesModel->getTodosClientes();     
        $roles = $UsuarioModel->getTodosRoles();        

        $recibo = $RecibosModel->getDatosRecibo($_POST['id_recibo']);
        $consecutivo_bd = $RecibosModel->getConsecutivo();
        
        $tipo = $_POST['tipo'];
        
        $valor_en_letras = $this->convertir($recibo['VALOR_RECIBO']);
        
        include 'vistas/recibos/editar.php';

    }

    

    public function guardarRecibo() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();   

        $params = Parametros::singleton();                     

        $consecutivo = $RecibosModel->getConsecutivo();

        if($consecutivo == "" || $consecutivo == "0"){
            $consecutivo = $params->valor('CONSECUTIVO_RECIBO');
        }
        
        $datos = $RecibosModel->getDatosRecibo2($_POST["fecha"], $_POST["cajero"], $_POST["numtransaccion"]);

        if($datos == 0){
        $resp = $RecibosModel->guardarRecibo($_POST["fecha"], $_POST["cliente"], $_POST["vendedor"], $_POST["formapago"], $_POST["numtransaccion"], $_POST["valor"], $_POST["concepto"], $_POST["observaciones"], $consecutivo + 1, $_POST["cajero"]);   
            
        if( $resp != 0 ){
            echo $resp;
        }else{
            echo 0;	
        }
        }else{
            
             echo 0;	
             
        }

    }

    
    public function guardar() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();           

        $params = Parametros::singleton();  
        
        $resp = $RecibosModel->editarRecibo(
            $_POST["id_recibo"], 
            $_POST["fecha"], 
            $_POST["cliente"], 
            $_POST["vendedor"], 
            $_POST["formapago"], 
            $_POST["numtransaccion"], 
            $_POST["valor"], 
            $_POST["concepto"], 
            $_POST["observaciones"],
             $_POST["cajero"]
        );  

        if( $resp != 0 ){
            echo 1;
        }else{
            echo 0;	
        }      
                
    }

     
    

    public function editarValoresRecibo() {      

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();           

        $params = Parametros::singleton();                                        

            $resp = $RecibosModel->editarValoresFacPedCot($_POST["id_recibo"], $_POST["subtotal"], $_POST["descuento"], $_POST["iva19"], $_POST["iva5"], $_POST["total"]);   
    
        if( $resp != 0 ){

            echo 1;

        }else{

            echo 0;			

        }              

    }
  

    public function eliminar() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $recibosModel = new RecibosModel();

        $recibosModel->eliminarRecibo($_POST["id_recibo"]);

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
    

    

    public function cambiarValor() {

        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $datos_cliente = $ClientesModel->getDatosCliente($_POST['cliente']);

        $datos_producto = $ProductosModel->getDatosProducto($_POST['id_producto']);
        
        
        if($_POST['tipo'] == "MAYOR"){
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 1"){
                $valor_producto = $datos_producto['PRECIO1_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 2"){
                $valor_producto = $datos_producto['PRECIO2_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 3"){
                $valor_producto = $datos_producto['PRECIO3_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 4"){
                $valor_producto = $datos_producto['PRECIO4_PRODUCTO'];
            }
        }else{
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 1"){
                $valor_producto = $datos_producto['PRECIO1xUNIDAD_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 2"){
                $valor_producto = $datos_producto['PRECIO2xUNIDAD_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 3"){
                $valor_producto = $datos_producto['PRECIO3xUNIDAD_PRODUCTO'];
            }
            if($datos_cliente['PRECIO_CLIENTE'] == "PRECIO 4"){
                $valor_producto = $datos_producto['PRECIO4xUNIDAD_PRODUCTO'];
            }
            
            
        }

        echo $valor_producto;

        

      }

        

      

      

      

      

      

    public function buscarCliente() {

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $clientes = $UsuarioModel->getEstudiantesLIKE($_POST['texto']);

        $tabla_clientes = "<table id='tabla_clientes'  class='table table-hover'>

    <thead>

        <tr>         

                        

            <th><center>NOMBRE</center></th> 

                       

        </tr>

    </thead>

    <tbody>";

         

        foreach ($clientes as $clave => $valor) {

            

            $tabla_clientes .= "<tr onclick='seleccionar_cliente(" . $valor['ID_ESTUDIANTE'] . ", \"" . ($valor['NOMBRES_ESTUDIANTE']) . "\", \"" . (utf8_encode($valor['DOCUMENTO_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['DIRECCION_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['DIRECCION_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['TELEFONO_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['CELULAR_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['CIUDAD_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['APELLIDOS_ESTUDIANTE'])) . "\");'>";  



            $tabla_clientes .= "<td><strong>" . utf8_encode($valor['NOMBRES_ESTUDIANTE'])." ".(utf8_encode($valor['APELLIDOS_ESTUDIANTE'])) . "</strong></td>";

          



            $tabla_clientes .= "</tr>";

            

        }

        

       $tabla_clientes .= "

</tbody></table>";

        

        echo $tabla_clientes;

        

      }
      
     
      

    public function insertarProducto() {        

        $this->model->cargar("RecibosModel.php", "recibos");
        $recibosModel = new RecibosModel();                        

        $resp = $recibosModel->insertarProducto(
            $_POST['id_recibo'], 
            $_POST['id_producto'],
            $_POST['cantidad'], 
            $_POST['preciounitario'], 
            $_POST['subtotal'], 
            $_POST['descuento'], 
            $_POST['impuesto'],
            $_POST['total']);
               

        $productos = $recibosModel->getProductosPorRecibo($_POST['id_recibo']);
       

        $subtotal_total = 0;
        $descuento_total = 0;
        $impuesto5_total = 0;
        $impuesto19_total = 0;
        $descuento_parcial = 0;      

        

        foreach ($productos as $producto) {            

            $subtotal_total += $producto['SUBTOTAL_FACPRO'];          
            $descuento_total += $producto['SUBTOTAL_FACPRO'] *  $producto['DESCUENTO_FACPRO'] / 100;
            $descuento_parcial = $producto['SUBTOTAL_FACPRO'] *  $producto['DESCUENTO_FACPRO'] / 100;

            if($producto['IMPUESTO_FACPRO'] == 5){          

                $impuesto5_total += ($producto['SUBTOTAL_FACPRO'] - $descuento_parcial) *  $producto['IMPUESTO_FACPRO'] / 100;
              
            }

            if($producto['IMPUESTO_FACPRO'] == 19){            

                $impuesto19_total += ($producto['SUBTOTAL_FACPRO'] - $descuento_parcial) *  $producto['IMPUESTO_FACPRO'] / 100;
               
            }            

        }

        include 'vistas/recibos/tabla_productos.php';        

     $array[] = array('tabla'=>$tabla_productos,'subtotal'=>$subtotal_total,'texto_subtotal'=>"$".number_format($subtotal_total,0,',','.'),             'descuento'=>$descuento_total,'texto_descuento'=>"$".number_format($descuento_total,0,',','.'),        'subtotal2'=>$subtotal_total-$descuento_total,'texto_subtotal2'=>"$".number_format(($subtotal_total-$descuento_total),0,',','.'),               'impuesto5'=>$impuesto5_total,'texto_impuesto5'=>"$".number_format($impuesto5_total,0,',','.'),               'impuesto19'=>$impuesto19_total,'texto_impuesto19'=>"$".number_format($impuesto19_total,0,',','.') ,'texto_total'=>"$".number_format($subtotal_total-$descuento_total+$impuesto5_total+$impuesto19_total,0,',','.')   );

        echo json_encode($array); 
                 

    } 


    public function eliminarProducto() {        

        $this->model->cargar("RecibosModel.php", "recibos");
        $recibosModel = new RecibosModel();        

        $recibosModel->eliminarProducto($_POST["id_facpro"]);               

        $productos = $recibosModel->getProductosPorRecibo($_POST['id_recibo']);        

        $subtotal_total = 0;
        $descuento_total = 0;
        $impuesto5_total = 0;
        $impuesto19_total = 0;
        $descuento_parcial = 0;     

        foreach ($productos as $producto) {            

            $subtotal_total += $producto['SUBTOTAL_FACPRO'];    

            $descuento_total += $producto['SUBTOTAL_FACPRO'] *  $producto['DESCUENTO_FACPRO'] / 100;
           
            $descuento_parcial = $producto['SUBTOTAL_FACPRO'] *  $producto['DESCUENTO_FACPRO'] / 100;
           

            if($producto['IMPUESTO_FACPRO'] == 5){            

                $impuesto5_total += ($producto['SUBTOTAL_FACPRO'] - $descuento_parcial) *  $producto['IMPUESTO_FACPRO'] / 100;
              
            }

            if($producto['IMPUESTO_FACPRO'] == 19){            

                $impuesto19_total += ($producto['SUBTOTAL_FACPRO'] - $descuento_parcial) *  $producto['IMPUESTO_FACPRO'] / 100;
               
            }           

        }

        include 'vistas/recibos/tabla_productos.php';
       
        $array[] = array('tabla'=>$tabla_productos,'subtotal'=>$subtotal_total,'texto_subtotal'=>"$".number_format($subtotal_total,0,',','.'),             'descuento'=>$descuento_total,'texto_descuento'=>"$".number_format($descuento_total,0,',','.'),        'subtotal2'=>$subtotal_total-$descuento_total,'texto_subtotal2'=>"$".number_format(($subtotal_total-$descuento_total),0,',','.'),               'impuesto5'=>$impuesto5_total,'texto_impuesto5'=>"$".number_format($impuesto5_total,0,',','.'),               'impuesto19'=>$impuesto19_total,'texto_impuesto19'=>"$".number_format($impuesto19_total,0,',','.') ,'texto_total'=>"$".number_format($subtotal_total-$descuento_total+$impuesto5_total+$impuesto19_total,0,',','.')   );
         
        echo json_encode($array); 

    }    

       

    public function cargarReportes() {                

        include 'vistas/recibos/reportes.php';                               

    }   
    

     public function imprimirRecibo(){
         
        $this->model->cargar("FacturasModel.php", "facturas");

        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();


        $clientes = $ClientesModel->getTodosClientes();
        $terminos = $TerminosModel->getTodosTerminos();
        $roles = $UsuarioModel->getTodosRoles();

        $productos = $RecibosModel->getProductosPorRecibo($_POST['id_recibo']);
        $consecutivo_bd = $RecibosModel->getConsecutivo();
        $recibo = $RecibosModel->getDatosRecibo($_POST['id_recibo']);
        
        
  $admision = $FacturasModel->getInscripcionActualPorEstudiante($recibo['ID_ESTUDIANTE']);
        
        
        $valor_en_letras = $this->convertir($recibo['VALOR_RECIBO']);

        include("vistas/recibos/recibo.php");   

        $dirPdf = "archivos/pdf_recibo".$_POST['id_recibo'].".pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;


    }

    

     public function imprimirRecibo2(){                       

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();
         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();
        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();
                

        $clientes = $ClientesModel->getTodosClientes();
        $terminos = $TerminosModel->getTodosTerminos();
        $roles = $UsuarioModel->getTodosRoles();
        

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

        $productos = $RecibosModel->getProductosPorRecibo($_POST['id_recibo']);        

        $consecutivo_bd = $RecibosModel->getConsecutivo();

        $recibo = $RecibosModel->getDatosRecibo($_POST['id_recibo']);
        
  $admision = $FacturasModel->getInscripcionActualPorEstudiante($recibo['ID_ESTUDIANTE']);
        $valor_en_letras = $this->convertir($recibo['VALOR_RECIBO']);        


        include("vistas/recibos/recibo2.php");   
                 

        $dirPdf = "archivos/pdf_recibo2".$_POST['id_recibo'].".pdf";
          

        $this->pdf->Output(''.$dirPdf.'');
            
        echo "urlRuta=".$dirPdf;          

    }
    

     public function imprimirRecibo3(){
       

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();                

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();         

        $this->model->cargar("UsuarioModel.php", "configuracion");
        $UsuarioModel = new UsuarioModel();         

        $this->model->cargar("ClientesModel.php", "configuracion");
        $ClientesModel = new ClientesModel();         

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();                

        $clientes = $ClientesModel->getTodosClientes();

        $terminos = $TerminosModel->getTodosTerminos();

        $roles = $UsuarioModel->getTodosRoles();

        $this->model->cargar("CategoriasModel.php", "configuracion");
        $CategoriasModel = new CategoriasModel();        

        $this->model->cargar("SubCategoriasModel.php", "configuracion");
        $SubCategoriasModel = new SubCategoriasModel();        

        $this->model->cargar("UnidadesModel.php", "configuracion");
        $UnidadesModel = new UnidadesModel();        

        $this->model->cargar("TerminosModel.php", "configuracion");
        $TerminosModel = new TerminosModel();        
        

        $categorias = $CategoriasModel->getTodosCategorias();
        $subcategorias = $SubCategoriasModel->getTodosSubCategorias();
        $unidades = $UnidadesModel->getTodosUnidades();
        $terminos = $TerminosModel->getTodosTerminos();
        $productos = $RecibosModel->getProductosPorRecibo($_POST['id_recibo']);
        $consecutivo_bd = $RecibosModel->getConsecutivo();      
        

        $recibo = $RecibosModel->getDatosRecibo($_POST['id_recibo']);

        $facturas = $FacturasModel->getFacturasPorCliente($recibo['CLIENTE_RECIBO']);
        
        $total_facturado = 0;
        
        foreach ($facturas as $factura) {
            
            $total_facturado += $factura['TOTAL_FACTURA'];
            
        }
        
               
        
        $recibos = $RecibosModel->getRecibosPorCliente($recibo['CLIENTE_RECIBO']);
        
        $total_recibido = 0;
        
        foreach ($recibos as $recibo) {
            
            $total_recibido += $recibo['VALOR_RECIBO'];
            
        }
        

        $valor_en_letras = $this->convertir($recibo['VALOR_RECIBO']);        

        $saldo_pendiente = $total_facturado - $total_recibido;        
        

        include("vistas/recibos/recibo3.php");                   

        $dirPdf = "archivos/pdf_recibo3".$_POST['id_recibo'].".pdf";      

        $this->pdf->Output(''.$dirPdf.'');            

        echo "urlRuta=".$dirPdf;          

    }        

 }

?>