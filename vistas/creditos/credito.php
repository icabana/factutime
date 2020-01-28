<?php           $this->pdf = new PdfReportes();		    $this->pdf->SetCreator('ISMAEL CABANA');    $this->pdf->SetAuthor('ISMAEL CABANA');    $this->pdf->SetTitle('REPORTE DEL PRESUPUESTO DEL PROYECTO');    $this->pdf->SetSubject('PRESUPUESTO DEL PROYECTO.');    $this->pdf->AliasNbPages();    $this->pdf->SetTextColor(0,0,0);    $this->pdf->SetFillColor( 239, 239, 239);  		    $anchos = array('5', '10', '25','35','45', '55', '65', '115', '30');    $this->pdf->SetMargins("20","9","20");    $this->pdf->AddPage();    $this->pdf->SetFont('Arial','B',6);                        $contador = 1;            $this->pdf->SetFont('Arial','',10);    $this->pdf->ln();$this->pdf->ln();    $params = Parametros::singleton();        $this->pdf->SetFont('Arial','',13);    $this->pdf->Cell(0, 5, utf8_decode("Corporación Educativa Asesorías del Norte"),0,1,'C');                $this->pdf->SetFont('Arial','',7);                           $this->pdf->Cell(0, 3, $params->valor('NITEMPRESA'),0,1,'C');                 $this->pdf->Cell(0, 3, $params->valor('DIREMPRESA'),0,1,'C');             $this->pdf->Cell(0, 3, $params->valor('TELEFEMPRESA'),0,1,'C');             $this->pdf->Cell(0, 3, $params->valor('CORREOEMPRESA'),0,1,'C');                    $this->pdf->SetXY(165, 15);        $this->pdf->SetFont('Arial','',6);                                                                    $this->pdf->Cell(27, 3, utf8_decode('Nota Crédito'),0,1);             $consecutivo = "";             for($i = strlen($credito['CONSECUTIVO_CREDITO']); $i<10 ; $i++){                $consecutivo .= "0";                                    }                             $consecutivo.= "".$credito['CONSECUTIVO_CREDITO'];                             if($credito['TIPO_CREDITO'] == "PEDIDOS"){                          $this->pdf->Cell(27, 3, utf8_decode('Orden de Pedido '),0,1);             $consecutivo = "";                                                for($i = strlen($credito['CONSECUTIVO2_CREDITO']); $i<10 ; $i++){                                        $consecutivo .= "0";                                    }                          $consecutivo.= "".$credito['CONSECUTIVO2_CREDITO'];           }               if($credito['TIPO_CREDITO'] == "COTIZACIONES"){                         $this->pdf->Cell(27, 3, utf8_decode('Cotización '),0,1);                          $consecutivo = "";                            for($i = strlen($credito['CONSECUTIVO3_CREDITO']); $i<10 ; $i++){                                                $consecutivo .= "0";                                        }                $consecutivo.= "".$credito['CONSECUTIVO3_CREDITO'];                        }               if($credito['TIPO_CREDITO'] == "DEVOLUCIONES"){                         $this->pdf->Cell(27, 3, utf8_decode('Devolución '),0,1);             $consecutivo = "";                                                for($i = strlen($credito['CONSECUTIVO4_CREDITO']); $i<10 ; $i++){                                                $consecutivo .= "0";                                        }                $consecutivo.= "".$credito['CONSECUTIVO4_CREDITO'];        }                        $this->pdf->SetXY(165, 18);        $this->pdf->SetFont('Arial','B',6);             $this->pdf->Cell(27, 3, utf8_decode('No. ').$consecutivo,0,0);                                                 $this->pdf->SetXY(165, 21);     $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(27, 3, utf8_decode('Régimen Común'),0,0);                             $this->pdf->SetXY(30, 27);          $this->pdf->ln();    $this->pdf->SetFont('Arial','B',6);        $this->pdf->Cell(20, 3, utf8_decode('SEÑOR(ES): '),1,0,'',1);     $this->pdf->SetFont('Arial','',6);        $this->pdf->Cell(80, 3, $credito['NOMBRES_ESTUDIANTE']." ".$credito['APELLIDOS_ESTUDIANTE'],1,0);                 $this->pdf->SetFont('Arial','B',6);             $this->pdf->Cell(20, 3, utf8_decode('TELÉFONO: '),1,0,'',1);     $this->pdf->SetFont('Arial','',6);        $this->pdf->Cell(50, 3,  $credito['TELEFONO_ESTUDIANTE']." - ".$credito['CELULAR_ESTUDIANTE'],1,1);                           $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(20, 3, utf8_decode('C.C. o NIT: '),1,0,'',1);         $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(80, 3, $credito['DOCUMENTO_ESTUDIANTE'],1,0);                                       $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(20, 3, utf8_decode('CIUDAD: '),1,0,'',1);         $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(50, 3, $credito['CIUDAD_ESTUDIANTE'],1,1);                                        $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(20, 3, utf8_decode('DIRECCION: '),1,0,'',1);         $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(80, 3,  $credito['DIRECCION_ESTUDIANTE'],1,0);                         $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(20, 3, utf8_decode('CORREO: '),1,0,'',1);         $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(50, 3,  $credito['CORREO_ESTUDIANTE'],1,1);                $this->pdf->SetFont('Arial','B',6);                     $this->pdf->Cell(20, 3, utf8_decode('PROGRAMA: '),1,0,'',1);       $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(100, 3, $admision['NOMBRE_PROGRAMA'],1,0);               $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(30, 3, utf8_decode('CÓDIGO ADMISIÓN: '),1,0,'',1);         $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(20, 3,  $admision['CODIGO_ADMISION'],1,0);             $this->pdf->ln(); $this->pdf->ln();                $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(30, 4, utf8_decode('Fecha de la nota crédito: '),1,0,'');        $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(0, 4,  $credito['FECHA_CREDITO'],1,1);        $this->pdf->SetFont('Arial','B',6);                $this->pdf->Cell(30, 4, utf8_decode('Nota crédito por valor: '),1,0,'');        $this->pdf->SetFont('Arial','',6);          $this->pdf->Cell(0, 4,  "$".number_format($credito['VALOR_CREDITO'], 0, ',', '.')."      ".strtoupper($valor_en_letras). " PESOS",1,1);                    $this->pdf->ln();         $this->pdf->SetFont('Arial','B',6);             $this->pdf->Cell(0, 3, utf8_decode('CONCEPTO: '),0,1);           $this->pdf->SetFont('Arial','',6);                   $this->pdf->MultiCell(0, 3, $credito['CONCEPTO_CREDITO'],1);             $this->pdf->ln();         $this->pdf->SetFont('Arial','B',6);             $this->pdf->Cell(0, 3, utf8_decode('OBSERVACIONES: '),0,1);           $this->pdf->SetFont('Arial','',6);                   $this->pdf->MultiCell(0, 3, $credito['OBSERVACIONES_CREDITO'],1);            $this->pdf->SetFont('Arial','',6);      $this->pdf->SetY("105");          $this->pdf->MultiCell(105, 3, utf8_decode('Esta factura se asimila en todos sus efectos a una letra de cambio de conformidad con el Art. 774 del código de comercio. Autorizo que en caso de incumplimento de esta obligacion sea reportado a las centrales de riesgo, se cobrarán intereses por mora.'),0, 'J');                           $this->pdf->Line(15, 123, 75, 123);              $this->pdf->SetY("124");          $this->pdf->Cell(50, 3, utf8_decode('ELABORADA POR'),0,1, 'C');                           $this->pdf->Line(80, 123, 140, 123);              $this->pdf->SetXY("85", "124");          $this->pdf->Cell(50, 3, utf8_decode('ACEPTADA, FIRMA Y/O SELLO Y FECHA'),0,1, 'C');                    ?>