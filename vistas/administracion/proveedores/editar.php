<script type="text/javascript" >

    function editar_proveedor(){
            
        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formProveedores').serialize();

        ejecutarAccion(
            'configuracion', 'Proveedores', 'editarProveedor', 
            datos, 'if(data == 1){ mensaje_alertas("success", "Proveedor Editado Exitosamente", "center"); cargarProveedores(); }else{  mensaje_alertas("error", "Este Proveedor ya se encuentra registrado", "center");  }'
        );	
            
    }
        
</script>

<?php
$froms = new Formularios();
?>
<form id="formProveedores" method="post">
    
    
  
     
     
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Editar Proveedor</h3>
    </div>
        
<div class="box-body">            
            
    <div class="row">
                
        <div class="col-md-6">
            <div class="form-group">
                <input type="hidden" class="form-control pull-right requerido" id="id" name="id" value="<?php echo $proveedor['ID_PROVEEDOR'] ?>">
                  <label>Nombre Completo</label>
                  <input type="text" class="form-control pull-right requerido" id="nombre" name="nombre" value="<?php echo utf8_encode($proveedor['NOMBRE_PROVEEDOR']) ?>">
            </div>      
        </div>
             
        <div class="col-md-6">          
            <div class="form-group">
                <label>Tipo Documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-control pull-right requerido_proveedores">  
                        <option value="C.C.">Cedula de Ciudadan&iacute;a</option>
                        <option value="NIT">NIT</option>
                        <option value="T.I.">Tarjeta de Identidad</option>
                </select>
            </div>            
        </div>   
                
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>NIT/C&Eacute;DULA</label>
              <input type="text" class="form-control pull-right requerido" id="documento" name="documento" value="<?php echo $proveedor['DOCUMENTO_PROVEEDOR'] ?>" >
            </div>
        </div>
        
                
        
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>Dirección</label>
              <input type="text" class="form-control pull-right" id="direccion" name="direccion" value="<?php echo utf8_encode($proveedor['DIRECCION_PROVEEDOR']) ?>">
            </div>
             
        </div>
        
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Tel&eacute;fono</label>
              <input type="text" class="form-control pull-right" id="telefono" name="telefono" value="<?php echo $proveedor['TELEFONO_PROVEEDOR'] ?>" onkeypress="return no_numeros(event)">
            </div>
             
        </div>
        
        
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Correo </label>
              <input type="text" class="form-control pull-right" id="correo" name="correo" value="<?php echo $proveedor['CORREO_PROVEEDOR'] ?>" >
            </div>
             
        </div>
            
              <div class="col-md-6">          
            <div class="form-group">
                <label>Regimen</label>
                <select name="regimen" id="regimen" class="form-control pull-right requerido_proveedores">  
                        <option <?php if($proveedor['REGIMEN_PROVEEDOR'] == "comun"){ echo "selected"; } ?> value="comun">Regimen Com&uacute;n</option>
                        <option <?php if($proveedor['REGIMEN_PROVEEDOR'] == "simplificado"){ echo "selected"; } ?>  value="simplificado">Regimen Simplificado</option>
                </select>
            </div>            
        </div>   
            
        
    </div>
</div>
    
    
    
    
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="editar_proveedor(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarProveedores(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
</form>