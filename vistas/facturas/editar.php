<script type="text/javascript" >

    function guardar_factura(){

        if($("#cliente").val() == "" ){
            mensaje_alertas("error", "DEBE SELECCIONAR UN CLIENTE DE LA LISTA", "center");
            return false;
        }  

        var numero_productos =  $("#tabla_productos >tbody >tr").length;   

        if(numero_productos==0){
            mensaje_alertas("error", "Debe registrar al menos 1 producto", "center");
            return 0;
        }

        var iva19 = $("#iva19_total").val();

        if($("#iva19_total").val() == ""){
            iva19 = 0;
        }   

        var iva5 = $("#iva5_total").val();

        if($("#iva5_total").val() == ""){
            iva5 = 0;
        }

        var descuento = $("#descuento_total").val();

        if($("#descuento_total").val() == ""){
            descuento = 0;
        }


    ejecutarAccion(

            'facturas', 
            'Facturas', 
            'editarFactura', 
            "id_factura="+$("#id_factura").val()+
            "&cliente="+$("#cliente").val()+
            "&vendedor="+$("#vendedor").val()+
            "&termino="+$("#termino").val()+
            "&subtotal="+$("#subtotal_total").val()+
            "&total="+$("#total_total").val()+
            "&descuento="+descuento+
            "&iva19="+iva19+
            "&iva5="+iva5+
            "&descripcion="+$("#descripcion").val()+
            "&fecha="+$("#fecha").val()+
            "&fecha2="+$("#fecha2").val()+
            "&vencimiento="+$("#vencimiento").val()+
            "&tipopago="+$("#tipopago").val(), 
            'mensaje_alertas("success", "Factura Editada Exitosamente", "center"); recargar_listado();'

        );	  

    }


    function convertir_factura(){                   

        if($("#cliente").val() == "" ){
            mensaje_alertas("error", "DEBE SELECCIONAR UN CLIENTE DE LA LISTA", "center");
            return false;
        }   

        var numero_productos =  $("#tabla_productos >tbody >tr").length;       

        if(numero_productos==0){
            mensaje_alertas("error", "Debe registrar al menos 1 producto", "center");
            return 0;
        } 
            

        var iva19 = $("#iva19_total").val();
        if($("#iva19_total").val() == ""){
            iva19 = 0;
        }    


        var iva5 = $("#iva5_total").val();
        if($("#iva5_total").val() == ""){
            iva5 = 0;
        }


        var descuento = $("#descuento_total").val();
        if($("#descuento_total").val() == ""){
            descuento = 0;
        }
    
    ejecutarAccion(

            'facturas', 
            'Facturas', 
            'convertirFactura', 
            "id_factura="+$("#id_factura").val()+
            "&cliente="+$("#cliente").val()+
            "&vendedor="+$("#vendedor").val()+
            "&termino="+$("#termino").val()+
            "&subtotal="+$("#subtotal_total").val()+
            "&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&vencimiento="+$("#vencimiento").val(), 'mensaje_alertas("success", "Factura Editada Exitosamente", "center"); abrir_editar_factura(data);'

        );	
            

    }

    function editar_factura(id_factura){

        abrirVentanaContenedor(
            'facturas', 
            'Facturas', 
            'abrirEditarFactura',
            'id_factura='+id_factura+
            '&tipo='+$("#tipo_factura").val(),
            'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
        );  

    }


    function buscar_producto(texto) {           

        if(texto.length < 3) {

            $('#vista_productos').hide();

        } else {

            ejecutarAccion(
                "facturas", 
                "Facturas", 
                "buscarProducto", 
                "texto="+texto, 
                "$('#vista_productos').show(); $('#vista_productos').html(data);");

        }   

    }


function buscar_cliente(texto) {           

    if(texto.length < 3) {

        $('#vista_clientes').hide();

    } else {

        ejecutarAccion(
            "facturas", 
            "Facturas", 
            "buscarCliente", 
            "texto="+texto, 
            "$('#vista_clientes').show(); $('#vista_clientes').html(data);"
        );
    }    

}


