<?php
	$host = "localhost";
	$usuario = "root";
	$senha = "bcd127";
	$banco = "dbsitetourdreams";
	
	/*$host = "192.168.0.2";
	$usuario = "sitetourdreams";
	$senha = "tourdreams";
	$banco = "dbsitetourdreams";*/

	$dbcon = new MySQLi("$host", "$usuario", "$senha", "$banco");


	if($dbcon->connect_error){

		echo"conexao_erro";


	}/*else{

		echo"conexao_ok";


	}*/


?>
