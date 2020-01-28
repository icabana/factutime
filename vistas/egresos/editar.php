<script type="text/javascript" >

    function guardar_egreso1(){

        if($("#cliente").val() == "" ){
            mensaje_alertas("error", "DEBE SELECCIONAR UN CLIENTE DE LA LISTA", "center");
            return false;
        }

        ejecutarAccion(
            'egresos', 'Egresos', 'editarEgreso', 
            "id_egreso="+$("#id_egreso").val()+"&fecha="+$("#fecha").val()+"&cliente="+$("#cliente").val()+"&vendedor="+$("#vendedor").val()+"&valor="+$("#valor").val()+"&formapago="+$("#formapago").val()+"&numtransaccion="+$("#numtransaccion").val()+"&tipo_egreso="+$("#tipo_egreso").val()+"&observaciones="+$("#observaciones").val(), 'if(data == 1){ mensaje_alertas("success", "Egreso Editado Exitosamente", "center");  }else{  mensaje_alertas("error", "Error al editar el Egreso", "center");  }'

        );	

    cargarEgresos();   

    }


    function buscar_cliente(texto) {

        if(texto.length < 3) {
            $('#vista_clientes').hide();
        } else {
            ejecutarAccion("egresos", "Egresos", "buscarCliente", "texto="+texto, "$('#vista_clientes').show(); $('#vista_clientes').html(data);");
        }
    }

    function buscar_vendedor(texto) {
        
        if(texto.length < 3) {

            $('#vista_vendedores').hide();

        } else {

            ejecutarAccion("egresos", "Egresos", "buscarVendedor", "texto="+texto, "$('#vista_vendedores').show(); $('#vista_vendedores').html(data);");

        }
    }

    function cambiar_valor(){  
        
        ejecutarAccion( 
            'egresos', 'Egresos', 'cambiarValor', "id_producto="+$("#id_producto").val()+"&cliente="+$("#cliente").val()+"&tipo="+$("#tipo").val(), "$('#preciounitario').val(data); calcular_total(); calcular_subtotal(); crearFormatoNumeros();"
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



    function imprimir_egreso(id_egreso){

        ejecutarAccion('egresos', 'Egresos', 'imprimirEgreso', "id_egreso="+id_egreso, "cargarVisorPDF(data);");

        recargar_listado();

    }

    function abrir_crear_egresos(){

        abrirVentanaContenedor(
                'egresos', 'Egresos', 'abrirCrearEgreso','tipo='+$("#tipo_egreso").val(),'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
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
        
        <?php                     

            $consecutivo = ""; 
            for($i = strlen($egreso['CONSECUTIVO_EGRESO']); $i<10 ; $i++){ 
               $consecutivo .= "0";                        
            }

        ?>
        
        
        <h3 class="box-title">Comprobante de Egresos No. <?php echo $consecutivo.$egreso['CONSECUTIVO_EGRESO']; ?></h3>      
    </div>        

<div class="box-body">

    <input type="hidden" value="<?php echo $egreso['ID_EGRESO']; ?>" class="form-control pull-right requerido" id="id_egreso" name="id_egreso">

    <div class="row">   
        <div class="col-md-2"></div>
        <div class="col-md-4">

            <div class="form-group">

                 <label>Fecha: </label>
                 <br>
                 <input value="<?php echo $egreso['FECHA_EGRESO']; ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">
           </div>
        </div>             

      <div class="col-md-4">
            <div class="form-group">
                <label>Usuario que realiza la acci&oacute;n: </label>
                 <br>
             
                 <input readonly="" type="text" autocomplete ="off" class="form-control pull-right" id="vendedor" name="vendedor" value="<?php echo utf8_encode($egreso['VENDEDOR_EGRESO']); ?>">
           </div>           
        </div>   
        <div class="col-md-2"></div>
    </div>
    
      
      <div class="row">                
<div class="col-md-12">
            <div class="form-group">
                 <label>Proveedor: </label>

                <input id="cliente" name="cliente" type="hidden" value="<?php echo $egreso['CLIENTE_EGRESO']; ?>" />

                <input id="text_cliente" name="text_cliente" autocomplete ="off" class="form-control" style="height: 35px" type="text"  value="<?php echo utf8_encode($egreso['NOMBRE_PROVEEDOR']); ?>" onkeyup="buscar_cliente(this.value); return false;"  />
                <div id="vista_clientes">
                </div>         
            </div>
      </div>
       </div>   

    
    
    <div class="row">                
        <div class="col-md-4">

            <div class="form-group">
                 <label>Documento: </label>
                 <br>
                  <input value="<?php echo $egreso['DOCUMENTO_PROVEEDOR']; ?>" type="text" readonly="" class="form-control pull-right requerido" id="Documento" name="Documento">
           </div>

        </div>            

          

        <div class="col-md-4">

            <div class="form-group">

                <label>Direcci&oacute;n: </label>

                 <br>

                 <input value="<?php echo utf8_encode($egreso['DIRECCION_PROVEEDOR']); ?>" type="text" readonly="" class="form-control pull-right requerido" id="Direccion" name="Direccion">

           </div>

        </div>            

          

        <div class="col-md-4">

            <div class="form-group">

                <label>Tel&eacute;fono: </label>

                 <br>

                  <input value="<?php echo $egreso['TELEFONO_PROVEEDOR']; ?>" type="text" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">

           </div>

        </div>            
  </div>      
    

 <br>
      <div class="row">
        
        <div class="col-md-3">
                
                <label>Forma de Pago: </label>

               <select name="formapago" id="formapago" class="form-control">
                    <option value="Consignacion" <?php if($egreso['FORMAPAGO_EGRESO'] == "Consignacion"){ echo "selected"; } ?>>Consignación</option>
                    <option value="debito" <?php if($egreso['FORMAPAGO_EGRESO'] == "debito"){ echo "selected"; } ?>>Tarjeta D&eacute;bito</option>
                    <option value="credito" <?php if($egreso['FORMAPAGO_EGRESO'] == "credito"){ echo "selected"; } ?>>Tarjeta Cr&eacute;dito</option>
                    <option value="Cheque" <?php if($egreso['FORMAPAGO_EGRESO'] == "Cheque"){ echo "selected"; } ?>>Cheque</option>
                    <option value="Efectivo" <?php if($egreso['FORMAPAGO_EGRESO'] == "Efectivo"){ echo "selected"; } ?>>Efectivo</option>
                    <option value="Trasferencia" <?php if($egreso['FORMAPAGO_EGRESO'] == "Trasferencia"){ echo "selected"; } ?>>Trasferencia</option>
                </select>

        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label>No. de Trasacci&oacute;n: </label>
                 <br>
                  <input onkeypress="return no_numeros(event)"  value="<?php echo $egreso['NUMTRANSACCION_EGRESO']; ?>" type="text" class="form-control pull-right requerido" id="numtransaccion" name="numtransaccion">
           </div>
        </div>  
        
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Valor: </label>
                 <br>
                  <input value="<?php echo $egreso['VALOR_EGRESO']; ?>" type="text" class="form-control pull-right requerido" id="valor" name="valor">
           </div>
        </div>  
        
       
       <div class="col-md-3">

            <div class="form-group">

                <label>Tipo de Egreso: </label>

            <?php

                echo $froms->Lista_Desplegable(

                    $tipos_egresos, 'NOMBRE_TEGRESO', 'ID_TEGRESO', 'tipo_egreso', $egreso['TIPO_EGRESO'], '', ''

                );

            ?>   

         </div>

      </div> 
  </div>
      
 <br>
      
    <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Observaciones: </label><br>
        <textarea name="observaciones" id="observaciones" cols="100" rows="2"><?php echo utf8_encode($egreso['OBSERVACIONES_EGRESO']); ?></textarea>
        </div>
    </div>
    </div>    
  

<br>

<div class="box-footer">

                <div class="col-md-3">

                    <button onclick="guardar_egreso1(); return false;" class="btn btn-block btn-primary btn-lg">Guardar</button>

                </div>


             <div class="col-md-3">

             <button onclick="cargarEgresos(); return false;" class="btn btn-block btn-danger btn-lg">Cancelar</button>

             </div>

</div>

</div>

<?php

include("vistas/egresos/modal_cliente.php");

include("vistas/egresos/modal_producto.php");

include("vistas/egresos/modal_vendedor.php");

?>