<?php

class CategoriasModel extends ModelBase { 


    function getTodos() {        

        $query = "select 	

                    prod_categorias.id_categoria, 
                    prod_categorias.nombre_categoria                

                    from prod_categorias" ;        

                $consulta = $this->consulta($query);

               return $consulta;                      

    }  
  

    function getDatos($id_categoria) {       

        $query = "select 	

                    prod_categorias.id_categoria, 
                    prod_categorias.nombre_categoria                

                    from prod_categorias     

                    where prod_categorias.id_categoria='".$id_categoria."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];           

    }

    
    function insertar($nombre_categoria) {                

        $query = "INSERT INTO prod_categorias (nombre_categoria)

		VALUES('". utf8_decode(mb_strtoupper($nombre_categoria))."');";
       
        return $this->crear_ultimo_id($query);     

    }
    

    function editar($id_categoria, $nombre_categoria) {        

       $query = "UPDATE prod_categorias  
       
                SET nombre_categoria = '".utf8_decode(mb_strtoupper($nombre_categoria))."'
         
                WHERE id_categoria = '" . $id_categoria . "'";       

       return $this->modificarRegistros($query);       

    } 


    function eliminar($id_categoria) {        

        $query = "DELETE FROM prod_categorias WHERE id_categoria = '". $id_categoria ."'";

        $this->modificarRegistros($query);

    }    

}

?>