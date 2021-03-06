<?php

    $this->pdf = new PdfReportes2('P', 'mm', 'Tickets');


    $this->pdf->SetCreator('ISMAEL CABANA');
    $this->pdf->SetAuthor('ISMAEL CABANA');
    $this->pdf->SetTitle('REPORTE DEL PRESUPUESTO DEL PROYECTO');
    $this->pdf->SetSubject('PRESUPUESTO DEL PROYECTO.');
    $this->pdf->AliasNbPages();

    $this->pdf->SetTextColor(0,0,0);
    $this->pdf->SetFillColor( 239, 239, 239 );  

    $anchos = array('5', '10', '25','35','45', '55', '65', '115', '30');

    $this->pdf->SetMargins("3","3","3");

    $this->pdf->AddPage();

    $contador = 1;    

    
    $this->pdf->ln();$this->pdf->ln();

    $params = Parametros::singleton();

   

    $this->pdf->SetFont('Arial','',15);
    
    $this->pdf->Cell(0, 6, utf8_decode("Corporación Educativa "),0,1, 'C');   
    $this->pdf->Cell(0, 6, utf8_decode("Asesorias del Norte"),0,1, 'C');   


     $this->pdf->ln();

     $this->pdf->Cell(0, 5, $params->valor('NITEMPRESA'),0,1);  
      $this->pdf->Cell(0, 5, $params->valor('DIREMPRESA'),0,1); 
      $this->pdf->Cell(0, 5, trim($params->valor('TELEFEMPRESA')),0,1); 
      $this->pdf->Cell(0, 5, $params->valor('CORREOEMPRESA'),0,1); 
      
       $this->pdf->ln();
    
       
            $consecutivo = ""; 

            for($i = strlen($recibo['CONSECUTIVO_RECIBO']); $i<10 ; $i++){ 
               $consecutivo .= "0";                        
            }     


            $consecutivo.= "".$recibo['CONSECUTIVO_RECIBO'];
    
     $this->pdf->Cell(0, 6, "Ingreso No. ".$consecutivo,0,1); 
     $this->pdf->Cell(0, 6, "Fecha: ".$recibo['FECHA_RECIBO'],0,1); 
     
     
    $this->pdf->ln();

    $this->pdf->Cell(0, 3, utf8_decode('Señor(a): '),0,1, 'C'); 
        $this->pdf->ln(); 
   
    $this->pdf->MultiCell(0, 6, $recibo['NOMBRES_ESTUDIANTE']." ".$recibo['APELLIDOS_ESTUDIANTE'],0, 'C'); 
            
    $this->pdf->Cell(0, 6, "Documento: ".number_format($recibo['DOCUMENTO_ESTUDIANTE'],0,',','.')."",0,1, 'C'); 
       
$this->pdf->ln();
     
      $this->pdf->MultiCell(0, 6, "Valor Recibo: $".number_format($recibo['VALOR_RECIBO'],0,',','.')."",0,1); 
     
      
      $this->pdf->MultiCell(0, 6, "Forma de Pago: ".$recibo['FORMAPAGO_RECIBO'],0,1); 
      
       if($recibo['FORMAPAGO_RECIBO'] == 'Consignacion'){
        $this->pdf->MultiCell(0, 6, utf8_decode("No. de Consignación: ").$recibo['NUMTRANSACCION_RECIBO'],0,1); 
      }else{
          $num_consignacion = "";
      }
      
         $this->pdf->MultiCell(0, 6, utf8_decode("Saldo Pendiente: $").number_format($saldo_pendiente, 0, ',', '.'),0,1); 


        $fechas = new Fechas();    

        $valor_cuota = 0;
        $sumas_cuotas = 0;
        
            $valor_cuota = $recibo['TOTAL_RECIBO']/$recibo['TERMINO_RECIBO'];    

        $conta = 1;    
            
        for ($i=1; $i<=$recibo['TERMINO_RECIBO']; $i++) {

            $proxima_fecha = $fechas->sumarmeses2($recibo['FECHA_RECIBO'], $i);

            $sumas_cuotas += $valor_cuota;
            
            if($estado_factura == "PAGADA"){
            
                
            }else{
                
                $lo_que_se_a_pagado = $recibo['TOTAL_RECIBO'] - $saldo_factura;
                
                 if($sumas_cuotas <= $lo_que_se_a_pagado){
                
                    
                 }else{
                     
                    
                         $a_pagar = $sumas_cuotas - $lo_que_se_a_pagado;
                         
                         if($a_pagar > $valor_cuota){
                             $a_pagar = $valor_cuota;
                         }
                          
                 }
                
            }
            
            
            if($conta % 2 == 0){
                /////$this->pdf->ln();
            }
            
            $conta++;
            
        }
               
          
         
        $total_en_letras1 = $this->convertir($lo_que_se_a_pagado);
        
        $total_en_letras2 = $this->convertir($sumas_cuotas-$lo_que_se_a_pagado);
              

  $this->pdf->ln();  $this->pdf->ln();  $this->pdf->ln();
     

?>