<script type="text/javascript" >

    function editar_factura(){

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formFactura').serialize();

        ejecutarAccion(
            'configuracion', 'Facturas', 'editarFactura', 
            datos, 'if(data == 1){ mensaje_alertas("success", "Facturas editado Exitosamente", "center"); cargarFacturas(); }else{  mensaje_alertas("error", "Error al editar el factura", "center");  }'
        );	

    }
        
</script>

<?php
$froms = new Formularios();
?>

<form id="formFactura" method="post">
                        
    
    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($factura) ?  $factura['ID_FACTURA'] : '' ?>">
    
          
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Reportes</h3>
        </div>
        
        <div class="box-body">
        
           <br><br>   
        <div class="row">
            <div class="col-md-1"></div>
        <div class="col-md-2">
             <button onclick="editar_factura(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
            <div class="col-md-1"></div>
    </div>
            
            <br><br>
             <div class="row">
            <div class="col-md-1"></div>
        <div class="col-md-2">
             <button onclick="editar_factura(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
            <div class="col-md-1"></div>
    </div>
            
             <br><br>
            
            
             <div class="row">
            <div class="col-md-1"></div>
        <div class="col-md-2">
             <button onclick="editar_factura(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
             <div class="col-md-2">
             <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
            <div class="col-md-1"></div>
    </div>
        
          <br><br>   <br><br>
    </div>
    </div>
    
    </form>