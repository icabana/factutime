 <div row>
    <div class="col-md-6">
        <div style="padding:25px" class="box">
           

            <div class="box-body table-hover no-padding">
<table class="table table-condensed"  >
                <thead>
                    <tr>                 
               
                        <th ><h6><center><b>No.</b></center></h6></th>
                        <th ><h6><center><b>Fecha</b></center></h6></th>
                        <th ><h6><center><b>Concepto</b></center></h6></th>
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
                    
                    echo "<td><center>" . $items['FECHA_RECIBO'] . "</center></td>";
                    
                    echo "<td>" .  $items['CONCEPTO_RECIBO'] . "</td>";
                    
                    
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

<div class="col-md-6">
        <div style="padding:25px" class="box">
           

            <div class="box-body table-hover no-padding">
<table class="table table-condensed"  >
                <thead>
                    <tr>                 
               
                        <th ><h6><center><b>No.</b></center></h6></th>
                        <th ><h6><center><b>Fecha</b></center></h6></th>
                        <th ><h6><center><b>Concepto</b></center></h6></th>
                        <th ><h6><center><b>Valor del Recibo</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >

<?php
                     $cont = 1;
                     $total_egresos = 0;
            
              
            foreach ($egresos as $NM => $items) {                
                
                    echo '<tr>';                    
                    
                    echo "<td><center>" . $cont . "</center></td>";
                    
                    echo "<td><center>" . $items['FECHA_EGRESO'] . "</center></td>";
                                        
                    echo "<td>" . utf8_encode( strtoupper($items['CONCEPTO_EGRESO']) ) . "</td>";
                                     
                    echo "<td><center>$" . number_format($items['VALOR_EGRESO'],0,',','.') . "</center></td>";
                                       
                                    
                    echo "</tr>";
                    
                    $total_egresos += $items['VALOR_EGRESO'];
                    
                    $cont++;
                    
            }
?>
                </tbody>
</table>
                
                <br><br>
                <h3><b>TOTAL EN EGRESOS:</b> <?php echo "$".number_format($total_egresos,0,',','.'); ?>
                    </h3> </div>
        </div>
    </div>
    </div>

 <div row>
 <br><br>
                <h3><b>SALDO EN CAJA (Ingresos - Egresos)</b> <?php echo "$".number_format($total_recibos-$total_egresos,0,',','.'); ?>
                    </h3> 
    </div>
 

