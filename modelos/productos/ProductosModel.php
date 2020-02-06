<?php

class ProductosModel extends ModelBase {  

    function getTodos() {        

        $query = "
        
            select 	
        
                prod_productos.id_producto, 
                prod_productos.codigo_producto,
                prod_productos.codigobarra_producto,
                prod_productos.categoria_producto,
                prod_productos.subcategoria_producto,
                prod_productos.nombre_producto,
                prod_productos.descripcion_producto,
                prod_productos.marca_producto,
                prod_productos.modelo_producto,
                prod_productos.unidad_producto,
                prod_productos.precioxunidad_producto,
                prod_productos.vencimiento_producto,
                prod_productos.estado_producto,
                
                prod_categorias.nombre_categoria,
                
                prod_subcategorias.nombre_subcategoria,
                
                unidades.nombre_unidad,

                estados.nombre_estado

                from prod_productos
                    left join prod_categorias on prod_productos.categoria_producto = prod_categorias.id_categoria
                    left join prod_subcategorias on prod_productos.subcategoria_producto = prod_subcategorias.id_subcategoria
                    left join unidades on prod_productos.unidad_producto = unidades.id_unidad
                    left join estados on prod_productos.estado_producto = estados.id_estado
                    " ;

        

                $consulta = $this->consulta($query);

               return $consulta;       

               

    }  

    function getTodosProductosPromociones() {
       
        $query = "
            select 	
        
                prod_productos.id_producto, 
                prod_productos.codigo_producto,
                prod_productos.codigobarra_producto,
                prod_productos.categoria_producto,
                prod_productos.subcategoria_producto,
                prod_productos.nombre_producto,
                prod_productos.descripcion_producto,
                prod_productos.marca_producto,
                prod_productos.modelo_producto,
                prod_productos.unidad_producto,
                prod_productos.precioxunidad_producto,
                prod_productos.vencimiento_producto,
                prod_productos.estado_producto,
                
                prod_categorias.nombre_categoria,
                
                prod_subcategorias.nombre_subcategoria,
                
                unidades.nombre_unidad,

                estados.nombre_estado

                from prod_productos
                    left join prod_categorias on prod_productos.categoria_producto = prod_categorias.id_categoria
                    left join prod_subcategorias on prod_productos.subcategoria_producto = prod_subcategorias.id_subcategoria
                    left join unidades on prod_productos.unidad_producto = unidades.id_unidad
                    left join estados on prod_productos.estado_producto = estados.id_estado
                    
                where prod_productos.DESCUENTO_PRODUCTO != 0 and prod_productos.DESCUENTO_PRODUCTO != ''" ;
    
            $consulta = $this->consulta($query);

            return $consulta;       
   

    }    
  

    function getProductosLIKE($texto) {


     $query = "select 	
        
        prod_productos.id_producto, 
        prod_productos.codigo_producto,
        prod_productos.codigobarra_producto,
        prod_productos.categoria_producto,
        prod_productos.subcategoria_producto,
        prod_productos.nombre_producto,
        prod_productos.descripcion_producto,
        prod_productos.marca_producto,
        prod_productos.modelo_producto,
        prod_productos.unidad_producto,
        prod_productos.precioxunidad_producto,
        prod_productos.vencimiento_producto,
        prod_productos.estado_producto,
        
        prod_categorias.nombre_categoria,
        
        prod_subcategorias.nombre_subcategoria,
        
        unidades.nombre_unidad,

        estados.nombre_estado

        from prod_productos
            left join prod_categorias on prod_productos.categoria_producto = prod_categorias.id_categoria
            left join prod_subcategorias on prod_productos.subcategoria_producto = prod_subcategorias.id_subcategoria
            left join unidades on prod_productos.unidad_producto = unidades.id_unidad
            left join estados on prod_productos.estado_producto = estados.id_estado

        where prod_productos.NOMBRE_PRODUCTO LIKE '%".$texto."%'" ;

        $consulta = $this->consulta($query);

        return $consulta;                 

    }  
  

