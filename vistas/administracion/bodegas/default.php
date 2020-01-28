<script type="text/javascript" >


    function abrir_crear_bodegas(){	

        abrirVentanaContenedor(
                'configuracion', 
                'Bodegas', 
                'abrirCrearBodega',
                '',
                ''
        );	

    }


    function abrir_editar_bodegas(id_bodega){

        abrirVentanaContenedor(
            'configuracion', 
            'Bodegas',
            'abrirEditarBodega',
            'id_bodega='+id_bodega,
            ''
        );        

    }


    function eliminar_bodegas(id_bodegas){

        mensaje_confirmar("Está seguro de eliminar este Bodega?", "eliminar_bodegas2("+id_bodegas+"); ");

    }


    function eliminar_bodegas2(id_bodega){        

        ejecutarAccion( 
            'configuracion', 
            'Bodegas', 
            'eliminarBodega', 
            "id_bodega="+id_bodega, 
            ' mensaje_alertas("success", "Bodega Eliminado con Éxito", "center"); cargarBodegas();' 

        );

    }

    $( document ).ready(function() {    
        CrearTabla('tabla_bodegas');
    });


</script>   



 <div class="row">
    <div class="col-xs-12">
        <div style="padding:25px" class="box">

        <div class="card-header">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 style="color:grey">GESTIONAR BODEGAS</h4>
                        </div>
                        <div class="col-md-2">

                            <button onclick="nuevo_usuario(); return false;" class="btn btn-success btn-sm">
                                Nuevo Usuario
                            </button>

                        </div>
                    </div>
                </div>


            </div>   

            <div class="box-body table-responsive no-padding">                

                <table id="tabla_bodegas" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>
                    <tr >          
                        <th ><h6><center><b>CÓDIGO</b></center></h6></th>
                        <th ><h6><center><b>NOMBRE</b></center></h6></th> 
                        <th ><h6><center><b>EDITAR</b></center></h6></th>
                        <th ><h6><center><b>ELIMINAR</b></center></h6></th>
                    </tr>
                </thead>

                <tbody >

<?php

            $cont = 0;

            foreach ($bodegas as $NM => $items) {               

                echo "<tr style='height:30px'>";
                echo "<td>" . utf8_encode($items['CODIGO_BODEGA']) . "</td>";
                echo "<td>" . utf8_encode( $items['DESCRIPCION_BODEGA']) . "</td>";

                 echo '<td style="width:25px"><a href="#"><img title="Editar Bodega" alt="Editar Bodega" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_bodegas(' . $items["ID_BODEGA"] .');" />' .

                    '</a></td>' .
                    '<td style="width:25px"><a href="#">' .
                 '<img onclick="eliminar_bodegas(' . $items['ID_BODEGA'] . ');"  title="Eliminar Bodega" alt="Eliminar Bodega" src="imagenes/botones/eliminar.png" width="35px" />' .

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