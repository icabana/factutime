<script type="text/javascript">

  function insertar_usuario() {

      var datos = $('#formUsuarios').serialize();

      ejecutarAccion(
        'configuracion',
        'Usuarios',
        'insertar',
        datos,
        'insertar_usuario2(data)'
      );

  }

  function insertar_usuario2(data) {

      if (data == 1) {
        mensaje_alertas("success", "Usuario Registrado Exitosamente", "center");
        cargar_usuarios();
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
            <h3 class="card-title">Registrar Usuario</h3>
          </div>

          <form autocomplete="on" id="formUsuarios" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Nick</label>
                <input type="text" class="form-control" id="nick_usuario" name="nick_usuario">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password_usuario"
                      name="password_usuario">
              </div>

              <div class="form-group">
                <label>Rol</label>
                <?php
                echo $froms->Lista_Desplegable(
                        $roles,
                        'nombre_rol',
                        'id_rol',
                        'rol_usuario',
                        '',
                        '',
                        ''
                    );
                ?>

              </div>
            </div>

            <div class="card-footer">
              <button onclick="cargar_usuarios();" class="btn btn-danger">Cancelar</button>
              <button onclick="insertar_usuario(); return false;" class="btn btn-success">Guardar</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>