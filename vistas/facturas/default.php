
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
                        <th >Consecutivo</th>
                        <th >Cliente</th>  
                        <th >Fecha</th> 
                        <th >Valor</th> 
                         <?php
            if($_SESSION['rol'] == 8){
           ?>
                        <th >Editar</th>
                        <th >Eliminar</th>
                         <?php
                
                    }
                    
                ?>
                        <th >Imprimir Carta</th>
                        <th >Imprimir Media carta</th>
                        <th >Imprimir Tickets</th>
                    </tr>
                </thead>
                <tbody >



<?php

            $cont = 0;

            foreach ($facturas as $NM => $items) {


                echo "<tr style='height:30px'>";

                echo "<td>" . $consecutivo . "</a></td>";

                echo "<td>" .  $items['nombre_cliente'] . "</td>";

                echo "<td>" . $items['fecha_factura'] . "</td>";

                echo "<td>$" . number_format( $items['total_factura'], 0, ',', '.') . "</td>";


            if($_SESSION['rol'] == 8){
           
                 echo '<td style="width:25px" onclick="abrir_editar_facturas(' . $items["id_factura"] .');"><a href="#">Editar</a></td>';
                 
                 echo '<td style="width:25px" onclick="eliminar_factura(' . $items["id_factura"] .');"><a href="#">Eliminar</a></td>';                                
                
                    }
               

                echo "<td><a href='#' title='Imprimir Factura Media Carta' onclick='imprimir_factura(".$items['id_factura']."); return false;'>Media Carta</a></td>";

                echo "<td><a href='#' title='Imprimir Factura Carta' onclick='imprimir_factura2(".$items['id_factura']."); return false;'>Carta</a></td>";

                echo "<td><a target='_blank' href='#' title='Imprimir Tickets' onclick='imprimir_tickets(".$items['id_factura']."); return false;'>Imprimir Tickets</a></td>";
                     
                echo "</tr>";

            }

?>

                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  