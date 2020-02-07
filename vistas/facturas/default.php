
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
                        <th >CONSECUTIVO</th>
                        <th >CLIENTE</th> 
                        <th >VENDEDOR</th> 
                        <th >FECHA</th> 
                        <th >VALOR</th> 
                         <?php
            if($_SESSION['rol'] == 8){
           ?>
                        <th >Editar</th>
                        <th >Eliminar</th>
                         <?php
                
                    }
                    
                ?>
                        <th >Imprimir 1</th>
                        <th >Imprimir 2</th>
                        <th >Imprimir Tickets</th>
                    </tr>
                </thead>
                <tbody >



<?php

            $cont = 0;

            foreach ($facturas as $NM => $items) {


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