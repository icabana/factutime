
function number_format(amount, decimals) {

  amount += ''; // por si pasan un numero en vez de un string
  amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
  decimals = decimals || 0; // por si la variable no fue fue pasada

  if (isNaN(amount) || amount === 0) 
      return parseFloat(0).toFixed(decimals);

  amount = '' + amount.toFixed(decimals);

  var amount_parts = amount.split('.'),

      regexp = /(\d+)(\d{3})/;

  while (regexp.test(amount_parts[0]))

      amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

  return amount_parts.join('.');

}


function imprimir_tickets(id_factura){ 

  ejecutarAccion('facturas', 'Facturas', 'imprimirFactura3', "id_factura="+id_factura, "cargarVisorPDF(data);");

}


function imprimir_factura(id_factura){
  ejecutarAccion('facturas', 'Facturas', 'imprimirFactura', "id_factura="+id_factura, "cargarVisorPDF(data);");

   recargar_listado();
}





function abrir_crear_facturas(){
  
  abrirVentanaContenedor(
          'facturas', 'Facturas', 'abrirCrearFactura','tipo='+$("#tipo_factura").val(),'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
  );	
}


function guardar_factura1(){

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

      'facturas', 'Facturas', 'guardarFactura', 

       "id_factura="+$("#id_factura").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&termino="+$("#termino").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&fecha2="+$("#fecha2").val()+"&vencimiento="+$("#vencimiento").val()+"&tipo="+$("#tipo_factura").val()+"&tipopago="+$("#tipopago").val(), 'if(data == 1){ mensaje_alertas("success", "Factura Registrada Exitosamente", "center");  }else{  mensaje_alertas("error", "Error al insertar el Factura", "center");  }'

  );	

      

  abrir_crear_facturas();

          

}





function guardar_factura2(){

                 

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

      'facturas', 'Facturas', 'guardarFactura', 

       "id_factura="+$("#id_factura").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&termino="+$("#termino").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&fecha2="+$("#fecha2").val()+"&vencimiento="+$("#vencimiento").val()+"&tipo="+$("#tipo_factura").val()+"&tipopago="+$("#tipopago").val(), ' if(data == 1){ mensaje_alertas("success", "Factura Registrada Exitosamente", "center"); recargar_listado();  }else{  mensaje_alertas("error", "Error al insertar el Factura", "center");  }'

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



function guardar_factura3(){

                 

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

      'facturas', 'Facturas', 'guardarFactura', 

       "id_factura="+$("#id_factura").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&termino="+$("#termino").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&fecha2="+$("#fecha2").val()+"&vencimiento="+$("#vencimiento").val()+"&tipo="+$("#tipo_factura").val()+"&tipopago="+$("#tipopago").val(), 'if(data == 1){ mensaje_alertas("success", "Factura Registrada Exitosamente", "center");  }else{  mensaje_alertas("error", "Error al insertar el Factura", "center");  }'

  );	

        

        

        imprimir_factura($("#id_factura").val());

        

       

 

        

        

}






function guardar_factura4(){

                 

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

      'facturas', 'Facturas', 'guardarFactura', 

       "id_factura="+$("#id_factura").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&termino="+$("#termino").val()+"&subtotal="+$("#subtotal_total").val()+"&total="+$("#total_total").val()+"&descuento="+descuento+"&iva19="+iva19+"&iva5="+iva5+"&descripcion="+$("#descripcion").val()+"&fecha="+$("#fecha").val()+"&fecha2="+$("#fecha2").val()+"&vencimiento="+$("#vencimiento").val()+"&tipo="+$("#tipo_factura").val(), 'if(data == 1){ mensaje_alertas("success", "Factura Registrada Exitosamente", "center");  }else{  mensaje_alertas("error", "Error al insertar el Factura", "center");  }'

  );	

        

        

        imprimir_tickets($("#id_factura").val());

        

       cargarFacturas();

 

        

        

}









function buscar_producto(texto) {
         
  if(texto.length < 3) {

      $('#vista_productos').hide();

  } else {

      ejecutarAccion("facturas", "Facturas", "buscarProducto", "texto="+texto+"&cliente="+$("#cliente").val(), "$('#vista_productos').show(); $('#vista_productos').html(data);");

  }
  
}



