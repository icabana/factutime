function editar_proveedor() {

  if(!validar_requeridos()){
      return 0;
  }

  var datos = $('#formProveedores').serialize();

  ejecutarAccion(
    'actores',
    'Proveedores',
    'guardar',
    datos,
    'editar_proveedor2(data)'
  );

}

function editar_proveedor2(data) {

  if (data == 1) {
    mensaje_alertas("success", "Proveedor Editado Exitosamente", "center");
    cargar_proveedores();
  } else {
    mensaje_alertas("error", "El Documento o Correo ya se encuentra registrado", "center");
  }

}