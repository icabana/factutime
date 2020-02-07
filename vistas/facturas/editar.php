<?php
$froms = new Formularios();
?>

<div class="box box-default" style="padding-left: 10%; padding-right: 10%">

    <div class="box-header with-border">
        <?php
        $consecutivo = "";
        for ($i = strlen($datos_factura['CONSECUTIVO_FACTURA']); $i < 10; $i++) {
            $consecutivo .= "0";
        }
        ?>

        <h3 class="box-title">Cr&eacute;dito Educativo No. <?php echo $consecutivo . $datos_factura['CONSECUTIVO_FACTURA']; ?> &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; <b>Vendedor:</b> <?php echo utf8_encode($datos_factura['VENDEDOR_FACTURA']); ?></h3>

    </div>

    <div class="box-body">

        <input type="hidden" value="<?php echo $datos_factura['ID_FACTURA']; ?>" class="form-control pull-right requerido" id="id_factura" name="id_factura">
        <input type="hidden" value="<?php echo $datos_factura['TIPO_FACTURA']; ?>" class="form-control pull-right requerido" id="tipo_factura" name="tipo_factura">

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">

                    <label>Fecha Factura: </label>

                    <br>

                    <input value="<?php echo $datos_factura['FECHA_FACTURA']; ?>" type="text" class="form-control pull-right requerido" id="fecha" name="fecha">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Fecha de Corte: </label>

                    <br>

                    <input value="<?php echo $datos_factura['FECHA2_FACTURA']; ?>" type="text" class="form-control pull-right requerido" id="fecha2" name="fecha2">

                </div>

            </div>



            <div class="col-md-3">

                <div class="form-group">

                    <label>Tipo de Pago: </label>

                    <br>

                    <select class="form-control" id="tipopago" name="tipopago">
                        <option <?php if ($datos_factura['TIPOPAGO_FACTURA'] == "QUINCENAL") {
                                    echo "selected";
                                } ?> value="QUINCENAL">QUINCENAL</option>
                        <option <?php if ($datos_factura['TIPOPAGO_FACTURA'] == "MENSUAL") {
                                    echo "selected";
                                } ?> value="MENSUAL">MENSUAL</option>
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
                            $datos_factura['TERMINO_FACTURA'],
                            '',
                            ''
                        );
                    ?>
                </div>
            </div>
        </div>



        <div class="col-md-12">

            <div class="form-group">

                <label>Seleccionar Cliente </label>
                
                <input value="<?php echo $datos_factura['CLIENTE_FACTURA']; ?>" 
                id="cliente" name="cliente" type="hidden" />
                
                <input id="text_cliente"style="height: 35px" type="text" 
                    onkeyup="buscar_cliente(this.value); return false;"
                    value="<?php echo $datos_factura['nombre_cliente']; ?>" 
                    name="text_cliente" autocomplete="off" class="form-control"  />
                
                <div id="vista_clientes"></div>

            </div>
        </div>



    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label>Documento</label>
                <br>
                <input type="text" readonly="" class="form-control pull-right requerido"
                id="documento_cliente" name="documento_cliente" 
                value="<?php echo $datos_factura['documento_cliente']; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Direcci&oacute;n</label>
                <br>
                <input type="text" readonly="" class="form-control pull-right requerido" 
                id="direccion_cliente" name="direccion_cliente" 
                value="<?php echo $datos_factura['direccion_cliente']; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Tel&eacute;fono</label>
                <br>
                <input type="text" value="<?php echo $datos_factura['TELEFONO_ESTUDIANTE']; ?>" readonly="" class="form-control pull-right requerido" id="Telefono" name="Telefono">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Ciudad</label>
                <br>
                <input type="text" readonly="" value="<?php echo utf8_encode($datos_factura['CIUDAD_ESTUDIANTE']); ?>" class="form-control pull-right requerido" id="Ciudad" name="Ciudad">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-8">
                <div class="form-group">

                <label><br>Observaciones: </label><br>

                <textarea name="descripcion" id="descripcion" cols="70" rows="2"><?php echo utf8_encode($datos_factura['DESCRIPCION_FACTURA']); ?></textarea>

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

            <input onkeypress="return no_numeros(event)" value="0" onblur="calcular_subtotal(); return false;" id="cantidad" name="cantidad" autocomplete="off" class="form-control" style="height: 35px" type="text" />

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

        <div class="col-md-4">

            <div style="width: 260px; height: 105px; border: 3px solid #555; background: #c1efff; position: absolute">
                <br><b>&nbsp;&nbsp;Valor General de la Cuenta: <?php echo "$" . number_format($total_facturas, 0, ',', '.'); ?></b> <br>

                <b>&nbsp;&nbsp;Total Recaudo: <?php echo "$" . number_format($total_recibos, 0, ',', '.'); ?></b> <br>
                <b>&nbsp;&nbsp;Nota Credito/Descuento: <?php echo "$" . number_format($total_creditos, 0, ',', '.'); ?></b> <br>
                <b>&nbsp;&nbsp;Saldo Total: <?php echo "$" . number_format($total_facturas - $total_recibos - $total_creditos, 0, ',', '.'); ?></b> <br>
            </div>
            <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="subtotal_total" name="subtotal_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-5">

            <div style="width: 260px; height: 105px; border: 3px solid #555; background: #c1efff; position: absolute">
                <br>
                <p></p><b>&nbsp;&nbsp;Valor de ésta Factura: <?php echo "$" . number_format($datos_factura['TOTAL_FACTURA'], 0, ',', '.'); ?></b> <br>



                <b>&nbsp;&nbsp;Saldo: <?php echo "$" . number_format($saldo_factura, 0, ',', '.'); ?></b> <br>

                <b>&nbsp;&nbsp;Estado: <?php echo $estado_factura; ?></b> <br>
            </div>
            <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="subtotal_total" name="subtotal_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>


        <div class="col-md-2">

            <label>Total: </label>

        </div>

        <div class="col-md-1">

            <span id="span_subtotal"><?php echo "$" . number_format($factura['SUBTOTAL_FACTURA'] - $factura['DESCUENTO_FACTURA'], 0, ',', '.');  ?></span>



        </div>

        <div class="col-md-9">

            <input value="<?php echo $datos_factura['DESCUENTO_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="descuento_total" onblur="calcular_total_total(); return false;" name="descuento_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>(-) Nota Cr&eacute;dito: </label>

        </div>

        <div class="col-md-1">

            <span id="span_descuento"><?php echo "$" . number_format($total_creditos, 0, ',', '.');  ?></span>

        </div>

        <div class="col-md-9">

            <input value="<?php echo $datos_factura['SUBTOTAL_FACTURA'] - $datos_factura['DESCUENTO_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="subtotal2_total" name="subtotal2_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-9">

            <input value="<?php echo $datos_factura['IMPUESTO19_FACTURA'];  ?>" readonly="" id="iva19_total" name="iva19_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>(+) Iva 19%:</label>

        </div>

        <div class="col-md-1">

            <span id="span_iva19"><?php echo "$" . number_format($datos_factura['IMPUESTO19_FACTURA'], 0, ',', '.');  ?></span>

        </div>

        <div class="col-md-9">

            <input value="<?php echo $datos_factura['IMPUESTO5_FACTURA'];  ?>" readonly="" id="iva5_total" name="iva5_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>(+) Iva 5%:</label>

        </div>

        <div class="col-md-1">

            <span id="span_iva5"><?php echo "$" . number_format($datos_factura['IMPUESTO5_FACTURA'], 0, ',', '.');  ?></span>

        </div>

        <div class="col-md-9">

            <input value="<?php echo $datos_factura['TOTAL_FACTURA'];  ?>" readonly="" onkeypress="return no_numeros(event)" id="total_total" onblur="calcular_total(); return false;" name="total_total" autocomplete="off" class="form-control input_dinero" style="height: 35px" type="hidden" />

        </div>

        <div class="col-md-2">

            <label>Total:</label>

        </div>

        <div class="col-md-1">

            <span id="span_total"><?php echo "$" . number_format($datos_factura['TOTAL_FACTURA'] - $total_creditos, 0, ',', '.');  ?></span>

        </div>

    </div>
    <br>

    <div class="box-footer">

        <?php

        if ($datos_factura['TIPO_FACTURA'] == "PEDIDOS") {

        ?>



            <div class="col-md-3">

                <button onclick="convertir_factura(); return false;" class="btn btn-block btn-success btn-lg">CONVERTIR A FACTURA</button></div>



        <?php



        }



        if ($datos_factura['TIPO_FACTURA'] == "COTIZACIONES") {



        ?>



            <div class="col-md-3">

                <button onclick="convertir_factura(); return false;" class="btn btn-block btn-success btn-lg">CONVERTIR A FACTURA</button></div>



        <?php

        }

        ?>


        <h4><b>Listado de Cuotas:</b></h4>

        <div class="row">

            <?php

            $fechas = new Fechas();

            $valor_cuota = 0;
            $sumas_cuotas = 0;

            $valor_cuota = ($datos_factura['TOTAL_FACTURA'] - $total_creditos) / $datos_factura['TERMINO_FACTURA'];

            $j = 0;

            for ($i = 1; $i <= $datos_factura['TERMINO_FACTURA']; $i++) {



                if ($datos_factura['TIPOPAGO_FACTURA'] == "MENSUAL") {
                    $proxima_fecha = $fechas->sumarmeses2($datos_factura['FECHA2_FACTURA'], $i);
                } else {
                    $j += 14;

                    $proxima_fecha = $fechas->sumardias2($datos_factura['FECHA2_FACTURA'], $j);
                }

                $sumas_cuotas += $valor_cuota;

                if ($estado_factura == "PAGADA") {

                    echo "<div class='col-md-4'><b>CUOTA " . $i . "</b>: $" . number_format($valor_cuota, 0, ',', '.') . " (<b>PAGADA</b>)</div>";
                } else {

                    $lo_que_se_a_pagado = ($factura['TOTAL_FACTURA'] - $total_creditos) - $saldo_factura;

                    if ($sumas_cuotas <= $lo_que_se_a_pagado) {

                        echo "<div class='col-md-4'><b>CUOTA " . $i . "</b>: $" . number_format($valor_cuota, 0, ',', '.') . " (<b>PAGADA</b>)</div>";
                    } else {


                        $a_pagar = $sumas_cuotas - $lo_que_se_a_pagado;

                        if ($a_pagar > $valor_cuota) {
                            $a_pagar = $valor_cuota;
                        }


                        echo "<div class='col-md-4'><b>CUOTA " . $i . "</b>: $" . number_format($a_pagar, 0, ',', '.') . " (<b>Fecha de Pago:</b> " . $proxima_fecha . ")</div>";
                    }
                }
            }

            ?>

        </div>

        <hr>
        <br> <br> <br> <br>
        <div class="col-md-3"></div>

        <div class="col-md-3">

            <button onclick="guardar_factura(); return false;" class="btn btn-block btn-primary btn-lg">GUARDAR</button></div>

        <div class="col-md-3">

            <button onclick="recargar_listado(); return false;" class="btn btn-block btn-danger btn-lg">CANCELAR</button></div>

    </div>

</div>

<?php

    include("vistas/facturas/modal_cliente.php");
    include("vistas/facturas/modal_producto.php");
    include("vistas/facturas/modal_vendedor.php");

?>