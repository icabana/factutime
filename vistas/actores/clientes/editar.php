<script type="text/javascript" src="js/vistas/actores/clientes/default.js"></script>

<?php
$froms = new Formularios();
?>

<div class="box box-default">

  <div style="padding: 25px" class="box-body">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Editar Cliente</h3>
      </div>

      <form autocomplete="on" id="formClientes" method="post">

        <input type="hidden" class="form-control requerido" id="id_cliente" 
        name="id_cliente" value="<?php echo $datos['id_cliente']; ?>" >

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
                          'tipodocumento_cliente',
                          $datos['tipodocumento_cliente'],
                          '',
                          ''
                        );
                        ?>

                      </div>

                      <div class="col-md-3">
                        <label>Documento<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="documento_cliente" 
                        name="documento_cliente" value="<?php echo $datos['documento_cliente']; ?>" >
                      </div>

                      
                      <div class="col-md-6">
                        <label>Dependencia<span style="color:red">*</span></label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $dependencias,
                          'nombre_dependencia',
                          'id_dependencia',
                          'dependencia_cliente',
                          $datos['dependencia_cliente'],
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
                        <input type="text" class="form-control requerido" id="nombres_cliente" 
                        name="nombres_cliente" value="<?php echo $datos['nombres_cliente']; ?>">
                      </div>


                      <div class="col-md-6">
                        <label>Apellidos<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="apellidos_cliente" 
                        name="apellidos_cliente" value="<?php echo $datos['apellidos_cliente']; ?>">
                      </div>


                    </div>

                    
                    <br>                        
                        <div class="row">
    
                          <div class="col-md-6">
                            <label>Correo el&eacute;ctronico<span style="color:red">*</span></label>
                            <input type="text" class="form-control requerido" id="correo_cliente"  
                            name="correo_cliente" value="<?php echo $datos['correo_cliente']; ?>">
                          </div>
    
                        </div>
                        
                  </div>

                  <div style="padding: 20px;" class="tab-pane" id="tab_2">


                  <div class="row">
                    <div class="col-md-2">
                      <label>Celular</label>
                      <input type="text" class="form-control" id="celular_cliente" name="celular_cliente"
                        value="<?php echo $datos['celular_cliente']; ?>" onkeypress="return no_numeros(event)">
                    </div>

                    <div class="col-md-2">
                      <label>Tel&eacute;fono</label>
                      <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente"
                        value="<?php echo $datos['telefono_cliente']; ?>" onkeypress="return no_numeros(event)">
                    </div>

                   
                      <div class="col-md-4">
                        <label>Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente"
                        value="<?php echo $datos['direccion_cliente']; ?>">
                      </div>

                      <div class="col-md-4">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" id="ciudad_cliente" name="ciudad_cliente"
                        value="<?php echo $datos['ciudad_cliente']; ?>">
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
                          'sexo_cliente',
                          $datos['sexo_cliente'],
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
                          'estadocivil_cliente',
                          $datos['estadocivil_cliente'],
                          '',
                          ''
                        );
                        ?>
                      </div>

                      <div class="col-md-3">
                        <label>Fecha de Nacimiento</label>

                        <input type="date" class="form-control" id="fechanacimiento_cliente" 
                          name="fechanacimiento_cliente" value="<?php echo $datos['fechanacimiento_cliente']; ?>">
                      </div>

                      <div class="col-md-5">
                        <label>Lugar de Nacimiento</label>

                        <input type="text" class="form-control" id="lugarnacimiento_cliente" 
                        name="lugarnacimiento_cliente" value="<?php echo $datos['lugarnacimiento_cliente']; ?>">
                      </div>
                    </div>
                    </div>


                  <div style="padding: 20px;" class="tab-pane" id="tab_3">

                  <input type="hidden" class="form-control requerido" id="usuario" 
                      name="usuario" value="<?php echo $datos_usuario['id_usuario']; ?>">

                    <div class="row">
                    <div class="col-md-3">
                      <label>Nombre de Usuario<span style="color:red">*</span></label>
                      <input  type="text" class="form-control requerido" id="nick_cliente" 
                      name="nick_cliente" value="<?php echo $datos_usuario['nick_usuario']; ?>">
                    </div>

                    <div class="col-md-3">
                      <label>Contrase&ntilde;a<span style="color:red">*</span></label>
                      <input type="hidden" id="password2_cliente" name="password2_cliente" 
                          value="<?php echo $datos['password_usuario']; ?>">
                      <input type="password" class="form-control requerido" id="password_cliente"
                       name="password_cliente" value="<?php echo $datos_usuario['password_usuario']; ?>">
                    </div>

                    <div class="col-md-3">
                        <label>Rol</label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $roles,
                          'nombre_rol',
                          'id_rol',
                          'rol_cliente',
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
                          'estado_cliente',
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
          <button onclick="cargar_clientes();" class="btn btn-danger">Cancelar</button>
          <button onclick="editar_cliente(); return false;" class="btn btn-success">Guardar</button>

        </div>

      </form>

    </div>
  </div>