function insertar_producto(){        

    if($("#id_producto").val() == "" ){
        mensaje_alertas("error", "DEBE SELECCIONAR UN PRODUCTO", "center");
        return false;
    }        

    if($("#cantidad").val() == "" || $("#cantidad").val() == "0" ){
        mensaje_alertas("error", "DEBE INDICAR LA CANTIDAD", "center");
        return false;
    }        

    if($("#preciounitario").val() == "" || $("#preciounitario").val() == "0" ){
        mensaje_alertas("error", "DEBE INDICAR EL PRECIO UNITARIO", "center");
        return false;
    }        

    if($("#descuento").val() == ""){
       $("#descuento").val(0) ;
    }      

    ejecutarAccion(
        'facturas', 
        'Facturas', 
        'insertarProducto',
        "id_factura="+$("#id_factura").val()+
        "&id_producto="+$("#id_producto").val()+
        "&cantidad="+$("#cantidad").val()+
        "&preciounitario="+$("#preciounitario").val()+
        "&descuento="+$("#descuento").val()+
        "&impuesto="+$("#impuesto").val()+
        "&subtotal="+$("#subtotal").val()+
        "&total="+$("#total").val(),
        "var json = eval(data);  $('#tabla_factura').html(json[0].tabla); $('#subtotal_total').val(json[0].subtotal);  $('#span_subtotal').html(json[0].texto_subtotal);  $('#descuento_total').val(json[0].descuento);   $('#span_descuento').html(json[0].texto_descuento);     $('#subtotal2_total').val(json[0].subtotal2);  $('#span_subtotal2').html(json[0].texto_subtotal2);      $('#iva19_total').val(json[0].impuesto19); $('#span_iva19').html(json[0].texto_impuesto19);     $('#iva5_total').val(json[0].impuesto5); $('#span_iva5').html(json[0].texto_impuesto5);       $('#span_total').html(json[0].texto_total);      calcular_total_total2(json[0].subtotal);  "

    );	
        

    $("#id_producto").val(""); 
    $("#text_producto").val(""); 
    $("#cantidad").val("0");
    $("#preciounitario").val("");
    $("#subtotal").val("");
    $("#descuento").val("0");
    $("#impuesto").val("0");
    $("#total").val("");    

    crearFormatoNumeros();           

}


function eliminar_producto(id_facpro){

    mensaje_confirmar("¿Está seguro de eliminar El Producto Ingresado?", "eliminar_producto2("+id_facpro+"); ");

}


function eliminar_producto2(id_facpro){   

    ejecutarAccion( 
        'facturas', 
        'Facturas', 
        'eliminarProducto', 
        "id_factura="+$("#id_factura").val()+"&id_facpro="+id_facpro, "var json = eval(data);  $('#tabla_factura').html(json[0].tabla); $('#subtotal_total').val(json[0].subtotal);  $('#span_subtotal').html(json[0].texto_subtotal);  $('#descuento_total').val(json[0].descuento);   $('#span_descuento').html(json[0].texto_descuento);     $('#subtotal2_total').val(json[0].subtotal2);  $('#span_subtotal2').html(json[0].texto_subtotal2);      $('#iva19_total').val(json[0].impuesto19); $('#span_iva19').html(json[0].texto_impuesto19);     $('#iva5_total').val(json[0].impuesto5); $('#span_iva5').html(json[0].texto_impuesto5);       $('#span_total').html(json[0].texto_total);      calcular_total_total2(json[0].subtotal); "

    );

             

             

var iva19 = $("#iva19_total").val();



     if($("#iva19_total").val() == ""){

         iva19 = 0;

     }

    

     var iva5 = $("#iva5_total").val();



     if($("#iva5_total").val() == ""){

         iva5 = 0;

     }

     var descuento = $("#descuento_total").val();



     if($("#descuento_total").val() == ""){

         descuento = 0;

     }

        

        

    ejecutarAccionSinAlert(

        'facturas', 'Facturas', 'editarFactura', 

         "id_factura="+$("#id_factura").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&termino="+$("#termino").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&vencimiento="+$("#vencimiento").val(), ''

    );	

       

       

     

     

     

     



}







