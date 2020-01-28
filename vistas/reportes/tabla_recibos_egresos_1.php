
    <div class="col-md-12">
        <div style="padding:25px" class="box">
           

            <div class="box-body table-hover no-padding">
<table class="table table-condensed"  >
                <thead>
                    <tr>                 
               
                        <th ><h6><center><b>No.</b></center></h6></th>
                        <th ><h6><center><b>No. Recibo</b></center></h6></th>
                        <th ><h6><center><b>Fecha de Elaboraci&oacute;n</b></center></h6></th>
                        <th ><h6><center><b>Cliente</b></center></h6></th>
                        <th ><h6><center><b>Medio de Pago</b></center></h6></th>
                        <th ><h6><center><b>No. de Trans</b></center></h6></th>
                        <th ><h6><center><b>Valor del Recibo</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >

<?php
                     $cont = 1;
                     $total_recibos = 0;
            
              
            foreach ($recibos as $NM => $items) {                
                
                    echo '<tr>';                    
                    
                    echo "<td><center>" . $cont . "</center></td>";
                    
                    echo "<td><center>" . $items['CONSECUTIVO_RECIBO'] . "</center></td>";
                    
                    echo "<td><center>" . $items['FECHA_RECIBO'] . "</center></td>";
                                        
                    echo "<td>" . utf8_encode( strtoupper($items['NOMBRES_ESTUDIANTE']." ".$items['APELLIDOS_ESTUDIANTE']) ) . "</td>";
                                     
                    echo "<td>" . utf8_encode( $items['FORMAPAGO_RECIBO']) . "</td>";
                    
                    echo "<td>" . utf8_encode( $items['NUMTRANSACCION_RECIBO']) . "</td>";
                    
                    
                    echo "<td><center>$" . number_format($items['VALOR_RECIBO'],0,',','.') . "</center></td>";
                                       
                                    
                    echo "</tr>";
                    
                    $total_recibos += $items['VALOR_RECIBO'];
                    
                    $cont++;
                    
            }
?>
                </tbody>
</table>
                
                <br><br>
                <h3><b>TOTAL EN INGRESOS:</b> <?php echo "$".number_format($total_recibos,0,',','.'); ?>
                   </h3></div>
        </div>
    </div>

<br><br><br>



