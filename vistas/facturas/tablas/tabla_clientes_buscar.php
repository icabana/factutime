<?php

$tabla_clientes = "<table id='tabla_clientes'  class='table table-hover'>

    <thead>
        <tr>     
            <th><center>NOMBRE</center></th> 
        </tr>
        </thead>
    <tbody>";

foreach ($clientes as $clave => $valor) {

    $tabla_clientes .= "<tr onclick='seleccionar_cliente(" . $valor['ID_ESTUDIANTE'] . ", \"" . ($valor['NOMBRES_ESTUDIANTE']) . "\", \"" . (utf8_encode($valor['DOCUMENTO_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['DIRECCION_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['DIRECCION_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['TELEFONO_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['CELULAR_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['CIUDAD_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['APELLIDOS_ESTUDIANTE'])) . "\");'>";  

    $tabla_clientes .= "<td><strong>" . utf8_encode($valor['NOMBRES_ESTUDIANTE'])." ".(utf8_encode($valor['APELLIDOS_ESTUDIANTE'])) . "</strong></td>";

    $tabla_clientes .= "</tr>";

}

$tabla_clientes .= "</tbody></table>";

echo $tabla_clientes;
