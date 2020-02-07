function editar_cliente() {

  if(!validar_requeridos()){
      return 0;
  }

  var datos = $('#formClientes').serialize();

  ejecutarAccion(
    'actores',
    'Clientes',
    'guardar',
    datos,
    'editar_cliente2(data)'
  );

}

function editar_cliente2(data) {

  if (data == 1) {
    mensaje_alertas("success", "Cliente Editado Exitosamente", "center");
    cargar_clientes();
  } else {
    mensaje_alertas("error", "El Documento o Correo ya se encuentra registrado", "center");
  }

}
