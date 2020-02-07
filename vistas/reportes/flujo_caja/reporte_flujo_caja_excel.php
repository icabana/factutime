<?php

error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

$this->excel = new PHPExcel();

$this->excel->getProperties()->setCreator("ViceInvestigacion")
                            ->setLastModifiedBy("Maarten Balliauw")
                            ->setTitle("PHPExcel Test Document")
                            ->setSubject("PHPExcel Test Document")
                            ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                            ->setKeywords("office PHPExcel php")
                            ->setCategory("Test result file");




  //PARTE PRINCIPAL DE LOS INDICADORES    

$this->excel->setActiveSheetIndex(0)
        
->setCellValue('A1', 'REPORTE DE FLUJO DE CAJA');
                    

            $this->excel->setActiveSheetIndex(0)
            
            ->setCellValue('A3', 'REFERENCIA DEL INGRESO')
                    
            ->setCellValue('B3', 'ENERO')

            ->setCellValue('C3', 'FEBRERO')
                    
            ->setCellValue('D3', 'MARZO')
            
            ->setCellValue('E3', 'ABRIL ')
            
            ->setCellValue('F3', 'MAYO')

            ->setCellValue('G3', 'JUNIO')
            
            ->setCellValue('H3', 'JULIO')
           
            ->setCellValue('I3', 'AGOSTO')
                    
            ->setCellValue('J3', 'SEPTIEMBRE')
                    
            ->setCellValue('K3', 'OCTUBRE')
            
            ->setCellValue('L3', 'NOVIEMBRE')
                    
            ->setCellValue('M3', 'DICIEMBRE')
                    
            ->setCellValue('N3', 'TOTAL');
            
            

            $columna = 4;
            
            
              $this->excel->setActiveSheetIndex(0)

             ->setCellValue('A'.$columna, "INGRESOS DE CREDITOS EDUCATIVOS");
              
              $fila = 'B';
              $total_ingresos = 0;
              $array_total_ingresos[] = 0;
              $suma = 0;
              
              for($i=0; $i<12; $i++){
                  
                   $suma = $RecibosModel->getTotalIngresosPorMes($i+1);
                  
                   $this->excel->setActiveSheetIndex(0)

                    ->setCellValue($fila.'4',   "$".number_format($suma, 0, ".", "."));
                   
                   $fila++;
                   $array_total_ingresos[$i] += $suma;
                   $total_ingresos += $suma;
                  
              }
              
               $this->excel->setActiveSheetIndex(0)

                    ->setCellValue($fila.'4',   "$".number_format($total_ingresos, 0, ".", "."));
               
               $array_total_ingresos[12] += $total_ingresos;
                            
             $columna++;
             
             
    foreach($productos as $producto){
                                
        $this->excel->setActiveSheetIndex(0)

             ->setCellValue('A'.$columna, utf8_encode($producto['NOMBRE_PRODUCTO']));
        
         $fila = 'B';              
        $total_ingresos = 0;
          
          
        for($i=0; $i<12; $i++){

            
            $suma = $Recibos2Model->getTotalIngresosPorMes($i+1, $producto['ID_PRODUCTO']);
            
             $this->excel->setActiveSheetIndex(0)

              ->setCellValue($fila.$columna,   "$".number_format($suma, 0, ".", "."));

             $fila++;
             
             $total_ingresos += $suma;
             $array_total_ingresos[$i] += $suma;

        }
        

        $this->excel->setActiveSheetIndex(0)
                    ->setCellValue($fila.$columna,   "$".number_format($total_ingresos, 0, ".", "."));
        $columna++;
        $array_total_ingresos[12] += $total_ingresos;

    }
    
     $this->excel->setActiveSheetIndex(0)
            ->setCellValue("A".$columna,   "TOTAL INGRESOS: ");
    
     $fila = 'B'; 
     
   
     
    for($i=0; $i<13; $i++){

            
             $this->excel->setActiveSheetIndex(0)

              ->setCellValue($fila.$columna,   "$".number_format( $array_total_ingresos[$i], 0, ".", "."));

             $fila++;
             

    }

    
    
    
    
    
    
    
    
    

          
