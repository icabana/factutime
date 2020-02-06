<?php

class impuestosModel extends ModelBase { 


    function getTodosimpuestos() {        

        $query = "select 	

                    prod_impuestos.id_impuesto, 
                    prod_impuestos.nombre_impuesto                

                    from prod_impuestos" ;        

                $consulta = $this->consulta($query);

               return $consulta;                      

    }  
  

    function getDatosImpuesto($id_impuesto) {       

     $query = "select 	

		        prod_impuestos.id_impuesto, 
                prod_impuestos.nombre_impuesto                

                from prod_impuestos     

                where prod_impuestos.id_impuesto='".$id_impuesto."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];           

    }

    
    function insertarImpuesto($CODIGO_CATEGORIA, $nombre_impuesto) {                

        $query = "INSERT INTO prod_impuestos (CODIGO_CATEGORIA, nombre_impuesto)

		        VALUES('".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', 
                        '". utf8_decode(mb_strtoupper($nombre_impuesto))."');";
       
        return $this->crear_ultimo_id($query);     

    }
    

    function editarImpuesto($id_impuesto, $CODIGO_CATEGORIA, $nombre_impuesto) {        

       $query = "UPDATE prod_impuestos  
       
                SET CODIGO_CATEGORIA = '".utf8_decode(mb_strtoupper($CODIGO_CATEGORIA))."', 
                    nombre_impuesto = '".utf8_decode(mb_strtoupper($nombre_impuesto))."'
         
        WHERE id_impuesto = '" . $id_impuesto . "'";       

       return $this->modificarRegistros($query);       

    } 


    function eliminarImpuesto($id_impuesto) {        

        $query = "DELETE FROM prod_impuestos WHERE id_impuesto = '". $id_impuesto ."'";

        $this->modificarRegistros($query);

    }    

}

?>