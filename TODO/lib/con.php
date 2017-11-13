<?php

$ip_domain=$_SERVER['SERVER_ADDR'];

$conf=($ip_domain == '127.0.0.1')?'config.dev.ini': 'config.ini';

//Si es localhost utilitzará la configuracio de dev.ini, si no utilitzara
//la configuració de vesta

$config=parse_ini_file($conf);
//llegeix el fitxer per agafar les variables par conectar a mysql

try{
	$con=new mysqli($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
   }catch(Exception $e){
	echo 'connection failed:'.$e->getMessage();
}


?>
