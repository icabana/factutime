<script type="text/javascript" >

    function abrir_crear_recibo(){	

        abrirVentanaContenedor(
            'recibos2', 
            'Recibos2', 
            'abrirCrearRecibo',
            'tipo='+$("#tipo_recibo").val(),
            'crearDatePicker("#fecha"); '
        );	
        
    }

    function abrir_editar_recibos2(id_recibo){

        abrirVentanaContenedor(
            'recibos2', 
            'Recibos2', 
            'abrirEditarRecibo',
            'id_recibo='+id_recibo+
            '&tipo='+$("#tipo_recibo").val(),
            'crearDatePicker("#fecha"); crearDatePicker("#vencimiento");'
        );   

    }


    function eliminar_recibo(id_recibo){

        mensaje_confirmar("¿Está seguro de eliminar éste Recibo?", "eliminar_recibo2("+id_recibo+"); ");

    }


    function eliminar_recibo2(id_recibo){

        ejecutarAccion(
            'recibos2', 
            'Recibos2', 
            'eliminarRecibo', 
            "id_recibo="+id_recibo, 
            'mensaje_alertas("success", "Recibo Eliminado Correctamente", "center"); cargarRecibos2();' 
        );

    }


    function imprimir_recibo(id_recibo){
        
        ejecutarAccion(
            'recibos2', 
            'Recibos2', 
            'imprimirRecibo', 
            "id_recibo="+id_recibo, 
            "cargarVisorPDF(data);"
            );

    }

    function imprimir_recibo2(id_recibo){

        ejecutarAccion(
            'recibos2', 
            'Recibos2', 
            'imprimirRecibo2', 
            "id_recibo="+id_recibo, 
            "cargarVisorPDF(data);"
        );

    }

    function imprimir_recibo3(id_recibo){

        ejecutarAccion(
            'recibos2', 
            'Recibos2', 'imprimirRecibo3', "id_recibo="+id_recibo, "cargarVisorPDF(data);");

    }

    $( document ).ready(function() {    
        CrearTabla('tabla_recibos2');
    });


</script>   

 <input type="hidden" value="<?php echo $tipo; ?>" class="form-control pull-right" id="tipo_recibo" name="tipo_recibo">


 <div class="row">

    <div class="col-xs-12">

        <div style="padding:25px" class="box">

            <div class="box-header">

                <h3 class="box-title">

                    <table>

                        <tr>

                            <td>

                                    <h1 style='font-size:20px'>GESTIONAR OTROS INGRESOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>

                            </td>

                            <td>

                                <p></p>

                                <button onclick="abrir_crear_recibo(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>

                            </td>

                        </tr>

                    </table>

                </h3>                  

            </div>

            

            <div class="box-body table-responsive no-padding">

                

                <table id="tabla_recibos2" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>
                    <tr >          
                        <th ><h6><center><b>CONSECUTIVO</b></center></h6></th>
                        <th ><h6><center><b>CLIENTE</b></center></h6></th> 
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

            foreach ($recibos2 as $NM => $items) {

                echo "<tr style='height:30px'>";

                echo "<td>" . utf8_encode($items['CONSECUTIVO_RECIBO']) . "</a></td>";

                echo "<td>" . utf8_encode( $items['NOMBRES_ESTUDIANTE']. " ". $items['APELLIDOS_ESTUDIANTE']) . "</td>";

                echo "<td>" . htmlentities( $items['FECHA_RECIBO']) . "</td>";

                echo "<td>$" . number_format( $items['VALOR_RECIBO'], 0, ',', '.') . "</td>";
                 
                 
            if($_SESSION['rol'] == 8 ){
          
                  
            
                  echo '<td style="width:25px" onclick="abrir_editar_recibos2(' . $items["ID_RECIBO"] .');"><a href="#">Editar</a></td>';  

                echo '<td style="width:25px" onclick="eliminar_recibo(' . $items["ID_RECIBO"] .');"><a href="#">Eliminar</a></td>';  

                                
}
           
                echo "<td><a href='#' title='Imprimir Recibo Media Carta' onclick='imprimir_recibo(".$items['ID_RECIBO']."); return false;'>Media Carta</a></td>";

                echo "<td><a href='#' title='Imprimir Recibo Carta' onclick='imprimir_recibo2(".$items['ID_RECIBO']."); return false;'>Carta</a></td>";
                echo "<td><a href='#' title='Imprimir Tickets' onclick='imprimir_recibo3(".$items['ID_RECIBO']."); return false;'>Imprimir Tickets</a></td>";

                                                                         

				

                    echo "</tr>";

            }

?>

                </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

   