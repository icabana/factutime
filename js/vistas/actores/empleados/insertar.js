function insertar_empleado() {

    if(!validar_requeridos()){
        return 0;
    }

    var datos = $('#formEmpleados').serialize();

    ejecutarAccion(
      'actores',
      'Empleados',
      'insertar',
      datos,
      'insertar_empleado2(data)'
    );

  }

  function insertar_empleado2(data) {

    if (data == 'error_documento') {
      mensaje_alertas("error", "El Documento ya se encuentra registrado", "center");
      return false;
    } 
    if (data == 'error_correo') {
      mensaje_alertas("error", "El Correo ya se encuentra registrado", "center");
      return false;
    } 

    if (data == 'error_nick') {
      mensaje_alertas("error", "El Nick de Usuario ya se encuentra registrado", "center");
      return false;
    } 
    
    mensaje_alertas("success", "Empleado registrado correctamente", "center");
    cargar_empleados();

  }