<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <LINK REL="Shortcut Icon" href="imagenes/iconos/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>...: Facturaci&oacute;n :...</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <?php
      include("admin_archivos.php");
    ?> 
    
  </head>
  
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">          
          <span class="logo-mini"><b>Fac</b>turaci&oacute;n</span>          
          <span class="logo-lg"><b>Fac</b>turaci&oacute;n</span>
        </a>        

        <nav class="navbar navbar-static-top" role="navigation">
        
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
          
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $this->ruta(); ?>dist/img/user2-160x160.jpg" class="user-image" 
                  alt="User Image">
                  <span class="hidden-xs"><?php echo utf8_encode($datos_usuario['nombre']);  ?></span>
                </a>
                <ul class="dropdown-menu">
                  
                  <li class="user-header">
                    <img src="<?php echo $this->ruta(); ?>dist/img/user2-160x160.jpg" class="img-circle" 
                    alt="User Image">
                    <p>
                      <?php echo utf8_encode($datos_usuario['nombre']);  ?> - 
                      <?php echo utf8_encode($datos_usuario['nombre_rol']);  ?>                      
                    </p>
                  </li>
                 
                  <li class="user-footer">                   
                    <div>
                        <a href="#" onclick="javascript:cerrar();" class="btn btn-default btn-flat">
                        Cerrar Sesi&oacute;n</a>
                    </div>
                  </li>
                </ul>
              </li>
            
            </ul>
          </div>
        </nav>
      </header>
        
        
        
    <!-- BARRA LATERAL -->
    <aside class="main-sidebar">
      <section class="sidebar">
          
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo $this->ruta(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo utf8_encode($datos_usuario['NOMBRE']);  ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
                  
        <ul class="sidebar-menu">
            
          <li class="treeview">
              <a href="#" onclick="javascript:location.reload(); return false;">
                  <i class="fa fa-dashboard"></i><span>Panel de Control</span>
              </a>
          </li>
        
          <li class="active treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Pricipal</span> <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">                
                <li><a href="#"  onclick="cargarFacturas();"><i class="fa fa-book"></i>Item 1</a></li>                       
            </ul>
          </li>

          
          
          <li class="treeview">                
              <a href="#">
                <i class="fa fa-book"></i> <span>Configuraci&oacute;n</span> <i class="fa pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"  onclick="cargar_productos();"><i class="fa fa-book"></i>Usuarios</a></li>
                <li><a href="#"  onclick="cargar_clientes();"><i class="fa fa-book"></i>Roles</a></li>
                <li><a href="#"  onclick="cargar_proveedores();"><i class="fa fa-book"></i>Parametros</a></li>
                
              </ul>
          </li>
            
        </ul>
        
      </section>
    </aside>
      
      <!-- CUERPO DE LA PLANTILLA -->
      <div class="content-wrapper" class="hold-transition login-page">
        <section id="cuerpo" class="content"></section>
      </div>      
      
      <!-- PIE DE PAGINA DE LA PLANTILLA -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versi&oacute;n</b> 1.0
        </div>
          
        <strong>Sistema de Facturaci&oacute;n</strong><br>
        <strong>Copyright &copy; 2019 | Nombre Empresa</strong>.<br>
        <strong>Todos los derechos reservados.<strong><br>
      </footer>          
    
    </div>

    <div id="cargando"></div>
        
  </body>
</html>