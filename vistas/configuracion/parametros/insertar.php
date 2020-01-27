<script type="text/javascript">

  function insertar_parametro() {

      var datos = $('#formParametros').serialize();

      ejecutarAccion(
        'configuracion',
        'Parametros',
        'insertar',
        datos,
        'insertar_parametro2(data)'
      );

  }

  function insertar_parametro2(data) {

      if (data == 1) {
        mensaje_alertas("success", "Usuario Registrado Exitosamente", "center");
        cargar_parametros();
      } else {
        mensaje_alertas("error", "El Nick ya se encuentra registrado", "center");
      }

  }
</script>


<?php
    $froms = new Formularios();
?>


<div class="box box-default">

  <div class="box-body">

    <div class="row">
      <div class="col-md-3"></div>
      <div style="padding: 25px" class="col-md-6">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Registrar Parametro</h3>
          </div>

          <form autocomplete="on" id="formParametros" method="post">

            <div class="card-body">
              <div class="form-group">
                <label>Nombre del Par&aacute;metro</label>
                <input type="text" class="form-control" id="nombre_parametro" name="nombre_parametro">
              </div>
              <div class="form-group">
                <label>Valor</label>
                <input type="text" class="form-control" id="valor_parametro" name="valor_parametro">
              </div>
            </div>

            <div class="card-footer">
              <button onclick="cargar_parametros();" class="btn btn-danger">Cancelar</button>
              <button onclick="insertar_parametro(); return false;" class="btn btn-success">Guardar</button>
            </div>

          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>