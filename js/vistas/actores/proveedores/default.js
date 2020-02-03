function nuevo_proveedor() {

    abrirVentanaContenedor(
        'actores', 
        'Proveedores', 
        'nuevo', 
        '', 
        ''
    );

}

function editar_proveedor(id_proveedor) {

    abrirVentanaContenedor(
        'actores',
        'Proveedores',
        'editar',
        'id_proveedor=' + id_proveedor,
        ''
    );

}

function eliminar_proveedor(id_proveedor) {

    mensaje_confirmar("¿Está seguro de eliminar el Proveedor?", "eliminar_proveedor2(" + id_proveedor + "); ");

}

function eliminar_proveedor2(id_proveedor) {

    ejecutarAccion(
        'actores',
        'Proveedores',
        'eliminar',
        "id_proveedor=" + id_proveedor,
        ' mensaje_alertas("success", "Proveedor Eliminado con Éxito", "center"); cargar_proveedores();'
    );

}
