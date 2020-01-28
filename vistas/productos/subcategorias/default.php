<script type="text/javascript" >

function abrir_crear_subcategorias(){	

    abrirVentanaContenedor(
            'configuracion', 'SubCategorias', 'abrirCrearSubcategoria','',''

    );	
}

function abrir_editar_subcategorias(id_subcategoria){

    abrirVentanaContenedor(
            'configuracion', 'SubCategorias', 'abrirEditarSubCategoria','id_subcategoria='+id_subcategoria,''

    );
    
}

function eliminar_subcategorias(id_subcategorias){

    mensaje_confirmar("Está seguro de eliminar este Subcategoria?", "eliminar_subcategorias2("+id_subcategorias+"); ");

}

function eliminar_subcategorias2(id_subcategoria){
    
    ejecutarAccion( 
        'configuracion', 'SubCategorias', 'eliminarSubcategoria', "id_subcategoria="+id_subcategoria, ' mensaje_alertas("success", "Subcategoria Eliminado con Éxito", "center"); cargarSubCategorias();' 
    );

}

$( document ).ready(function() {    
    CrearTabla('tabla_subcategorias');
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
                                    <h1 style='font-size:20px'>GESTIONAR SUBCATEGORIAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
                                <button onclick="abrir_crear_subcategorias(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>
                            </td>
                        </tr>
                    </table>
                </h3>                  
            </div>
            
            <div class="box-body table-responsive no-padding">
                
                <table id="tabla_subcategorias" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >
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
            foreach ($subcategorias as $NM => $items) {
               
                echo "<tr style='height:30px'>";
                echo "<td>" . utf8_encode($items['CODIGO_SUBCATEGORIA']) . "</td>";
                echo "<td>" . utf8_encode( $items['DESCRIPCION_SUBCATEGORIA']) . "</td>";

                 echo '<td style="width:25px"><a href="#"><img title="Editar Subcategoria" alt="Editar Subcategoria" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_subcategorias(' . $items["ID_SUBCATEGORIA"] .');" />' .
                    '</a></td>' .

                    '<td style="width:25px"><a href="#">' .
                 '<img onclick="eliminar_subcategorias(' . $items['ID_SUBCATEGORIA'] . ');"  title="Eliminar Subcategoria" alt="Eliminar Subcategoria" src="imagenes/botones/eliminar.png" width="35px" />' .
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
   