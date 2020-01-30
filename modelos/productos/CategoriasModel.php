<?php

class CategoriasModel extends ModelBase { 


    function getTodosCategorias() {        

        $query = "select 	

                    prod_categorias.id_categoria, 
                    prod_categorias.nombre_categoria                

                    from prod_categorias" ;        

                $consulta = $this->consulta($query);

               return $consulta;                      

    }  
  

    function getDatosCategoria($id_categoria) {       

     $query = "select 	
		        prod_categorias.id_categoria, 
                prod_categorias.nombre_categoria                

                from prod_categorias     

                where prod_categorias.id_categoria='".$id_categoria."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];           

    }

    
    function insertarCategoria($CODIGO_CATEGORIA, $nombre_categoria) {                

        $query = "INSERT INTO prod_categorias (CODIGO_CATEGORIA, nombre_categoria)

		VALUES('".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', '". utf8_decode(mb_strtoupper($nombre_categoria))."');";
       
        return $this->crear_ultimo_id($query);     

    }
    

    function editarCategoria($id_categoria, $CODIGO_CATEGORIA, $nombre_categoria) {        

       $query = "UPDATE prod_categorias  SET CODIGO_CATEGORIA = '".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', nombre_categoria = '".utf8_decode(mb_strtoupper($nombre_categoria))."'
         
        WHERE id_categoria = '" . $id_categoria . "'";       

       return $this->modificarRegistros($query);       

    } 


    function eliminarCategoria($id_categoria) {        

        $query = "DELETE FROM prod_categorias WHERE id_categoria = '". $id_categoria ."'";

        $this->modificarRegistros($query);

    }    

}

?>