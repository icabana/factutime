<?php

class impuestosModel extends ModelBase { 


    function getTodos() {        

        $query = "select 	

                    prod_impuestos.id_impuesto, 
                    prod_impuestos.codigo_impuesto,
                    prod_impuestos.nombre_impuesto                

                    from prod_impuestos" ;        

                $consulta = $this->consulta($query);

               return $consulta;                      

    }  
  

    function getDatos($id_impuesto) {       

     $query = "select 	

		        prod_impuestos.id_impuesto, 
                prod_impuestos.codigo_impuesto,
                prod_impuestos.nombre_impuesto                

                from prod_impuestos     

                where prod_impuestos.id_impuesto='".$id_impuesto."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];           

    }

    
    function insertar($codigo_impuesto, $nombre_impuesto) {                

        $query = "INSERT INTO prod_impuestos (nombre_impuesto)

		        VALUES('".utf8_decode(mb_strtoupper($codigo_impuesto))."', 
                        '". utf8_decode(mb_strtoupper($nombre_impuesto))."');";
       
        return $this->crear_ultimo_id($query);     

    }
    

    function editar($id_impuesto, $codigo_impuesto, $nombre_impuesto) {        

       $query = "UPDATE prod_impuestos  
       
                SET codigo_impuesto = '".$codigo_impuesto."', 
                    nombre_impuesto = '".$nombre_impuesto."'
         
        WHERE id_impuesto = '" . $id_impuesto . "'";       

       return $this->modificarRegistros($query);       

    } 


    function eliminar($id_impuesto) {        

        $query = "DELETE FROM prod_impuestos WHERE id_impuesto = '". $id_impuesto ."'";

        $this->modificarRegistros($query);

    }    

}

?>