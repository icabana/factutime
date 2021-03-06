<script type="text/javascript" >

function guardar_recibo1(){

    if($("#cliente").val() == "" ){
        mensaje_alertas("error", "DEBE SELECCIONAR UN CLIENTE DE LA LISTA", "center");
        return false;
    }

    if($("#fecha").val() == "" ){
        mensaje_alertas("error", "DEBE INDICAR LA FECHA", "center");
        return false;
    }
    if($("#valor").val() == "" ){
        mensaje_alertas("error", "DEBE INDICAR EL VALOR", "center");
        return false;
    }
    ejecutarAccion(
        'recibos', 'Recibos', 'guardarRecibo', 
         "fecha="+$("#fecha").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&valor="+$("#valor").val()+"&formapago="+$("#formapago").val()+"&numtransaccion="+$("#numtransaccion").val()+"&concepto="+$("#concepto").val()+"&observaciones="+$("#observaciones").val()+"&cajero="+$("#cajero").val(), 'if(data != 0){ mensaje_alertas("success", "Recibo Registrado Exitosamente", "center");  abrir_crear_recibos(); }else{  mensaje_alertas("error", "Error!!! Ya existe un recibo con los mismos datos que esta.", "center");  }'

    );	      

}


function guardar_recibo2(){

    if($("#cliente").val() == "" ){
        mensaje_alertas("error", "DEBE SELECCIONAR UN CLIENTE DE LA LISTA", "center");
        return false;
    }

    if($("#fecha").val() == "" ){
        mensaje_alertas("error", "DEBE INDICAR LA FECHA", "center");
        return false;
    }
    if($("#valor").val() == "" ){
        mensaje_alertas("error", "DEBE INDICAR EL VALOR", "center");
        return false;
    }
    ejecutarAccion(
        'recibos', 'Recibos', 'guardarRecibo', 
         "fecha="+$("#fecha").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&valor="+$("#valor").val()+"&formapago="+$("#formapago").val()+"&numtransaccion="+$("#numtransaccion").val()+"&concepto="+$("#concepto").val()+"&observaciones="+$("#observaciones").val()+"&cajero="+$("#cajero").val(), 'if(data != 0){ mensaje_alertas("success", "Recibo Registrado Exitosamente", "center"); cargarRecibos(); }else{   mensaje_alertas("error", "Error!!! Ya existe un recibo con los mismos datos que esta.", "center");  }'

    );	
    
}


function buscar_cliente(texto) {

    if(texto.length < 3) {
        $('#vista_clientes').hide();
    } else {
        ejecutarAccion(
            "recibos", 
            "Recibos", 
            "buscarCliente", 
            "texto="+texto, 
            "$('#vista_clientes').show(); $('#vista_clientes').html(data);");
    }
}

function buscar_vendedor(texto) {
    
    if(texto.length < 3) {

        $('#vista_vendedores').hide();

    } else {

        ejecutarAccion(
            "recibos", 
            "Recibos", 
            "buscarVendedor", 
            "texto="+texto, 
            "$('#vista_vendedores').show(); $('#vista_vendedores').html(data);"
        );

    }
}

function cambiar_valor(){  
     
    ejecutarAccion( 
        'recibos', 
        'Recibos', 
        'cambiarValor', 
        "id_producto="+$("#id_producto").val()+"&cliente="+$("#cliente").val()+"&tipo="+$("#tipo").val(), 
        "$('#preciounitario').val(data); calcular_total(); calcular_subtotal(); crearFormatoNumeros();"
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
      crearDatePickerfull('#vencimiento');
      
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


function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero

    if (isNaN(amount) || amount === 0) 

        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero

    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),

        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}



function imprimir_recibo(id_recibo){

    ejecutarAccion('recibos', 'Recibos', 'imprimirRecibo', "id_recibo="+id_recibo, "cargarVisorPDF(data);");

     recargar_listado();

}

