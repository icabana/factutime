<script type="text/javascript" >

    function abrir_crear_productos(){	

        abrirVentanaContenedor(
            'configuracion', 
            'Productos', 
            'abrirCrearProducto',
            '',
            ''
        );	

    }

    function abrir_editar_productos(id_producto){

        abrirVentanaContenedor(
            'configuracion', 
            'Productos', 
            'abrirEditarProducto',
            'id_producto='+id_producto,''
        );        

    }


    function eliminar_productos(id_productos){

        mensaje_confirmar("Está seguro de eliminar este Producto?", "eliminar_productos2("+id_productos+"); ");

    }



    function eliminar_productos2(id_producto){        

        ejecutarAccion( 
            'configuracion', 
            'Productos', 
            'eliminarProducto', 
            "id_producto="+id_producto, 
            ' mensaje_alertas("success", "Producto Eliminado con Éxito", "center"); cargarProductos();' 
        );

    }

    $( document ).ready(function() {
        CrearTabla('tabla_productos');
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
                                    <h1 style='font-size:20px'>GESTIONAR PRODUCTOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>

                            <td>
                                <p></p>
                                <button onclick="abrir_crear_productos(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>
                            </td>

                        </tr>

                    </table>

                </h3>                  

            </div>

            

            <div class="box-body table-responsive no-padding">

                

                <table id="tabla_productos" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>

                    <tr >          

                        <th ><h6><center><b>CÓDIGO</b></center></h6></th>

                        <th ><h6><center><b>NOMBRE</b></center></h6></th> 

                        <th ><h6><center><b>PRECIO</b></center></h6></th> 

                        <th ><h6><center><b>EDITAR</b></center></h6></th>

                        <th ><h6><center><b>ELIMINAR</b></center></h6></th>

                    </tr>

                </thead>

                <tbody >



<?php

            $cont = 0;

            foreach ($productos as $NM => $items) {

               

                echo "<tr style='height:30px'>";

                echo "<td>" . utf8_encode($items['CODIGO_PRODUCTO']) . "</td>";

                echo "<td>" . utf8_encode( $items['NOMBRE_PRODUCTO']) . "</td>";

                echo "<td>$" . number_format( $items['PRECIO1_PRODUCTO'], 0, ',', '.') . "</td>";



                 echo '<td style="width:25px"><a href="#"><img title="Editar Producto" alt="Editar Producto" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_productos(' . $items["ID_PRODUCTO"] .');" />' .

                    '</a></td>' .



                    '<td style="width:25px"><a href="#">' .

                 '<img onclick="eliminar_productos(' . $items['ID_PRODUCTO'] . ');"  title="Eliminar Producto" alt="Eliminar Producto" src="imagenes/botones/eliminar.png" width="35px" />' .

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

   