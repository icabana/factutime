<?php       

    $this->pdf = new PdfReportes();		

    $this->pdf->SetCreator('ISMAEL CABANA');
    $this->pdf->SetAuthor('ISMAEL CABANA');
    $this->pdf->SetTitle('REPORTE DEL PRESUPUESTO DEL PROYECTO');
    $this->pdf->SetSubject('PRESUPUESTO DEL PROYECTO.');

    $this->pdf->AliasNbPages();

    $this->pdf->SetTextColor(0,0,0);
    $this->pdf->SetFillColor( 239, 239, 239);  		


    $anchos = array('5', '10', '25','35','45', '55', '65', '115', '30');
    $this->pdf->SetMargins("20","9","20");
    $this->pdf->AddPage();
    $this->pdf->SetFont('Arial','B',6);        

    $contador = 1;        

    $this->pdf->SetFont('Arial','',10);
    $this->pdf->ln();$this->pdf->ln();
    $params = Parametros::singleton();

   

     $this->pdf->SetFont('Arial','',13);

    $this->pdf->Cell(0, 5, utf8_decode("Corporación Educativa Asesorías del Norte"),0,1,'C');  
       

     $this->pdf->SetFont('Arial','',7);      

     $this->pdf->Cell(0, 3, $params->valor('NITEMPRESA'),0,1,'C');      

      $this->pdf->Cell(0, 3, $params->valor('DIREMPRESA'),0,1,'C');       

      $this->pdf->Cell(0, 3, $params->valor('TELEFEMPRESA'),0,1,'C');       

      $this->pdf->Cell(0, 3, $params->valor('CORREOEMPRESA'),0,1,'C');    

    

    $this->pdf->SetXY(165, 15);

        $this->pdf->SetFont('Arial','',6);    

                    

            $this->pdf->Cell(27, 3, utf8_decode('Comprobante de Ingresos'),0,1); 

            $consecutivo = ""; 

            for($i = strlen($recibo['CONSECUTIVO_RECIBO']); $i<10 ; $i++){ 

               $consecutivo .= "0";                        

            }     

            

            $consecutivo.= "".$recibo['CONSECUTIVO_RECIBO'];

       
        

        $this->pdf->SetXY(165, 18);

        $this->pdf->SetFont('Arial','B',6);    

         $this->pdf->Cell(27, 3, utf8_decode('No. ').$consecutivo,0,0); 
      

        $this->pdf->SetXY(165, 21);

     $this->pdf->SetFont('Arial','',6);    

      $this->pdf->Cell(27, 3, utf8_decode('Régimen Común'),0,0); 


    $this->pdf->SetXY(30, 27);

      

    $this->pdf->ln();

    $this->pdf->SetFont('Arial','B',6);    

    $this->pdf->Cell(20, 3, utf8_decode('SEÑOR(ES): '),1,0,'',1); 

    $this->pdf->SetFont('Arial','',6);    

    $this->pdf->Cell(80, 3, $recibo['NOMBRES_ESTUDIANTE']." ".$recibo['APELLIDOS_ESTUDIANTE'],1,0); 

      

      
    $this->pdf->SetFont('Arial','B',6);         
    $this->pdf->Cell(20, 3, utf8_decode('TELÉFONO: '),1,0,'',1); 
    $this->pdf->SetFont('Arial','',6);    
    $this->pdf->Cell(50, 3,  $recibo['TELEFONO_ESTUDIANTE']." - ".$recibo['CELULAR_ESTUDIANTE'],1,1);  

      

       $this->pdf->SetFont('Arial','B',6);          

      $this->pdf->Cell(20, 3, utf8_decode('C.C. o NIT: '),1,0,'',1);  

       $this->pdf->SetFont('Arial','',6);    

      $this->pdf->Cell(80, 3, $recibo['DOCUMENTO_ESTUDIANTE'],1,0);  

       $this->pdf->SetFont('Arial','B',6);          

      $this->pdf->Cell(20, 3, utf8_decode('CIUDAD: '),1,0,'',1);  

       $this->pdf->SetFont('Arial','',6);    

      $this->pdf->Cell(50, 3, $recibo['CIUDAD_ESTUDIANTE'],1,1);  
      

           $this->pdf->SetFont('Arial','B',6);          

      $this->pdf->Cell(20, 3, utf8_decode('DIRECCION: '),1,0,'',1);  

       $this->pdf->SetFont('Arial','',6);    

      $this->pdf->Cell(80, 3,  $recibo['DIRECCION_ESTUDIANTE'],1,0);  

      

           $this->pdf->SetFont('Arial','B',6);          

      $this->pdf->Cell(20, 3, utf8_decode('CORREO: '),1,0,'',1);  

       $this->pdf->SetFont('Arial','',6);    

      $this->pdf->Cell(50, 3,  $recibo['CORREO_ESTUDIANTE'],1,1);  


    $this->pdf->ln(); $this->pdf->ln(); 

    

      $this->pdf->SetFont('Arial','B',6);          
      $this->pdf->Cell(25, 4, utf8_decode('VALOR: '),1,0,''); 
       $this->pdf->SetFont('Arial','',6);    
      $this->pdf->Cell(0, 4,  "$".number_format($recibo['VALOR_RECIBO'], 0, ',', '.')."      ".strtoupper($valor_en_letras). " PESOS",1,1);  

      
      $this->pdf->SetFont('Arial','B',6);          
      $this->pdf->Cell(25, 4, utf8_decode('FORMA DE PAGO: '),1,0,''); 
       $this->pdf->SetFont('Arial','',6);    
       
       $forma_pago = "";
       if($recibo['FORMAPAGO_RECIBO'] == "debito"){
           $forma_pago = "Tarjeta Débito";
       }
       if($recibo['FORMAPAGO_RECIBO'] == "credito"){
           $forma_pago = "Tarjeta de Crédito";
       }
       if($recibo['FORMAPAGO_RECIBO'] == "Consignacion"){
           $forma_pago = "Consignación";
       }
       if($recibo['FORMAPAGO_RECIBO'] == "Cheque"){
           $forma_pago = "Cheque";
       }
       if($recibo['FORMAPAGO_RECIBO'] == "Efectivo"){
           $forma_pago = "Efectivo";
       }
       if($recibo['FORMAPAGO_RECIBO'] == "Otro"){
           $forma_pago = "Otro";
       }
       
       
      $this->pdf->Cell(50, 4, utf8_decode($forma_pago),1,0);  


      $this->pdf->SetFont('Arial','B',6);          
      $this->pdf->Cell(25, 4, utf8_decode('No. CONSIGNACIÓN: '),1,0,''); 
       $this->pdf->SetFont('Arial','',6);    
      $this->pdf->Cell(0, 4,  $recibo['NUMTRANSACCION_RECIBO'],1,1);  
     

      
      $this->pdf->ln(); 
        $this->pdf->SetFont('Arial','B',6);   
          $this->pdf->Cell(0, 3, utf8_decode('CONCEPTO: '),0,1); 
          $this->pdf->SetFont('Arial','',6);   
          
      $this->pdf->MultiCell(0, 3, $recibo['CONCEPTO_RECIBO'],1); 
      
      $this->pdf->ln(); 
        $this->pdf->SetFont('Arial','B',6);   
          $this->pdf->Cell(0, 3, utf8_decode('OBSERVACIONES: '),0,1); 
          $this->pdf->SetFont('Arial','',6);   
          
      $this->pdf->MultiCell(0, 3, $recibo['OBSERVACIONES_RECIBO'],1); 
     

      $this->pdf->SetFont('Arial','',6);

      $this->pdf->SetY("105");  

        $this->pdf->MultiCell(105, 3, utf8_decode('Esta factura se asimila en todos sus efectos a una letra de cambio de conformidad con el Art. 774 del código de comercio. Autorizo que en caso de incumplimento de esta obligacion sea reportado a las centrales de riesgo, se cobrarán intereses por mora.'),0, 'J');      


      $this->pdf->Line(15, 123, 75, 123);
      

        $this->pdf->SetY("124");  

        $this->pdf->Cell(50, 3, utf8_decode('ELABORADA POR'),0,1, 'C');  


         $this->pdf->Line(80, 123, 140, 123);

      

        $this->pdf->SetXY("85", "124");  

        $this->pdf->Cell(50, 3, utf8_decode('ACEPTADA, FIRMA Y/O SELLO Y FECHA'),0,1, 'C');  
    

?>