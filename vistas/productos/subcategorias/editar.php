<script type="text/javascript" >

    function editar_categoria(){

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formSubcategoria').serialize();

        ejecutarAccion(
            'configuracion', 'SubCategorias', 'editarSubcategoria', 
            datos, 'if(data == 1){ mensaje_alertas("success", "Subcategorias editado Exitosamente", "center"); cargarSubCategorias(); }else{  mensaje_alertas("error", "Error al editar el categoria", "center");  }'
        );	

    }
        
</script>

<?php
$froms = new Formularios();
?>

<form id="formSubcategoria" method="post">
                        
    
    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($subcategoria) ?  $subcategoria['ID_SUBCATEGORIA'] : '' ?>">
    
          
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Subcategoria</h3>
        </div>
        
        <div class="box-body">
        
        
        <div class="row">
                
            <div class="col-md-6">
                <div class="form-group">
                    <label>C&oacute;digo:</label>
                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo" value="<?php echo isset($subcategoria) ? utf8_encode($subcategoria['CODIGO_SUBCATEGORIA']) : '' ?>">
                </div>
            </div>
           
    
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Descripci&oacute;n:</label>
                    <br>
                    <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion" value="<?php echo isset($subcategoria) ? utf8_encode($subcategoria['DESCRIPCION_SUBCATEGORIA']) : '' ?>">
                </div>
            </div>            
        </div>
         
        
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="editar_categoria(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarSubCategorias(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
    </form>