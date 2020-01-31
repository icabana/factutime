<script type="text/javascript" >

function nuevo_tiposegreso(){	
    
    abrirVentanaContenedor(
        'egresos', 
        'Tipo', 
        'nuevo',
        '',
        ''
    );	

}

function editar_tiposegreso(id_tipoegreso){

    abrirVentanaContenedor(
        'egresos', 
        'Tipo', 
        'editar',
        'id='+id_tipoegreso,''
    );

}

function eliminar_tiposegreso(id_tipoegreso){

    mensaje_confirmar("Está seguro de eliminar este Tipo de Egreso?", "eliminar_tiposegreso2("+id_tipoegreso+"); ");

}


function eliminar_tiposegreso2(id_tipoegreso){

    ejecutarAccion( 

        'egresos', 'Tipo', 'eliminarTegreso', "id_tipoegreso="+id_tipoegreso, ' mensaje_alertas("success", "Tipo de Egreso Eliminado con Éxito", "center"); cargarTipo();' 

    );

}


$( document ).ready(function() { 
    CrearTabla('tabla_tiposegreso');
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
                                    <h1 style='font-size:20px'>GESTIONAR TIPOS DE EGRESOS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
                                <button onclick="abrir_crear_tiposegreso(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>

                            </td>

                        </tr>

                    </table>

                </h3>                  

            </div>

            

            <div class="box-body table-responsive no-padding">

                

                <table id="tabla_tiposegreso" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >

                <thead>

                    <tr >          

                        <th >ID</th> 
                        
                        <th >NOMBRE</th> 

                        <th >EDITAR</th>

                        <th >ELIMINAR</th>

                    </tr>

                </thead>

                <tbody >



<?php

            $cont = 0;

            foreach ($tiposegreso as $NM => $items) {

               

                echo "<tr style='height:30px'>";

                echo "<td>" . utf8_encode($items['ID_TEGRESO']) . "</td>";
                
                echo "<td>" . utf8_encode( $items['NOMBRE_TEGRESO']) . "</td>";

                 echo '<td style="width:25px"><a href="#"><img title="Editar Tegreso" alt="Editar Tegreso" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_tiposegreso(' . $items["ID_TEGRESO"] .');" />' .

                    '</a></td>' .


                    '<td style="width:25px"><a href="#">' .

                 '<img onclick="eliminar_tiposegreso(' . $items['ID_TEGRESO'] . ');"  title="Eliminar Tegreso" alt="Eliminar Tegreso" src="imagenes/botones/eliminar.png" width="35px" />' .

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