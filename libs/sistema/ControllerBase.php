<?php
abstract class ControllerBase
{

    protected $plantilla;
    protected $config;
    protected $view;
    protected $model;

    protected $SistemaArchivos;
    protected $fechas;
    protected $mail;
    protected $pdf;
    protected $params;

    function __construct()
    {
        $this->SistemaArchivos = new SistemaArchivos();
        $this->fechas = new Fechas();

        $this->config = Config::singleton();
        $this->params = Parametros::singleton();

        $this->view = new View();
        $this->model = new Model();
        $this->pdf = new FPDF();
        $this->excel = new PHPExcel();
        $this->plantilla = new Plantillas();
        $this->mail = new Correos();
    }
}