function abrir_crear_recibos(){

    abrirVentanaContenedor(
            'recibos', 'Recibos', 'abrirCrearRecibo','tipo='+$("#tipo_recibo").val(),'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
    );	

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
</style>

<?php
$froms = new Formularios();
?>


<div class="box box-default" style="padding-left: 10%; padding-right: 10%">
      <a name="arriba"></a>
    <div class="box-header with-border">        
        <h3 class="box-title">Comprobante de Ingresos No. 00000000X</h3>      
    </div>        

<div class="box-body">

    <input type="hidden" value="<?php echo $id_recibo; ?>" class="form-control pull-right requerido" id="id_recibo" name="id_recibo">

    <input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right requerido" id="tipo_recibo" name="tipo_recibo">

    <div class="row">         
        <div class="col-md-3">

            <div class="form-group">

                 <label>Fecha: </label>
                 <br>
                 <input value="<?php echo date("Y-m-d"); ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">
           </div>
        </div>             

        <div class="col-md-4">
            <div class="form-group">
                 <label>Cliente </label>

                <input id="cliente" name="cliente" type="hidden" />

                <input id="text_cliente" name="text_cliente" autocomplete ="off" class="form-control" style="height: 35px" type="text" onkeyup="buscar_cliente(this.value); return false;"  />
                <div id="vista_clientes">
                </div>         
            </div>
      </div>
           
      <div class="col-md-4">
            <div class="form-group">
                <label>Usuario que realiza la acci&oacute;n</label>
               
                 <input readonly="" type="text" autocomplete ="off" class="form-control pull-right" id="vendedor" name="vendedor" value="<?php echo utf8_encode($_SESSION['nombre']); ?>">
           </div>           
        </div>            
    </div>
    </div>
      
      <div class="row">                

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Documento</label>

                 <br>

                  <input type="text" readonly="" class="form-control pull-right requerido" id="Documento" name="Documento">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Direccion</label>

                 <br>

                  <input type="text" readonly="" class="form-control pull-right requerido" id="Direccion" name="Direccion">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                <label>Tel&eacute;fono</label>

                 <br>

                  <input type="text" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Ciudad</label>

                 <br>

                 <input type="text" readonly="" class="form-control pull-right requerido" id="Ciudad" name="Ciudad">

           </div>

        </div>            

    

               

    </div>

      <br>

    <div class="row">
        
        <div class="col-md-3">
                
                <label>Forma de Pago</label>

               <select name="formapago" id="formapago" class="form-control">
                    <option value="Consignacion">Consignación</option>
                    <option value="debito">Tarjeta D&eacute;bito</option>
                    <option value="credito">Tarjeta Cr&eacute;dito</option>
                    <option value="Cheque">Cheque</option>
                    <?php if($_SESSION['rol'] == 8){ ?><option value="Efectivo">Efectivo</option><?php } ?>
                    <?php if($_SESSION['rol'] == 8){ ?><option value="Otro">Otro</option>><?php } ?>
                </select>

        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label>No. de Trasacci&oacute;n Consignaci&oacute;n</label>
                 <br>
                  <input  type="text" class="form-control pull-right requerido" id="numtransaccion" name="numtransaccion">
           </div>
        </div>  
        <div class="col-md-3">
            <div class="form-group">
                <label>Usuario</label>
                 <br>
                  <input type="text" class="form-control pull-right requerido" id="cajero" name="cajero">
           </div>
        </div>  
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor</label>
                 <br>
                  <input  type="text" class="form-control pull-right requerido" id="valor" name="valor">
           </div>
        </div>  
        
    </div>
          
      
    <div class="row">
        <div class="col-md-8">                            
            <div class="form-group">
                 <label><br>Concepto: </label><br>
                <textarea name="concepto" id="concepto" cols="70" rows="2"></textarea>
            </div>
    </div>
    </div>
       
      <div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Observaciones: </label><br>
        <textarea name="observaciones" id="observaciones" cols="70" rows="2"></textarea>
        </div>
    </div>
    </div>    
<hr>

    


        

<br>

<div class="box-footer">

                <div class="col-md-3">

                    <button onclick="guardar_recibo1(); return false;" class="btn btn-block btn-primary btn-lg">Guardar y Crear Nueva</button>

                </div>

                <div class="col-md-3">

             <button onclick="guardar_recibo2(); return false;" class="btn btn-block btn-primary btn-lg">Guardar y Salir</button>

                </div>


             <div class="col-md-3">

             <button onclick="cargarRecibos(); return false;" class="btn btn-block btn-danger btn-lg">Cancelar</button>

             </div>

</div>

</div>

<?php

include("vistas/recibos/modal_cliente.php");

include("vistas/recibos/modal_producto.php");

include("vistas/recibos/modal_vendedor.php");

?>