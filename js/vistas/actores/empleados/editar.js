function editar_empleado() {

    if(!validar_requeridos()){
        return 0;
    }

    var datos = $('#formEmpleados').serialize();

    ejecutarAccion(
      'actores',
      'Empleados',
      'guardar',
      datos,
      'editar_empleado2(data)'
    );

}

function editar_empleado2(data) {

    if (data == 1) {
      mensaje_alertas("success", "Empleado Editado Exitosamente", "center");
      cargar_empleados();
    } else {
      mensaje_alertas("error", "El Documento o Correo ya se encuentra registrado", "center");
    }

}