function seleccionar_producto(ID, CODIGO, NOMBRE, DESCUENTO, IMPUESTO, VALOR){

    if($("#cliente").val() == ""){
         mensaje_alertas("error", "Debe seleccionar un cliente", "center"); 
    }else{

    var texto = CODIGO+" - "+NOMBRE;

    

    $("#id_producto").val(ID);

    $("#text_producto").val(texto);

    $("#preciounitario").val(VALOR);
    
    $("#descuento").val(DESCUENTO);

    $("#impuesto").val(IMPUESTO);
    


    $('#vista_productos').hide();

    

    calcular_total();



calcular_subtotal();



crearFormatoNumeros();



 $("#cantidad").focus();

    }

}
        

        

function seleccionar_cliente(ID, NOMBRE, DOCUMENTO, DIRECCION1, DIRECCION2, TELEFONO, CELULAR, CIUDAD, APELLIDOS){



    var texto = NOMBRE+" "+APELLIDOS;

    

    $("#cliente").val(ID);

    $("#text_cliente").val(texto);

    $("#Documento").val(DOCUMENTO);

    $("#Direccion").val(DIRECCION1);

    $("#Telefono").val(TELEFONO+" - "+CELULAR);

    $("#Ciudad").val(CIUDAD);



    $('#vista_clientes').hide();



}	

        

function seleccionar_vendedor(ID, NOMBRE){



    var texto = NOMBRE;

    

    $("#vendedor").val(ID);

    $("#text_vendedor").val(texto);



    $('#vista_vendedores').hide();



}	

        

        

function calcular_subtotal(){

        

    var subtotal = $('#cantidad').val() * $('#preciounitario').val();

                

   $('#subtotal').val(subtotal);

   

   calcular_total();



           

}

        

function calcular_total(){

        

        

    var total1 = $('#subtotal').val() - ($('#subtotal').val() * $('#descuento').val() / 100);

    

    var total = total1 + (total1 * $('#impuesto').val() / 100);

                

   $('#total').val(total);



           

}











function calcular_fechas(){

        

    var fecha = $('#fecha').val();

    var termino = $('#termino').val();

    var vencimiento = $('#vencimiento').val();

    

    

    //$("#vencimiento").val($('#fecha').val());   

    

      crearDatePickerfull('#vencimiento');

     

    

    

   //$('#total_total').val(total_total);



           

}











function calcular_total_total2(subtotal){

        

    var total_total = parseInt(subtotal) - parseInt($('#descuento_total').val()) +  parseInt($('#iva5_total').val()) +  parseInt($('#iva19_total').val());                

    $('#total_total').val(total_total);

    

    

    editar_factura();

           

}





       

function editar_factura(){



    

             

var iva19 = $("#iva19_total").val();



     if($("#iva19_total").val() == ""){

         iva19 = 0;

     }

    

     var iva5 = $("#iva5_total").val();



     if($("#iva5_total").val() == ""){

         iva5 = 0;

     }

     var descuento = $("#descuento_total").val();



     if($("#descuento_total").val() == ""){

         descuento = 0;

     }

        

   

        

    ejecutarAccionSinAlert(

        'facturas', 'Facturas', 'editarValoresFactura', 

         "id_factura="+$("#id_factura").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&tipo="+$("#tipo_factura").val(), ''

    );	

       

       



}





function recargar_listado(){

    

    if($("#tipo_factura").val() == "FACTURAS"){

        cargarFacturas();

    }

    if($("#tipo_factura").val() == "PEDIDOS"){

        cargarPedidos();

    }

    if($("#tipo_factura").val() == "COTIZACIONES"){

        cargarCotizacion();

    }

    if($("#tipo_factura").val() == "DEVOLUCIONES"){

        cargarDevoluciones();

    }

}

  

 $(document).on('opening', '.remodal', function () {

    console.log('opening');

  });



  $(document).on('opened', '.remodal', function () {

    console.log('opened');

  });



  $(document).on('closing', '.remodal', function (e) {

    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));

  });



  $(document).on('closed', '.remodal', function (e) {

    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));

  });



  $(document).on('confirmation', '.remodal', function () {

    console.log('confirmation');

  });



  $(document).on('cancellation', '.remodal', function () {

    console.log('cancellation');

  });



  $('[data-remodal-id=modal]').remodal({

    modifier: 'with-red-theme'

  });

  

  

  $('[data-remodal-id=modal2]').remodal({

    modifier: 'with-red-theme'

  });

  

  $('[data-remodal-id=modal3]').remodal({

    modifier: 'with-red-theme'

  });

  

  





