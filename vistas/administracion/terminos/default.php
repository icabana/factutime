<div class="row">

    <div class="col-xs-12">

        <div style="padding:25px" class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <table>
                        <tr>
                            <td>
                                <h1 style='font-size:20px'>GESTIONAR T&Eacute;RMINOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>

                            <td>

                                <p></p>

                                <button onclick="abrir_crear_terminos(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>

                            </td>

                        </tr>

                    </table>

                </h3>                  

            </div>

            <div class="box-body table-responsive no-padding">

                <table id="tabla_terminos" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

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

            foreach ($terminos as $NM => $items) {

               

                echo "<tr style='height:30px'>";

                echo "<td>" . utf8_encode($items['CODIGO_TERMINO']) . "</td>";

                echo "<td>" . utf8_encode( $items['DESCRIPCION_TERMINO']) . "</td>";



                 echo '<td style="width:25px"><a href="#"><img title="Editar Termino" alt="Editar Termino" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_terminos(' . $items["ID_TERMINO"] .');" />' .

                    '</a></td>' .



                    '<td style="width:25px"><a href="#">' .

                 '<img onclick="eliminar_terminos(' . $items['ID_TERMINO'] . ');"  title="Eliminar Termino" alt="Eliminar Termino" src="imagenes/botones/eliminar.png" width="35px" />' .

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

   