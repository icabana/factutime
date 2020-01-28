<script type="text/javascript" >

    function insertar_proveedor(){
            
        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formProveedores').serialize();

        ejecutarAccion(
            'configuracion', 
            'Proveedores', 
            'insertarProveedor', 
            datos, 
            'if(data == 1){ mensaje_alertas("success", "Proveedor Registrado Exitosamente", "center"); cargarProveedores(); }else{  mensaje_alertas("error", "Este Proveedor ya se encuentra registrado", "center");  }'
        );	
            
    }
        
</script>

<?php
$froms = new Formularios();
?>
<form id="formProveedores" method="post">
    
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Registrar Proveedor</h3>
    </div>
        
<div class="box-body">            
            
    <div class="row">
                
        
        <div class="col-md-6">
            <div class="form-group">
                  <label>Nombre Completo</label>
                  <input type="text" class="form-control pull-right requerido" id="nombre" name="nombre">
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
              <input type="text" class="form-control pull-right requerido" id="documento" name="documento">
            </div>          
        </div>
        
        
        
        <div class="col-md-6">  
              <div class="form-group">
              <label><br>Dirección </label>
              <input type="text" class="form-control pull-right" id="direccion" name="direccion" >
            </div>
        </div>
                
        
        <div class="col-md-6">
              <div class="form-group">
                <label><br>Tel&eacute;fono</label>
              <input type="text" class="form-control pull-right" id="telefono" name="telefono" onkeypress="return no_numeros(event)">
            </div>
        </div>
        
        
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Correo</label>
              <input type="text" class="form-control pull-right" id="correo" name="correo">
            </div>
        </div>
        
        
       <div class="col-md-6">          
            <div class="form-group">
                <label><br>Regimen</label>
                <select name="regimen" id="regimen" class="form-control pull-right requerido_proveedores">  
                        <option value="natural">Persona Natural</option>
                        <option value="comun">Persona Jur&iacute;dica</option>
                        <option value="comun">Regimen Com&uacute;n</option>
                        <option value="simplificado">Regimen Simplificado</option>
                </select>
            </div>            
        </div>   
        

    </div>
</div>
    
    
    
    
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="insertar_proveedor(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarProveedores(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
</form>