function insertar_cliente_modal(){



    if($("#nombre_cliente").val() == "" || $("#documento_cliente").val() == ""){

        mensaje_alertas("error", "Debe Digitar el Nombre y Documento del cliente", "center");

        return 0;

    }

   

    var datos = $('#formClientes').serialize();



    ejecutarAccion(

        'configuracion', 'Clientes', 'insertarClienteModal', 

        datos, 'mensaje_alertas("success", "Cliente Registrado Exitosamente", "center");  var json = eval(data);  $("#cliente").val(json[0].id); $("#text_cliente").val(json[0].nombre); $("#Documento").val(json[0].nombre); $("#Direccion").val(json[0].direccion1+" - "+json[0].direccion2); $("#Telefono").val(json[0].telefono+" - "+json[0].celular); $("#Ciudad").val(json[0].ciudad);'

    );	



    $("#nombre_cliente").val("");

    $("#contacto_cliente").val("");

    $("#documento_cliente").val("");

    $("#direccion1_cliente").val("");

    $("#direccion2_cliente").val("");

    $("#telefono_cliente").val("");

    $("#celular_cliente").val("");

    $("#correo1_cliente").val("");

    $("#correo2_cliente").val("");

    $("#ciudad_cliente").val("");



}









function insertar_vendedor_modal(){



    if($("#nombre_vendedor").val() == "" || $("#documento_vendedor").val() == ""){

        mensaje_alertas("error", "Debe Digitar el Nombre y Documento del vendedor", "center");

        return 0;

    }

   

    var datos = $('#formVendedores').serialize();



    ejecutarAccion(

        'configuracion', 'Vendedores', 'insertarVendedorModal', 

        datos, 'mensaje_alertas("success", "Vendedor Registrado Exitosamente", "center"); var json = eval(data);  $("#vendedor").val(json[0].id); $("#text_vendedor").val(json[0].nombre);'

    );	



    $("#nombre_vendedor").val("");

    $("#documento_vendedor").val("");

    $("#direccion1_vendedor").val("");

    $("#direccion2_vendedor").val("");

    $("#telefono_vendedor").val("");

    $("#celular_vendedor").val("");

    $("#correo1_vendedor").val("");

    $("#correo2_vendedor").val("");

    $("#ciudad_vendedor").val("");



}









function insertar_producto_modal(){

            

    if($("#codigo_producto").val() == "" || $("#nombre_producto").val() == "" || $("#precio1_producto").val() == "" || $("#utilidad1_producto").val() == "" || $("#precio2_producto").val() == "" || $("#utilidad2_producto").val() == "" || $("#precio3_producto").val() == "" || $("#utilidad3_producto").val() == "" || $("#precio4_producto").val() == "" || $("#utilidad4_producto").val() == "" || $("#inicial_producto").val() == "" || $("#actual_producto").val() == "" || $("#precioactual_producto").val() == ""){

        mensaje_alertas("error", "Todos los cambios son obligatorios", "center");

        return 0;

    }



        var datos = $('#formProductos').serialize();



        ejecutarAccion(

            'configuracion', 'Productos', 'insertarProducto', 

            datos, 'var json = eval(data); mensaje_alertas("success", "Producto Registrado Exitosamente", "center");  $("#id_producto").val(json[0].id); $("#text_producto").val(json[0].codigo+" - "+json[0].nombre); '

        );

            

            

    $("#codigo_producto").val("");

    $("#nombre_producto").val("");

    $("#precio1_producto").val("");

    $("#utilidad1_producto").val("");

    $("#precio2_producto").val("");

    $("#utilidad2_producto").val("");

    $("#precio3_producto").val("");

    $("#utilidad3_producto").val("");

    $("#precio4_producto").val("");

    $("#utilidad4_producto").val("");

    $("#inicial_producto").val("");

    $("#actual_producto").val("");

    $("#precioactual_producto").val("");

    

    

    

            

    }





$(document).ready(function() {

    

    crearDatePickerfull("#fechanacimiento_cliente");

    

     crearFormatoNumeros();

    

    document.onkeypress=function(e){

        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla==13) { return false; };

    }  

  

});

