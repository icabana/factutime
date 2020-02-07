<?php

class SubCategoriasModel extends ModelBase {


    function getTodos() {        

        $query  =   "
                    select      id_subcategoria, 
                                categoria_subcategoria,
                                nombre_subcategoria                

                    from        prod_subcategorias
                    ";        

        $consulta = $this->consulta($query);
        return $consulta;                      

    }  
  

    function getDatos($id_subcategoria) {       

        $query  =   "
                    select      prod_subcategorias.id_subcategoria, 
                                prod_subcategorias.categoria_subcategoria,
                                prod_subcategorias.nombre_subcategoria                

                    from        prod_subcategorias      

                    where       prod_subcategorias.id_subcategoria='".$id_subcategoria."'";        

        $consulta = $this->consulta($query);
        return $consulta[0];            

    }   


    function insertar(
                $categoria_subcategoria, 
                $nombre_subcategoria
            ) 
    {                

        $query  =   "
                    INSERT INTO prod_subcategorias 
                    (
                        categoria_subcategoria, 
                        nombre_subcategoria
                    )

                    VALUES      
                    (       
                        '".$categoria_subcategoria."', 
                        '".$nombre_subcategoria."'                            
                    );";
     
        return $this->crear_ultimo_id($query);              

    }
   

    function editar(
                $id_subcategoria, 
                $categoria_subcategoria, 
                $nombre_subcategoria
            ) 
    {        

        $query  =   "
                    UPDATE prod_subcategorias  
       
                    SET 
                    
                    categoria_subcategoria  =   '".$categoria_subcategoria."',                         
                    nombre_subcategoria     =   '".$nombre_subcategoria."'
                            
                    WHERE 
                    
                    id_subcategoria         =   '" . $id_subcategoria . "'";       

        return $this->modificarRegistros($query);       

    }
 

    function eliminar(
                $id_subcategoria
            ) 
    {        

        $query  =   "
                    DELETE 
                    
                    FROM prod_subcategorias 
                    
                    WHERE 
                    
                    id_subcategoria = '". $id_subcategoria ."'";

        $this->modificarRegistros($query);

    }    

}

?>