<?php

$tabla_productos = "<table id='tabla_productos' style='width:100%;' cellpadding'0' cellspacing='0' border='0' class='table table-hover' >

                <thead>
                    <tr>                      
                        <th ><h6><center><b>CODIGO</b></center></h6></th>
                        <th ><h6><center><b>NOMBRE</b></center></h6></th>
                    </tr>
                </thead>

                <tbody >";

            foreach ($productos as $NM => $items) {

                    $tabla_productos .= "<tr  style='height:30px'>";

                    $tabla_productos .= "<td>" .htmlentities( $items['CODIGO_PRODUCTO']). "</td>";

                    $tabla_productos .= "<td>" . utf8_encode( $items['NOMBRE_PRODUCTO']). "</td>";

                    $tabla_productos .= "</tr>";

                    $cont++;

            }

$tabla_productos .= "</tbody>

                </table>";   

echo $tabla_productos;