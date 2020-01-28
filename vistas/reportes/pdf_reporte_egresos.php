<?php
       
    $this->pdf = new PdfReporteEgresos(L, 'mm', 'legal');
		
    $this->pdf->SetCreator('ISMAEL CABANA');
    $this->pdf->SetAuthor('ISMAEL CABANA');
    $this->pdf->SetTitle('REPORTE DE EGRESOS');
    $this->pdf->SetSubject('PRESUPUESTO DEL PROYECTO.');
    $this->pdf->AliasNbPages();

    $this->pdf->SetTextColor(0,0,0);
    $this->pdf->SetFillColor( 188, 255, 189 );   			

    $anchos = array('5', '10', '20','35','45', '55', '65', '115', '30');
    
    $this->pdf->SetMargins("15","10","15");
    
    
    $this->pdf->AddPage();
    
    $this->pdf->SetY(40);
      
        $this->pdf->SetWidths(array(20,30,40,100,90,40));

    $this->pdf->SetAligns(array('L','L','L','J','J','C'));

     $this->pdf->SetFont('Arial','B',9);

        $this->pdf->Cell(20, 7, utf8_decode('No. '),1,0, "C", 1);    
        
        $this->pdf->Cell(30, 7, utf8_decode('No. de Egreso'),1,0, "C", 1);     
        
        $this->pdf->Cell(40, 7, utf8_decode('Fecha de Elaboración'),1,0, "C", 1);
        
        $this->pdf->Cell(100, 7, utf8_decode('Proveedor'),1,0, "C", 1);
        
        $this->pdf->Cell(90, 7, utf8_decode('Concepto'),1,0, "C", 1);
        
        $this->pdf->Cell(40, 7, utf8_decode('Valor del Egreso'),1,1, "C", 1);

       $this->pdf->SetFont('Arial','',9);
                            
     $fechas = new Fechas(); 
     
     $cont = 1;
     $total_egresos = 0;
          $this->pdf->SetFont('Arial','',8);
     foreach ($egresos as $egresos){
         
        $this->pdf->Row(
            array(                 
                $cont,
                "No. ".$egresos['CONSECUTIVO_EGRESO'],
                $egresos['FECHA_EGRESO'],
                $egresos['NOMBRE_PROVEEDOR'],
                $egresos['CONCEPTO_EGRESO'],
                "$".number_format($egresos['VALOR_EGRESO'], 0, ".", ".")
            )
        );
        
        $cont++;
        $total_egresos+=$egresos['VALOR_EGRESO'];
        
     }
         
     
     $this->pdf->ln();
     $this->pdf->ln();
     
     $this->pdf->SetFont('Arial','B',14);
       $this->pdf->Cell(55, 7, utf8_decode('TOTAL EN EGRESOS: '),0,0);
     
     $this->pdf->SetFont('Arial','B',14);
       $this->pdf->Cell(0, 7,"$".number_format($total_egresos, 0, ".", "."),0,1);
?>