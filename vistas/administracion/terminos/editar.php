<?php
$froms = new Formularios();
?>

<form id="formTermino" method="post">

    <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo isset($termino) ?  $termino['ID_TERMINO'] : '' ?>">

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Editar T&eacute;rmino</h3>
        </div>

        <div class="box-body">

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">

                    <label>C&oacute;digo:</label>
                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo" value="<?php echo isset($termino) ? utf8_encode($termino['CODIGO_TERMINO']) : '' ?>">

                </div>
            </div>

            <div class="col-md-6">

                 <div class="form-group">
                    <label>Descripci&oacute;n:</label>
                    <br>
                    <input type="text" class="form-control pull-right requerido" id="descripcion" name="descripcion" value="<?php echo isset($termino) ? utf8_encode($termino['DESCRIPCION_TERMINO']) : '' ?>">
                </div>

            </div>            

        </div>

        
        <div class="box-footer">

                <div class="col-md-6">

             <button onclick="editar_termino(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>

             <div class="col-md-6">

             <button onclick="cargarTerminos(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>

        </div>

    </div>

    </form>