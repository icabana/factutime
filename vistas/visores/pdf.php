<?php
	
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
	
	
?>
<head>
<title>VISOR DE DOCUMENTOS :: PDF ::</title>

<!--Librerias y Plugins -->
<script type="text/javascript" src="../../js/jquery-1.4.4.min.js" ></script>
<script type="text/javascript" src="../../js/jquery-ui-1.8.7.custom.min.js" ></script>
    <script type="text/javascript" >
		function disableRightClick(e)
		{
		  var message = "NO PERMITIDO";
		  if(!document.rightClickDisabled) // initialize
		  {
			if(document.layers) 
			{
			  document.captureEvents(Event.MOUSEDOWN);
			  document.onmousedown = disableRightClick;
			}
			else document.oncontextmenu = disableRightClick;
			return document.rightClickDisabled = true;
		  }
		
		  if(document.layers || (document.getElementById && !document.all))
		  {
			if (e.which==2||e.which==3)
			{
			  alert(message);
			  return false;
			}
		  }
		  else
		  {
			alert(message);
			return false;
		  }
		}
		//disableRightClick();
		
		function cerrar(){
			self.close(); 
			this.close();
		}
		
    </script>
    

</head>

<body style="background-color:transparent;" >



    <div id="divPdf" style="text-align:center;">

	<?php if( isset( $_GET['urlRuta'] ) ){ ?>
	   <iframe src="../../<?php echo  $_GET['urlRuta']; ?>" 
	   		width="96%" marginwidth="auto" height="90%" marginheight="auto"  
		   align="top" scrolling="auto" frameborder="1" id="iframePdfReserva"  
		   allowtransparency="true" application="true" 
	   ></iframe>
     
	<?php }?>	
    
	</div>    

	<p></p>
    
    <div id="divCerrarVentana" style="text-align:center;">
  		<button onClick="cerrar();" onKeyPress="cerrar();"><img src="../../imagenes/botones/cancelar.png" width="32"  align="left" />Cerrar Ventana</button>
    </div>


</body>
