function nuevo_cliente() {

    abrirVentanaContenedor(
        'actores', 
        'Clientes', 
        'nuevo', 
        '', 
        ''
    );

}

function editar_cliente(id_cliente) {

    abrirVentanaContenedor(
        'actores',
        'Clientes',
        'editar',
        'id_cliente=' + id_cliente,
        ''
    );

}

function eliminar_cliente(id_cliente) {

    mensaje_confirmar("¿Está seguro de eliminar el Cliente?", "eliminar_cliente2(" + id_cliente + "); ");

}

function eliminar_cliente2(id_cliente) {

    ejecutarAccion(
        'actores',
        'Clientes',
        'eliminar',
        "id_cliente=" + id_cliente,
        ' mensaje_alertas("success", "Cliente Eliminado con Éxito", "center"); cargar_clientes();'
    );

}