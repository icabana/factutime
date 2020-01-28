<script type="text/javascript" >

function abrir_crear_unidades(){	

    abrirVentanaContenedor(
            'configuracion', 'Unidades', 'abrirCrearUnidad','',''

    );	
}

function abrir_editar_unidades(id_unidad){

    abrirVentanaContenedor(
            'configuracion', 'Unidades', 'abrirEditarUnidad','id_unidad='+id_unidad,''

    );
    
}

function eliminar_unidades(id_unidades){

    mensaje_confirmar("Está seguro de eliminar este Unidad?", "eliminar_unidades2("+id_unidades+"); ");

}

function eliminar_unidades2(id_unidad){
    
    ejecutarAccion( 
        'configuracion', 'Unidades', 'eliminarUnidad', "id_unidad="+id_unidad, ' mensaje_alertas("success", "Unidad Eliminado con Éxito", "center"); cargarUnidades();' 
    );

}

$( document ).ready(function() {    
    CrearTabla('tabla_unidades');
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
                                    <h1 style='font-size:20px'>GESTIONAR UNIDADES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
                                <button onclick="abrir_crear_unidades(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>
                            </td>
                        </tr>
                    </table>
                </h3>                  
            </div>
            
            <div class="box-body table-responsive no-padding">
                
                <table id="tabla_unidades" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >
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
            foreach ($unidades as $NM => $items) {
               
                echo "<tr style='height:30px'>";
                echo "<td>" . utf8_encode($items['CODIGO_UNIDAD']) . "</td>";
                echo "<td>" . utf8_encode( $items['DESCRIPCION_UNIDAD']) . "</td>";

                 echo '<td style="width:25px"><a href="#"><img title="Editar Unidad" alt="Editar Unidad" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_unidades(' . $items["ID_UNIDAD"] .');" />' .
                    '</a></td>' .

                    '<td style="width:25px"><a href="#">' .
                 '<img onclick="eliminar_unidades(' . $items['ID_UNIDAD'] . ');"  title="Eliminar Unidad" alt="Eliminar Unidad" src="imagenes/botones/eliminar.png" width="35px" />' .
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
   