function buscar_cliente(texto) {
  
  if(texto.length < 3) {
      $('#vista_clientes').hide();
  } else {
      ejecutarAccion("facturas", "Facturas", "buscarCliente", "texto="+texto, "$('#vista_clientes').show(); $('#vista_clientes').html(data);");
  }

}



function buscar_vendedor(texto) {

         

  if(texto.length < 3) {



      $('#vista_vendedores').hide();



  } else {



      ejecutarAccion("facturas", "Facturas", "buscarVendedor", "texto="+texto, "$('#vista_vendedores').show(); $('#vista_vendedores').html(data);");



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

      'facturas', 'Facturas', 'insertarProducto', 
      "id_factura="+$("#id_factura").val()+"&id_producto="+$("#id_producto").val()+"&cantidad="+$("#cantidad").val()+"&preciounitario="+$("#preciounitario").val()+"&descuento="+$("#descuento").val()+"&impuesto="+$("#impuesto").val()+"&subtotal="+$("#subtotal").val()+"&total="+$("#total").val()+"&tipo="+$("#tipo").val(),"var json = eval(data);  $('#tabla_factura').html(json[0].tabla); $('#subtotal_total').val(json[0].subtotal);  $('#span_subtotal').html(json[0].texto_subtotal);  $('#descuento_total').val(json[0].descuento);   $('#span_descuento').html(json[0].texto_descuento);     $('#subtotal2_total').val(json[0].subtotal2);  $('#span_subtotal2').html(json[0].texto_subtotal2);      $('#iva19_total').val(json[0].impuesto19); $('#span_iva19').html(json[0].texto_impuesto19);     $('#iva5_total').val(json[0].impuesto5); $('#span_iva5').html(json[0].texto_impuesto5);       $('#span_total').html(json[0].texto_total);      calcular_total_total2(json[0].subtotal); "

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

      'facturas', 'Facturas', 'eliminarProducto', "id_factura="+$("#id_factura").val()+"&id_facpro="+id_facpro, "var json = eval(data);  $('#tabla_factura').html(json[0].tabla); $('#subtotal_total').val(json[0].subtotal);  $('#span_subtotal').html(json[0].texto_subtotal);  $('#descuento_total').val(json[0].descuento);   $('#span_descuento').html(json[0].texto_descuento);     $('#subtotal2_total').val(json[0].subtotal2);  $('#span_subtotal2').html(json[0].texto_subtotal2);      $('#iva19_total').val(json[0].impuesto19); $('#span_iva19').html(json[0].texto_impuesto19);     $('#iva5_total').val(json[0].impuesto5); $('#span_iva5').html(json[0].texto_impuesto5);       $('#span_total').html(json[0].texto_total);      calcular_total_total2(json[0].subtotal); "

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



function cambiar_valor(){

 
   
  ejecutarAccion( 

      'facturas', 'Facturas', 'cambiarValor', "id_producto="+$("#id_producto").val()+"&cliente="+$("#cliente").val()+"&tipo="+$("#tipo").val(), "$('#preciounitario').val(data); calcular_total(); calcular_subtotal(); crearFormatoNumeros();"

  );
     



$("#cantidad").focus();

  }



      

      

function seleccionar_cliente(ID, NOMBRE, DOCUMENTO, DIRECCION1, DIRECCION2, TELEFONO, CELULAR, CIUDAD, APELLIDOS){



  var texto = NOMBRE+' '+APELLIDOS;

  

  $("#cliente").val(ID);

  $("#text_cliente").val(texto);

  $("#Documento").val(DOCUMENTO);

  $("#Direccion").val(DIRECCION1);

  $("#Telefono").val(CELULAR+" - "+TELEFONO);

  $("#Ciudad").val(CIUDAD);



  $('#vista_clientes').hide();



  $("#text_producto").focus();



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

  

   location.href = "#arriba";

   

   $( "#text_cliente" ).focus();

  

  crearDatePickerfull("#fechanacimiento_cliente");

  

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
