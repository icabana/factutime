<?php
	class Fechas {
		
		function diasEntreFechas($date1, $date2){
                    
		    if (!is_integer($date1)) $date1 = strtotime($date1);
		    if (!is_integer($date2)) $date2 = strtotime($date2);
		    
		    $dias = abs($date1 - $date2) / 60 / 60 / 24;
                    return $dias;
                    
		}
		
		
		function sumardias($fecha, $dias){
                    
                    if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $fecha)) {
                        list($dia, $mes, $ano) = split("/", $fecha);
                    }
                    if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha)) {
                        list($dia, $mes, $ano) = split("-", $fecha);
                    }
	        
                    $nueva = mktime(0, 0, 0, $mes, $dia, $ano) + $dias * 24 * 60 * 60;
                    $nuevafecha = date("Y-m-d", $nueva);
                    return $nuevafecha;
	
                }
		
		function sumardias2($fecha, $dias){
                    
                    $nuevafecha = strtotime ( "+".$dias."day" , strtotime ( $fecha ) ) ;
                    
                    $nuevafecha = date ( 'Y-m-d' , $nuevafecha );

                    return $nuevafecha;
	
                }
		
		function sumarmeses2($fecha, $meses){
                    
                    $nuevafecha = strtotime ( "+".$meses."month" , strtotime ( $fecha ) ) ;
                    
                    $nuevafecha = date ( 'Y-m-d' , $nuevafecha );

                    return $nuevafecha;
	
                }
		
		function sumar_meses($fecha, $meses){
                    
                    if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $fecha)) {
                        list($dia, $mes, $ano) = split("/", $fecha);
                    }
                    if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha)) {
                        list($dia, $mes, $ano) = split("-", $fecha);
                    }
                    
                    $nueva = mktime(0, 0, 0, $mes, $dia, $ano) + $meses * 24 * 60 * 60 * 30;
                    $nuevafecha = date("Y-m-d", $nueva);
                    return $nuevafecha;
	
                }
	
                function dias_mes($Month, $Year)
                {
                   
                    if (is_callable("cal_days_in_month")) {
                        return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
                    } else {                       
                        return date("d", mktime(0, 0, 0, $Month + 1, 0, $Year));
                    }
                }
               
	}
?>