function nuevo_facturas(){	

    abrirVentanaContenedor(
        'facturas', 
        'Facturas', 
        'abrirCrearFactura',
        'tipo='+$("#tipo_factura").val(),
        'crearDatePicker("#fecha"); crearDatePicker("#fecha2"); crearDatePicker("#vencimiento");'
    );	

}

function editar_facturas(id_factura){

    abrirVentanaContenedor(
        
        'facturas', 
        'Facturas', 
        'abrirEditarFactura',
        'id_factura='+id_factura+'&tipo='+$("#tipo_factura").val(),
        'crearDatePicker("#fecha"); crearDatePicker("#fecha2"); crearDatePicker("#vencimiento");'

    );

}


function eliminar_factura(id_factura){

    mensaje_confirmar("Está seguro de eliminar ésta factura?", "eliminar_factura2("+id_factura+"); ");

}


function eliminar_factura2(id_factura){

    ejecutarAccion( 
        'facturas', 
        'Facturas', 
        'eliminarFactura', 
        "id_factura="+id_factura, 
        'mensaje_alertas("success", "Factura Eliminada Correctamente", "center"); cargarFacturas();' 

    );

}


function imprimir_factura(id_factura){

    ejecutarAccion('facturas', 'Facturas', 'imprimirFactura', "id_factura="+id_factura, "cargarVisorPDF(data);");

}

function imprimir_factura2(id_factura){ 

    ejecutarAccion('facturas', 'Facturas', 'imprimirFactura2', "id_factura="+id_factura, "cargarVisorPDF(data);");

}

function imprimir_tickets(id_factura){ 

    ejecutarAccion('facturas', 'Facturas', 'imprimirFactura3', "id_factura="+id_factura, "cargarVisorPDF(data);");

}

$( document ).ready(function() {   

    CrearTabla('tabla_facturas');

});