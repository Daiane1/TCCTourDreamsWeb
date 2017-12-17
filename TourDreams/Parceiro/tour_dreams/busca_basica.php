<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');	
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);
	
	include_once 'conexao.php';
	
	$busca_basica = $_POST['busca_basica'];


	$sql = $dbcon->query("select  distinct vf.*, pd.descricao_produto, pd.foto_principal, view_ava.media_geral from view_filtros as vf
		inner join view_produto as pd
        on pd.id_produto = vf.id_produto
        left join view_avaliacoes as view_ava
        on view_ava.id_produto = vf.id_produto
			where vf.nome_caracteristica LIKE '%$busca_basica%' or vf.nome_fantasia LIKE '%$busca_basica%'
			or vf.logradouro LIKE '%$busca_basica%' or vf.bairro LIKE '%$busca_basica%'
			or vf.cidade LIKE '%$busca_basica%' or vf.estado LIKE '%$busca_basica%'
			or vf.pais LIKE '%$busca_basica%'
			group by vf.id_produto;");

			
			
	if(mysqli_num_rows($sql) > 0){
		
		$lista = [];
		
		while($dados = $sql->fetch_array()){
			$obj = array("id_produto" => $dados['id_produto'], 
			"img_produto_busca" => $dados['foto_principal'],
			"nome_produto_busca" => $dados['nome_fantasia'],
			"local_produto_busca" => ($dados['cidade'] . " - " .$dados['estado']. " , " .$dados['pais']),
			"nota_produto_busca" => number_format ($dados['media_geral'], 1, "." , "."),
			"preco_produto_busca" => "R$ ". number_format($dados['preco'], 2, "," , "."),
			);
			$lista[] = $obj;
		}
		
		echo json_encode($lista);
			
	} else {
		echo ("Erro");
		
	}
 ?>