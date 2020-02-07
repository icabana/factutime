<?php
$froms = new Formularios();
?>


<div class="box box-default" style="padding-left: 10%; padding-right: 10%">

    <a name="arriba"></a>

    <div class="box-header with-border">

        <h3 class="box-title">
            <h3>Nuevo Cr&eacute;dito Educativo</h3>

    </div>

    <div class="box-body">

        <input type="hidden" value="<?php echo $id_factura; ?>" class="form-control pull-right requerido" id="id_factura" name="id_factura">
        <input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right requerido" id="tipo_factura" name="tipo_factura">
        <input type="hidden" value="<?php echo utf8_encode($datos_usuario['nombre']); ?>" class="form-control pull-right requerido" id="vendedor" name="vendedor">

        <div class="row">

            <div class="col-md-3">

                <div class="form-group">
                    <label>Fecha Factura: </label>
                    <br>
                    <input value="<?php echo date("Y-m-d"); ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group">

                    <label>Fecha de Corte: </label>

                    <br>

                    <input value="<?php echo date("Y-m-d"); ?>" type="text" class="form-control pull-right requerido" id="fecha2" name="fecha2">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Tipo de Pago: </label>

                    <br>

                    <select class="form-control" id="tipopago" name="tipopago">
                        <option value="QUINCENAL">QUINCENAL</option>
                        <option value="MENSUAL">MENSUAL</option>
                    </select>

                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>T&eacute;rmino</label>
                    <?php

                    echo $froms->Lista_Desplegable(

                        $terminos,
                        'DESCRIPCION_TERMINO',
                        'ID_TERMINO',
                        'termino',
                        '',
                        '',
                        ''
                    );

                    ?>
                </div>
            </div>


            <div class="col-md-12">

                <div class="form-group">

                    <label>Cliente</label>
                    <input id="cliente" name="cliente" type="hidden" />
                    <input id="text_cliente" name="text_cliente" autocomplete="off" class="form-control" style="height: 35px" type="text" onkeyup="buscar_cliente(this.value); return false;" />
                    <div id="vista_clientes">

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">



        <div class="col-md-3">

            <div class="form-group">

                <label>Documento</label>

                <br>

                <input type="text" readonly="" class="form-control pull-right requerido" id="Documento" name="Documento">

            </div>

        </div>



        <div class="col-md-3">

            <div class="form-group">

                <label>Direccion</label>

                <br>

                <input type="text" readonly="" class="form-control pull-right requerido" id="Direccion" name="Direccion">

            </div>

        </div>



        <div class="col-md-3">

            <div class="form-group">

                <label>Tel&eacute;fono</label>

                <br>

                <input type="text" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">

            </div>

        </div>



        <div class="col-md-3">

            <div class="form-group">

                <label>Ciudad</label>

                <br>

                <input type="text" readonly="" class="form-control pull-right requerido" id="Ciudad" name="Ciudad">

            </div>

        </div>





    </div>



    <div class="row">



        <div class="col-md-8">

            <div class="form-group">



                <label><br>Observaciones: </label><br>

                <textarea name="descripcion" id="descripcion" cols="70" rows="2"></textarea>

            </div>

        </div>



    </div>









    <hr>

    <div class="row">



        <div class="col-md-6">

            <div class="form-group box-body table-responsive no-padding">

                <label>Producto <a href="#modal2"> &nbsp;&nbsp;(Agregar) </a></label>

                <input id="id_producto" name="id_producto" type="hidden" />

                <input id="text_producto" name="text_producto" autocomplete="off" class="form-control" style="height: 35px" type="text" onkeyup="buscar_producto(this.value); return false;" />

                <div id="vista_productos">



                </div>

            </div>

        </div>








        <div class="col-md-3">



            <label>Cantidad </label>



            <input value="0" onblur="calcular_subtotal(); return false;" id="cantidad" name="cantidad" autocomplete="off" class="form-control" style="height: 35px" type="text" />



        </div>

        <div class="col-md-3">



            <label>Precio $ </label>



            <input onkeypress="return no_numeros(event)" onblur="calcular_subtotal(); return false;" id="preciounitario" name="preciounitario" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="text" />



        </div>





    </div>





    <div class="row">

        <input onkeypress="return no_numeros(event)" onblur="calcular_total(); return false;" readonly="" id="subtotal" name="subtotal" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />


        <div class="col-md-3">

            <label>Tipo Descuento</label>

            <select name="tipodescuento" id="tipodescuento" class="form-control">
                <option value="Plan amigos">Plan amigos</option>
                <option value="Hermanos">Hermanos</option>
                <option value="Pronto pago">Pronto pago</option>
                <option value="Reingresos">Reingresos</option>
                <option value="Grupo empresarial">Grupo empresarial</option>
                <option value="Descuento pago semestre ">Descuento pago semestre </option>
                <option value="Otro">Otro</option>
            </select>

        </div>
        <div class="col-md-3">

            <label>Descuento (%)</label>

            <input onkeypress="return no_numeros(event)" id="descuento" value="0" onblur="calcular_total(); return false;" name="descuento" autocomplete="off" class="form-control" style="height: 35px" type="text" />

        </div>

        <div class="col-md-3">

            <label>Impuesto (%) </label>

            <select name="impuesto" id="impuesto" class="form-control">
                <option value="0">No aplica</option>
                <option value="5">5%</option>
                <option value="5">19%</option>
            </select>

        </div>



        <div class="col-md-3">

            <label>Total $ </label>

            <input onkeypress="return no_numeros(event)" readonly="" id="total" name="total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="text" />

        </div>

    </div>

    <br> <br>



    <div class="box-footer">

        <div class="col-md-4"></div>

        <div class="col-md-4">

            <button onclick="insertar_producto(); return false;" class="btn btn-block btn-success">INSERTAR</button></div>

        <div class="col-md-4"></div>

    </div>





    <div class="row">

        <div class="col-md-12">

            <div id="tabla_factura">



                <?php

                include 'vistas/facturas/tabla_productos.php';

                echo $tabla_productos;

                ?>



            </div>

        </div>

    </div>





    <hr>



    <div class="row">







        <div class="col-md-9">

            <input readonly="" onkeypress="return no_numeros(event)" id="subtotal_total" name="subtotal_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Subtotal: </label>

        </div>

        <div class="col-md-1">

            <span id="span_subtotal">$0</span>

        </div>

        <div class="col-md-9">

            <input readonly="" onkeypress="return no_numeros(event)" id="descuento_total" onblur="calcular_total_total(); return false;" name="descuento_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Descuento: </label>



        </div>

        <div class="col-md-1">

            <span id="span_descuento">$0</span>

        </div>


        <div class="col-md-9">

            <input readonly="" onkeypress="return no_numeros(event)" id="subtotal2_total" name="subtotal2_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-9">

            <input readonly="" id="iva19_total" name="iva19_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Iva 19%:</label>

        </div>

        <div class="col-md-1">

            <span id="span_iva19">$0</span>

        </div>

        <div class="col-md-9">

            <input readonly="" id="iva5_total" name="iva5_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Iva 5%:</label>

        </div>

        <div class="col-md-1">

            <span id="span_iva5">$0</span>

        </div>

        <div class="col-md-9">

            <input readonly="" onkeypress="return no_numeros(event)" id="total_total" onblur="calcular_total(); return false;" name="total_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Total:</label>

        </div>

        <div class="col-md-1">

            <span id="span_total">$0</span>

        </div>

    </div>

    <br>

    <div class="box-footer">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <button onclick="guardar_factura2(); return false;" class="btn btn-block btn-primary btn-lg">Guardar</button>
        </div>

        <div class="col-md-3">
            <button onclick="guardar_factura4(); return false;" class="btn btn-block btn-primary btn-lg">Guardar y Imprimir</button>
        </div>

        <div class="col-md-3">

            <button onclick="cargarFacturas(); return false;" class="btn btn-block btn-danger btn-lg">Cancelar</button>

        </div>

    </div>

</div>


<?php

include("vistas/facturas/modal_cliente.php");
include("vistas/facturas/modal_producto.php");
include("vistas/facturas/modal_vendedor.php");

?>