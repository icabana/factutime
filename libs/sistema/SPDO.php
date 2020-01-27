<?php
/*
SPDO es una clase que extiende de PDO, su única ventaja es que nos permite
aplicar el patron Singleton para mantener una única instancia de PDO.
*/
class SPDO extends PDO
{
    private static $instance = null;

    public function __construct()
    {
        $config = Config::singleton();
		
		try {
			parent::__construct( 
				'' . $config->get('dbtype') . ':dbname='. $config->get('dbname') .';host=' . $config->get('dbhost'). '', 
				$config->get('dbuser'), $config->get('dbpass') 
			);
		}
		catch(PDOException $e){
			echo '<script>alert( "HA OCURRIDO UN ERROR AL INTENTAR CONECTARCE CON EL MOTOR DE DATOS EN '.$config->get('dbtype') . ':dbname='. $config->get('dbname') .';host=' . $config->get('dbhost').' \n\r'.$e->getMessage().'");</script>' ;
		}
		
    }

    public static function singleton()
    {
        if( self::$instance == null )
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>