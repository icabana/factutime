<?php

class UtilidadesControlador extends ControllerBase {

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

        $this->model->cargar("FacturasModel.php", "facturas");
        $facturasModel = new FacturasModel();

        $resp = $facturasModel->insertarProducto(
            $_POST['id_factura'], 
            $_POST['id_producto'], 
            $_POST['cantidad'], 
            $_POST['preciounitario'], 
            $_POST['subtotal'], 
            $_POST['descuento'], 
            $_POST['impuesto'], 
            $_POST['total']
        );

        $productos = $facturasModel->getProductosPorFactura($_POST['id_factura']);


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

        include 'vistas/facturas/tabla_productos.php';

         $array[] = array('tabla'=>$tabla_productos,'subtotal'=>$subtotal_total,'texto_subtotal'=>"$".number_format($subtotal_total,0,',','.'),             'descuento'=>$descuento_total,'texto_descuento'=>"$".number_format($descuento_total,0,',','.'),        'subtotal2'=>$subtotal_total-$descuento_total,'texto_subtotal2'=>"$".number_format(($subtotal_total-$descuento_total),0,',','.'),               'impuesto5'=>$impuesto5_total,'texto_impuesto5'=>"$".number_format($impuesto5_total,0,',','.'),               'impuesto19'=>$impuesto19_total,'texto_impuesto19'=>"$".number_format($impuesto19_total,0,',','.') ,'texto_total'=>"$".number_format($subtotal_total-$descuento_total+$impuesto5_total+$impuesto19_total,0,',','.')   );

        echo json_encode($array); 

    } 


    public function eliminarProducto() {

        $this->model->cargar("FacturasModel.php", "facturas");
        $facturasModel = new FacturasModel();

        $facturasModel->eliminarProducto($_POST["id_facpro"]);

        $productos = $facturasModel->getProductosPorFactura($_POST['id_factura']);

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

        include 'vistas/facturas/tabla_productos.php';

          $array[] = array('tabla'=>$tabla_productos,'subtotal'=>$subtotal_total,'texto_subtotal'=>"$".number_format($subtotal_total,0,',','.'),             'descuento'=>$descuento_total,'texto_descuento'=>"$".number_format($descuento_total,0,',','.'),        'subtotal2'=>$subtotal_total-$descuento_total,'texto_subtotal2'=>"$".number_format(($subtotal_total-$descuento_total),0,',','.'),               'impuesto5'=>$impuesto5_total,'texto_impuesto5'=>"$".number_format($impuesto5_total,0,',','.'),               'impuesto19'=>$impuesto19_total,'texto_impuesto19'=>"$".number_format($impuesto19_total,0,',','.') ,'texto_total'=>"$".number_format($subtotal_total-$descuento_total+$impuesto5_total+$impuesto19_total,0,',','.')   );

        echo json_encode($array); 

    }    
    
    
    function EnviarCorreo($mensaje, $asunto, $archivo, $correo1='', $nombre1='', $correo2='', $nombre2='', $correo3='', $nombre3=''){

        $mails = new Correos();

        $mails->AddAddress( "sistema.viceinvestigacion@gmail.com", "VICERRECTORIA DE INVESTIGACION" );
                            
        if($correo1 != ""){
            $mails->AddAddress( $correo1, $nombre1 );        
        }
        if($correo2 != ""){
            $mails->AddAddress( $correo2, $nombre2 );        
        }
        if($correo3 != ""){
            $mails->AddAddress( $correo3, $nombre3 );        
        }
                    
        $mails->Subject = $asunto;          
        $mails->Body = $mensaje;

        if($archivo != ""){
            $mails->AddAttachment( $archivo );             
        }            
        
        $enviado = $mails->Send();         

        if($enviado){
            return  $mails->ErrorInfo;                  
        }else{
            return $mails->ErrorInfo;             
        }
    
    }

 }

?>