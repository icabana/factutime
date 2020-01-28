<script type="text/javascript" >

    function editar_cliente(){              
            
        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formClientes').serialize();

        ejecutarAccion(
            'configuracion', 
            'Clientes', 
            'editarCliente', 
            datos, 
            'if(data == 1){ mensaje_alertas("success", "Cliente Editado Exitosamente", "center"); cargarClientes(); }else{  mensaje_alertas("error", "Este Cliente ya se encuentra registrado", "center");  }'
        );	
            
    }
        
</script>

<?php
$froms = new Formularios();
?>
<form id="formClientes" method="post">
    
    
  
     
     
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Editar Cliente</h3>
    </div>
        
<div class="box-body">            
            
    <div class="row">
                
        <div class="col-md-6">
            <div class="form-group">
                <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo $cliente['ID_CLIENTE'] ?>">
                  <label>Nombre Completo</label>
                  <input type="text" class="form-control pull-right requerido" id="nombre" name="nombre" value="<?php echo utf8_encode($cliente['NOMBRE_CLIENTE']) ?>">
            </div>      
        </div>
             
        <div class="col-md-6">          
            <div class="form-group">
                <label>Tipo Documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-control pull-right requerido_clientes">  
                        <option value="C.C.">Cedula de Ciudadan&iacute;a</option>
                        <option value="NIT">NIT</option>
                        <option value="T.I.">Tarjeta de Identidad</option>
                </select>
            </div>            
        </div>   
                
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>NIT/C&Eacute;DULA</label>
              <input type="text" class="form-control pull-right requerido" id="documento" name="documento" value="<?php echo $cliente['DOCUMENTO_CLIENTE'] ?>" onkeypress="return no_numeros(event)">
            </div>
        </div>
        
                
      
        
        
        <div class="col-md-6">
            <div class="form-group">
              <label><br>Contacto</label>
              <input type="text" class="form-control pull-right" id="contacto" name="contacto" value="<?php echo utf8_encode($cliente['CONTACTO_CLIENTE']) ?>">
            </div>
             
        </div>
        
        
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>Dirección 1</label>
              <input type="text" class="form-control pull-right" id="direccion1" name="direccion1" value="<?php echo utf8_encode($cliente['DIRECCION1_CLIENTE']) ?>">
            </div>
             
        </div>
        
        
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>Dirección 2</label>
              <input type="text" class="form-control pull-right" id="direccion3" name="direccion2" value="<?php echo utf8_encode($cliente['DIRECCION2_CLIENTE']) ?>">
            </div>
             
        </div>
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Tel&eacute;fono</label>
              <input type="text" class="form-control pull-right" id="telefono" name="telefono" value="<?php echo $cliente['TELEFONO_CLIENTE'] ?>" onkeypress="return no_numeros(event)">
            </div>
             
        </div>
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Celular</label>
              <input type="text" class="form-control pull-right" id="celular" name="celular" value="<?php echo $cliente['CELULAR_CLIENTE'] ?>" onkeypress="return no_numeros(event)">
            </div>
             
        </div>
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Correo 1</label>
              <input type="text" class="form-control pull-right" id="correo1" name="correo1" value="<?php echo $cliente['CORREO1_CLIENTE'] ?>" onkeypress="return no_numeros(event)">
            </div>
             
        </div>
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Correo 2</label>
              <input type="text" class="form-control pull-right" id="correo2" name="correo2" value="<?php echo $cliente['CORREO2_CLIENTE'] ?>" onkeypress="return no_numeros(event)">
            </div>
             
        </div>
        
        
        
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Ciudad</label>
              <input type="text" class="form-control pull-right" id="ciudad" name="ciudad" value="<?php echo utf8_encode($cliente['CIUDAD_CLIENTE']) ?>" >
            </div>
             
        </div>
        
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Facturar con:</label>
              <select name="precio_cliente" id="precio_cliente" class="form-control pull-right">
                  <option value="PRECIO 1" <?php if($cliente['PRECIO_CLIENTE'] == "PRECIO 1"){ echo "selected"; } ?> >PRECIO 1</option>
                  <option value="PRECIO 2" <?php if($cliente['PRECIO_CLIENTE'] == "PRECIO 2"){ echo "selected"; } ?> >PRECIO 2</option>>PRECIO 2</option>
                  <option value="PRECIO 3" <?php if($cliente['PRECIO_CLIENTE'] == "PRECIO 3"){ echo "selected"; } ?> >PRECIO 3</option>>PRECIO 3</option>
                  <option value="PRECIO 4" <?php if($cliente['PRECIO_CLIENTE'] == "PRECIO 4"){ echo "selected"; } ?> >PRECIO 4</option>>PRECIO 4</option>
              </select>
            </div>
        </div>

        
    </div>
</div>
    
    
    
    
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="editar_cliente(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarClientes(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
</form>