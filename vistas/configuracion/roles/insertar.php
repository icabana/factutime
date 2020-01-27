<script type="text/javascript">

  function insertar_rol() {

      var datos = $('#formRoles').serialize();

      ejecutarAccion(
        'configuracion',
        'Roles',
        'insertar',
        datos,
        'insertar_rol2(data)'
      );

  }

  function insertar_rol2(data) {

      if (data == 1) {
        mensaje_alertas("success", "Rol Registrado Exitosamente", "center");
        cargar_roles();
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
            <h3 class="card-title">Registrar Rol</h3>
          </div>

          <form autocomplete="on" id="formRoles" method="post">

            <div class="card-body">
              <div class="form-group">
                <label>Nombre del Rol</label>
                <input type="text" class="form-control" id="nombre_rol" name="nombre_rol">
              </div>
            </div>

            <div class="card-footer">
              <button onclick="cargar_roles();" class="btn btn-danger">Cancelar</button>
              <button onclick="insertar_rol(); return false;" class="btn btn-success">Guardar</button>
            </div>
            
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>