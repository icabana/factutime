<script type="text/javascript" >

    function abrir_crear_egreso(){	

        abrirVentanaContenedor(
            'egresos', 
            'Egresos', 
            'abrirCrearEgreso',
            'tipo='+$("#tipo_egreso").val(),
            'crearDatePicker("#fecha"); '
        );	
        
    }

    function abrir_editar_egresos(id_egreso){

        abrirVentanaContenedor(
            'egresos',
            'Egresos', 
            'abrirEditarEgreso',
            'id_egreso='+id_egreso+'&tipo='+$("#tipo_egreso").val(),
            'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
        );   

    }


    function eliminar_egreso(id_egreso){

        mensaje_confirmar("¿Está seguro de eliminar éste Egreso?", "eliminar_egreso2("+id_egreso+"); ");

    }


    function eliminar_egreso2(id_egreso){

        ejecutarAccion(
            'egresos', 'Egresos', 'eliminarEgreso', "id_egreso="+id_egreso, 'mensaje_alertas("success", "Egreso Eliminado Correctamente", "center"); cargarEgresos();' 
        );

    }


    function imprimir_egreso(id_egreso){
    
        ejecutarAccion('egresos', 'Egresos', 'imprimirEgreso', "id_egreso="+id_egreso, "cargarVisorPDF(data);");

    }

    function imprimir_egreso2(id_egreso){

        ejecutarAccion('egresos', 'Egresos', 'imprimirEgreso2', "id_egreso="+id_egreso, "cargarVisorPDF(data);");

    }


    function imprimir_egreso3(id_egreso){

        ejecutarAccion('egresos', 'Egresos', 'imprimirEgreso3', "id_egreso="+id_egreso, "cargarVisorPDF(data);");

    }

    $( document ).ready(function() {    
        CrearTabla('tabla_egresos');
    });



</script>   

 <input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right" id="tipo_egreso" name="tipo_egreso">


 <div class="row">

    <div class="col-xs-12">

        <div style="padding:25px" class="box">

            <div class="box-header">

                <h3 class="box-title">

                    <table>

                        <tr>

                            <td>

                                    <h1 style='font-size:20px'>GESTIONAR EGRESOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

                            </td>

                            <td>

                                <p></p>

                                <button onclick="abrir_crear_egreso(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>

                            </td>

                        </tr>

                    </table>

                </h3>                  

            </div>

            

            <div class="box-body table-responsive no-padding">

                

                <table id="tabla_egresos" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>
                    <tr >          
                        <th ><h6><center><b>CONSECUTIVO</b></center></h6></th>
                        <th ><h6><center><b>PROVEEDOR</b></center></h6></th> 
                        <th ><h6><center><b>FECHA</b></center></h6></th> 
                        <th ><h6><center><b>VALOR</b></center></h6></th> 
                        <th ><h6><center><b>Editar</b></center></h6></th>
                        <th ><h6><center><b>Eliminar</b></center></h6></th>
                        <th ><h6><center><b>Imprimir 1</b></center></h6></th>
                        <th ><h6><center><b>Imprimir 2</b></center></h6></th>
                        <th ><h6><center><b>Imprimir Tickets</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >



<?php

            $cont = 0;

            foreach ($egresos as $NM => $items) {

                echo "<tr style='height:30px'>";
                echo "<td>" . utf8_encode($items['CONSECUTIVO_EGRESO']) . "</a></td>";
                echo "<td>" . utf8_encode( $items['NOMBRE_PROVEEDOR']) . "</td>";
                echo "<td>" . htmlentities( $items['FECHA_EGRESO']) . "</td>";
                echo "<td>$" . number_format( $items['VALOR_EGRESO'], 0, ',', '.') . "</td>";
        
                 
                  echo '<td style="width:25px" onclick="abrir_editar_egresos(' . $items["ID_EGRESO"] .');"><a href="#">Editar</a></td>';  

                echo '<td style="width:25px" onclick="eliminar_egreso(' . $items["ID_EGRESO"] .');"><a href="#">Eliminar</a></td>';  


                echo "<td><a href='#' title='Imprimir Egreso Media Carta' onclick='imprimir_egreso(".$items['ID_EGRESO']."); return false;'>Media Carta</a></td>";

                echo "<td><a href='#' title='Imprimir Egreso Carta' onclick='imprimir_egreso2(".$items['ID_EGRESO']."); return false;'>Carta</a></td>";
                echo "<td><a href='#' title='Imprimir Tickets' onclick='imprimir_egreso3(".$items['ID_EGRESO']."); return false;'>Imprimir Tickets</a></td>";

                    echo "</tr>";

            }

?>
                </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

   