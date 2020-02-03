function insertar_cliente() {

  if(!validar_requeridos()){
      return 0;
  }

  var datos = $('#formClientes').serialize();

  ejecutarAccion(
    'actores',
    'Clientes',
    'insertar',
    datos,
    'insertar_cliente2(data)'
  );

}

function insertar_cliente2(data) {

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
  
  mensaje_alertas("success", "Cliente registrado correctamente", "center");
  cargar_clientes();

}