<?php

class TerminosModel extends ModelBase {  

    function getTodosTerminos() {       

     $query = "select 	
		        terminos.id_termino, 
                terminos.codigo_termino,
                terminos.nombre_termino                

                from terminos" ;        

                $consulta = $this->consulta($query);

               return $consulta;                      

    }  
  

    function getDatosTermino($id_termino) {       

     $query = "select 	
                terminos.id_termino, 
                terminos.codigo_termino,
                terminos.nombre_termino                

                from terminos      

                where terminos.id_termino='".$id_termino."'";        

         $consulta = $this->consulta($query);

        return $consulta[0];            

    }
    

    function insertarTermino($codigo_termino, $nombre_termino) {                

         $query = "INSERT INTO terminos (codigo_termino, nombre_termino)
		VALUES('".utf8_decode(mb_strtoupper($codigo_termino))."', '". utf8_decode(mb_strtoupper($nombre_termino))."');";
     
        return $this->crear_ultimo_id($query);    

    }
    

    function editarTermino($id_termino, $codigo_termino, $nombre_termino) {        

       $query = "UPDATE terminos  SET codigo_termino = '".utf8_decode(mb_strtoupper($codigo_termino))."', nombre_termino = '".utf8_decode(mb_strtoupper($nombre_termino))."'
          
        WHERE id_termino = '" . $id_termino . "'";       

       return $this->modificarRegistros($query);       

    }


    function eliminarTermino($id_termino) {        

        $query = "DELETE FROM terminos WHERE id_termino = '". $id_termino ."'";        

        $this->modificarRegistros($query);

    }    


}

?>