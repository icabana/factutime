<script type="text/javascript" >    function insertar_producto(){                    if(validar_requeridos() == 0){            return 0;        }        var datos = $('#formProductos').serialize();        ejecutarAccion(            'configuracion', 'Productos', 'insertarProductoOriginal',             datos, 'mensaje_alertas("success", "Producto Registrada Exitosamente", "center"); cargarItemsInventario(); '        );	                }        </script><?php$froms = new Formularios();?><form id="formProductos" method="post">    <div class="box box-default">    <div class="box-header with-border">        <h3 class="box-title">Registrar Nuevo Item de Venta</h3>    </div>            <div class="box-body">                        <div class="row">                            <div class="col-md-3">                <div class="form-group">                    <label>C&oacute;digo:</label>                    <input type="text" class="form-control pull-right requerido" id="codigo" name="codigo">                </div>            </div>                               <div class="col-md-9">                 <div class="form-group">                      <label>Nombre:</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="nombre" name="nombre">                </div>            </div>        </div>                                                <div class="row">            <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 1 (Al x Mayor):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio1" name="precio1">                </div>            </div>                               <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 2 (Al x Mayor):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio2" name="precio2">                </div>            </div>                                     <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 3 (Al x Mayor):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio3" name="precio3">                </div>            </div>              <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 4 (Al x Mayor):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio4" name="precio4">                </div>            </div>                    </div>                         <div class="row">            <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 1 (x Unidad):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio1xunidad" name="precio1xunidad">                </div>            </div>                               <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 2 (x Unidad):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio2xunidad" name="precio2xunidad">                </div>            </div>              <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 3 (x Unidad):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio3xunidad" name="precio3xunidad">                </div>            </div>                                                             <div class="col-md-3">                 <div class="form-group">                      <label><br>Precio 4 (x Unidad):</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="precio4xunidad" name="precio4xunidad">                </div>            </div>                        </div>                                         <div class="row">                               <div class="col-md-2">                 <div class="form-group">                      <label><br>Tipo de Producto:</label>                      <br>                      <select class="form-control" id="tipoproducto" name="tipoproducto">                          <option value="FISICO">FISICO</option>                          <option value="SERVICIO">SERVICIO</option>                          <option value="OCASIONAL">OCASIONAL</option>                      </select>                </div>            </div>                                        <div class="col-md-2">                 <div class="form-group">                      <label><br>Stock Inicial:</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="inicial" name="inicial">                </div>            </div>                                               <div class="col-md-2">                 <div class="form-group">                      <label><br>Stock Actual:</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="actual" name="actual">                </div>            </div>                                   <div class="col-md-2">                 <div class="form-group">                      <label><br>% de Descuento:</label>                      <br>                       <input type="text" class="form-control pull-right requerido" id="descuento" name="descuento">                </div>            </div>                                   <div class="col-md-2">                 <div class="form-group">                      <label><br>Impuesto:</label>                      <br>                      <select class="form-control" id="impuesto" name="impuesto">                          <option value="5">IVA 5%</option>                          <option value="19">IVA 19%</option>                      </select>            </div>            </div>               <div class="col-md-2">                 <div class="form-group">                     <label><br>T&eacute;rmino:</label>                      <br>                       <?php                            echo $froms->Lista_Desplegable(                                $terminos, 'DESCRIPCION_TERMINO', 'ID_TERMINO', 'termino', '', '', ''                            );                        ?>                 </div>            </div>                      </div>                             <div class="row">            <div class="col-md-3">                 <div class="form-group">                      <label><br>Categoria:</label>                      <br>                        <?php                            echo $froms->Lista_Desplegable(                                $categorias, 'DESCRIPCION_CATEGORIA', 'ID_CATEGORIA', 'categoria', '', '', ''                            );                        ?>                   </div>            </div>                                   <div class="col-md-3">                 <div class="form-group">                      <label><br>SubCategoria:</label>                      <br>                       <?php                            echo $froms->Lista_Desplegable(                                $subcategorias, 'DESCRIPCION_SUBCATEGORIA', 'ID_SUBCATEGORIA', 'subcategoria', '', '', ''                            );                        ?>                   </div>            </div>                                  <div class="col-md-3">                 <div class="form-group">                      <label><br>Bodega:</label>                      <br>                      <?php                            echo $froms->Lista_Desplegable(                                $bodegas, 'DESCRIPCION_BODEGA', 'ID_BODEGA', 'bodega', '', '', ''                            );                        ?>                 </div>            </div>                                   <div class="col-md-3">                 <div class="form-group">                      <label><br>Unidad Venta:</label>                      <br>                        <?php                            echo $froms->Lista_Desplegable(                                $unidades, 'DESCRIPCION_UNIDAD', 'ID_UNIDAD', 'unidadventa', '', '', ''                            );                        ?>                                                              </div>            </div>                                                                   </div>                                                                                                         <div class="box-footer">            <div class="col-md-2"></div>                <div class="col-md-4">             <button onclick="insertar_producto(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>             <div class="col-md-4">             <button onclick="cargarProductos(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>              <div class="col-md-2"></div>        </div>    </div>      </div></form>