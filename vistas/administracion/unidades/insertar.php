<script type="text/javascript" >

    function insertar_unidad(){            

        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formUnidades').serialize();

        ejecutarAccion(
            'configuracion', 
            'Unidades', 
            'insertarUnidad', 
            datos, 
            'if(data == 1){ mensaje_alertas("success", "Unidad Registrada Exitosamente", "center"); cargarUnidades(); }else{  mensaje_alertas("error", "Error al insertar el Unidad", "center");  }'

        );	

            

    }

        

</script>



<?php

$froms = new Formularios();

?>



<form id="formUnidades" method="post">

    

<div class="box box-default">

    <div class="box-header with-border">

        <h3 class="box-title">Registrar Unidad</h3>

    </div>

        

    <div class="box-body">

        

        

        <div class="row">

                

            <div class="col-md-6">

                <div class="form-group">

                    <label>C&oacute;digo:</label>

                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo">

                </div>

            </div>

            

       

            <div class="col-md-6">

                 <div class="form-group">

                      <label>Descripci&oacute;n:</label>

                      <br>

                       <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion">

                </div>

            </div>            

        </div>

         

        

        <div class="box-footer">

                <div class="col-md-6">

             <button onclick="insertar_unidad(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>

             <div class="col-md-6">

             <button onclick="cargarUnidades(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>

        </div>

    </div>

    

</form>