    function getDatosProducto($id_producto) {

     $query = "
     
     select 	
        
        prod_productos.id_producto, 
        prod_productos.codigo_producto,
        prod_productos.codigobarra_producto,
        prod_productos.categoria_producto,
        prod_productos.subcategoria_producto,
        prod_productos.nombre_producto,
        prod_productos.descripcion_producto,
        prod_productos.marca_producto,
        prod_productos.modelo_producto,
        prod_productos.unidad_producto,
        prod_productos.precioxunidad_producto,
        prod_productos.vencimiento_producto,
        prod_productos.estado_producto,
        
        prod_categorias.nombre_categoria,
        
        prod_subcategorias.nombre_subcategoria,
        
        unidades.nombre_unidad,

        estados.nombre_estado

        from prod_productos
            left join prod_categorias on prod_productos.categoria_producto = prod_categorias.id_categoria
            left join prod_subcategorias on prod_productos.subcategoria_producto = prod_subcategorias.id_subcategoria
            left join unidades on prod_productos.unidad_producto = unidades.id_unidad
            left join estados on prod_productos.estado_producto = estados.id_estado
      

        where prod_productos.id_producto='".$id_producto."'";        

        $consulta = $this->consulta($query);

        return $consulta[0];   

    }


    function insertarProducto(                                 
                                $codigo_producto,
                                $codigobarra_producto,
                                $categoria_producto,
                                $subcategoria_producto,
                                $nombre_producto,
                                $descripcion_producto,
                                $marca_producto,
                                $modelo_producto,
                                $unidad_producto,
                                $precioxunidad_producto,
                                $vencimiento_producto,
                                $estado_producto
                            ) {

         $query = "INSERT INTO prod_productos ( 
                                    codigo_producto,
                                    codigobarra_producto,
                                    categoria_producto,
                                    subcategoria_producto,
                                    nombre_producto,
                                    descripcion_producto,
                                    marca_producto,
                                    modelo_producto,
                                    unidad_producto,
                                    precioxunidad_producto,
                                    vencimiento_producto,
                                    estado_producto
                                )

		   VALUES(  '". $codigo_producto."', 
                    '". $codigobarra_producto."', 
                    '". $categoria_producto."', 
                    '". $subcategoria_producto."', 
                    '". $nombre_producto."', 
                    '". $descripcion_producto."', 
                    '". $marca_producto."', 
                    '". $modelo_producto."', 
                    '". $unidad_producto."', 
                    '". $precioxunidad_producto."',
                    '". $vencimiento_producto."',
                    '". $estado_producto."'
            );";

        return $this->crear_ultimo_id($query);       

    }

    
    function editarProducto(
            $id_producto,
            $codigo_producto,
            $codigobarra_producto,
            $categoria_producto,
            $subcategoria_producto,
            $nombre_producto,
            $descripcion_producto,
            $marca_producto,
            $modelo_producto,
            $unidad_producto,
            $precioxunidad_producto,
            $vencimiento_producto,
            $estado_producto
        ) {

       $query = "UPDATE prod_productos  
       
       SET  codigo_producto = '".$codigo_producto."', 
            codigobarra_producto = '".$codigobarra_producto."', 
            categoria_producto = '".$categoria_producto."', 
            subcategoria_producto = '".$subcategoria_producto."', 
            nombre_producto = '".$nombre_producto."', 
            descripcion_producto = '".$descripcion_producto."', 
            marca_producto = '".$marca_producto."', 
            modelo_producto = '".$modelo_producto."', 
            unidad_producto = '".$unidad_producto."', 
            precioxunidad_producto = '".$precioxunidad_producto."',
            vencimiento_producto = '".$vencimiento_producto."',
            estado_producto = '".$estado_producto."'

        WHERE id_producto = '" . $id_producto . "'";

       return $this->modificarRegistros($query);

    }

    function eliminarProducto($id_producto) {

        $query = "DELETE FROM prod_productos WHERE id_producto = '". $id_producto ."'";
        $this->modificarRegistros($query);

    }
    

}

?>