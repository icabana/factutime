<script type="text/javascript" >

    function editar_unidad(){

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formUnidad').serialize();

        ejecutarAccion(
            'configuracion', 
            'Unidades', 
            'editarUnidad', 
            datos, 
            'if(data == 1){ mensaje_alertas("success", "Unidades editado Exitosamente", "center"); cargarUnidades(); }else{  mensaje_alertas("error", "Error al editar el unidad", "center");  }'

        );	

    }        

</script>



<?php

$froms = new Formularios();

?>



<form id="formUnidad" method="post">

                        

    

    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($unidad) ?  $unidad['ID_UNIDAD'] : '' ?>">

    

          

    <div class="box box-default">

        <div class="box-header with-border">

            <h3 class="box-title">Editar Unidad</h3>

        </div>

        

        <div class="box-body">

        

        

        <div class="row">

                

            <div class="col-md-6">

                <div class="form-group">

                    <label>C&oacute;digo:</label>

                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo" value="<?php echo isset($unidad) ? utf8_encode($unidad['CODIGO_UNIDAD']) : '' ?>">

                </div>

            </div>

           

    

            <div class="col-md-6">

                 <div class="form-group">

                    <label>Descripci&oacute;n:</label>

                    <br>

                    <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion" value="<?php echo isset($unidad) ? utf8_encode($unidad['DESCRIPCION_UNIDAD']) : '' ?>">

                </div>

            </div>            

        </div>

         

        

        <div class="box-footer">

                <div class="col-md-6">

             <button onclick="editar_unidad(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>

             <div class="col-md-6">

             <button onclick="cargarUnidades(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>

        </div>

    </div>

    </form>