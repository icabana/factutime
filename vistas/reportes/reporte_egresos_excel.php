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
        
->setCellValue('A1', 'REPORTE DE EGRESOS');
                    

            $this->excel->setActiveSheetIndex(0)
            
            ->setCellValue('A3', 'NO.')
                    
            ->setCellValue('B3', 'NO. DE EGRESO')

            ->setCellValue('C3', 'FECHA DE ELABORACIÓN')
                    
            ->setCellValue('D3', 'CREADOR')
            
            ->setCellValue('E3', 'IDENTIFICACIÓN ')
            
            ->setCellValue('F3', 'PROVEEDOR')

            ->setCellValue('G3', 'MEDIO DE PAGO')
            
            ->setCellValue('H3', 'No. De Trans')
           
            ->setCellValue('I3', 'CONCEPTO')
                    
            ->setCellValue('J3', 'OBSERVACIONES')
                    
            ->setCellValue('K3', 'VALOR DEL EGRESO');
            
            
            
            $columna =4;
            $cont = 1;
            
            $total_egresos = 0;

            foreach($egresos as $egreso){
                
                
                
                
        $this->excel->setActiveSheetIndex(0)

             ->setCellValue('A'.$columna, $cont)

             ->setCellValue('B'.$columna, "No. ".$egreso['CONSECUTIVO_EGRESO'])

             ->setCellValue('C'.$columna,  $egreso['FECHA_EGRESO'])
                                
             ->setCellValue('D'.$columna, $egreso['VENDEDOR_EGRESO'])
                
             ->setCellValue('E'.$columna, $egreso['DOCUMENTO_PROVEEDOR'])
                
             ->setCellValue('F'.$columna, $egreso['NOMBRE_PROVEEDOR'])
                
             ->setCellValue('G'.$columna, $egreso['FORMAPAGO_EGRESO'])
                
             ->setCellValue('H'.$columna, $egreso['NUMTRANSACCION_EGRESO'])
                
             ->setCellValue('I'.$columna, $egreso['CONCEPTO_EGRESO'])
                
             ->setCellValue('J'.$columna, $egreso['OBSERVACIONES_EGRESO'])
                
             ->setCellValue('K'.$columna, "$".number_format($egreso['VALOR_EGRESO'], 0, ".", "."));

            $columna ++;
            $cont++;
            $total_egresos += $egreso['VALOR_EGRESO'];

        }

        
        $columna ++;
        
  $this->excel->setActiveSheetIndex(0)

             ->setCellValue('A'.$columna, "TOTAL EN EGRESOS: "."$".number_format($total_egresos, 0, ".", "."));
          

          
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
  $this->excel->getActiveSheet()->getStyle('A3:K3')->applyFromArray($styleArray_color);

  $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
  $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
  $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
  $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
  $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
  $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(70);
  $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
  $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
  $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(100);
  $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(100);
  $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    

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