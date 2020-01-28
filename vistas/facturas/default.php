<script type="text/javascript" >

    function abrir_crear_facturas(){	

        abrirVentanaContenedor(
            'facturas', 
            'Facturas', 
            'abrirCrearFactura',
            'tipo='+$("#tipo_factura").val(),
            'crearDatePicker("#fecha"); crearDatePicker("#fecha2"); crearDatePicker("#vencimiento");'
        );	

    }

    function abrir_editar_facturas(id_factura){

        abrirVentanaContenedor(
            
            'facturas', 
            'Facturas', 
            'abrirEditarFactura',
            'id_factura='+id_factura+'&tipo='+$("#tipo_factura").val(),
            'crearDatePicker("#fecha"); crearDatePicker("#fecha2"); crearDatePicker("#vencimiento");'

        );

    }


    function eliminar_factura(id_factura){

        mensaje_confirmar("Está seguro de eliminar ésta factura?", "eliminar_factura2("+id_factura+"); ");

    }


    function eliminar_factura2(id_factura){

        ejecutarAccion( 
            'facturas', 
            'Facturas', 
            'eliminarFactura', 
            "id_factura="+id_factura, 
            'mensaje_alertas("success", "Factura Eliminada Correctamente", "center"); cargarFacturas();' 

        );

    }


    function imprimir_factura(id_factura){

        ejecutarAccion('facturas', 'Facturas', 'imprimirFactura', "id_factura="+id_factura, "cargarVisorPDF(data);");

    }

    function imprimir_factura2(id_factura){ 

        ejecutarAccion('facturas', 'Facturas', 'imprimirFactura2', "id_factura="+id_factura, "cargarVisorPDF(data);");

    }

    function imprimir_tickets(id_factura){ 

        ejecutarAccion('facturas', 'Facturas', 'imprimirFactura3', "id_factura="+id_factura, "cargarVisorPDF(data);");

    }

    $( document ).ready(function() {   

        CrearTabla('tabla_facturas');

    });


</script>   





<input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right" id="tipo_factura" name="tipo_factura">
 

 <div class="row">

    <div class="col-xs-12">

        <div style="padding:25px" class="box">

            <div class="box-header">

                <h3 class="box-title">

                    <table>

                        <tr>

                            <td>

                                <h1 style='font-size:20px'>GESTIONAR CR&Eacute;DITO EDUCATIVO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

                            </td>
 <?php
            if($_SESSION['rol'] == 8){
           ?>
                            <td>

                                <p></p>

                                <button onclick="abrir_crear_facturas(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>

                            </td>
 <?php
                
                    }
                    
                ?>
                        </tr>

                    </table>

                </h3>                  

            </div>

            

            <div class="box-body table-responsive no-padding">

                

                <table id="tabla_facturas" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>
                    <tr >          
                        <th ><h6><center><b>CONSECUTIVO</b></center></h6></th>
                        <th ><h6><center><b>CLIENTE</b></center></h6></th> 
                        <th ><h6><center><b>VENDEDOR</b></center></h6></th> 
                        <th ><h6><center><b>FECHA</b></center></h6></th> 
                        <th ><h6><center><b>VALOR</b></center></h6></th> 
                         <?php
            if($_SESSION['rol'] == 8){
           ?>
                        <th ><h6><center><b>Editar</b></center></h6></th>
                        <th ><h6><center><b>Eliminar</b></center></h6></th>
                         <?php
                
                    }
                    
                ?>
                        <th ><h6><center><b>Imprimir 1</b></center></h6></th>
                        <th ><h6><center><b>Imprimir 2</b></center></h6></th>
                        <th ><h6><center><b>Imprimir Tickets</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >



<?php

            $cont = 0;

            foreach ($facturas as $NM => $items) {

               

                if($items['TIPO_FACTURA'] == "FACTURAS"){

                    $consecutivo = "";   

                    for($i = strlen($items['CONSECUTIVO_FACTURA']); $i<10 ; $i++){                        

                            $consecutivo .= "0";                       

                    }

                    $consecutivo .= $items['CONSECUTIVO_FACTURA'];

                }

                if($items['TIPO_FACTURA'] == "PEDIDOS"){

                    $consecutivo = "";   

                    for($i = strlen($items['CONSECUTIVO2_FACTURA']); $i<10 ; $i++){                        

                            $consecutivo .= "0";                       

                    }

                    $consecutivo .= $items['CONSECUTIVO2_FACTURA'];

                }

                if($items['TIPO_FACTURA'] == "COTIZACIONES"){

                    $consecutivo = "";   

                    for($i = strlen($items['CONSECUTIVO3_FACTURA']); $i<10 ; $i++){                        

                            $consecutivo .= "0";                       

                    }

                    $consecutivo .= $items['CONSECUTIVO3_FACTURA'];

                }

                if($items['TIPO_FACTURA'] == "DEVOLUCIONES"){

                    $consecutivo = "";   

                    for($i = strlen($items['CONSECUTIVO4_FACTURA']); $i<10 ; $i++){                        

                            $consecutivo .= "0";                       

                    }

                    $consecutivo .= $items['CONSECUTIVO4_FACTURA'];

                }


                

                echo "<tr style='height:30px'>";

                echo "<td>" . utf8_encode($consecutivo) . "</a></td>";

                echo "<td>" . utf8_encode( $items['NOMBRES_ESTUDIANTE']. " ". $items['APELLIDOS_ESTUDIANTE']) . "</td>";

                echo "<td>" . utf8_encode( $items['VENDEDOR_FACTURA']) . "</td>";

                echo "<td>" . htmlentities( $items['FECHA_FACTURA']) . "</td>";

                echo "<td>$" . number_format( $items['TOTAL_FACTURA'], 0, ',', '.') . "</td>";


            if($_SESSION['rol'] == 8){
           
                 echo '<td style="width:25px" onclick="abrir_editar_facturas(' . $items["ID_FACTURA"] .');"><a href="#">Editar</a></td>';
                 
                 echo '<td style="width:25px" onclick="eliminar_factura(' . $items["ID_FACTURA"] .');"><a href="#">Eliminar</a></td>';                                
                
                    }
               

                echo "<td><a href='#' title='Imprimir Factura Media Carta' onclick='imprimir_factura(".$items['ID_FACTURA']."); return false;'>Media Carta</a></td>";

                echo "<td><a href='#' title='Imprimir Factura Carta' onclick='imprimir_factura2(".$items['ID_FACTURA']."); return false;'>Carta</a></td>";

                echo "<td><a target='_blank' href='#' title='Imprimir Tickets' onclick='imprimir_tickets(".$items['ID_FACTURA']."); return false;'>Imprimir Tickets</a></td>";

                                                                         

				

                    echo "</tr>";

            }

?>

                </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

   