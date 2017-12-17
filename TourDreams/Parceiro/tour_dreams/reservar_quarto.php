<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);

	include_once 'conexao.php';

	$id_produto = $_POST['id_produto'];
	$checkin = $_POST['checkin'];
	$checkout = $_POST['checkout'];
	
	$data_entrada = explode("/", $checkin );
		$dia_entrada = $data_entrada[0]; 
		$mes_entrada = $data_entrada[1];	
		$ano_entrada = $data_entrada[2];	
	$entrada_banco = $ano_entrada."-".$mes_entrada."-".$dia_entrada;
	
	$data_saida = explode("/", $checkout );
		$dia_saida = $data_saida[0]; 
		$mes_saida = $data_saida[1];	
		$ano_saida = $data_saida[2];	
	$saida_banco = $ano_saida."-".$mes_saida."-".$dia_saida;
	
	$diferenca = strtotime($saida_banco) - strtotime($entrada_banco);
	$dias = floor($diferenca / (60 * 60 * 24));
	
	$sql = $dbcon->query("select quartos.* from view_quartos as quartos
							where id_produto = '$id_produto'  and id_quarto not in(
							select id_quarto from tbl_reserva where('$entrada_banco' between dt_entrada and dt_saida) 
                            or ('$saida_banco' between dt_entrada and dt_saida)
							);");
	
	$lista = [];
	
	if(mysqli_num_rows($sql) > 0){
		while($dados = $sql->fetch_array()){
				
			$obj = array("id_quarto" => utf8_encode ($dados['id_quarto']) ,
			  "descricao_quarto" => utf8_encode ($dados['descricao_quarto']),
			  "preco_diaria" => "R$ ". number_format($dados['preco_diaria'] * $dias, 2, "," , "." ),
			  "foto_quarto" => utf8_encode ($dados['foto_quarto']),
			  "data_entrada" => ($dia_entrada."/".$mes_entrada."/".$ano_entrada),
			  "data_saida" => ($dia_saida."/".$mes_saida."/".$ano_saida),
			);

			$lista[] = $obj;
			
				
		}
		
		
		
		echo json_encode($lista);


	}

?>
