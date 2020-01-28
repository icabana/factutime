<script type="text/javascript">

    function abrir_crear_proveedor(){	

        abrirVentanaContenedor(
            'configuracion', 
            'Proveedores',
            'abrirCrearProveedor',
            '',
            "crearDatePickerfull('#fechanacimiento');"

        );	
    }

    function abrir_editar_proveedor(id_proveedor){	

        abrirVentanaContenedor(
            'configuracion', 
            'Proveedores', 
            'abrirEditarProveedor',
            'id_proveedor='+id_proveedor,
            "crearDatePickerfull('#fechanacimiento');"

        );
        
    }

    function eliminar_proveedor(id_proveedor){

        mensaje_confirmar("¿Está seguro de eliminar este Proveedor?", "eliminar_proveedor2("+id_proveedor+"); ");

    }

    function eliminar_proveedor2(id_proveedor){
        
        ejecutarAccion( 
            'configuracion', 'Proveedores', 'eliminarProveedor', "id_proveedor="+id_proveedor, ' mensaje_alertas("success", "Proveedor Eliminado con Éxito", "center"); cargarProveedores();' 
        );

    }

    $( document ).ready(function(){    
        CrearTabla('tabla_proveedores');
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
                                    <h1 style='font-size:20px'>GESTIONAR PROVEEDORES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
    <button onclick="abrir_crear_proveedor(); return false;" class="btn btn-block btn-primary btn-lg">Nuevo Proveedor</button>
                            </td>
                        </tr>
                    </table>
                </h3>                  
            </div>
            
            <div class="box-body table-responsive no-padding">
                
                <table id="tabla_proveedores" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >
                <thead>
                    <tr > 
                        <th ><h6><center><b>NOMBRE DEL PROVEEDOR</b></center></h6></th>
                        <th ><h6><center><b>NIT/C&Eacute;DULA</b></center></h6></th>
                        <th ><h6><center><b>DIRECCI&Oacute;N</b></center></h6></th>
                        <th ><h6><center><b>TEL&Eacute;FONO</b></center></h6></th>
                        <th ><h6><center><b>CORREO</b></center></h6></th>
                        <th ><h6><center><b>EDITAR</b></center></h6></th>
                        <th ><h6><center><b>ELIMINAR</b></center></h6></th>
                    </tr>
                </thead>
                <tbody >

<?php
            $cont = 0;
            foreach ($proveedores as $NM => $items) {
               
                    echo "<tr style='height:30px'>";
                    echo "<td>" . mb_strtoupper(utf8_encode( $items['NOMBRE_PROVEEDOR']), 'UTF-8'). "</td>";
                    echo "<td>" .htmlentities( $items['TIPODOCUMENTO_PROVEEDOR']." ".number_format($items['DOCUMENTO_PROVEEDOR'],0,',','.')). "</td>";
                    echo "<td>" .utf8_encode( $items['DIRECCION_PROVEEDOR'] ). "</td>";
                    echo "<td>" .htmlentities( $items['TELEFONO_PROVEEDOR']). "</td>";
                    echo "<td>" .htmlentities( $items['CORREO_PROVEEDOR']). "</td>";
                   
                     echo '<td style="width:25px"><a href="#"><img title="Editar Proveedor" alt="Editar Proveedor" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_proveedor(' .$items["ID_PROVEEDOR"].');" />' .
                        '</a></td>' .
                        
                            '<td style="width:25px"><a href="#">' .
            		     '<img onclick="eliminar_proveedor(' .$items['ID_PROVEEDOR']. ');"  title="Eliminar Proveedor" alt="Eliminar Proveedor" src="imagenes/botones/eliminar.png" width="35px" />' .
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
   