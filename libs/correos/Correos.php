<?php
	
class Correos extends PHPMailer{
		
	public function __construct()
	    {
            	    	
		$params = Parametros::singleton();
		                
                $this->IsSMTP();
                $this->SMTPSecure = 'ssl';
                $this->Host = 'smtp.gmail.com';
                $this->SMTPAuth= true;
                $this->Port = 25;                 
	        $this->From = "sistema.viceinvestigacion@gmail.com";
                $this->FromName = utf8_decode("SIVI");
                 $this->Username = "sistema.viceinvestigacion@gmail.com";
                $this->Password = "Ismael777880428";
	    	$this->AltBody = "Enfocados en la Calidad";
               
	    }
	
		function agregarDestinos($str){			
			$cc = explode(';', $str);
			foreach($cc as $ccMail ){
				$dtsCC = explode(',', $ccMail );
				$this->AddAddress($dtsCC[1],$dtsCC[0]);	
			}
			
		}
	
		function agregarCC($strCC){			
			$cc = explode(';', $strCC);
			foreach($cc as $ccMail ){
				$dtsCC = explode(',', $ccMail );
				$this->AddCC($dtsCC[1],$dtsCC[0]);	
			}
			
		}
	
		function agregarCCO($str){			
			$cc = explode(';', $str);
			foreach($cc as $ccMail ){
				$dtsCC = explode(',', $ccMail );
				$this->AddBCC($dtsCC[1],$dtsCC[0]);	
			}			
		}	
		
		function agregarReenvio($str){
			$cc = explode(';', $str);
			foreach($cc as $ccMail ){
				$dtsCC = explode(',', $ccMail );
				$this->AddReplyTo($dtsCC[1],$dtsCC[0]);	
			}			
		}
	
	}
?>