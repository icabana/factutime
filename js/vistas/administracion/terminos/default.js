function abrir_crear_terminos(){	
        
    abrirVentanaContenedor(
        'configuracion', 
        'Terminos', 
        'abrirCrearTermino',
        '',
        ''
    );	

}

function abrir_editar_terminos(id_termino){

    abrirVentanaContenedor(
        'configuracion', 
        'Terminos', 
        'abrirEditarTermino',
        'id_termino='+id_termino,''
    );        

}

function eliminar_terminos(id_terminos){

    mensaje_confirmar("Está seguro de eliminar este Termino?", "eliminar_terminos2("+id_terminos+"); ");

}

function eliminar_terminos2(id_termino){       

    ejecutarAccion( 
        'configuracion', 
        'Terminos', 
        'eliminarTermino', 
        "id_termino="+id_termino, 
        ' mensaje_alertas("success", "Termino Eliminado con Éxito", "center"); cargarTerminos();' 
    );

}

$( document ).ready(function() {    
    CrearTabla('tabla_terminos');
});