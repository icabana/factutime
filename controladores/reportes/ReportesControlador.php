<?php

class ReportesControlador extends ControllerBase {
        
    /// REPORTE POR GRUPO
    public function cargarReportePorGrupo() {      
        include 'vistas/reportes/reporte_por_grupo.php';
    }  
    
    public function buscarGrupo() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $grupos = $GruposModel->getGrupoPorText($_POST['texto']);

        $tabla_grupos = "<table id='tabla_grupos'  class='table table-hover'>

        <thead>
            <tr>     
                <th><center>GRUPO</center></th> 
            </tr>
            </thead>
        <tbody>";

        foreach ($grupos as $clave => $valor) {

            $tabla_grupos .= "<tr onclick='seleccionar_grupo(" . $valor['ID_GRUPO'] . ", \"" . ($valor['CODIGO_GRUPO']) . "\", \"" . (utf8_encode($valor['NOMBRE_PROGRAMA'])) . "\", \"" . (utf8_encode($valor['ANO_GRUPO'])) . "\", \"" . (utf8_encode($valor['SEMESTRE_GRUPO'])) . "\");'>";  

            $tabla_grupos .= "<td><center>" . utf8_encode($valor['CODIGO_GRUPO'])." ".(utf8_encode($valor['NOMBRE_PROGRAMA']))." (".utf8_encode($valor['ANO_GRUPO']." - ".$valor['SEMESTRE_GRUPO']) . ")</center></td>";

            $tabla_grupos .= "</tr>";

        }

       $tabla_grupos .= "

</tbody></table>";

        echo $tabla_grupos;

      }

    public function SalidaReportePorGrupo() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        $estudiantes = $InscripcionesModel->getInscripcionesPorGrupo($_POST['id_grupo']);
        
        $total_facturado = 0;
        $total_descuentos = 0;
        $total_recibos = 0;
        $total_creditos = 0;
        
        foreach ($estudiantes as $estudiante) {
        
            $facturas = $FacturasModel->getFacturasPorCliente($estudiante['ID_ESTUDIANTE']);
            $recibos = $RecibosModel->getRecibosPorCliente($estudiante['ID_ESTUDIANTE']);
            $creditos = $CreditosModel->getCreditosPorCliente($estudiante['ID_ESTUDIANTE']);
            
            foreach ($facturas as $factura) {
                
                $total_facturado += $factura['TOTAL_FACTURA'];
                $total_descuentos +=  $factura['DESCUENTO_FACTURA'];
                
            }
            
            foreach ($recibos as $recibo) {
                
                $total_recibos += $recibo['VALOR_RECIBO'];
                
            }
            
            foreach ($creditos as $credito) {
                
                $total_creditos += $credito['VALOR_CREDITO'];
                
            }
           
        }

        $tabla_grupos .= "<b>TOTAL FACTURADO:</b> $". number_format($total_facturado,0,',','.');
        $tabla_grupos .= "<br><b>TOTAL DESCONTADO:</b> $". number_format($total_descuentos,0,',','.');
        $tabla_grupos .= "<br><b>TOTAL RECIBIDO:</b> $". number_format($total_recibos,0,',','.');
        $tabla_grupos .= "<br><b>TOTAL NOTAS CRÉDITO:</b> $". number_format($total_creditos,0,',','.');
        $tabla_grupos .= "<br><b>SALDO TOTAL:</b> $". number_format($total_facturado - $total_recibos -$total_creditos,0,',','.');

        echo $tabla_grupos;

      }

      

      
      
      
    //REPORTE DE FACTURAS VENCIDAS
    public function cargarReporteFacturasVencidas() {
      
        include 'vistas/reportes/reporte_facturas_vencidas.php';

    }  
           
    public function buscarGrupoVencidas() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $grupos = $GruposModel->getGrupoPorText($_POST['texto']);

        $tabla_grupos = "<table id='tabla_grupos'  class='table table-hover'>

    <thead>
        <tr>     
            <th><center>GRUPO</center></th> 
        </tr>
        </thead>
    <tbody>";

        foreach ($grupos as $clave => $valor) {

            $tabla_grupos .= "<tr onclick='seleccionar_grupo_vencidas(" . $valor['ID_GRUPO'] . ", \"" . ($valor['CODIGO_GRUPO']) . "\", \"" . (utf8_encode($valor['NOMBRE_PROGRAMA'])) . "\", \"" . (utf8_encode($valor['ANO_GRUPO'])) . "\", \"" . (utf8_encode($valor['SEMESTRE_GRUPO'])) . "\");'>";  

            $tabla_grupos .= "<td><center>" . utf8_encode($valor['CODIGO_GRUPO'])." ".(utf8_encode($valor['NOMBRE_PROGRAMA']))." (".utf8_encode($valor['ANO_GRUPO']." - ".$valor['SEMESTRE_GRUPO']) . ")</center></td>";

            $tabla_grupos .= "</tr>";

        }

       $tabla_grupos .= "

