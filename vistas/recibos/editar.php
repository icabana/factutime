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
        'recibos', 
        'Recibos', 
        'editarRecibo', 
        "id_recibo="+$("#id_recibo").val()+"&fecha="+$("#fecha").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&valor="+$("#valor").val()+"&formapago="+$("#formapago").val()+"&numtransaccion="+$("#numtransaccion").val()+"&concepto="+$("#concepto").val()+"&observaciones="+$("#observaciones").val()+"&cajero="+$("#cajero").val(), 
        'if(data != 0){ mensaje_alertas("success", "Recibo Editado Exitosamente", "center"); cargarRecibos(); }else{  mensaje_alertas("error", "Error!!! Ya existe un recibo con los mismos datos que esta.", "center");  }'

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
            "$('#vista_clientes').show(); $('#vista_clientes').html(data);"
        );

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

    ejecutarAccion(
        'recibos', 
        'Recibos',
        'imprimirRecibo', 
        "id_recibo="+id_recibo, 
        "cargarVisorPDF(data);"
    );

     recargar_listado();

}

function abrir_crear_recibos(){

    abrirVentanaContenedor(
        'recibos', 
        'Recibos', 
        'abrirCrearRecibo',
        'tipo='+$("#tipo_recibo").val(),
        'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
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


<?php
$froms = new Formularios();
?>


<div class="box box-default" style="padding-left: 10%; padding-right: 10%">
      <a name="arriba"></a>
    <div class="box-header with-border">  
        
        <?php                     

            $consecutivo = ""; 
            for($i = strlen($recibo['CONSECUTIVO_RECIBO']); $i<10 ; $i++){ 
               $consecutivo .= "0";                        
            }

        ?>
        
        
        <h3 class="box-title">Comprobante de Ingresos No. <?php echo $consecutivo.$recibo['CONSECUTIVO_RECIBO']; ?></h3>      
    </div>        

<div class="box-body">

    <input type="hidden" value="<?php echo $recibo['ID_RECIBO']; ?>" class="form-control pull-right requerido" id="id_recibo" name="id_recibo">

    <div class="row">         
        <div class="col-md-3">

            <div class="form-group">

                 <label>Fecha: </label>
                 <br>
                 <input value="<?php echo $recibo['FECHA_RECIBO']; ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">
           </div>
        </div>             

        <div class="col-md-4">
            <div class="form-group">
                 <label>Cliente </label>

                <input id="cliente" name="cliente" type="hidden" value="<?php echo $recibo['CLIENTE_RECIBO']; ?>" />

                <input id="text_cliente" name="text_cliente" autocomplete ="off" class="form-control" style="height: 35px" type="text"  value="<?php echo utf8_encode($recibo['NOMBRES_ESTUDIANTE']." ".$recibo['APELLIDOS_ESTUDIANTE']); ?>" onkeyup="buscar_cliente(this.value); return false;"  />
                <div id="vista_clientes">
                </div>         
            </div>
      </div>
           
      <div class="col-md-4">
            <div class="form-group">
                <label>Usuario que realiza la acci&oacute;n</label>
                 <br>
               
                 <input readonly="" type="text" autocomplete ="off" class="form-control pull-right" id="vendedor" name="vendedor" value="<?php echo utf8_encode($recibo['VENDEDOR_RECIBO']); ?>">
           </div>           
        </div>            
    </div>
    </div>
      
      <div class="row">                

          

        <div class="col-md-3">

            <div class="form-group">
                 <label>Documento</label>
                 <br>
                  <input value="<?php echo $recibo['DOCUMENTO_ESTUDIANTE']; ?>" type="text" readonly="" class="form-control pull-right requerido" id="Documento" name="Documento">
           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Direccion</label>

                 <br>

                 <input value="<?php echo utf8_encode($recibo['DIRECCION_ESTUDIANTE']); ?>" type="text" readonly="" class="form-control pull-right requerido" id="Direccion" name="Direccion">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                <label>Tel&eacute;fono</label>

                 <br>

                  <input value="<?php echo $recibo['TELEFONO_ESTUDIANTE']; ?>" type="text" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">

           </div>

        </div>            

          

        <div class="col-md-3">

            <div class="form-group">

                 <label>Ciudad</label>

                 <br>

                 <input value="<?php echo utf8_encode($recibo['CIUDAD_ESTUDIANTE']); ?>" type="text" readonly="" class="form-control pull-right requerido" id="Ciudad" name="Ciudad">

           </div>

        </div>            

    

               

    </div>

      <br>

    <div class="row">
        
        <div class="col-md-3">
                
                <label>Forma de Pago</label>

               <select name="formapago" id="formapago" class="form-control">
                    <option value="Consignacion" <?php if($recibo['FORMAPAGO_RECIBO'] == "Consignacion"){ echo "selected"; } ?>>Consignación</option>
                    <option value="debito" <?php if($recibo['FORMAPAGO_RECIBO'] == "debito"){ echo "selected"; } ?>>Tarjeta D&eacute;bito</option>
                    <option value="credito" <?php if($recibo['FORMAPAGO_RECIBO'] == "credito"){ echo "selected"; } ?>>Tarjeta Cr&eacute;dito</option>
                    <option value="Cheque" <?php if($recibo['FORMAPAGO_RECIBO'] == "Cheque"){ echo "selected"; } ?>>Cheque</option>
                    <?php if($_SESSION['rol'] == 8){ ?><option value="Efectivo" <?php if($recibo['FORMAPAGO_RECIBO'] == "Efectivo"){ echo "selected"; } ?>>Efectivo</option><?php } ?>
                    <?php if($_SESSION['rol'] == 8){ ?><option value="Otro" <?php if($recibo['FORMAPAGO_RECIBO'] == "Otro"){ echo "selected"; } ?>>Otro</option><?php } ?>
                </select>

        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label>No. de Trasacci&oacute;n Consignaci&oacute;n</label>
                 <br>
                  <input onkeypress="return no_numeros(event)"  value="<?php echo $recibo['NUMTRANSACCION_RECIBO']; ?>" type="text" class="form-control pull-right requerido" id="numtransaccion" name="numtransaccion">
           </div>
        </div>  
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Usuario</label>
                 <br>
                  <input  value="<?php echo $recibo['CAJERO_RECIBO']; ?>" type="text" class="form-control pull-right requerido" id="cajero" name="cajero">
           </div>
        </div>  
    </div>
      
      
      
      <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label><br>Valor</label>
                 <br>
                  <input onkeypress="return no_numeros(event)" value="<?php echo $recibo['VALOR_RECIBO']; ?>" type="text" class="form-control pull-right requerido" id="valor" name="valor">
           </div>
        </div>  
        
         <div class="col-md-7">
             <br><br><br>
             <?php
                echo "<b>".strtoupper($valor_en_letras)." PESOS</b>";
             ?>
         </div>
        
    </div>
          
      
    <div class="row">
        <div class="col-md-8">                            
            <div class="form-group">
                 <label><br>Concepto: </label><br>
                <textarea name="concepto" id="concepto" cols="70" rows="2"><?php echo utf8_encode($recibo['CONCEPTO_RECIBO']); ?></textarea>
            </div>
    </div>
    </div>
       
      <div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Observaciones: </label><br>
        <textarea name="observaciones" id="observaciones" cols="70" rows="2"><?php echo utf8_encode($recibo['OBSERVACIONES_RECIBO']); ?></textarea>
        </div>
    </div>
    </div>    
<hr>

    


        

<br>

<div class="box-footer">

                <div class="col-md-3">

                    <button onclick="guardar_recibo1(); return false;" class="btn btn-block btn-primary btn-lg">Guardar</button>

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