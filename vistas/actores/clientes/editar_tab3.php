<div class="row">      

    <div class="col-md-3">

      <label>Pa&iacute;s Origen<span style="color:red">*</span></label>

      <?php
        echo $froms->Lista_Desplegable(
            $paises,
            'nombre_pais',
            'id_pais',
            'pais_cliente',
            $datos['pais_cliente'],
            '',
            ''
          );
      ?>

    </div>


    <div class="col-md-3">

      <label>Ciudad Origen</label>

      <input 
        type="text" 
        class="form-control" 
        id="ciudad_cliente" 
        name="ciudad_cliente"
        value="<?php echo $datos['ciudad_cliente']; ?>">
        
    </div>


    <div class="col-md-3">

      <label>Fecha de Nacimiento</label>

      <input 
        type="date" 
        class="form-control" 
        id="fechanacimiento_cliente" 
        name="fechanacimiento_cliente" 
        value="<?php echo $datos['fechanacimiento_cliente']; ?>">

    </div>


</div><!-- final div row -->


<br>


<div class="row">  

    
    <div class="col-md-3">
      <label>Genero</label>

      <?php
        echo $froms->Lista_Desplegable(
          $generos,
          'nombre_genero',
          'id_genero',
          'genero_cliente',
          $datos['genero_cliente'],
          '',
          ''
        );
      ?>
    </div>


    <div class="col-md-3">
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

      <label>No de Hijos</label>

      <input 
        type="text" 
        class="form-control" 
        id="hijos_cliente" 
        name="hijos_cliente" 
        value="<?php echo $datos['hijos_cliente']; ?>">

    </div>

</div><!-- final div row -->


<br>


<div class="row">  

    
    <div class="col-md-3">
      <label>Nivel Educativo</label>

      <?php
        echo $froms->Lista_Desplegable(
          $niveleseducativos,
          'nombre_niveleducativo',
          'id_niveleducativo',
          'niveleducativo_cliente',
          $datos['niveleducativo_cliente'],
          '',
          ''
        );
      ?>
    </div>


    <div class="col-md-3">
      <label>Profesi&oacute;n</label>

      <?php
        echo $froms->Lista_Desplegable(
          $profesiones,
          'nombre_profesion',
          'id_profesion',
          'profesion_cliente',
          $datos['profesion_cliente'],
          '',
          ''
        );
      ?>
    </div>


    <div class="col-md-3">

      <label>Ocupaci&oacute;n</label>

      <?php
        echo $froms->Lista_Desplegable(
          $ocupaciones,
          'nombre_ocupacion',
          'id_ocupacion',
          'ocupacion_cliente',
          $datos['ocupacion_cliente'],
          '',
          ''
        );
      ?>

    </div>

</div><!-- final div row -->