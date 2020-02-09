<script type="text/javascript" src="js/vistas/actores/clientes/insertar.js"></script>

<?php
  $froms = new Formularios();
?>

<div class="box box-default" style="padding: 25px">

  <form autocomplete="on" id="formClientes" method="post">

    <div class="card card-primary">


      <div class="card-header">
        <h3 class="card-title">Insertar Cliente</h3>
      </div>


      <div class="card-body">


            <input 
              type="hidden" 
              name="id_cliente" 
              id="id_cliente" 
              value="<?php echo $datos['id_cliente']; ?>"> 

              

            <!--TITULOS DE LOS TAB-->
            <ul class="nav nav-pills ml-auto p-2">

              <li class="nav-item">
                <a class="nav-link active" href="#tab_1" data-toggle="tab">
                  Informaci&oacute;n Principal
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#tab_2" data-toggle="tab">
                  Datos de Contacto
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#tab_3" data-toggle="tab">
                  Informaci&oacute;n Secundaria
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#tab_4" data-toggle="tab">
                  Datos de Usuario
                </a>
              </li>

            </ul>


            <!--INICIO DE LAS TABS-->
            <div class="tab-content">

              
              <div style="padding: 20px;" class="tab-pane active" id="tab_1">
            
                <?php
                  include("vistas/actores/clientes/insertar_tab1.php");
                ?>
              
              </div>

              
              <div style="padding: 20px;" class="tab-pane" id="tab_2">

                <?php
                  include("vistas/actores/clientes/insertar_tab2.php");
                ?>
                
              </div>


              <div style="padding: 20px;" class="tab-pane" id="tab_3">

                <?php
                  include("vistas/actores/clientes/insertar_tab3.php");
                ?>
              
              </div>


              <div style="padding: 20px;" class="tab-pane" id="tab_4">

                <?php
                    include("vistas/actores/clientes/insertar_tab4.php");
                ?>
              
              </div>

            
            </div>
          
          <button onclick="cargar_clientes();" class="btn btn-danger">Cancelar</button>
          <button onclick="insertar_cliente(); return false;" class="btn btn-success">Guardar</button>
        

        </div>

    </div>

  </form>
</div>