</script>





<style>

  

    

    .remodal-bg.with-red-theme.remodal-is-opening,

    .remodal-bg.with-red-theme.remodal-is-opened {

      filter: none;

    }



    .remodal-overlay.with-red-theme { 

        opacity: 0.5; 

        filter: alpha(opacity=50);

      background-color: #0027be;

    }



    .remodal.with-red-theme {

        opacity: 0.95; 

        filter: alpha(opacity=95);

      background: #e2e2e2;

     

    }

 

  

  

ul{

      list-style: none;

      list-style-type: none;

      list-style-position: outside;

}

 

li{

      line-height: 30px;

      font-size: 16px;

      cursor:pointer;

}

 

.menu{

      width:250px;

      position:absolute;      

      border:1px solid black;

       

      -moz-box-shadow: 0 0 5px #888;

      -webkit-box-shadow: 0 0 5px#888;

      box-shadow: 0 0 5px #888;

}









</style>



<?php

$froms = new Formularios();

?>





   

    

<div class="box box-default" style="padding-left: 10%; padding-right: 10%">

    <div class="box-header with-border">

        <?php                     

            $consecutivo = ""; 
            for($i = strlen($datos_factura['CONSECUTIVO_FACTURA']); $i<10 ; $i++){ 
               $consecutivo .= "0";                        
            }
                      

        ?>

        <h3 class="box-title">Cr&eacute;dito Educativo No. <?php echo $consecutivo.$datos_factura['CONSECUTIVO_FACTURA']; ?>  &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; <b>Vendedor:</b> <?php echo utf8_encode($datos_factura['VENDEDOR_FACTURA']); ?></h3>

    </div>

