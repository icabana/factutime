<script type="text/javascript" src="js/vistas/actores/proveedores/default.js"></script>


<?php
$froms = new Formularios();
?>


<div class="box box-default">
  <div style="padding: 25px" class="box-body">
    <div class="card card-primary">





      <div class="card-header">
        <h3 class="card-title">Registrar Proveedor</h3>
      </div>



      <form autocomplete="on" id="formProveedores" method="post">



        <div class="card-body">
          <div class="row">
            <div class="col-12">
            
            
            
            

              <div class="card">

                <ul class="nav nav-pills ml-auto p-2">

                  <li class="nav-item">
                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                      Informaci&oacute;n Principal
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                      Informaci&oacute;n Secundaria
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                      Datos de Usuario
                    </a>
                  </li>


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
                          'tipodocumento_proveedor',
                          '',
                          '',
                          ''
                        );
                        ?>
                      </div>

                      <div class="col-md-3">
                        <label>Documento<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="documento_proveedor" 
                        name="documento_proveedor">
                      </div>

                      
                      <div class="col-md-6">
                        <label>Dependencia<span style="color:red">*</span></label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $dependencias,
                          'nombre_dependencia',
                          'id_dependencia',
                          'dependencia_proveedor',
                          '',
                          '',
                          ''
                        );
                        ?>

                    </div>
                    </div>

                    <br>


                    <div class="row">

                      <div class="col-md-4">
                        <label>Nombres<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="nombres_proveedor" 
                        name="nombres_proveedor">
                      </div>


                      <div class="col-md-4">
                        <label>Apellidos<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="apellidos_proveedor" 
                        name="apellidos_proveedor">
                      </div>


                      <div class="col-md-4">
                        <label>Correo el&eacute;ctronico<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="correo_proveedor" 
                        name="correo_proveedor">
                      </div>

                    </div>
                  </div>

                  <div style="padding: 20px;" class="tab-pane" id="tab_2">

                    <div class="row">
                      <div class="col-md-2">
                        <label>Celular</label>
                        <input type="text" class="form-control" id="celular_proveedor" name="celular_proveedor"
                        onkeypress="return no_numeros(event)">
                      </div>

                      <div class="col-md-2">
                        <label>Tel&eacute;fono</label>
                        <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor"
                        onkeypress="return no_numeros(event)">
                      </div>


                      <div class="col-md-4">
                        <label>Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor">
                      </div>

                      <div class="col-md-4">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" id="ciudad_proveedor" name="ciudad_proveedor">
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
                          'sexo_proveedor',
                          '',
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
                          'estadocivil_proveedor',
                          '',
                          '',
                          ''
                        );
                        ?>
                      </div>

                      <div class="col-md-3">
                        <label>Fecha de Nacimiento</label>

                        <input type="date" class="form-control" id="fechanacimiento_proveedor" 
                        name="fechanacimiento_proveedor">
                      </div>

                      <div class="col-md-5">
                        <label>Lugar de Nacimiento</label>

                        <input type="text" class="form-control" id="lugarnacimiento_proveedor" 
                        name="lugarnacimiento_proveedor">
                      </div>
                    </div>
                  </div>



                  <div style="padding: 20px;" class="tab-pane" id="tab_3">

                    <div class="row">
                      <div class="col-md-3">
                        <label>Nombre de Usuario<span style="color:red">*</span></label>
                        <input type="text" class="form-control requerido" id="usuario_proveedor" 
                        name="usuario_proveedor">
                      </div>

                      <div class="col-md-3">
                        <label>Contrase&ntilde;a<span style="color:red">*</span></label>
                        <input type="password" class="form-control requerido" id="password_proveedor" 
                        name="password_proveedor">
                      </div>
                      
                      
                      <div class="col-md-3">
                        <label>Rol<span style="color:red">*</span></label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $roles,
                          'nombre_rol',
                          'id_rol',
                          'rol_proveedor',
                          '',
                          '',
                          ''
                        );
                        ?>
                      </div>
                      <div class="col-md-3">
                        <label>Estado<span style="color:red">*</span></label>

                        <?php
                        echo $froms->Lista_Desplegable(
                          $estados,
                          'nombre_estado',
                          'id_estado',
                          'estado_proveedor',
                          '',
                          '',
                          ''
                        );
                        ?>
                      </div>

                    </div>
                 
                </div>
              </div>
          
              <div style="padding: 20px;" >
              <div class="row">
              <div class="col-md-3">
          <button onclick="cargar_proveedores();" class="btn btn-danger">Cancelar</button>
          <button onclick="insertar_proveedor(); return false;" class="btn btn-success">Guardar</button>
          </div>
          </div>
          </div>




        </div>
        </div>
          </div>


      </form>




      </div>
    </div>
  </div>