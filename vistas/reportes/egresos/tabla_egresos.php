
    <div class="col-md-12">
        <div style="padding:25px" class="box">
           

            <div class="box-body table-hover no-padding">
<table class="table table-condensed"  >
                <thead>
                    <tr>                 
               
                        <th ><h6><center><b>No.</b></center></h6></th>
                        <th ><h6><center><b>CONSECUTIVO DEL EGRESO</b></center></h6></th>
                        <th ><h6><center><b>FECHA DEL EGRESO</b></center></h6></th>
                        <th ><h6><center><b>VALOR DEL EGRESO</b></center></h6></th>
                        <th ><h6><center><b>NOMBRE DEL ESTUDIANTE</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >

<?php
                     $cont = 1;
                     $total_egresos = 0;
            
              
            foreach ($egresos as $NM => $items) {                
                
                    echo '<tr>';                    
                    
                    echo "<td><center>" . $cont . "</center></td>";
                    
                    echo "<td><center>" . $items['CONSECUTIVO_EGRESO'] . "</center></td>";
                    
                    echo "<td><center>" . $items['FECHA_EGRESO'] . "</center></td>";
                                        
                    echo "<td><center>$" . number_format($items['VALOR_EGRESO'],0,',','.') . "</center></td>";
                                     
                    echo "<td>" . utf8_encode( strtoupper($items['NOMBRE_PROVEEDOR']) ) . "</td>";
                                       
                                    
                    echo "</tr>";
                    
                    $total_egresos += $items['VALOR_EGRESO'];
                    
                    $cont++;
                    
            }
?>
                </tbody>
</table>
                
                <br><br>
                <b>TOTAL EN EGRESOS:</b> <?php echo "$".number_format($total_egresos,0,',','.'); ?>
                   </div>
        </div>
    </div>