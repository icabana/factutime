function nuevo_empleado() {

    abrirVentanaContenedor(
        'actores', 
        'Empleados', 
        'nuevo', 
        '', 
        ''
    );

}

function editar_empleado(id_empleado) {

    abrirVentanaContenedor(
        'actores',
        'Empleados',
        'editar',
        'id_empleado=' + id_empleado,
        ''
    );

}

function eliminar_empleado(id_empleado) {

    mensaje_confirmar("¿Está seguro de eliminar el Empleado?", "eliminar_empleado2(" + id_empleado + "); ");

}

function eliminar_empleado2(id_empleado) {

    ejecutarAccion(
        'actores',
        'Empleados',
        'eliminar',
        "id_empleado=" + id_empleado,
        ' mensaje_alertas("success", "Empleado Eliminado con Éxito", "center"); cargar_empleados();'
    );

}