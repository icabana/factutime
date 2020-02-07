function editar_termino(){

  if(validar_requeridos() == 0){
      return 0;
  }

  var datos = $('#formTermino').serialize();

  ejecutarAccion(
      'configuracion', 
      'Terminos', 
      'editarTermino', 
      datos, 
      'if(data == 1){ mensaje_alertas("success", "Terminos editado Exitosamente", "center"); cargarTerminos(); }else{  mensaje_alertas("error", "Error al editar el termino", "center");  }'

  );	

}        
