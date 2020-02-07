function insertar_termino(){            

  if(validar_requeridos() == 0){
      return 0;
  }

  var datos = $('#formTerminos').serialize();

  ejecutarAccion(
      'configuracion', 
      'Terminos', 
      'insertarTermino', 
      datos,
      'if(data == 1){ mensaje_alertas("success", "Termino Registrada Exitosamente", "center"); cargarTerminos(); }else{  mensaje_alertas("error", "Error al insertar el Termino", "center");  }'

  );	            

}        
