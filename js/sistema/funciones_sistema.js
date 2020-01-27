var uploader = "";

$(document).ready(function () {

    document.containers = new Object();

});


function limpiar_cuerpo() {

    $("#cuerpo").html("");

}

function validar_requeridos() {
    var error = 0;
    $('.requerido').each(function (i, elem) {
        if ($(elem).val() == '') {
            $(elem).css({ 'border': '1px solid red' });
            error++;
        } else {
            $(elem).css({ 'border': '0px' });
        }
    });
    if (error > 0) {
        mensaje_alertas("error", "Debe rellenar los campos requeridos", "center");
        return 0;
    }

    return 1;
}

function login_inicial() {

    if ($("#nick").val() == "" || $("#password").val() == "") {

        mensaje_alertas("error", "Los campos son obligatorios", "center");

    } else {

        ejecutarAccion(
            "sistema",
            "Sistema",
            "validarUsuario",
            $("#formLogin").serialize(),
            "validar_login(data); "
        );

    }

}

function validar_login(data) {

    if (data == '0') {

        mensaje_alertas('error', 'USUARIO/CONTRASEÑA INCORRECTOS', 'center');

    } else {
        location.reload();
        return true;
    }

}


function cerrar() {

    $.post(
        "index.php",
        {
            modulo: "sistema",
            controlador: "Sistema",
            accion: "cerrar"
        }, function (data) {
            open(data, '_self');
        }

    );
}


function zIndex() {
    var allElems = document.getElementsByTagName ? document.getElementsByTagName("*") : document.all;
    var maxZIndex = 0;

    for (var i = 0; i < allElems.length; i++) {
        var elem = allElems[i];
        var cStyle = null;
        if (elem.currentStyle) { cStyle = elem.currentStyle; }
        else if (document.defaultView && document.defaultView.getComputedStyle) {
            cStyle = document.defaultView.getComputedStyle(elem, "");
        }
        var sNum;
        if (cStyle) {
            sNum = Number(cStyle.zIndex);
        } else {
            sNum = Number(elem.style.zIndex);
        }
        if (!isNaN(sNum)) {
            maxZIndex = Math.max(maxZIndex, sNum);
        }
    }
    return maxZIndex + 1;
}

var cargando = '<div style=" z-index:ZINDEXMASALTO; position:absolute; top:0; left:0px; width:100%; height:100%; background-color:transparent; background-image:url(imagenes/fondos/fondoCarga.png); background-position:center center; background-repeat:repeat; overflow:hidden;" ><div style="width:200px; margin: 20% auto; text-align: center;"><img src="imagenes/iconos/cargando.gif" width="200px"  alt="Cargando / Loading"  /><h1 style="color: blue; font-size:25px; font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;"></h1></div>  </div>';


function formatoNumerico() {

    $('.input_dinero').number(true, 0, ',', '.');

}

function SubirArchivos(clase_elemento) {
    $('.' + clase_elemento).fileUploader();
}

function mensaje_alertas(tipo, texto, layout) {

    var n = noty({
        text: texto,
        type: tipo,
        dismissQueue: false,
        layout: layout,
        theme: 'defaultTheme',
        force: false,
        timeout: 1000,
        modal: true,
        zIndex: 9000

    });
    console.log('html: ' + n.options.id);

}

function mensaje_confirmar(texto, funcion) {

    var n = noty({
        text: texto,
        type: 'confirm',
        layout: 'center',
        dismissQueue: true,
        theme: 'defaultTheme',

        buttons: [
            {
                addClass: 'btn btn-danger', text: 'Cancelar', onClick: function ($noty) {
                    $noty.close();
                    return 0;

                }
            },
            {
                addClass: 'btn btn-success', text: 'Aceptar', onClick: function ($noty) {
                    eval(funcion);
                    $noty.close();
                }
            }
        ]
    });

}


function abrirVentanaContenedor(modulo, controlador, accion, datos, script) {

    $.post(
        "index.php",
        "&modulo=" + modulo + "&accion=" + accion + "&controlador=" + controlador + "&" + datos,
        function (data) {

            $("#cuerpo").html(data);
            eval(script);

        }

    );

}

function abrirVentanaContenedorTabla(tabla, modulo, controlador, accion, datos) {

    $.post(
        "index.php",
        "&modulo=" + modulo + "&accion=" + accion + "&controlador=" + controlador + "&" + datos,
        function (data) {

            $("#cuerpo").html(data);
            $("#cuerpo").css("height", "100%");
            CrearTabla(tabla);
        }

    );

}

function abrirVentanaContenedorTablaScript(tabla, modulo, controlador, accion, datos, script) {

    $.post(
        "index.php",
        "&modulo=" + modulo + "&accion=" + accion + "&controlador=" + controlador + "&" + datos,
        function (data) {

            $("#cuerpo").html(data);
            eval(script);
            $("#cuerpo").css("height", "100%");

        }

    );

}

function CrearTabla(id) {

    $('#' + id).DataTable({
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla.",
            "info": "Del _START_ al _END_ de _TOTAL_ ",
            "infoEmpty": "Mostrando 0 registros de un total de 0.",
            "infoFiltered": "(filtrados de un total de _MAX_ registros)",
            "infoPostFix": "(actualizados)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchPlaceholder": "Dato para buscar",
            "zeroRecords": "No se han encontrado coincidencias.",
            "paginate": {
                "first": "Primera",
                "last": "Última",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": "Ordenación ascendente",
                "sortDescending": "Ordenación descendente"
            }
        }
    });

}

function ejecutarAccion(modulo, controlador, accion, datos, script) {

    $.post(
        "index.php",
        "&modulo=" + modulo + "&accion=" + accion + "&controlador=" + controlador + "&" + datos,
        function (data) {
            data = data.replace(/^\s+/g, '').replace(/\s+$/g, '');
            eval(script);
        }
    );
}

function ejecutarAccionSinAlert(modulo, controlador, accion, datos, script) {

    $.post(
        "index.php",
        "&modulo=" + modulo + "&accion=" + accion + "&controlador=" + controlador + "&" + datos,
        function (data) {
            data = data.replace(/^\s+/g, '').replace(/\s+$/g, '');
            eval(script);

        }
    );
}


function cargarVisorPDF(datos) {
    var height = screen.availHeight;
    var width = screen.availWidth;
    open('vistas/visores/pdf.php?' + datos, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=yes,width=' + width + ',height=' + height);
}



function cargarVista(Controlador, Accion) {
    $.post("index.php", {
        controlador: Controlador,
        accion: Accion
    }, function (data) {
        AbrirVentana(data, 'Bienvenida');
    });
}

function verPdf(datos) {
    var height = screen.height;
    var width = screen.width;
    open('vistas/sistema/visores/pdf.php?' + datos, 'popUpWin', 'fullscreen=yes,direction=notoolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=' + width + ',height=' + height);
}

function no_numeros(e) {
    if (e.charCode != 48 && e.charCode != 49 && e.charCode != 50 && e.charCode != 51 && e.charCode != 52 && e.charCode != 53 && e.charCode != 54 && e.charCode != 55 && e.charCode != 56 && e.charCode != 57 && e.charCode != 9) return false;
}
