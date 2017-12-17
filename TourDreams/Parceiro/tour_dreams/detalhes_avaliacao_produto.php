<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');	
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);
	
	include_once 'conexao.php';
	
	$id_produto = $_POST['id_produto'];
	
	$limpeza = "N/A";
	$atendimento = "N/A";
	$restaurante = "N/A";
	$lazer = "N/A";
	$media_geral = "N/A";
	
	$sql = $dbcon->query("select * from view_avaliacoes
        where id_produto = $id_produto;");
	
	
	if(mysqli_num_rows($sql) > 0){
		
		$lista = [];
		
		while($dados = $sql->fetch_array()){
			
			$obj = array("limpeza" => number_format($dados['limpeza'], 1, ".", "."),
						"atendimento" => number_format($dados['atendimento'], 1, "." , "."),
						"restaurante" => number_format($dados['restaurante'], 1, "." , "."),
						"lazer" => number_format ($dados['lazer'], 1, "." , "."),
						"media_geral" => number_format ($dados['media_geral'], 1, "." , "."),);
			$lista[] = $obj;
		}
		
		echo json_encode($lista);
			
	} else {
		$lista = [];
		
		
			
			$obj = array("limpeza" => $limpeza,
						"atendimento" => $atendimento,
						"restaurante" => $restaurante,
						"lazer" =>  $lazer,
						"media_geral" =>  $media_geral);
			$lista[] = $obj;
		
		echo json_encode($lista);
		
	}


?>