<div class="box-body">

    <input type="hidden" value="<?php echo $datos_factura['ID_FACTURA']; ?>" class="form-control pull-right requerido" id="id_factura" name="id_factura">

    <input type="hidden" value="<?php echo $datos_factura['TIPO_FACTURA']; ?>" class="form-control pull-right requerido" id="tipo_factura" name="tipo_factura">
    
    <input type="hidden" value="<?php echo utf8_encode($datos_factura['VENDEDOR_FACTURA']); ?>" class="form-control pull-right requerido" id="vendedor" name="vendedor">

    <div class="row">                

        <div class="col-md-3">

            <div class="form-group">

                 <label>Fecha Factura: </label>

                 <br>

                 <input value="<?php echo $datos_factura['FECHA_FACTURA']; ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">

           </div>

        </div>            

        <div class="col-md-3">

            <div class="form-group">

                 <label>Fecha de Corte: </label>

                 <br>

                 <input value="<?php echo $datos_factura['FECHA2_FACTURA']; ?>" type="text" class="form-control pull-right requerido" id="fecha2" name="fecha2">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Tipo de Pago: </label>

                 <br>
                 
                 <select class="form-control" id="tipopago" name="tipopago">
                    <option <?php if($datos_factura['TIPOPAGO_FACTURA'] == "QUINCENAL"){ echo "selected"; } ?> value="QUINCENAL">QUINCENAL</option>
                    <option <?php if($datos_factura['TIPOPAGO_FACTURA'] == "MENSUAL"){ echo "selected"; } ?> value="MENSUAL">MENSUAL</option>
                 </select>

           </div>

        </div>   

     

        <div class="col-md-3">

            <div class="form-group">

                <label>T&eacute;rmino</label>

            <?php

                echo $froms->Lista_Desplegable(

                    $terminos, 'DESCRIPCION_TERMINO', 'ID_TERMINO', 'termino', $datos_factura['TERMINO_FACTURA'], '', ''

                );

            ?>   

         </div>

      </div>      

      </div> 
        <div class="col-md-12">

            <div class="form-group">

                 <label>Seleccionar Cliente </label>

                 <input  value="<?php echo $datos_factura['CLIENTE_FACTURA']; ?>" id="cliente" name="cliente" type="hidden" />

                 <input id="text_cliente" value="<?php echo utf8_encode($datos_factura['NOMBRES_ESTUDIANTE']." ".$datos_factura['APELLIDOS_ESTUDIANTE']); ?>" name="text_cliente" autocomplete ="off" class="form-control" style="height: 35px" type="text" onkeyup="buscar_cliente(this.value); return false;"  />

                <div id="vista_clientes">

                </div>

         </div>
      </div>
    </div>

    

    

    

    <div class="row">                

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Documento</label>

                 <br>

                  <input type="text" readonly="" class="form-control pull-right requerido" id="Documento" name="Documento"  value="<?php echo $datos_factura['DOCUMENTO_ESTUDIANTE']; ?>">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Direccion</label>

                 <br>

                  <input type="text" readonly="" class="form-control pull-right requerido" id="Direccion" name="Direccion"  value="<?php echo utf8_encode($datos_factura['DIRECCION_ESTUDIANTE']); ?>">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                <label>Tel&eacute;fono</label>

                 <br>

                  <input type="text" value="<?php echo $datos_factura['TELEFONO_ESTUDIANTE']; ?>" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Ciudad</label>

                 <br>

                 <input type="text" readonly="" value="<?php echo utf8_encode($datos_factura['CIUDAD_ESTUDIANTE']); ?>" class="form-control pull-right requerido" id="Ciudad" name="Ciudad">

           </div>

        </div>            

    

               

    </div>

    

    

      <div class="row">

                

          <div class="col-md-8">

                            <div class="form-group">



                 <label><br>Observaciones: </label><br>

                 <textarea name="descripcion" id="descripcion" cols="70" rows="2"><?php echo utf8_encode($datos_factura['DESCRIPCION_FACTURA']); ?></textarea>

                            </div>

        </div>

            

        </div>    

    

  

     

    

    

      <hr>  

    <div class="row">                

        

            <div class="col-md-6">

            <div class="form-group box-body table-responsive no-padding">

                  <label>Producto <a href="#modal2"> &nbsp;&nbsp;(Agregar) </a></label>

                  <input id="id_producto" name="id_producto" type="hidden" />

                  <input id="text_producto" name="text_producto" autocomplete ="off" class="form-control" style="height: 35px" type="text" onkeyup="buscar_producto(this.value); return false;"  />

                  <div id="vista_productos">



                    </div>

            </div>  

            </div>

        

      
 
        


            <div class="col-md-3">



                    <label>Cantidad </label>



                    <input onkeypress="return no_numeros(event)" value="0" onblur="calcular_subtotal(); return false;" id="cantidad" name="cantidad" autocomplete ="off" class="form-control" style="height: 35px" type="text"  />



            </div>

         <div class="col-md-3">



                    <label>Precio $ </label>



                    <input onkeypress="return no_numeros(event)" onblur="calcular_subtotal(); return false;" id="preciounitario" name="preciounitario" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="text"  />



            </div>

       

        

    </div>

      

      

      <div class="row">

          

          <input onkeypress="return no_numeros(event)" onblur="calcular_total(); return false;" readonly="" id="subtotal" name="subtotal" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

          
          
            <div class="col-md-3">
                
                <label>Tipo Descuento</label>

               <select name="tipodescuento" id="tipodescuento" class="form-control">
                    <option value="Plan amigos">Plan amigos</option>
                    <option value="Hermanos">Hermanos</option>
                    <option value="Pronto pago">Pronto pago</option>
                    <option value="Reingresos">Reingresos</option>
                    <option value="Grupo empresarial">Grupo empresarial</option>
                    <option value="Descuento pago semestre ">Descuento pago semestre </option>
                    <option value="Otro">Otro</option>
                </select>

            </div>
            <div class="col-md-3">
                
                <label>Descuento (%)</label>

                <input onkeypress="return no_numeros(event)" id="descuento" value="0" onblur="calcular_total(); return false;"  name="descuento" autocomplete ="off" class="form-control" style="height: 35px" type="text"  />

            </div>

            <div class="col-md-3">

                <label>Impuesto (%) </label>

                <select name="impuesto" id="impuesto" class="form-control">
                    <option value="0">No aplica</option>
                    <option value="5">5%</option>
                    <option value="5">19%</option>
                </select>
                
            </div>



         <div class="col-md-3">
             
                    <label>Total $ </label>

                    <input onkeypress="return no_numeros(event)" readonly="" id="total" name="total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="text"  />
                    
            </div>        

    </div>              

     <br> <br>   

                        

    <div class="box-footer">

        <div class="col-md-4"></div>

        <div class="col-md-4">

             <button onclick="insertar_producto(); return false;" class="btn btn-block btn-success">INSERTAR</button></div>

