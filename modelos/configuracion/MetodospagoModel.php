<?php

class MetodosModel extends ModelBase {  

    function getTodos() {

     $query = "select 	

		        fact_metodospago.id_metodo, 
                fact_metodospago.nombre_metodo

                from fact_metodospago" ;

                $consulta = $this->consulta($query);
               return $consulta;       

    }  

    function getDatos($id_metodo) {       

     $query = "select 	

		        fact_metodospago.id_metodo, 
                fact_metodospago.nombre_metodo

                from fact_metodospago      

                where fact_metodospago.id_metodo='".$id_metodo."'";

         $consulta = $this->consulta($query);
        return $consulta[0];    

    }


}

?>