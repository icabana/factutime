<script type="text/javascript">

    function nuevo_cliente(){	

        abrirVentanaContenedor(
            'configuracion', 
            'Clientes', 
            'abrirCrearCliente',
            '',
            "crearDatePickerfull('#fechanacimiento');"

        );	
    }

    function editar_cliente(id_cliente){	

        abrirVentanaContenedor(
            'configuracion', 
            'Clientes', 
            'abrirEditarCliente',
            'id_cliente='+id_cliente,
            "crearDatePickerfull('#fechanacimiento');"

        );
        
    }

    function eliminar_cliente(id_cliente){

        mensaje_confirmar("¿Está seguro de eliminar este Cliente?", "eliminar_cliente2("+id_cliente+"); ");

    }

    function eliminar_cliente2(id_cliente){
        
        ejecutarAccion( 
            'configuracion', 'Clientes', 'eliminarCliente', "id_cliente="+id_cliente, ' mensaje_alertas("success", "Cliente Eliminado con Éxito", "center"); cargarClientes();' 
        );

    }

    $( document ).ready(function(){    
        CrearTabla('tabla_clientes');
    });

</script>   

 <div class="row">
    <div class="col-xs-12">
        <div style="padding:25px" class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <table>
                        <tr>
                            <td>
                                    <h1 style='font-size:20px'>GESTIONAR clienteS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
    <button onclick="abrir_crear_cliente(); return false;" class="btn btn-block btn-primary btn-lg">Nuevo Cliente</button>
                            </td>
                        </tr>
                    </table>
                </h3>                  
            </div>
            
            <div class="box-body table-responsive no-padding">
                
                <table id="tabla_clientes" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >
                <thead>
                    <tr > 
                        <th >NOMBRE DEL cliente</th>
                        <th >NIT/C&Eacute;DULA</th>
                        <th >DIRECCI&Oacute;N</th>
                        <th >TEL&Eacute;FONO</th>
                        <th >CORREO</th>
                        <th >EDITAR</th>
                        <th >ELIMINAR</th>
                    </tr>
                </thead>
                <tbody >

<?php
            $cont = 0;
            foreach ($clientes as $NM => $items) {
               
                    echo "<tr style='height:30px'>";
                    echo "<td>" . mb_strtoupper(utf8_encode( $items['NOMBRE_cliente']), 'UTF-8'). "</td>";
                    echo "<td>" .htmlentities( $items['TIPODOCUMENTO_cliente']." ".number_format($items['DOCUMENTO_cliente'],0,',','.')). "</td>";
                    echo "<td>" .utf8_encode( $items['direccionresidencia_cliente']). "</td>";
                    echo "<td>" .htmlentities( $items['TELEFONO_cliente']." - ".$items['CELULAR_cliente']). "</td>";
                    echo "<td>" .htmlentities( $items['correo_cliente'])."</td>";
                   
                     echo '<td style="width:25px"><a href="#"><img title="Editar Cliente" alt="Editar Cliente" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_cliente(' .$items["ID_cliente"].');" />' .
                        '</a></td>' .
                        
                        '<td style="width:25px"><a href="#">' .
		     '<img onclick="eliminar_cliente(' .$items['ID_cliente']. ');"  title="Eliminar Cliente" alt="Eliminar Cliente" src="imagenes/botones/eliminar.png" width="35px" />' .
		     '</a></td>';                          
                                                                         
				
                    echo "</tr>";
            }
?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
   