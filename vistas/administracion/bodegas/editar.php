<script type="text/javascript" >

    function editar_bodega(){

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formBodega').serialize();

        ejecutarAccion(
            'configuracion', 'Bodegas', 'editarBodega', 
            datos, 'if(data == 1){ mensaje_alertas("success", "Bodegas editado Exitosamente", "center"); cargarBodegas(); }else{  mensaje_alertas("error", "Error al editar el bodega", "center");  }'
        );	

    }
        
</script>

<?php
$froms = new Formularios();
?>

<form id="formBodega" method="post">
                        
    
    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($bodega) ?  $bodega['ID_BODEGA'] : '' ?>">
    
          
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Bodega</h3>
        </div>
        
        <div class="box-body">
        
        
        <div class="row">
                
            <div class="col-md-6">
                <div class="form-group">
                    <label>C&oacute;digo:</label>
                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo" value="<?php echo isset($bodega) ? utf8_encode($bodega['CODIGO_BODEGA']) : '' ?>">
                </div>
            </div>
           
    
            <div class="col-md-6">
                 <div class="form-group">
                      <label>Descripci&oacute;n:</label>
                      <br>
                    <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion" value="<?php echo isset($bodega) ? utf8_encode($bodega['DESCRIPCION_BODEGA']) : '' ?>">
                </div>
            </div>            
        </div>
         
        
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="editar_bodega(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarBodegas(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
    </form>