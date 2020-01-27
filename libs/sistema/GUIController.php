<?php
/*
  El GUIController es el que recibe todas las peticiones,
  incluye algunos ficheros, busca el controlador y llama a la acci�n que corresponde.
 */
class GUIController
{

    static function main()
    {

        session_start();
        session_name("SINAP");

        //SE CARGAN LIBRERIAS DE UTILIDADES        
        require 'libs/utilidades/SistemaArchivos.php';
        require 'libs/utilidades/Fechas.php';
        require 'libs/utilidades/ValorLetras.php';

        require 'libs/uploads/upload.php';

        //SE CARGAN LIBRERIAS DEL SISTEMA
        require 'libs/sistema/SPDO.php'; //PDO con singleton
        require 'libs/sistema/configuracion/Config.php'; //de configuracion
        require 'libs/sistema/configuracion/Parametros.php'; //de Parametros        
        require 'libs/sistema/ControllerBase.php'; //Clase controlador base
        require 'libs/sistema/ModelBase.php'; //Clase modelo base
        require 'libs/sistema/View.php'; //Mini motor de plantillas
        require 'libs/sistema/Model.php'; //Mini motor de Mdelos		

        //SE CARGA ARCHIVO DE CONFIGURACION
        require 'config.php'; //Archivo con configuraciones.

        //SE CARGAN LIBRERIAS GRAFICAS		
        require 'libs/html/Plantillas.php'; //adminsitra las vista para los errores dle sistema
        require 'libs/html/Errores.php'; //adminsitra las vista para los errores dle sistema
        require 'libs/html/Formularios.class.php'; //Genera Objetos de Fromularios        

        //SE CARGAN LIBRERIAS PDF
        require 'libs/pdf/fpdf/fpdf.php'; //de configuracion
        require 'libs/pdf/fpdf/PdfNormal.php'; //de Documentos
        require 'libs/pdf/fpdf/PdfTirillas.php'; //de Documentos

        require 'libs/pdf/PdfReporte.php'; //de Reportes

        //SE CARGAN LIBRERIAS DE CORREO
        require 'libs/correos/phpmailer/class.phpmailer.php'; //de Correos Electronicos
        require 'libs/correos/phpmailer/class.smtp.php'; //de Correos Electronicos
        require 'libs/correos/Correos.php'; //de Personalizado

        //SE CARGAN LIBRERIAS DE CORREO
        require 'libs/excel/PHPExcel.php'; //de Correos Electronicos
        require 'libs/excel/PHPExcel/Writer/Excel2007.php'; //de Personalizado


        //NOMBRE DEL MODULO
        if (!empty($_POST['modulo']))
            $nombreModulo = strtolower($_POST['modulo']);
        elseif (!empty($_GET['modulo']))
            $nombreModulo = strtolower($_GET['modulo']);
        else
            $nombreModulo = "sistema";


        //NOMBRE DEL CONTROLADOR
        if (!empty($_POST['controlador']))
            $nombreControlador = $_POST['controlador'] . 'Controlador';
        elseif (!empty($_GET['controlador']))
            $nombreControlador = $_GET['controlador'] . 'Controlador';
        else
            $nombreControlador = "SistemaControlador"; //NOMBRE DEL CONTROLADOR POR DEFECTO			


        //NOMBRE DE LA ACCION
        if (!empty($_POST['accion']))
            $nombreAccion = $_POST['accion'];
        elseif (!empty($_GET['accion']))
            $nombreAccion = $_GET['accion'];
        else
            $nombreAccion = "Inicio";


        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        $controllerPath = $config->get('controladores') . $nombreModulo . '/' . $nombreControlador . '.php';

        if (is_file($controllerPath)) {
            require $controllerPath;
        } else {
            $errores = new Errores();
            $errores->nombreControlador = $nombreControlador;
            $errores->rutaArchivo = $controllerPath;
            $errores->error101();
            return false;
        }

        $controller = new $nombreControlador();
        $controller->$nombreAccion();
    }
}
