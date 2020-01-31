<script type="text/javascript">

  function editar_empleado() {

      if(!validar_requeridos()){
          return 0;
      }

      var datos = $('#formEmpleados').serialize();

      ejecutarAccion(
        'administracion',
        'Empleados',
        'guardar',
        datos,
        'editar_empleado2(data)'
      );

  }

  function editar_empleado2(data) {

      if (data == 1) {
        mensaje_alertas("success", "Empleado Editado Exitosamente", "center");
        cargar_empleados();
      } else {
        mensaje_alertas("error", "El Documento o Correo ya se encuentra registrado", "center");
      }

  }


</script>

<?php
$froms = new Formularios();
?>

<div class="box box-default">

  <div style="padding: 25px" class="box-body">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Editar Empleado</h3>
      </div>

      <form autocomplete="on" id="formEmpleados" method="post">

        <input type="hidden" class="form-control requerido" id="id_empleado" 
        name="id_empleado" value="<?php echo $datos['id_empleado']; ?>" >

        <div class="card-body">

          <div class="row">
            <div class="col-12">
              <!-- Custom Tabs -->
              <div class="card">


                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Informaci&oacute;n Principal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Informaci&oacute;n Secundaria</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Datos de Usuario</a></li>

                </ul>

                <div class="tab-content">
                  <div style="padding: 20px;" class="tab-pane active" id="tab_1">
                    <div class="row">

                      <div class="col-md-3">

                        <label>Tipo de Documento<span style="color:red">*</span></label>
                        <?php
                        echo $froms->Lista_Desplegable(
                          $tiposdocumento,
                          'nombre_tipodocumento',
                          'id_tipodocumento',
                          'tipodocumento_empleado',
                          $datos['tipodocumento_empleado'],
                          '',
                          ''
                        );
                        ?>

                      </div>

                      <div class="col-md-3">
                        <label>Documento<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="documento_empleado" 
                        name="documento_empleado" value="<?php echo $datos['documento_empleado']; ?>" >
                      </div>

                      
                      <div class="col-md-6">
                        <label>Dependencia<span style="color:red">*</span></label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $dependencias,
                          'nombre_dependencia',
                          'id_dependencia',
                          'dependencia_empleado',
                          $datos['dependencia_empleado'],
                          '',
                          ''
                        );
                        ?>
                      </div>


                    </div>

                    <br>

                    <div class="row">

                      <div class="col-md-6">
                        <label>Nombres<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="nombres_empleado" 
                        name="nombres_empleado" value="<?php echo $datos['nombres_empleado']; ?>">
                      </div>


                      <div class="col-md-6">
                        <label>Apellidos<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="apellidos_empleado" 
                        name="apellidos_empleado" value="<?php echo $datos['apellidos_empleado']; ?>">
                      </div>


                    </div>

                    
                    <br>                        
                        <div class="row">
    
                          <div class="col-md-6">
                            <label>Correo el&eacute;ctronico<span style="color:red">*</span></label>
                            <input type="text" class="form-control requerido" id="correo_empleado"  
                            name="correo_empleado" value="<?php echo $datos['correo_empleado']; ?>">
                          </div>
    
                        </div>
                        
                  </div>

                  <div style="padding: 20px;" class="tab-pane" id="tab_2">


                  <div class="row">
                    <div class="col-md-2">
                      <label>Celular</label>
                      <input type="text" class="form-control" id="celular_empleado" name="celular_empleado"
                        value="<?php echo $datos['celular_empleado']; ?>" onkeypress="return no_numeros(event)">
                    </div>

                    <div class="col-md-2">
                      <label>Tel&eacute;fono</label>
                      <input type="text" class="form-control" id="telefono_empleado" name="telefono_empleado"
                        value="<?php echo $datos['telefono_empleado']; ?>" onkeypress="return no_numeros(event)">
                    </div>

                   
                      <div class="col-md-4">
                        <label>Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado"
                        value="<?php echo $datos['direccion_empleado']; ?>">
                      </div>

                      <div class="col-md-4">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" id="ciudad_empleado" name="ciudad_empleado"
                        value="<?php echo $datos['ciudad_empleado']; ?>">
                      </div>
                      </div>

                        <br>

                      <div class="row">
                      <div class="col-md-2">
                        <label>Sexo</label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $sexos,
                          'nombre_sexo',
                          'id_sexo',
                          'sexo_empleado',
                          $datos['sexo_empleado'],
                          '',
                          ''
                        );
                        ?>
                      </div>

                      <div class="col-md-2">
                        <label>Estado Civil</label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $estadoscivil,
                          'nombre_estadocivil',
                          'id_estadocivil',
                          'estadocivil_empleado',
                          $datos['estadocivil_empleado'],
                          '',
                          ''
                        );
                        ?>
                      </div>

                      <div class="col-md-3">
                        <label>Fecha de Nacimiento</label>

                        <input type="date" class="form-control" id="fechanacimiento_empleado" 
                          name="fechanacimiento_empleado" value="<?php echo $datos['fechanacimiento_empleado']; ?>">
                      </div>

                      <div class="col-md-5">
                        <label>Lugar de Nacimiento</label>

                        <input type="text" class="form-control" id="lugarnacimiento_empleado" 
                        name="lugarnacimiento_empleado" value="<?php echo $datos['lugarnacimiento_empleado']; ?>">
                      </div>
                    </div>
                    </div>


                  <div style="padding: 20px;" class="tab-pane" id="tab_3">

                  <input type="hidden" class="form-control requerido" id="usuario" 
                      name="usuario" value="<?php echo $datos_usuario['id_usuario']; ?>">

                    <div class="row">
                    <div class="col-md-3">
                      <label>Nombre de Usuario<span style="color:red">*</span></label>
                      <input  type="text" class="form-control requerido" id="nick_empleado" 
                      name="nick_empleado" value="<?php echo $datos_usuario['nick_usuario']; ?>">
                    </div>

                    <div class="col-md-3">
                      <label>Contrase&ntilde;a<span style="color:red">*</span></label>
                      <input type="hidden" id="password2_empleado" name="password2_empleado" 
                          value="<?php echo $datos['password_usuario']; ?>">
                      <input type="password" class="form-control requerido" id="password_empleado"
                       name="password_empleado" value="<?php echo $datos_usuario['password_usuario']; ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Rol</label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $roles,
                          'nombre_rol',
                          'id_rol',
                          'rol_empleado',
                          $datos_usuario['rol_usuario'],
                          '',
                          ''
                        );
                        ?>
                      </div>
              

                    <div class="col-md-3">
                        <label>Estado</label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $estados,
                          'nombre_estado',
                          'id_estado',
                          'estado_empleado',
                          $datos_usuario['estado_usuario'],
                          '',
                          ''
                        );
                        ?>
                      </div>
              
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button onclick="cargar_empleados();" class="btn btn-danger">Cancelar</button>
          <button onclick="editar_empleado(); return false;" class="btn btn-success">Guardar</button>

        </div>

      </form>

    </div>
  </div>