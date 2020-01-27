<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->ruta(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $this->ruta(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->ruta(); ?>dist/css/adminlte.min.css">


</head>
<body style='background:white' class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <span class="brand-text font-weight-light">
    <center>
        <img src="<?php echo $this->ruta(); ?>dist/img/logo_login.png"  style="opacity: .8">
</center>
      </span>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesi&oacute;n</p>

        <form id="formLogin" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="nick" name="nick" placeholder="Nombre de Usuario">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>         
            
            <center>
                <button onclick="login_inicial(); return false;"  class="btn btn-primary">Ingresar</button>
</center>
            
          </form>
 
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?php echo $this->ruta(); ?>plugins/jquery/jquery.min.js"></script>


<!-- jQuery -->
<script src="<?php echo $this->ruta(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $this->ruta(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->ruta(); ?>dist/js/adminlte.min.js"></script>

<script type="text/javascript" src="js/plugins/noty/jquery.noty.js" ></script>
    <script type="text/javascript" src="js/plugins/noty/packaged/jquery.noty.packaged.min.js" ></script>

<script type='text/javascript' src='js/sistema/funciones_sistema.js'></script>      
  


</body>
</html>