<div class="col-md-4"></div>

    </div>

               

    

     <div class="row">   

    <div class="col-md-12">

    <div id="tabla_factura">

      

         <?php

         include 'vistas/facturas/tabla_productos.php';

         echo $tabla_productos; 

         ?>

           

    </div>

             </div>

         </div>

      

     


      

     

     <hr>

      

     <div class="row">

            

            

            

            <div class="col-md-4">
                
                 <div style="width: 260px; height: 105px; border: 3px solid #555; background: #c1efff; position: absolute">
                     <br><b>&nbsp;&nbsp;Valor General de la Cuenta: <?php echo "$".number_format($total_facturas,0,',','.'); ?></b> <br>
                     
                     <b>&nbsp;&nbsp;Total Recaudo:  <?php echo "$".number_format($total_recibos,0,',','.'); ?></b> <br>
                     <b>&nbsp;&nbsp;Nota Credito/Descuento:  <?php echo "$".number_format($total_creditos,0,',','.'); ?></b> <br>
                     <b>&nbsp;&nbsp;Saldo Total: <?php echo "$".number_format($total_facturas - $total_recibos - $total_creditos,0,',','.'); ?></b> <br>
                  </div>
                <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'];  ?>"  readonly="" onkeypress="return no_numeros(event)" id="subtotal_total" name="subtotal_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

            </div>
         
         <div class="col-md-5">
                
                 <div style="width: 260px; height: 105px; border: 3px solid #555; background: #c1efff; position: absolute">
                     <br><p></p><b>&nbsp;&nbsp;Valor de ésta Factura: <?php echo "$".number_format($datos_factura['TOTAL_FACTURA'],0,',','.'); ?></b> <br>
                     
                     
                     
                     <b>&nbsp;&nbsp;Saldo: <?php echo "$".number_format($saldo_factura,0,',','.'); ?></b> <br>
                     
                     <b>&nbsp;&nbsp;Estado: <?php echo $estado_factura; ?></b> <br>
                  </div>
                <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'];  ?>"  readonly="" onkeypress="return no_numeros(event)" id="subtotal_total" name="subtotal_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

            </div>
         

            <div class="col-md-2">

                <label >Total: </label> 

            </div>

            <div class="col-md-1">

                <span id="span_subtotal"><?php echo "$".number_format($factura['SUBTOTAL_FACTURA'] - $factura['DESCUENTO_FACTURA'],0,',','.');  ?></span> 

                

            </div>

                

        

     

        

             <div class="col-md-9">

                 <input value="<?php echo $datos_factura['DESCUENTO_FACTURA'];  ?>"  readonly="" onkeypress="return no_numeros(event)" id="descuento_total" onblur="calcular_total_total(); return false;" name="descuento_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

             </div>

            <div class="col-md-2">

                <label >(-) Nota Cr&eacute;dito: </label> 

            

         </div>

          <div class="col-md-1">  

            <span id="span_descuento"><?php echo "$".number_format($total_creditos,0,',','.');  ?></span> 

            

             </div>

       

           

              <div class="col-md-9">
                  
                 

                   <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'] - $datos_factura['DESCUENTO_FACTURA'];  ?>"  readonly="" onkeypress="return no_numeros(event)" id="subtotal2_total" name="subtotal2_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

              </div>

           
         

                

        

           <div class="col-md-9">

                <input value="<?php echo $datos_factura['IMPUESTO19_FACTURA'];  ?>" readonly="" id="iva19_total" name="iva19_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

           </div>

            <div class="col-md-2">

            <label>(+) Iva 19%:</label> 

         </div>

            <div class="col-md-1">

            <span id="span_iva19"><?php echo "$".number_format($datos_factura['IMPUESTO19_FACTURA'],0,',','.');  ?></span> 



           

             </div>

                 

        

           

            <div class="col-md-9">

                 <input  value="<?php echo $datos_factura['IMPUESTO5_FACTURA'];  ?>" readonly="" id="iva5_total" name="iva5_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

            </div>

            <div class="col-md-2">

            <label>(+) Iva 5%:</label> 

         </div>

              <div class="col-md-1">

            <span id="span_iva5"><?php echo "$".number_format($datos_factura['IMPUESTO5_FACTURA'],0,',','.');  ?></span> 



           

             </div>

                  

        

             <div class="col-md-9">

                  <input value="<?php echo $datos_factura['TOTAL_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="total_total" onblur="calcular_total(); return false;" name="total_total" autocomplete ="off" class="form-control input_dinero" style="height: 35px" type="hidden"  />

             </div>

            <div class="col-md-2">

                <label>Total:</label>

         </div>

            <div class="col-md-1">

            <span id="span_total"><?php echo "$".number_format($datos_factura['TOTAL_FACTURA']- $total_creditos,0,',','.');  ?></span> 



           

             </div>

         </div>

     

      

