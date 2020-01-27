<script type="text/javascript">
  function editar_rol() {

    var datos = $('#formRoles').serialize();

    ejecutarAccion(
      'configuracion',
      'Roles',
      'guardar',
      datos,
      'editar_rol2(data)'
    );

  }

  function editar_rol2(data) {

    if (data == 1) {
      mensaje_alertas("success", "Rol Editado Exitosamente", "center");
      cargar_roles();
    } else {
      mensaje_alertas("error", "El Nick ya se encuentra registrado", "center");
    }

  }
</script>


<?php
$froms = new Formularios();
?>

<form id="formRoles" method="post">

  <div class="box box-default">


    <div class="box-body">

      <div class="row">
        <div class="col-md-3"></div>
        <div style="padding: 25px" class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Rol</h3>
            </div>

            <form role="form">

              <input type="hidden" class="form-control" id="id_rol" name="id_rol" 
                        value="<?php echo $datos['id_rol']; ?>">

              <div class="card-body">
                <div class="form-group">
                  <label>Nombre del Rol</label>

                  <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" 
                        value="<?php echo $datos['nombre_rol']; ?>">
                </div>
              </div>

              <div class="card-footer">
                <button onclick="cargar_roles();" class="btn btn-danger">Cancelar</button>
                <button onclick="editar_rol(); return false;" class="btn btn-success">Guardar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>

    </div>

  </div>
</form>