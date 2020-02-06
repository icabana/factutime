 
    <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
   
    <p id="modal1Desc">
      <div class="row">

   

           
            <div id="cuerpo_modal" class="box-body table-responsive no-padding">

                

                <div class="box box-default">

    <div class="box-header with-border">

        <h3 class="box-title">Registrar Cliente</h3>

    </div>

        

    <div class="box-body">

    <form id="formClientes" method="post">    
    
<div class="box box-default">
   
        
<div class="box-body">
            
    <div class="row">        
        
        <div class="col-md-6">
            <div class="form-group">
                  <label>Nombre Completo</label>
                  <input type="text" class="form-control pull-right requerido_clientes" id="nombre_cliente" name="nombre_cliente">
            </div>  
        </div>
        
         <div class="col-md-6">
            <div class="form-group">
              <label>Nombre del Contacto</label>
            <input type="text" class="form-control pull-right" id="contacto_cliente" name="contacto_cliente">
            </div>
        </div>
        
                
        <div class="col-md-6">          
            <div class="form-group">
                <label><br>Tipo Documento</label>
                <select name="tipodocumento_cliente" id="tipodocumento_cliente" class="form-control pull-right">  
                    <option value="C.C.">C&eacute;dula de Ciudadan&iacute;a</option>
                    <option value="NIT">NIT</option>
                    <option value="C.E.">C&eacute;dula de Extranger&iacute;a</option>
                    <option value="PASAPORTE">Pasaporte</option>
                </select>
            </div>            
        </div>   
        
                
        <div class="col-md-6">            
            <div class="form-group">
                <label><br>N&uacute;mero del Documento</label>
              <input type="text" class="form-control pull-right requerido_clientes" id="documento_cliente" name="documento_cliente" onkeypress="return no_numeros(event)">
            </div>          
        </div>
        
                
       
       

        <div class="col-md-6">            
            <div class="form-group">
                <label><br>Direcci&oacute;n 1</label>
                <input type="text" class="form-control pull-right" id="direccion1_cliente" name="direccion1_cliente" >
            </div>
        </div>
        

        <div class="col-md-6">           
            <div class="form-group">
              <label><br>Direcci&oacute;n 2</label>
               <input type="text" class="form-control pull-right" id="direccion2_cliente" name="direccion2_cliente" >
            </div>
        </div>
        
        
        
        <div class="col-md-6">
              <div class="form-group">
                <label><br>Tel&eacute;fono</label>
              <input type="text" class="form-control pull-right" id="telefono_cliente" name="telefono_cliente">
            </div>
        </div>
        
        <div class="col-md-6">
              <div class="form-group">
                <label><br>Celular</label>
              <input type="text" class="form-control pull-right" id="celular_cliente" name="celular_cliente" >
            </div>
        </div>
        
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Correo 1</label>
              <input type="text" class="form-control pull-right" id="correo1_cliente" name="correo1_cliente">
            </div>
        </div>
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Correo 2</label>
              <input type="text" class="form-control pull-right" id="correo2_cliente" name="correo2_cliente">
            </div>
        </div>
        
        <div class="col-md-6"> 
              <div class="form-group">
              <label><br>Ciudad</label>
              <input type="text" class="form-control pull-right" id="ciudad_cliente" name="ciudad_cliente">
            </div>
        </div>
              
        
       
        

    </div>
</div>
    
    
    
    
        <div class="box-footer">
            
            <div class="col-md-3"></div>
             
            <div class="col-md-6">

                 <button  data-remodal-action="cancel" onclick="insertar_cliente_modal(); return false;" class="btn btn-block btn-primary btn-lg remodal-confirm">GUARDAR</button></div>
                 
               

            </div>
             
            <div class="col-md-3"></div>
            
        </div>
        
    </form>
    </div>



</div>

    
</div>

            </div>

       

</div>
    </p>
  </div>
  
