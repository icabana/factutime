<?php

$tabla_proveedores = "

    <table id='tabla_proveedores'  class='table table-hover'>

        <thead>
            <tr>         
                <th><center>NOMBRE</center></th> 
            </tr>
        </thead>
        <tbody>";
         

    foreach ($proveedores as $clave => $valor) {            

        $tabla_proveedores .= "<tr onclick='seleccionar_proveedor(" . $valor['ID_PROVEEDOR'] . ", \"" . ($valor['NOMBRE_PROVEEDOR']) . "\", \"" . (utf8_encode($valor['DOCUMENTO_PROVEEDOR'])) . "\", \"" . (utf8_encode($valor['DIRECCION_PROVEEDOR'])) . "\", \"" . (utf8_encode($valor['TELEFONO_PROVEEDOR'])) . "\");'>";  

        $tabla_proveedores .= "<td><strong>" . utf8_encode($valor['NOMBRE_PROVEEDOR']) . "</strong></td>";
        
        $tabla_proveedores .= "</tr>";            

    }        

$tabla_proveedores .= "

    </tbody></table>";        

echo $tabla_proveedores;    