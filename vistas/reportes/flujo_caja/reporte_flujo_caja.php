<script type="text/javascript">

function generar_reporte_flujo_caja(){
  
    ejecutarAccion(
            
            'reportes', 'Reportes', 'generar_reporte_flujo_caja', "", "$('#salida_reporte_excel').html(data);" 
        
    );
     
}
    

$( document ).ready(function() {
       
  CrearTabla('tabla_ingresos');
  
});

</script>   


<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active text-center">
                <br>
                <h3><b>REPORTE DE FLUJO DE CAJA</b></h3>
            </div>
            <div class="box-footer">
              <div class="row">
                 
                
                  <div class="col-md-5">
                
                </div>
                
                  <div class="col-md-2">
                 <button onclick="generar_reporte_flujo_caja();" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate Excel</button>
                 
                   <div id="salida_reporte_excel"></div>
                   
                </div>
                  
                   
                <div class="col-md-4">
                
                </div>
               
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div> 







                    
                    
  