<br>

     

                 

        

<div class="box-footer">

       <?php         

        if($datos_factura['TIPO_FACTURA'] == "PEDIDOS"){

            ?>

    

      <div class="col-md-3">

             <button onclick="convertir_factura(); return false;" class="btn btn-block btn-success btn-lg">CONVERTIR A FACTURA</button></div>

             

    <?php

            

        }

       

        if($datos_factura['TIPO_FACTURA'] == "COTIZACIONES"){

            

             ?>

    

      <div class="col-md-3">

             <button onclick="convertir_factura(); return false;" class="btn btn-block btn-success btn-lg">CONVERTIR A FACTURA</button></div>

             

    <?php

        }

       ?>

 
    <h4><b>Listado de Cuotas:</b></h4>
    
 <div class="row">     
     
     <?php
     
        $fechas = new Fechas();    

        $valor_cuota = 0;
        $sumas_cuotas = 0;
        
    $valor_cuota = ($datos_factura['TOTAL_FACTURA'] - $total_creditos )/$datos_factura['TERMINO_FACTURA'];    

        $j = 0;
    
        for ($i=1; $i<=$datos_factura['TERMINO_FACTURA']; $i++) {

            

            if($datos_factura['TIPOPAGO_FACTURA'] == "MENSUAL"){    
                $proxima_fecha = $fechas->sumarmeses2($datos_factura['FECHA2_FACTURA'], $i);
            }else{
                $j += 14;
                
                $proxima_fecha = $fechas->sumardias2($datos_factura['FECHA2_FACTURA'], $j);
            }

            $sumas_cuotas += $valor_cuota;
            
            if($estado_factura == "PAGADA"){
            
                echo "<div class='col-md-4'><b>CUOTA ".$i."</b>: $".number_format($valor_cuota,0,',','.')." (<b>PAGADA</b>)</div>";
                
            }else{
                
                $lo_que_se_a_pagado = ($factura['TOTAL_FACTURA'] - $total_creditos) - $saldo_factura;
                
                 if($sumas_cuotas <= $lo_que_se_a_pagado){
                
                     echo "<div class='col-md-4'><b>CUOTA ".$i."</b>: $".number_format($valor_cuota,0,',','.')." (<b>PAGADA</b>)</div>";
                     
                 }else{
                     
                    
                         $a_pagar = $sumas_cuotas - $lo_que_se_a_pagado;
                         
                         if($a_pagar > $valor_cuota){
                             $a_pagar = $valor_cuota;
                         }
                                            
                     
                      echo "<div class='col-md-4'><b>CUOTA ".$i."</b>: $".number_format($a_pagar ,0,',','.')." (<b>Fecha de Pago:</b> ".$proxima_fecha.")</div>";
                     
                 }
                
            }
            
            
        }
            
     ?>
     
</div>
         
         
         
         
         
    <hr>
    <br>  <br>  <br>  <br>
    <div class="col-md-3"></div>

                <div class="col-md-3">

             <button onclick="guardar_factura(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>

             

             

             <div class="col-md-3">

             <button onclick="recargar_listado(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>

</div>

</div>





<?php

include("vistas/facturas/modal_cliente.php");

include("vistas/facturas/modal_producto.php");

include("vistas/facturas/modal_vendedor.php");

?>
    