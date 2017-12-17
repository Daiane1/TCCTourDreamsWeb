<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');	
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);
	
	include_once 'conexao.php';
	
	$id_produto = $_POST['id_produto'];
	
	$sql = $dbcon->query(" select * from view_comentario
        where id_produto = $id_produto;");
		
	$nome_cliente = "";
	$foto_cliente = "";
	$data = "";
	$comentario = "";
	$media = "";
	
	if(mysqli_num_rows($sql) > 0){
		
		$lista = [];
		
		while($dados = $sql->fetch_array()){
			$data = $dados['data'];
				$dt_nasc_sem_hora = substr($data, 0,10);
				$data_format = explode("-", $dt_nasc_sem_hora );
				$dia = $data_format[2]; //Posição do DIA que o usuario digitou
				$mes = $data_format[1];	//Posição do MES que o usuario digitou
				$ano = $data_format[0];	//Posição do ANO que o usuario digitou
				
				// pega o DIA MES e ANO para o padrão do banco de dados
				$data_format = $dia."/".$mes."/".$ano;
				
				
			$obj = array("nome" => $dados['nome_cliente'], 
			"imagem" => $dados['foto_cliente'],
			"data" => $data_format,
			"comentario" => $dados['comentario'],
			"media" => number_format($dados['media'], 1, "," , "."));
			$lista[] = $obj;
		}
		
		echo json_encode($lista);
			
	} else {
		
		$lista = [];
		
		while($dados = $sql->fetch_array()){
			
			$obj = array("nome" => $nome_cliente, 
			"imagem" => $foto_cliente,
			"data" => $data,
			"comentario" => $comentario,
			"media" => $media);
			$lista[] = $obj;
		}
		
		echo json_encode($lista);
		
	}


?>