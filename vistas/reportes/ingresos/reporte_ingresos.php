<script type="text/javascript">

function generar_reporte_ingresos(){
  
    ejecutarAccion(
    
            'reportes', 'Reportes', 'generarReporteIngresos', "fecha1="+$("#fecha1_reporte").val()+"&fecha2="+$("#fecha2_reporte").val(), "cargarVisorPDF(data); " 
        
    );
     
}
  
function generar_reporte_ingresos_excel(){
  
    ejecutarAccion(
            
            'reportes', 'Reportes', 'generarReporteIngresosExcel', "fecha1="+$("#fecha1_reporte").val()+"&fecha2="+$("#fecha2_reporte").val(), "$('#salida_reporte_excel').html(data);" 
        
    );
     
}
  
function cargarTablaIngresos(){
    
    ejecutarAccion(
            
            'reportes', 'Reportes', 'cargarTablaIngresos', "fecha1="+$("#fecha1_reporte").val()+"&fecha2="+$("#fecha2_reporte").val(), "$('#tabla_recibos_reportes').html(data);" 
        
    );
     
}
  

$( document ).ready(function() {
       
  crearDatePickerfull('#fecha1_reporte');
  crearDatePickerfull('#fecha2_reporte');
  CrearTabla('tabla_ingresos');
  
});

</script>   


<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active text-center">
                <br>
                <h3><b>REPORTE DE INGRESOS</b></h3>
            </div>
            <div class="box-footer">
              <div class="row">
                 
                
                  <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Fecha de Inicio: </h5>
                    <span class="description-text">
                        <input onchange="cargarTablaIngresos(); return false;" type="text" class="form-control" id="fecha1_reporte" name="fecha1_reporte">
                    </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                  
                  
                  
                  <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Fecha Final: </h5>
                    <span class="description-text">                      
                        <input onchange="cargarTablaIngresos(); return false;" type="text" class="form-control" id="fecha2_reporte" name="fecha2_reporte">
                    </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                   
                <div class="col-md-3">
                
                     
                  
                      <button onclick="generar_reporte_ingresos(); return false;" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                      
                  <!-- /.description-block -->
                </div>
                <div class="col-md-3">
                
                      <button onclick="generar_reporte_ingresos_excel();" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate Excel</button>
                   
                     <div id="salida_reporte_excel"></div>
                  <!-- /.description-block -->
                </div>
  
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div> 

<div  class="row" style="padding: 16px" id="tabla_recibos_reportes">
                
                <?php
                
                    include 'vistas/reportes/tabla_recibos.php';
                
                ?>
                
         </div>





                    
                    
  