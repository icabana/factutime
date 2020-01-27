<?php

/**
 * @author 
 * @copyright 2010
 */
 
require $config->get('libreria').'html/ListaDesplegable.class.php'; 
require $config->get('libreria').'html/ListaChequeo.class.php';
 
class Formularios{
	
	public function Lista_Desplegable($datos, $campoTexto, $campoValor, $id_lista, $option = '00', $onclick = '', $onchange = '', $estilo = '', $multiple = false, $textoDefecto='[SELECCIONE UNO]'){
	    $Lista = new ListaDesplegable();
            
        return $Lista->crear(
            $datos, utf8_encode($campoTexto), $campoValor, 
            $id_lista, $option, 
            $onclick, $onchange, 
            $estilo, $multiple,$textoDefecto
            );    
	}
        
	
	public function Lista_Chequeo_Multiple_Derecha($idOpciones, $nombreLista, $textoOpciones = array(), $valorOpciones = array(), $valorSeleccionados = array(), 
      $onclick = '', $onchange = '', $estilo = ''){
      
      $CheckList = new ListaChequeo($idOpciones, $nombreLista);
      return $CheckList->crear_lista_multiple( $textoOpciones, $valorOpciones, $valorSeleccionados, $onclick, $onchange, $estilo );
		
	}
	
}

?>
