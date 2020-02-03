function insertar_proveedor() {

  if(!validar_requeridos()){
      return 0;
  }

  var datos = $('#formProveedores').serialize();

  ejecutarAccion(
    'actores',
    'Proveedores',
    'insertar',
    datos,
    'insertar_proveedor2(data)'
  );

}

function insertar_proveedor2(data) {

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
  
  mensaje_alertas("success", "Proveedor registrado correctamente", "center");
  cargar_proveedores();

}