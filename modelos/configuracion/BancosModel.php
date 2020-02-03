<?php

class BancosModel extends ModelBase {

    function getTodos(){
        
        $query = "select    bancos.id_banco, 
                            bancos.nombre_banco
            	                 
                        from bancos
                        
                        ORDER BY bancos.nombre_banco";

        $consulta = $this->consulta($query);
        return $consulta;
        
    }
    
    function getDatos($id_banco){
        
        $query = "select    bancos.id_banco, 
                            bancos.nombre_banco
            	                 
                        from bancos
                             
                        where bancos.id_banco = '".$id_banco."'
                        
                        ORDER BY bancos.nombre_banco";
        
        $consulta = $this->consulta($query);
        
        return $consulta[0];
        
    }        
  
}

?>