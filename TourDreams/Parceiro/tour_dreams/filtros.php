<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');	
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);
	
	include_once 'conexao.php';
	
	$filtro_basico = $_POST['filtro_basico'];
	
	/*$sql_precoMin =$dbcon->query ("select  distinct vf.preco from view_filtros as vf
        where nome_caracteristica LIKE '%$filtro_basico%' or nome_fantasia LIKE '%$filtro_basico%'
		or logradouro LIKE '%$filtro_basico%' or bairro LIKE '%$filtro_basico%'
		or cidade LIKE '%$filtro_basico%' or estado LIKE '%$filtro_basico%'
		or pais LIKE '%$filtro_basico%'
        group by id_caracteristicas
        order by preco limit 1;");
	
	
	if(mysqli_num_rows($sql_precoMin) > 0) {
		while($dados_min = $sql_precoMin->fetch_array()){
			
			$preco_min = number_format($dados_min['preco'], 0);
			$preco_min = str_replace(",", "", $preco_min);
		}
	}else  {
		echo "erro";
	}
	
	
	$sql_precoMax =$dbcon->query ("select  distinct vf.preco from view_filtros as vf
        where nome_caracteristica LIKE '%$filtro_basico%' or nome_fantasia LIKE '%$filtro_basico%'
		or logradouro LIKE '%$filtro_basico%' or bairro LIKE '%$filtro_basico%'
		or cidade LIKE '%$filtro_basico%' or estado LIKE '%$filtro_basico%'
		or pais LIKE '%$filtro_basico%'
        group by id_caracteristicas
        order by preco desc limit 1;");
	
	
	if(mysqli_num_rows($sql_precoMax) > 0) {
		while(@$dados_max = $sql_precoMax->fetch_array()){
			
			$sql_precoMax = number_format("1200.49", 0);
			$sql_precoMax = str_replace(",", "", $sql_precoMax);
		}
	}else  {
		echo "erro";
	}*/
	
	
	
	
	$sql = $dbcon->query("select  distinct vf.* from view_filtros as vf
        where nome_caracteristica LIKE '%$filtro_basico%' or nome_fantasia LIKE '%$filtro_basico%'
		or logradouro LIKE '$filtro_basico' or bairro LIKE '$filtro_basico'
		or cidade LIKE '$filtro_basico' or estado LIKE '$filtro_basico'
		or pais LIKE '$filtro_basico'
        group by id_caracteristicas
        order by preco;");
		
	
	
		
	if(mysqli_num_rows($sql) > 0){
		
		$lista = [];
		
		while($dados = $sql->fetch_array()){
			$obj = array("nome_caracteristica" => $dados['nome_caracteristica'], 
			"foto_caracteristica" => $dados['foto_mobile'],
			);
			$lista[] = $obj;
		}
		
		echo json_encode($lista);
			
	} else {
		echo ("Erro");
		
	}
	
	
	


?>