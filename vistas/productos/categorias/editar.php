<script type="text/javascript" >

    function editar_categoria(){

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formCategoria').serialize();

        ejecutarAccion(
            'configuracion', 'Categorias', 'editarCategoria', 
            datos, 'if(data == 1){ mensaje_alertas("success", "Categorias editado Exitosamente", "center"); cargarCategorias(); }else{  mensaje_alertas("error", "Error al editar el categoria", "center");  }'
        );	

    }
        
</script>

<?php
$froms = new Formularios();
?>

<form id="formCategoria" method="post">
                        
    
    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($categoria) ?  $categoria['ID_CATEGORIA'] : '' ?>">
    
          
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Categoria</h3>
        </div>
        
        <div class="box-body">
        
        
        <div class="row">
                
            <div class="col-md-6">
                <div class="form-group">
                    <label>C&oacute;digo:</label>
                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo" value="<?php echo isset($categoria) ? utf8_encode($categoria['CODIGO_CATEGORIA']) : '' ?>">
                </div>
            </div>
           
    
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Descripci&oacute;n:</label>
                    <br>
                    <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion" value="<?php echo isset($categoria) ? utf8_encode($categoria['DESCRIPCION_CATEGORIA']) : '' ?>">
                </div>
            </div>            
        </div>
         
        
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="editar_categoria(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarCategorias(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
    </form>