<?php 
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);

	include_once 'conexao.php';
	
	$id_quarto= $_POST['id_quarto'];
	$id_cliente= $_POST['id_cliente'];
	$dt_entrada= $_POST['dt_entrada'];
	$dt_saida= $_POST['dt_saida'];
	$nome_responsavel= $_POST['nome_responsavel'];
	$id_adulto= $_POST['id_adulto'];
	$id_crianca= $_POST['id_crianca'];
	$valor_reserva= $_POST['valor_reserva'];
	$valor_reserva = str_replace("R$", "", $valor_reserva);
	$valor_reserva = str_replace(".", "", $valor_reserva);
	$valor_reserva = str_replace(",", ".", $valor_reserva);
	
	$data_entrada = explode("/", $dt_entrada );
		$dia_entrada = $data_entrada[0]; 
		$mes_entrada = $data_entrada[1];	
		$ano_entrada = $data_entrada[2];	
	$entrada_banco = $ano_entrada."-".$mes_entrada."-".$dia_entrada;
	
	$data_saida = explode("/", $dt_saida );
		$dia_saida = $data_saida[0]; 
		$mes_saida = $data_saida[1];	
		$ano_saida = $data_saida[2];	
	$saida_banco = $ano_saida."-".$mes_saida."-".$dia_saida;
	
	echo($saida_banco);
	echo($entrada_banco);
	
	$sql = $dbcon->query ("insert into tbl_reserva (id_quarto, id_cliente, dt_entrada, dt_saida, nome_responsavel, id_adulto, id_crianca, valor_reserva, status_reserva) 
	values ('$id_quarto', '$id_cliente', '$entrada_banco', '$saida_banco', '$nome_responsavel', '$id_adulto', '$id_crianca', '$valor_reserva', 'Pendente')");
	
	
	echo ($sql);
?>