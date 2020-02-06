<div class="remodal" data-remodal-id="modal2" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
   
    <p id="modal2Desc">
      <div class="row">

   

 <div id="cuerpo_modal2" class="box-body table-responsive no-padding">

                
 <div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Registrar Producto</h3>
    </div>
        
    <div class="box-body">
        <form id="formProductos" method="post">   
        
        <div class="row">
                
            <div class="col-md-3">
                <div class="form-group">
                    <label>C&oacute;digo:</label>
                    <input type="text" class="form-control pull-right requerido_productos" id="codigo_producto" name="codigo_producto">
                </div>
            </div>
            
       
            <div class="col-md-9">
                 <div class="form-group">
                      <label>Nombre:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="nombre_producto" name="nombre_producto">
                </div>
            </div>
        </div>
        
        
        
        
        <div class="row">
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Precio 1:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="precio1_producto" name="precio1_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Utilidad 1:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="utilidad1_producto" name="utilidad1_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Precio 2:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="precio2_producto" name="precio2_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Utilidad 2:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="utilidad2_producto" name="utilidad2_producto">
                </div>
            </div>  
            
        </div>
        
        
        
        
        
        <div class="row">
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Precio 3:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="precio3_producto" name="precio3_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Utilidad 3:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="utilidad3_producto" name="utilidad3_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Precio 4:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="precio4_producto" name="precio4_producto">
                </div>
            </div>            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Utilidad 4:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="utilidad4_producto" name="utilidad4_producto">
                </div>
            </div>    
            
        </div>
        
        
        
        
        
        
         <div class="row">
            
       
            <div class="col-md-2">
                 <div class="form-group">
                      <label><br>Tipo de Producto:</label>
                      <br>
                      <select class="form-control" id="tipoproducto_producto" name="tipoproducto_producto">
                          <option value="FISICO">FISICO</option>
                          <option value="SERVICIO">SERVICIO</option>
                          <option value="OCASIONAL">OCASIONAL</option>
                      </select>
                </div>
            </div>    
            
            
            <div class="col-md-2">
                 <div class="form-group">
                      <label><br>Stock Inicial:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="inicial_producto" name="inicial_producto">
                </div>
            </div>    
            
            
       
            <div class="col-md-2">
                 <div class="form-group">
                      <label><br>Stock Actual:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="actual_producto" name="actual_producto">
                </div>
            </div>    
            
       
            <div class="col-md-2">
                 <div class="form-group">
                      <label><br>Precio Actual:</label>
                      <br>
                       <input type="text" class="form-control pull-right requerido_productos" id="precioactual_producto" name="precioactual_producto">
                </div>
            </div>    
            
       
            <div class="col-md-2">
                 <div class="form-group">
                      <label><br>Impuesto:</label>
                      <br>
                      <select class="form-control" id="impuesto_producto" name="impuesto_producto">
                          <option value="5">IVA 5%</option>
                          <option value="19">IVA 19%</option>
                      </select>
            </div>
            </div> 
              <div class="col-md-2">
                 <div class="form-group">
                     <label><br>T&eacute;rmino:</label>
                      <br>
                       <?php
                            echo $froms->Lista_Desplegable(
                                $terminos, 'DESCRIPCION_TERMINO', 'ID_TERMINO', 'termino_producto', '', '', ''
                            );
                        ?> 
                </div>
            </div>   
          
         </div>
             
        
        <div class="row">
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Categoria:</label>
                      <br>
                        <?php
                            echo $froms->Lista_Desplegable(
                                $categorias, 'DESCRIPCION_CATEGORIA', 'ID_CATEGORIA', 'categoria_producto', '', '', ''
                            );
                        ?>   
                </div>
            </div>    
            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>SubCategoria:</label>
                      <br>
                       <?php
                            echo $froms->Lista_Desplegable(
                                $subcategorias, 'DESCRIPCION_SUBCATEGORIA', 'ID_SUBCATEGORIA', 'subcategoria_producto', '', '', ''
                            );
                        ?>   
                </div>
            </div>   
           
        
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Bodega:</label>
                      <br>
                      <?php
                            echo $froms->Lista_Desplegable(
                                $bodegas, 'DESCRIPCION_BODEGA', 'ID_BODEGA', 'bodega_producto', '', '', ''
                            );
                        ?> 
                </div>
            </div>    
            
       
            <div class="col-md-3">
                 <div class="form-group">
                      <label><br>Unidad Venta:</label>
                      <br>
                        <?php
                            echo $froms->Lista_Desplegable(
                                $unidades, 'DESCRIPCION_UNIDAD', 'ID_UNIDAD', 'unidadventa_producto', '', '', ''
                            );
                        ?>   
                     
                      
                </div>
            </div>    
       
            
            
            
            
        </div>
         
        
        <div class="box-footer">
            <div class="col-md-3"></div>
                <div class="col-md-6">
             <button data-remodal-action="cancel"  onclick="insertar_producto_modal(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>
            
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
 