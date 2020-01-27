<?php

/**
 * @author 
 * @copyright 2010
 */

class ListaDesplegable {
	
	var $textoDefecto = '[SELECCIONE UNO]';
	var $valorDefecto = '00';
	
	private $selecionado = 'selected="selected"';
	
	private $html_abre_lista_desplegable			= '<select class="form-control select2" id="%s" name="%s" onchange="%s" onclick="%s" style="%s" >';	
	private $html_abre_multiple_lista_desplegable 	= '<select size="4" id="%s" name="%s" onchange="%s" onclick="%s"  style="%s" multiple="multiple" >';
	private $html_cierre_lista_desplegable 			= '</select>';
	private $html_option_lista_desplegable 			= '<option value="%s" %s >%s</option>';

	
	
	private function opcion_lista_desplegable($texto, $valor, $sel){
		if( $sel == $valor ) {
			return sprintf($this->html_option_lista_desplegable, $valor, $this->selecionado, utf8_encode($texto) );
		}else{ 
			return sprintf($this->html_option_lista_desplegable, $valor, '',   utf8_encode($texto)  );
		}	
		return '';
	}
	
	public function crear($datos, $campoTexto, $campoValor, $id_lista, $option = '00', $onclick = '', $onchange = '', $estilo = '', $multiple = false, $textoDefecto){
		
                $this->textoDefecto = $textoDefecto;
		
                $abre = '';
                
                
                if(count($datos)==0){
                    $this->html_abre_lista_desplegable .= "<option value='0'>NINGUNO</option>";
                }
                
		if( !$multiple ){
			$abre = sprintf($this->html_abre_lista_desplegable, $id_lista, $id_lista, $onchange, $onclick, $estilo);
		}else{
			$abre = sprintf($this->html_abre_multiple_lista_desplegable, $id_lista, $id_lista, $onchange, $onclick, $estilo);
		}		
		
		
//		$opciones = $this->opcion_lista_desplegable( $this->textoDefecto, $this->valorDefecto,  $option);
                foreach ( $datos as $nCampo ) {
		  
                if( is_array($campoTexto) ){
                $txtTmp = '';
                
                if($campoTexto[0]==''){
                    $txtTmp = $nCampo[$campoTexto[1]]." ".$nCampo[$campoTexto[2]];
                }else{
                    $txtTmp = $nCampo[$campoTexto[1]]." - ".$nCampo[$campoTexto[2]];
                }         
                
                $opciones .= $this->opcion_lista_desplegable($txtTmp,  $nCampo[$campoValor], $option);
            }else{
              
              
               if( is_array($option) ){
                
                $campo_seleccionado="";
                
                foreach($option as $op){
                  
                  if($nCampo[$campoValor]==$op['ESPACIO_ESPACIOCURSO']){
                    
                     $campo_seleccionado = $nCampo[$campoValor];
                  }
                  
                }
                
                if($campo_seleccionado==""){
                  $opciones .= $this->opcion_lista_desplegable($nCampo[$campoTexto],  $nCampo[$campoValor], $option);
                }else{
                  $opciones .= $this->opcion_lista_desplegable($nCampo[$campoTexto],  $nCampo[$campoValor], $campo_seleccionado);
                }
                
               
                
                
                }else{
                  $opciones .= $this->opcion_lista_desplegable($nCampo[$campoTexto],  $nCampo[$campoValor], $option);
                }
              
                
            }
            
    	} 
		
		return htmlspecialchars_decode(
			$abre.$opciones.$this->html_cierre_lista_desplegable
		);
	}
}
?>