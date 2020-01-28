<script type="text/javascript" >

function abrir_crear_categorias(){	

    abrirVentanaContenedor(
            'configuracion', 'Categorias', 'abrirCrearCategoria','',''

    );	
}

function abrir_editar_categorias(id_categoria){

    abrirVentanaContenedor(
            'configuracion', 'Categorias', 'abrirEditarCategoria','id_categoria='+id_categoria,''

    );
    
}

function eliminar_categorias(id_categorias){

    mensaje_confirmar("Está seguro de eliminar este Categoria?", "eliminar_categorias2("+id_categorias+"); ");

}

function eliminar_categorias2(id_categoria){
    
    ejecutarAccion( 
        'configuracion', 'Categorias', 'eliminarCategoria', "id_categoria="+id_categoria, ' mensaje_alertas("success", "Categoria Eliminado con Éxito", "center"); cargarCategorias();' 
    );

}

$( document ).ready(function() {    
    CrearTabla('tabla_categorias');
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
                                    <h1 style='font-size:20px'>GESTIONAR CATEGORIAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td>
                                <p></p>
                                <button onclick="abrir_crear_categorias(); return false;" class="btn btn-block btn-primary btn-lg">Crear Nuevo</button>
                            </td>
                        </tr>
                    </table>
                </h3>                  
            </div>
            
            <div class="box-body table-responsive no-padding">
                
                <table id="tabla_categorias" style="width:100%;" cellpadding="0" cellspacing="0" border="0" class="display" >
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
            foreach ($categorias as $NM => $items) {
               
                echo "<tr style='height:30px'>";
                echo "<td>" . utf8_encode($items['CODIGO_CATEGORIA']) . "</td>";
                echo "<td>" . utf8_encode( $items['DESCRIPCION_CATEGORIA']) . "</td>";

                 echo '<td style="width:25px"><a href="#"><img title="Editar Categoria" alt="Editar Categoria" src="imagenes/botones/editar.png" width="35px"  onclick="abrir_editar_categorias(' . $items["ID_CATEGORIA"] .');" />' .
                    '</a></td>' .

                    '<td style="width:25px"><a href="#">' .
                 '<img onclick="eliminar_categorias(' . $items['ID_CATEGORIA'] . ');"  title="Eliminar Categoria" alt="Eliminar Categoria" src="imagenes/botones/eliminar.png" width="35px" />' .
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
   