<?php
if ( isset($_SESSION['id_usuario']) ) {	
	define('_P4LM4S0FTLTD4', 1 );
	define( 'CARP_BASE', dirname(__FILE__) );
	define( 'DS', DIRECTORY_SEPARATOR );	
	include($this->ruta().'html/tmpl/admin.php'); 
}else{
	include($this->ruta().'html/tmpl/login.php');   
}

?>