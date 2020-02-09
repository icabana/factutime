<div class="row">
  
  
  <div class="col-md-3">

    <label>Tipo Persona<span style="color:red">*</span></label>

    <?php
    
      echo $froms->Lista_Desplegable(
          $tipos,
          'nombre_tipo',
          'id_tipo',
          'tipo_cliente',
          '',
          '',
          ''
        );
    ?>

  </div>

  <div class="col-md-3">
    
    <label>Tipo de Documento<span style="color:red">*</span></label>

      <?php
        echo $froms->Lista_Desplegable(
            $tiposdocumento,
            'nombre_tipodocumento',
            'id_tipodocumento',
            'tipodocumento_cliente',
            '',
            ''
        );
      ?>

  </div>


  <div class="col-md-3">

    <label>Documento<span style="color:red">*</span></label>

    <input 
      type="text" 
      class="form-control requerido" 
      id="documento_cliente" 
      name="documento_cliente">
  </div>

</div> <!-- final div row -->


<br>


<div class="row">


  <div class="col-md-6">

    <label>Nombres<span style="color:red">*</span></label>

    <input 
      type="text" 
      class="form-control requerido" 
      id="nombres_cliente" 
      name="nombres_cliente">

  </div>


  <div class="col-md-6">

    <label>Apellidos<span style="color:red">*</span></label>

    <input 
      type="text" 
      class="form-control requerido" 
      id="apellidos_cliente" 
      name="apellidos_cliente">

  </div>

</div><!-- final div row -->