</tbody></table>";

        echo $tabla_grupos;

      }

    public function SalidaReportePorGrupoVencidas() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        
        if($_POST['estado'] == "TODOS"){
            $estudiantes = $InscripcionesModel->getInscripcionesPorGrupo($_POST['id_grupo']);
        }else{
            $estudiantes = $InscripcionesModel->getInscripcionesPorGrupoYEstado($_POST['id_grupo'], $_POST['estado']);            
        }
        
       
        $fechas = new Fechas();     
        $fecha_actual = date("Y-m-d");  
        
        
        
        $tabla_grupos = "<table id='tabla_productos'  class='table table-hover'>
              <thead>
                <tr>  
                    <th><center>No.</center></th> 
                    
                    <th><center>ESTUDIANTE</center></th> 
                    
                    <th><center>ESTADO</center></th> 

                    <th><center>NÚMERO DE FACTURAS</center></th> 
                    
                    <th><center>TOTAL FACTURADO</center></th> 
                    
                    <th><center>SALDO TOTAL</center></th> 
                    
                    <th><center>SALDO VENCIDO</center></th> 
                </tr>
            </thead>
            <tbody>";         

        $contador = 1;
        
         foreach ($estudiantes as $estudiante) {
        
            $total_facturado = 0;
            $total_descuentos = 0;
            $total_recibos = 0;
            $total_creditos = 0;
             
            $facturas = $FacturasModel->getFacturasPorCliente($estudiante['ID_ESTUDIANTE']);
            $recibos = $RecibosModel->getRecibosPorCliente($estudiante['ID_ESTUDIANTE']);
            $creditos = $CreditosModel->getCreditosPorCliente($estudiante['ID_ESTUDIANTE']);
            
            
            $total_vencido = 0;
            $suma_facturas = 0;
            
            foreach ($facturas as $factura) {
                
                $total_facturado += $factura['TOTAL_FACTURA'];    
                $total_descuentos +=  $factura['DESCUENTO_FACTURA']; 
                
                
            }
            
            foreach ($recibos as $recibo) {                
                $total_recibos += $recibo['VALOR_RECIBO'];                
            }
            
            foreach ($creditos as $credito) {                
                $total_creditos += $credito['VALOR_CREDITO'];                
            }  
            
            $total_pagado = $total_recibos + $total_creditos;
            
            $facturas_anteriores = 0;
            
            
            
            $total_vencido = 0;
            $termino = 0;
            $fecha_actual = date("Y-m-d");
            
             foreach ($facturas as $factura) {
                    /// CALCULAR SALDO VENCIDO
                    $saldo_factura = 0;
                    $estado_factura = "PAGADA";
                    $total_pagado = $total_recibos + $total_creditos;
                    $total_facturas_anteriores = 0;

                    foreach ($facturas as $item) {

                        if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                            $total_facturas_anteriores += $item['TOTAL_FACTURA'];
                        }else{
                            break;
                        }


                    }

                     //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
                     $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA

                    if($total_facturas_anteriores <= $total_pagado){

                        $saldo_factura = 0;
                        $estado_factura = "PAGADA";

                    }else{

                        $saldo_factura = $total_facturas_anteriores - $total_pagado;
                        $estado_factura = "RESTANTE";

                        if($saldo_factura > $factura['TOTAL_FACTURA']){
                            $saldo_factura = $factura['TOTAL_FACTURA'];
                        }
                        
                            
                        
                        //CALULAR SALDO VENCIDO
                        $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        $termino = $factura['TERMINO_FACTURA'];
                        $valor_cuota = $factura['TOTAL_FACTURA'] / $termino;
                        
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            if($pagado_factura < $valor_cuota){
                                
                                if($fecha_pago <= $fecha_actual){
                                    $total_vencido += $valor_cuota - $pagado_factura;                                
                                    $pagado_factura = 0;
                                }
                                
                            }else{
                                
                                $pagado_factura -= $valor_cuota;
                                
                            }                            
                            
                        }
                        
                        
                    }
        
             }
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
             $estado_admision = "";
            
             if ($estudiante['ESTADO_ADMISION'] == 1){
                 $estado_admision = "ACTIVO";
             }
             if ($estudiante['ESTADO_ADMISION'] == 2){
                 $estado_admision = "SIN GRADUAR SIN ETAPA PRODUCTIVA";                
             }
             if ($estudiante['ESTADO_ADMISION'] == 3){
                 $estado_admision = "GRADUADO";                 
             }
             if ($estudiante['ESTADO_ADMISION'] == 4){
                 $estado_admision = "RETIRADO";                 
             }
             if ($estudiante['ESTADO_ADMISION'] == 5){
                 $estado_admision = "SIN GRADUAR CON ETAPA PRODUCTIVA";                 
             }
             if ($estudiante['ESTADO_ADMISION'] == 6){
                 $estado_admision = "RESERVA DE CUPO";                 
             }
             if ($estudiante['ESTADO_ADMISION'] == 7){
                 $estado_admision = "EN ETAPA PRODUCTIVA";                 
             }
            
            
        
        
            $tabla_grupos .= "<tr>";  

            $tabla_grupos .= "<td><center>". $contador . "</center></td>";
            
            $tabla_grupos .= "<td><center>". utf8_encode($estudiante['NOMBRES_ESTUDIANTE']." ".$estudiante['APELLIDOS_ESTUDIANTE']) . "</center></td>";
            $tabla_grupos .= "<td><center>". utf8_encode($estado_admision). "</center></td>";
            
            $tabla_grupos .= "<td><center>" . count($facturas) . "</center></td>";
            
            $tabla_grupos .= "<td><center>$" . number_format($total_facturado,0,',','.') . "</center></td>";
            
            $tabla_grupos .= "<td><center>$" . number_format($total_facturado - $total_recibos -$total_creditos,0,',','.') . "</center></td>";
            $tabla_grupos .= "<td><center><a href='#'  onclick='buscar_facturas_vencidas(".$estudiante['ID_ESTUDIANTE']."); return false;'>$" . number_format($total_vencido,0,',','.') . "</a></center></td>";

            $tabla_grupos .= "</tr>";

        $contador++;
        }        

                
       $tabla_grupos .= "</tbody></table>";
       
        echo $tabla_grupos;

      }

      
      
      
      
      
      
    public function SalidaFacturasVencidas() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        
       
        $fechas = new Fechas();     
        $fecha_actual = date("Y-m-d");  
        
        
            $total_facturado = 0;
            $total_descuentos = 0;
            $total_recibos = 0;
            $total_creditos = 0;
             
            $facturas = $FacturasModel->getFacturasPorCliente($_POST['id_estudiante']);
            $recibos = $RecibosModel->getRecibosPorCliente($_POST['id_estudiante']);
            $creditos = $CreditosModel->getCreditosPorCliente($_POST['id_estudiante']);
            
            
            $total_vencido = 0;
            $suma_facturas = 0;
            
            
              $tabla_facturas = "<h3><br>LISTADO DE CUOTAS VENCIDAS DEL ESTUDIANTE<br></h3>
            
                    <table id='tabla_fact'  class='table table-hover'>
                          <thead>
                            <tr>  
                                <th><center>No.</center></th> 
                                <th><center>CONSECUTIVO</center></th> 

             <th><center>NOMBRE DEL ESTUDIANTE</center></th> 

                                <th><center>VALOR CUOTA VENCIDA</center></th> 

                                <th><center>FECHA MÁXIMA DE PAGO</center></th> 

                            </tr>
                        </thead>
                        <tbody>";         
            
              $contador = 1;
              
            foreach ($facturas as $factura) {
                
                $total_facturado += $factura['TOTAL_FACTURA'];    
                $total_descuentos +=  $factura['DESCUENTO_FACTURA']; 
                
                
            }
            
            foreach ($recibos as $recibo) {                
                $total_recibos += $recibo['VALOR_RECIBO'];                
            }
            
            foreach ($creditos as $credito) {                
                $total_creditos += $credito['VALOR_CREDITO'];                
            }  
            
            $total_pagado = $total_recibos + $total_creditos;
            
            $facturas_anteriores = 0;
            
            
            
            
            $termino = 0;
            $fecha_actual = date("Y-m-d");
            
             foreach ($facturas as $factura) {
                 
                 
                 $total_vencido = 0;
                 
                 
                    /// CALCULAR SALDO VENCIDO
                    $saldo_factura = 0;
                    $estado_factura = "PAGADA";
                    $total_pagado = $total_recibos + $total_creditos;
                    $total_facturas_anteriores = 0;
                    
                    
                      $consecutivo = "";   

                        for($i = strlen($factura['CONSECUTIVO_FACTURA']); $i<10 ; $i++){   
                                $consecutivo .= "0";                       
                        }
                        $consecutivo .= $factura['CONSECUTIVO_FACTURA'];
                    
            

                    foreach ($facturas as $item) {

                        if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                            $total_facturas_anteriores += $item['TOTAL_FACTURA'];
                        }else{
                            break;
                        }


                    }

                     //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
                     $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA

                    if($total_facturas_anteriores <= $total_pagado){

                        $saldo_factura = 0;
                        $estado_factura = "PAGADA";

                    }else{

                        $saldo_factura = $total_facturas_anteriores - $total_pagado;
                        $estado_factura = "RESTANTE";

                        if($saldo_factura > $factura['TOTAL_FACTURA']){
                            $saldo_factura = $factura['TOTAL_FACTURA'];
                        }
                        
                            
                        
                        //CALULAR SALDO VENCIDO
                        $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        $termino = $factura['TERMINO_FACTURA'];
                        $valor_cuota = $factura['TOTAL_FACTURA'] / $termino;
                        
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            if($pagado_factura < $valor_cuota){
                                
                                if($fecha_pago <= $fecha_actual){
                                    $total_vencido = $valor_cuota - $pagado_factura;     
                                    
                                    
                                        $tabla_facturas .= "<tr>";  

                                        $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
                                        $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
                                        
                                         $tabla_facturas .= "<td><center>" . utf8_encode($factura['NOMBRES_ESTUDIANTE']." ".$factura['APELLIDOS_ESTUDIANTE']) . "</center></td>";

                                        
                                        $tabla_facturas .= "<td><center>" . number_format($total_vencido,0,',','.') . "</center></td>";
                                        
                                        $tabla_facturas .= "<td><center>" . $fecha_pago . "</center></td>";


                                        $tabla_facturas .= "</tr>";

            
            
                                    $pagado_factura = 0;
                                }
                                
                            }else{
                                
                                $pagado_factura -= $valor_cuota;
                                
                            }                            
                            
                        }
                        
                        
                    }
                    
               
                    
                    
                 $contador ++;
            
            
            
        
             }
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        
           

           

       $tabla_facturas .= "</tbody></table>";
       
        echo $tabla_facturas;

      }
      
      
      
      
      
      
      
    public function SalidaFacturasVencidasPorDias() {

        $numero_dias = $_POST['dias'];
                
        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        
        
        $estudiantes = $EstudiantesModel->getEstudiantesFacturados();
        
       
        $fechas = new Fechas();     
        $fecha_actual = date("Y-m-d");  
        
        
              $tabla_facturas = "<h3><br>LISTADO DE CUOTAS VENCIDAS POR ESTUDIANTE<br></h3>
            
                    <table id='tabla_fact'  class='table table-hover'>
                          <thead>
                            <tr>  
                                <th><center>No.</center></th> 
                                <th><center>CONSECUTIVO</center></th> 

             <th><center>NOMBRE DEL ESTUDIANTE</center></th> 

                                <th><center>VALOR CUOTA VENCIDA</center></th> 

                                <th><center>FECHA MÁXIMA DE PAGO</center></th> 
                                
                                <th><center>DIAS DE RETRASO</center></th> 

                            </tr>
                        </thead>
                        <tbody>";      
        
         foreach ($estudiantes as $estudiante) {
             
            $total_facturado = 0;
            $total_descuentos = 0;
            $total_recibos = 0;
            $total_creditos = 0;
             
           $facturas = $FacturasModel->getFacturasPorCliente($estudiante['ID_ESTUDIANTE']);
            $recibos = $RecibosModel->getRecibosPorCliente($estudiante['ID_ESTUDIANTE']);
            $creditos = $CreditosModel->getCreditosPorCliente($estudiante['ID_ESTUDIANTE']);
            
            
            $total_vencido = 0;
            $suma_facturas = 0;
            
               
            
              
            foreach ($facturas as $factura) {
              $contador = 1;
                
                $total_facturado += $factura['TOTAL_FACTURA'];    
                $total_descuentos +=  $factura['DESCUENTO_FACTURA']; 
                
                
            }
            
            foreach ($recibos as $recibo) {                
                $total_recibos += $recibo['VALOR_RECIBO'];                
            }
            
            foreach ($creditos as $credito) {                
                $total_creditos += $credito['VALOR_CREDITO'];                
            }  
            
            $total_pagado = $total_recibos + $total_creditos;
            
            $facturas_anteriores = 0;
            
            
            
            
            $termino = 0;
            $fecha_actual = date("Y-m-d");
            
             foreach ($facturas as $factura) {
                 
                 
                 $total_vencido = 0;
                 
                 
                    /// CALCULAR SALDO VENCIDO
                    $saldo_factura = 0;
                    $estado_factura = "PAGADA";
                    $total_pagado = $total_recibos + $total_creditos;
                    $total_facturas_anteriores = 0;
                    
                    
                      $consecutivo = "";   

                        for($i = strlen($factura['CONSECUTIVO_FACTURA']); $i<10 ; $i++){   
                                $consecutivo .= "0";                       
                        }
                        $consecutivo .= $factura['CONSECUTIVO_FACTURA'];
                    
            

                    foreach ($facturas as $item) {

                        if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                            $total_facturas_anteriores += $item['TOTAL_FACTURA'];
                        }else{
                            break;
                        }


                    }

                     //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
                     $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA

                    if($total_facturas_anteriores <= $total_pagado){

                        $saldo_factura = 0;
                        $estado_factura = "PAGADA";

                    }else{

                        $saldo_factura = $total_facturas_anteriores - $total_pagado;
                        $estado_factura = "RESTANTE";

                        if($saldo_factura > $factura['TOTAL_FACTURA']){
                            $saldo_factura = $factura['TOTAL_FACTURA'];
                        }
                        
                            
                        
                        //CALULAR SALDO VENCIDO
                        $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        $termino = $factura['TERMINO_FACTURA'];
                        $valor_cuota = $factura['TOTAL_FACTURA'] / $termino;
                        
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            
                            
                            if($dias_entre_fechas <= $numero_dias){
                                
                            
                            if($pagado_factura < $valor_cuota){
                                
                                if($fecha_pago <= $fecha_actual){
                                    $total_vencido = $valor_cuota - $pagado_factura;    
                                    
                                    
                                    
                                        $tabla_facturas .= "<tr>";  

                                        $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
                                        $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
                                        
                                         $tabla_facturas .= "<td><center>" . utf8_encode($factura['NOMBRES_ESTUDIANTE']." ".$factura['APELLIDOS_ESTUDIANTE']) . "</center></td>";

                                        
                                        $tabla_facturas .= "<td><center>" . number_format($total_vencido,0,',','.') . "</center></td>";
                                        
                                        $tabla_facturas .= "<td><center>" . $fecha_pago . "</center></td>";
                                        
                                        $tabla_facturas .= "<td><center>" . number_format($dias_entre_fechas,0) . "</center></td>";


                                        $tabla_facturas .= "</tr>";

            
            
                                    $pagado_factura = 0;
                                    
                                    $contador++;
                                            
                                }
                                
                            }else{
                                
                                $pagado_factura -= $valor_cuota;
                                
                            }   
                            }
                            
                            
                        }
                        
                        
                    }
                    
               
                    
                    
                 
            
            
            
        
             }
        
         }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        
           

           

       $tabla_facturas .= "</tbody></table>";
       
        echo $tabla_facturas;

      }
      
      
      
      
      
        

    // FACTURAS POR ESTUDIANTE
    public function cargarFacturasPorEstudiante() {
      
        include 'vistas/reportes/facturas_por_estudiante.php';

    }
        
    public function buscarEstudiante() {

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();

        $estudiantes = $EstudiantesModel->getEstudiantesText($_POST['texto']);

        $tabla_estudiantes = "<table id='tabla_estudiantes'  class='table table-hover'>

    <thead>
        <tr>     
            <th><center>NOMBRE DEL ESTUDIANTE</center></th> 
        </tr>
        </thead>
    <tbody>";

        foreach ($estudiantes as $clave => $valor) {

            $tabla_estudiantes .= "<tr onclick='seleccionar_estudiante(" . $valor['ID_ESTUDIANTE'] . ", \"" . ($valor['NOMBRES_ESTUDIANTE']) . "\", \"" . (utf8_encode($valor['APELLIDOS_ESTUDIANTE'])) . "\", \"" . (utf8_encode($valor['DOCUMENTO_ESTUDIANTE'])) . "\");'>";  

            $tabla_estudiantes .= "<td><center>" . utf8_encode($valor['NOMBRES_ESTUDIANTE'])." ".(utf8_encode($valor['APELLIDOS_ESTUDIANTE']))." (DOCUMENTO: ".utf8_encode($valor['DOCUMENTO_ESTUDIANTE']) . ")</center></td>";

            $tabla_estudiantes .= "</tr>";

        }

       $tabla_estudiantes .= "

</tbody></table>";

        echo $tabla_estudiantes;

      }

    public function SalidaFacturasPorEstudiante() {

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        $facturas = $FacturasModel->getFacturasPorCliente($_POST['id_estudiante']);
               
        $todos_recibos = $RecibosModel->getRecibosPorCliente($_POST['id_estudiante']);
        $todos_creditos = $CreditosModel->getCreditosPorCliente($_POST['id_estudiante']);        
        
        $total_recibos = 0;        
        foreach ($todos_recibos as $recibo) {
            $total_recibos += $recibo['VALOR_RECIBO'];
        }
        
        $total_creditos = 0;        
        foreach ($todos_creditos as $credito) {
            $total_creditos += $credito['VALOR_CREDITO'];
        }
        
        
        
        $tabla_facturas = "<h1>LISTADO DE FACTURAS DEL ESTUDIANTE</h1>
            
        <table id='tabla_fact'  class='table table-hover'>
              <thead>
                <tr>  
                    <th><center>NO.</center></th> 
                    
                    <th><center>CONSECUTIVO</center></th> 

                    <th><center>FECHA</center></th> 
                    
                    <th><center>VALOR</center></th> 
                    
                    <th><center>SALDO</center></th> 
                    
                    <th><center>ESTADO</center></th> 
                    
                </tr>
            </thead>
            <tbody>";         

        $contador = 1;
                
         foreach ($facturas as $factura) {
        
            $consecutivo = "";   

            for($i = strlen($factura['CONSECUTIVO_FACTURA']); $i<10 ; $i++){   
                    $consecutivo .= "0";                       
            }
            $consecutivo .= $factura['CONSECUTIVO_FACTURA'];
            
            
            
            
              ///CALCULAR SALDO DE ÉSTA FACTURA SELECCIONADA
        $saldo_factura = 0;
        $estado_factura = "PAGADA";
        $total_pagado = $total_recibos + $total_creditos;
        $total_facturas_anteriores = 0;
        
        foreach ($facturas as $item) {
                        
            if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                $total_facturas_anteriores += $item['TOTAL_FACTURA'];
            }else{
                break;
            }
                
            
        }
        
         //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
         $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA
        
        if($total_facturas_anteriores <= $total_pagado){
            
            $saldo_factura = 0;
            $estado_factura = "PAGADA";
            
        }else{
            
            $saldo_factura = $total_facturas_anteriores - $total_pagado;
            
            if($saldo_factura > $factura['TOTAL_FACTURA']){
                $saldo_factura = $factura['TOTAL_FACTURA'];
            }
            
            $estado_factura = "ACTIVO";
            
        }
        
        
        
        
            
                    
            $tabla_facturas .= "<tr>";  

            $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
            $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
            
            $tabla_facturas .= "<td><center>" . $factura['FECHA_FACTURA'] . "</center></td>";
            
            $tabla_facturas .= "<td><center>$" . number_format($factura['TOTAL_FACTURA'],0,',','.') . "</center></td>";
            $tabla_facturas .= "<td><center>$" . number_format($saldo_factura,0,',','.') . "</center></td>";
            $tabla_facturas .= "<td><center>" . $estado_factura . "</center></td>";
          
            
            $tabla_facturas .= "</tr>";
            
            $contador ++;

        }        

       $tabla_facturas .= "</tbody></table>";
       
       
       
       
       
       
       
       
       
        $tabla_facturas .= "<br><h1>LISTADO DE RECIBOS</h1>
            
        <table id='tabla_fact'  class='table table-hover'>
              <thead>
                <tr>  
                    <th><center>No.</center></th> 
                    <th><center>CONSECUTIVO</center></th> 

                    <th><center>FECHA</center></th> 
                    
                    <th><center>FORMA DE PAGO</center></th> 
                    
                    <th><center>VALOR</center></th> 
                    
                    <th><center>CONCEPTO</center></th> 
                    
                </tr>
            </thead>
            <tbody>";         

        $contador = 1;
        
         foreach ($todos_recibos as $recibo) {
        
            $consecutivo = "";   

            for($i = strlen($recibo['CONSECUTIVO_RECIBO']); $i<10 ; $i++){   
                    $consecutivo .= "0";                       
            }
            $consecutivo .= $recibo['CONSECUTIVO_RECIBO'];
            
            
            
            $tabla_facturas .= "<tr>";  

            $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
            $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
            
            $tabla_facturas .= "<td><center>" . $recibo['FECHA_RECIBO'] . "</center></td>";
            $tabla_facturas .= "<td><center>" . $recibo['FORMAPAGO_RECIBO'] . "</center></td>";
            
            $tabla_facturas .= "<td><center>$" . number_format($recibo['VALOR_RECIBO'],0,',','.') . "</center></td>";
            $tabla_facturas .= "<td><center>" . utf8_encode($recibo['CONCEPTO_RECIBO']) . "</center></td>";
          
            
            
            $tabla_facturas .= "</tr>";
            
            $contador++;

        }        

       $tabla_facturas .= "</tbody></table>";
       
       
       
        $tabla_facturas .= "<br><h1>LISTADO DE NOTAS DE CRÉDITO</h1>
            
        <table id='tabla_fact'  class='table table-hover'>
              <thead>
                <tr>  
                    <th><center>No.</center></th> 
                    <th><center>CONSECUTIVO</center></th> 

                    <th><center>FECHA</center></th> 
                                        
                    <th><center>VALOR</center></th> 
                    
                    <th><center>CONCEPTO</center></th> 
                    
                </tr>
            </thead>
            <tbody>";         

        $contador = 1;
                
         foreach ($todos_creditos as $credito) {
        
            $consecutivo = "";   

            for($i = strlen($credito['CONSECUTIVO_CREDITO']); $i<10 ; $i++){   
                    $consecutivo .= "0";                       
            }
            $consecutivo .= $credito['CONSECUTIVO_CREDITO'];
            
            
            
            $tabla_facturas .= "<tr>";  

            $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
            $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
            
            $tabla_facturas .= "<td><center>" . $credito['FECHA_CREDITO'] . "</center></td>";
            
            $tabla_facturas .= "<td><center>$" . number_format($credito['VALOR_CREDITO'],0,',','.') . "</center></td>";
            $tabla_facturas .= "<td><center>" . utf8_encode($credito['CONCEPTO_CREDITO']) . "</center></td>";
          
            
            
            $tabla_facturas .= "</tr>";
            
            $contador++;

        }        

       $tabla_facturas .= "</tbody></table>";
       
       
       
       
       
        echo $tabla_facturas;

      }

      
      
      
      
      
      
      
      
     /// CARGAR FACTURAS 
      
    public function cargarCarteraVencida() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        $estudiantes = $EstudiantesModel->getEstudiantesFacturados();
        
       
        $fechas = new Fechas();     
        $fecha_actual = date("Y-m-d");  
        
        
        
            $total_vencido30 = 0;
            $total_vencido60 = 0;
            $total_vencido90 = 0;
            $total_vencido120 = 0;
            $total_vencido180 = 0;


         foreach ($estudiantes as $estudiante) {
        
            $total_facturado = 0;
            $total_descuentos = 0;
            $total_recibos = 0;
            $total_creditos = 0;
             
            $facturas = $FacturasModel->getFacturasPorCliente($estudiante['ID_ESTUDIANTE']);
            $recibos = $RecibosModel->getRecibosPorCliente($estudiante['ID_ESTUDIANTE']);
            $creditos = $CreditosModel->getCreditosPorCliente($estudiante['ID_ESTUDIANTE']);
            
            
            $suma_facturas = 0;
            
            foreach ($facturas as $factura) {
                
                $total_facturado += $factura['TOTAL_FACTURA'];    
                $total_descuentos +=  $factura['DESCUENTO_FACTURA']; 
                
                
            }
            
            foreach ($recibos as $recibo) {                
                $total_recibos += $recibo['VALOR_RECIBO'];                
            }
            
            foreach ($creditos as $credito) {                
                $total_creditos += $credito['VALOR_CREDITO'];                
            }  
            
            $total_pagado = $total_recibos + $total_creditos;
            
            $facturas_anteriores = 0;
            
            
            
            $termino = 0;
            $fecha_actual = date("Y-m-d");
            
             foreach ($facturas as $factura) {
                    /// CALCULAR SALDO VENCIDO
                    $saldo_factura = 0;
                    $estado_factura = "PAGADA";
                    $total_pagado = $total_recibos + $total_creditos;
                    $total_facturas_anteriores = 0;

                    foreach ($facturas as $item) {

                        if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                            $total_facturas_anteriores += $item['TOTAL_FACTURA'];
                        }else{
                            break;
                        }


                    }

                     //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
                     $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA

                    if($total_facturas_anteriores <= $total_pagado){

                        $saldo_factura = 0;
                        $estado_factura = "PAGADA";

                    }else{

                        $saldo_factura = $total_facturas_anteriores - $total_pagado;
                        $estado_factura = "RESTANTE";

                        if($saldo_factura > $factura['TOTAL_FACTURA']){
                            $saldo_factura = $factura['TOTAL_FACTURA'];
                        }
                        
                            
                        
                        //CALULAR SALDO VENCIDO
                        $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        $termino = $factura['TERMINO_FACTURA'];
                        $valor_cuota = $factura['TOTAL_FACTURA'] / $termino;
                        
                        
                        
                        ////CARTERA A 30 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 30){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido30 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                        
                         $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        
                        ////CARTERA A 60 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 60){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido60 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                         $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        
                        
                        ////CARTERA A 90 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 90){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido90 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                         $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        
                        
                        ////CARTERA A 120 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 120){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido120 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                         $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        
                        
                        ////CARTERA A 150 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 150){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido150 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                        
                         $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        
                        ////CARTERA A 180 DIAS
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            $dias_entre_fechas = $fechas->diasEntreFechas($fecha_actual, $fecha_pago);
                            
                            if($dias_entre_fechas <= 180){
                                
                                if($pagado_factura < $valor_cuota){

                                    if($fecha_pago <= $fecha_actual){
                                        $total_vencido180 += $valor_cuota - $pagado_factura;                                
                                        $pagado_factura = 0;
                                    }

                                }else{

                                    $pagado_factura -= $valor_cuota;

                                }      
                                
                            }
                            
                        }
                        
                        
                        
                        
                        
                        
                        
                    }
        
             }
        
            
            
            
         }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        $tabla_fa = "";    
            
            
        $tabla_fa = "<br>CARTERA VENCIDA A 30 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(30); return false;'> $".number_format($total_vencido30,0,',','.')."</a>";
        $tabla_fa .= "<br><br><br> CARTERA VENCIDA A 60 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(60); return false;'>$".number_format($total_vencido60,0,',','.')."</a>";
        $tabla_fa .= "<br><br><br> CARTERA VENCIDA A 90 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(90); return false;'>$".number_format($total_vencido90,0,',','.')."</a>";
        $tabla_fa .= "<br><br><br> CARTERA VENCIDA A 120 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(120); return false;'>$".number_format($total_vencido120,0,',','.')."</a>";
        $tabla_fa .= "<br><br><br> CARTERA VENCIDA A 150 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(150); return false;'>$".number_format($total_vencido150,0,',','.')."</a>";
        $tabla_fa .= "<br><br><br> CARTERA VENCIDA A 180 DÍAS: <a href='#' onclick='buscar_facturas_vencidas(180); return false;'>$".number_format($total_vencido180,0,',','.')."</a>";
        
       
          include 'vistas/reportes/cartera_vencida.php';

      }

        
      
      
      
      
    public function cargarDetalleCarteraVencida() {

        $this->model->cargar("GruposModel.php", "configuracion");
        $GruposModel = new GruposModel();

        $this->model->cargar("EstudiantesModel.php", "configuracion");
        $EstudiantesModel = new EstudiantesModel();        

        $this->model->cargar("InscripcionesModel.php", "configuracion");
        $InscripcionesModel = new InscripcionesModel();
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();
        
        $this->model->cargar("CreditosModel.php", "creditos");
        $CreditosModel = new CreditosModel();
        
        
       
        $fechas = new Fechas();     
        $fecha_actual = date("Y-m-d");  
        
        
            $total_facturado = 0;
            $total_descuentos = 0;
            $total_recibos = 0;
            $total_creditos = 0;
             
            $facturas = $FacturasModel->getFacturasPorCliente($_POST['id_estudiante']);
            $recibos = $RecibosModel->getRecibosPorCliente($_POST['id_estudiante']);
            $creditos = $CreditosModel->getCreditosPorCliente($_POST['id_estudiante']);
            
            
            $total_vencido = 0;
            $suma_facturas = 0;
            
            
              $tabla_facturas = "<h3><br>LISTADO DE CUOTAS VENCIDAS DEL ESTUDIANTE<br></h3>
            
        <table id='tabla_fact'  class='table table-hover'>
              <thead>
                <tr>  
                    <th><center>No.</center></th> 
                    <th><center>CONSECUTIVO</center></th> 
                    
                    <th><center>NOMBRE DEL ESTUDIANTE</center></th> 
                    
                    <th><center>VALOR CUOTA VENCIDA</center></th> 
                    
                    <th><center>FECHA MÁXIMA DE PAGO</center></th> 
                    
                </tr>
            </thead>
            <tbody>";         
            
              $contador = 1;
                      
            foreach ($facturas as $factura) {
                
                $total_facturado += $factura['TOTAL_FACTURA'];    
                $total_descuentos +=  $factura['DESCUENTO_FACTURA']; 
                
                
            }
            
            foreach ($recibos as $recibo) {                
                $total_recibos += $recibo['VALOR_RECIBO'];                
            }
            
            foreach ($creditos as $credito) {                
                $total_creditos += $credito['VALOR_CREDITO'];                
            }  
            
            $total_pagado = $total_recibos + $total_creditos;
            
            $facturas_anteriores = 0;
            
            
            
            
            $termino = 0;
            $fecha_actual = date("Y-m-d");
            
             foreach ($facturas as $factura) {
                 
                 
                 $total_vencido = 0;
                 
                 
                    /// CALCULAR SALDO VENCIDO
                    $saldo_factura = 0;
                    $estado_factura = "PAGADA";
                    $total_pagado = $total_recibos + $total_creditos;
                    $total_facturas_anteriores = 0;
                    
                    
                      $consecutivo = "";   

                        for($i = strlen($factura['CONSECUTIVO_FACTURA']); $i<10 ; $i++){   
                                $consecutivo .= "0";                       
                        }
                        $consecutivo .= $factura['CONSECUTIVO_FACTURA'];
                    
            

                    foreach ($facturas as $item) {

                        if($item['CONSECUTIVO_FACTURA'] != $factura['CONSECUTIVO_FACTURA']){                
                            $total_facturas_anteriores += $item['TOTAL_FACTURA'];
                        }else{
                            break;
                        }


                    }

                     //SUMA DE LAS FACTURAS ANTERIORES A ESTA, MAS EL VALOR DE ESTA FACTURA
                     $total_facturas_anteriores += $factura['TOTAL_FACTURA']; // LO QUE DEBE HASTA ESTA FACTURA

                    if($total_facturas_anteriores <= $total_pagado){

                        $saldo_factura = 0;
                        $estado_factura = "PAGADA";

                    }else{

                        $saldo_factura = $total_facturas_anteriores - $total_pagado;
                        $estado_factura = "RESTANTE";

                        if($saldo_factura > $factura['TOTAL_FACTURA']){
                            $saldo_factura = $factura['TOTAL_FACTURA'];
                        }
                        
                            
                        
                        //CALULAR SALDO VENCIDO
                        $pagado_factura = $factura['TOTAL_FACTURA'] - $saldo_factura;
                        $termino = $factura['TERMINO_FACTURA'];
                        $valor_cuota = $factura['TOTAL_FACTURA'] / $termino;
                        
                        for($i=1; $i<=$termino; $i++){
                            
                            $fecha_pago = $fechas->sumarmeses2($factura['FECHA_FACTURA'], $i);
                            
                            if($pagado_factura < $valor_cuota){
                                
                                if($fecha_pago <= $fecha_actual){
                                    $total_vencido = $valor_cuota - $pagado_factura;     
                                    
                                    
                                        $tabla_facturas .= "<tr>";  

                                        $tabla_facturas .= "<td><center>" . $contador . "</center></td>";
                                        $tabla_facturas .= "<td><center>" . $consecutivo . "</center></td>";
                                        
                                        $tabla_facturas .= "<td><center>" . utf8_encode($factura['NOMBRES_ESTUDIANTE']." ".$factura['APELLIDOS_ESTUDIANTE']) . "</center></td>";

                                        
                                        $tabla_facturas .= "<td><center>" . number_format($total_vencido,0,',','.') . "</center></td>";
                                        
                                        $tabla_facturas .= "<td><center>" . $fecha_pago . "</center></td>";


                                        $tabla_facturas .= "</tr>";

            
            
                                    $pagado_factura = 0;
                                    $contador++;
                                }
                                
                            }else{
                                
                                $pagado_factura -= $valor_cuota;
                                
                            }                            
                            
                        }
                        
                        
                    }
                    
               
                    
                    
                 
            
            
            
        
             }
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        
           

           

       $tabla_facturas .= "</tbody></table>";
       
        echo $tabla_facturas;

      }
      
      
      
      
      
      
      
      
      
      
      
      
      
    public function cargarReporteCaja() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();     
         
        $this->model->cargar("Recibos2Model.php", "recibos2");
        $Recibos2Model = new Recibos2Model();     
        
        
        $recibos = $RecibosModel->getRecibosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
       
        include 'vistas/reportes/reporte_caja.php';

      }

        
      
      
    public function cargarReporteIngresos() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();     
                 
        $recibos = $RecibosModel->getRecibosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
        include 'vistas/reportes/reporte_ingresos.php';

      }
      
      
    public function cargarReporteEgresos() {

        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();  
        
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
        
        $recibos = $RecibosModel->getRecibosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
        $egresos = $EgresosModel->getEgresosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
        include 'vistas/reportes/reporte_egresos.php';

      }
      
    public function cargarReporteIngresosyEgresos() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
        include 'vistas/reportes/reporte_ingresos_egresos.php';

      }
      
    public function cargarReporteFlujoDeCaja() {

        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas(date("Y-m-d"), date("Y-m-d"));
        
        include 'vistas/reportes/reporte_flujo_caja.php';

      }

    
    public function generar_reporte_flujo_caja(){
        
        $this->model->cargar("ProductosModel.php", "configuracion");
        $ProductosModel = new ProductosModel();
        
        $productos = $ProductosModel->getTodosProductos();  
        
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();  
        
        $this->model->cargar("TegresosModel.php", "configuracion");
        $TegresosModel = new TegresosModel();  
        
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();  
        
        $this->model->cargar("Recibos2Model.php", "recibos2");
        $Recibos2Model = new Recibos2Model();  
        
        $tipos_egresos = $TegresosModel->getTodosTegresos();
        
                                                
        include("vistas/reportes/reporte_flujo_caja_excel.php");   
              
        echo "<center><br><br><br><a href='vistas/reportes/reporte_flujo_caja_excel.xls' ><div style='background-color: #232583; width:150px; padding:5px; color: white'>Descargar Archivo</div></a></center>";
        
    }
    
    public function generarReporteIngresos(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel(); 
        
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
                 
        include("vistas/reportes/pdf_reporte_ingresos.php");   
       
        $dirPdf = "archivos/reportes/pdf_reporte_ingresos.pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;
        
    }  
    
    public function generarReporteIngresosExcel(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel(); 
        
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
                 
        include("vistas/reportes/reporte_ingresos_excel.php");   
              
        echo "<center><br><br><br><a href='vistas/reportes/reporte_ingresos_excel.xls' ><div style='background-color: #232583; width:150px; padding:5px; color: white'>Descargar Archivo</div></a></center>";
        
    }  
      
    public function generarReporteEgresos(){
         
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
                 
        include("vistas/reportes/pdf_reporte_egresos.php");   
       
        $dirPdf = "archivos/reportes/pdf_reporte_egresos.pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;
        
    }
    
    public function generarReporteEgresosExcel(){
         
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
        
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
                 
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
                 
        include("vistas/reportes/reporte_egresos_excel.php");   
              
        echo "<center><br><br><br><a href='vistas/reportes/reporte_egresos_excel.xls' ><div style='background-color: #232583; width:150px; padding:5px; color: white'>Descargar Archivo</div></a></center>";
        
    }  
    
    
    public function generarReporteIngresosEgresos(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();     
         
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        include("vistas/reportes/pdf_reporte_ingresos_egresos.php");   
       
        $dirPdf = "archivos/reportes/pdf_reporte_ingresos_egresos.pdf";

        $this->pdf->Output(''.$dirPdf.'');

        echo "urlRuta=".$dirPdf;
        
    }
       
    
    
    public function generarReporteIngresosEgresosExcel(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();     
         
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        
        
        $this->model->cargar("FacturasModel.php", "facturas");
        $FacturasModel = new FacturasModel();
        
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
         include("vistas/reportes/reporte_ingresos_egresos_excel.php");   
              
        echo "<center><br><br><br><a href='vistas/reportes/reporte_ingresos_egresos_excel.xls' ><div style='background-color: #232583; width:150px; padding:5px; color: white'>Descargar Archivo</div></a></center>";
        
    }
    
       
    public function cargarTablaIngresosEgresos(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();    
        
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
          $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        include 'vistas/reportes/tabla_recibos_egresos.php';
          
    }
        
       
    public function cargarTablaIngresos(){
         
        $this->model->cargar("RecibosModel.php", "recibos");
        $RecibosModel = new RecibosModel();    
        
        $recibos = $RecibosModel->getRecibosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        include 'vistas/reportes/tabla_recibos.php';
          
    }
        
       
    public function cargarTablaEgresos(){
         
        $this->model->cargar("EgresosModel.php", "egresos");
        $EgresosModel = new EgresosModel();     
                 
        $egresos = $EgresosModel->getEgresosEntreFechas($_POST['fecha1'], $_POST['fecha2']);
        
        include 'vistas/reportes/tabla_egresos.php';
          
    }
    
      

 }

?>

