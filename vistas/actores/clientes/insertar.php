<script type="text/javascript" >

    function insertar_cliente(){              
            
        if(validar_requeridos() == 0){
            return 0;
        }

        var datos = $('#formClientes').serialize();

        ejecutarAccion(
            'configuracion', 
            'Clientes', 
            'insertarCliente', 
            datos, 
            'if(data == 1){ mensaje_alertas("success", "Cliente Registrado Exitosamente", "center"); cargarClientes(); }else{  mensaje_alertas("error", "Este Cliente ya se encuentra registrado", "center");  }'
        );	
            
    }
        
</script>

<?php
$froms = new Formularios();
?>
<form id="formClientes" method="post">
    
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Registrar Cliente</h3>
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
                <select name="tipodocumento id="tipodocumento" class="form-control pull-right requerido_clientes">  
                       <option value="C.C.">C&eacute;dula de Ciudadan&iacute;a</option>
                    <option value="NIT">NIT</option>
                    <option value="C.E.">C&eacute;dula de Extranger&iacute;a</option>
                    <option value="PASAPORTE">Pasaporte</option>
                </select>
            </div>            
        </div>   
                
        <div class="col-md-6">            
            <div class="form-group">
              <label><br>NIT/C&Eacute;DULA</label>
              <input type="text" class="form-control pull-right requerido" id="documento" name="documento" onkeypress="return no_numeros(event)">
            </div>          
        </div>
        
        
        <div class="col-md-6">  
              <div class="form-group">
              <label><br>Contacto</label>
              <input type="text" class="form-control pull-right" id="contacto" name="contacto" >
            </div>
        </div>
        
        <div class="col-md-6">  
              <div class="form-group">
              <label><br>Dirección 1</label>
              <input type="text" class="form-control pull-right" id="direccion1" name="direccion1" >
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
                <label><br>Celular</label>
              <input type="text" class="form-control pull-right" id="celular" name="celular" onkeypress="return no_numeros(event)">
            </div>
        </div>
        
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Correo 1</label>
              <input type="text" class="form-control pull-right" id="correo1" name="correo1">
            </div>
        </div>
                
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Ciudad</label>
              <input type="text" class="form-control pull-right" id="ciudad" name="ciudad">
            </div>
        </div>
                

    </div>
</div>    
    
    
    
        <div class="box-footer">
                <div class="col-md-6">
             <button onclick="insertar_cliente(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
             <div class="col-md-6">
             <button onclick="cargarClientes(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>
        </div>
    </div>
</form>