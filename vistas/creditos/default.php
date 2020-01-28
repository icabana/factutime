<script type="text/javascript" >function abrir_crear_credito(){	    abrirVentanaContenedor(            'creditos', 'Creditos', 'abrirCrearCredito','tipo='+$("#tipo_credito").val(),'crearDatePicker("#fecha"); '    );	    }function abrir_editar_creditos(id_credito){    abrirVentanaContenedor(            'creditos', 'Creditos', 'abrirEditarCredito','id_credito='+id_credito+'&tipo='+$("#tipo_credito").val(),'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'    );   }function eliminar_credito(id_credito){    mensaje_confirmar("¿Está seguro de eliminar éste Credito?", "eliminar_credito2("+id_credito+"); ");}function eliminar_credito2(id_credito){    ejecutarAccion(        'creditos', 'Creditos', 'eliminarCredito', "id_credito="+id_credito, 'mensaje_alertas("success", "Credito Eliminado Correctamente", "center"); cargarCreditos();'     );}function imprimir_credito(id_credito){        ejecutarAccion('creditos', 'Creditos', 'imprimirCredito', "id_credito="+id_credito, "cargarVisorPDF(data);");}function imprimir_credito2(id_credito){    ejecutarAccion('creditos', 'Creditos', 'imprimirCredito2', "id_credito="+id_credito, "cargarVisorPDF(data);");}function imprimir_credito3(id_credito){    ejecutarAccion('creditos', 'Creditos', 'imprimirCredito3', "id_credito="+id_credito, "cargarVisorPDF(data);");}$( document ).ready(function() {        CrearTabla('tabla_creditos');});</script>    <input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right" id="tipo_credito" name="tipo_credito"> <div class="row">    <div class="col-xs-12">        <div style="padding:25px" class="box">            <div class="box-header">                <h3 class="box-title">                    <table>                        <tr>                            <td>                                    <h1 style='font-size:20px'>GESTIONAR CREDITOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>                            </td>                            <td>                                <p></p>                                <button onclick="abrir_crear_credito(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>                            </td>                        </tr>                    </table>                </h3>                              </div>                        <div class="box-body table-responsive no-padding">                                <table id="tabla_creditos" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >                <thead>                    <tr >                                  <th ><h6><center><b>CONSECUTIVO</b></center></h6></th>                        <th ><h6><center><b>CLIENTE</b></center></h6></th>                         <th ><h6><center><b>FECHA</b></center></h6></th>                         <th ><h6><center><b>VALOR</b></center></h6></th>                         <th ><h6><center><b>Editar</b></center></h6></th>                        <th ><h6><center><b>Eliminar</b></center></h6></th>                        <th ><h6><center><b>Imprimir 1</b></center></h6></th>                        <th ><h6><center><b>Imprimir 2</b></center></h6></th>                        <th ><h6><center><b>Imprimir Tickets</b></center></h6></th>                    </tr>                </thead>                <tbody ><?php            $cont = 0;            foreach ($creditos as $NM => $items) {                echo "<tr style='height:30px'>";                echo "<td>" . utf8_encode($items['CONSECUTIVO_CREDITO']) . "</a></td>";                echo "<td>" . utf8_encode( $items['NOMBRES_ESTUDIANTE']. " ". $items['APELLIDOS_ESTUDIANTE']) . "</td>";                echo "<td>" . htmlentities( $items['FECHA_CREDITO']) . "</td>";                echo "<td>$" . number_format( $items['VALOR_CREDITO'], 0, ',', '.') . "</td>";                                           echo '<td style="width:25px" onclick="abrir_editar_creditos(' . $items["ID_CREDITO"] .');"><a href="#">Editar</a></td>';                  echo '<td style="width:25px" onclick="eliminar_credito(' . $items["ID_CREDITO"] .');"><a href="#">Eliminar</a></td>';                  echo "<td><a href='#' title='Imprimir Credito Media Carta' onclick='imprimir_credito(".$items['ID_CREDITO']."); return false;'>Media Carta</a></td>";                echo "<td><a href='#' title='Imprimir Credito Carta' onclick='imprimir_credito2(".$items['ID_CREDITO']."); return false;'>Carta</a></td>";                echo "<td><a href='#' title='Imprimir Tickets' onclick='imprimir_credito3(".$items['ID_CREDITO']."); return false;'>Imprimir Tickets</a></td>";                    echo "</tr>";            }?>                </tbody>                </table>            </div>        </div>    </div></div>   