$styleArray_color = array(
    'font' => array(
        'bold' => true,
        'width'=>55
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'CCFFCC'),
       
        'rotation' => 90,
        'startcolor' => array(
            'argb' => 'FF1C00',
        ),
        'endcolor' => array(
            'argb' => 'FF1C00',
        ),
    ),
);
  $this->excel->getActiveSheet()->getStyle('A'.$columna.':N'.$columna)->applyFromArray($styleArray_color);
    
    
    
    
    
    
    
    $columna += 5;  
    
 $this->excel->getActiveSheet()->getStyle('A'.$columna.':N'.$columna)->applyFromArray($styleArray_color);

  //PARTE DE LOS EGRESOS                     

    $this->excel->setActiveSheetIndex(0)

    ->setCellValue('A'.$columna, 'REFERENCIA DEL EGRESO')

    ->setCellValue('B'.$columna, 'ENERO')

    ->setCellValue('C'.$columna, 'FEBRERO')

    ->setCellValue('D'.$columna, 'MARZO')

    ->setCellValue('E'.$columna, 'ABRIL ')

    ->setCellValue('F'.$columna, 'MAYO')

    ->setCellValue('G'.$columna, 'JUNIO')

    ->setCellValue('H'.$columna, 'JULIO')

    ->setCellValue('I'.$columna, 'AGOSTO')

    ->setCellValue('J'.$columna, 'SEPTIEMBRE')

    ->setCellValue('K'.$columna, 'OCTUBRE')

    ->setCellValue('L'.$columna, 'NOVIEMBRE')

    ->setCellValue('M'.$columna, 'DICIEMBRE')

    ->setCellValue('N'.$columna, 'TOTAL');
            
            

    $columna ++;
    $array_total_egresos[] = 0;
    
    foreach($tipos_egresos as $tipo_egreso){
                                
        $this->excel->setActiveSheetIndex(0)

             ->setCellValue('A'.$columna, utf8_encode($tipo_egreso['NOMBRE_TEGRESO']));
        
         $fila = 'B';              
        $total_egresos = 0;
          
          
        for($i=0; $i<12; $i++){
            
             $suma = $EgresosModel->getTotalEgresosPorMes($i+1, $tipo_egreso['ID_TEGRESO']);
            
             $this->excel->setActiveSheetIndex(0)

              ->setCellValue($fila.$columna,   "$".number_format($suma, 0, ".", "."));

             $fila++;
             
             $total_egresos += $suma;
             $array_total_egresos[$i] += $suma;

        }
        

        $this->excel->setActiveSheetIndex(0)
                    ->setCellValue($fila.$columna,   "$".number_format($total_egresos, 0, ".", "."));
        $columna++;
        $array_total_egresos[12] += $total_egresos;

    }
    
     $this->excel->setActiveSheetIndex(0)
            ->setCellValue("A".$columna,   "TOTAL EGRESOS: ");
    
     $fila = 'B'; 
     
   
     
    for($i=0; $i<13; $i++){

            
             $this->excel->setActiveSheetIndex(0)

              ->setCellValue($fila.$columna,   "$".number_format( $array_total_egresos[$i], 0, ".", "."));

             $fila++;
             

    }
    
    
     $this->excel->getActiveSheet()->getStyle('A'.$columna.':N'.$columna)->applyFromArray($styleArray_color);
    
    $fila = B;
     $columna += 2;  
       $columna ++;  
     $this->excel->setActiveSheetIndex(0)
            ->setCellValue("A".$columna,   "FLUJO DE CAJA ECONÓMICO: ");
    
  
     
    for($i=0; $i<13; $i++){
            
             $this->excel->setActiveSheetIndex(0)

              ->setCellValue($fila.$columna,   "$".number_format( $array_total_ingresos[$i] - $array_total_egresos[$i], 0, ".", "."));

             $fila++;             

    }
    
    
    

     $this->excel->getActiveSheet()->getStyle('A'.$columna.':N'.$columna)->applyFromArray($styleArray_color);
    
    
    
    
    
    
    
    
    
    
    
    

     
    
  $this->excel->getActiveSheet()->getStyle('A3:N3')->applyFromArray($styleArray_color);

  $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
  $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    

// Rename worksheet
$this->excel->getActiveSheet()->setTitle('Reporte de Indicadores');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$this->excel->setActiveSheetIndex(0);

// Save Excel 2007 file




$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;



?>