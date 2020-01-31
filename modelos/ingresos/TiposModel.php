<?php

class TiposModel extends ModelBase {  

    function getTodosTipos() {

     $query = "select 	

		        fact_tiposegreso.id_tipo, 
                fact_tiposegreso.nombre_tipo

                from fact_tiposegreso" ;

                $consulta = $this->consulta($query);
               return $consulta;       

    }  

    function getDatosTegreso($id_tipo) {       

     $query = "select 	

		        fact_tiposegreso.id_tipo, 
                fact_tiposegreso.nombre_tipo

                from fact_tiposegreso      

                where fact_tiposegreso.id_tipo='".$id_tipo."'";

         $consulta = $this->consulta($query);
        return $consulta[0];    

    }



}

?>