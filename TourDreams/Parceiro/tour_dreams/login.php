<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);

	$cpf = "";
	$senha = "";

	include_once 'conexao.php';

	$cpf=$_POST['cpf'];
	$senha=$_POST['senha'];

	$sql = $dbcon->query("select * from tbl_cliente WHERE cpf_cliente ='$cpf' and senha_cliente='$senha';");
	

	if(mysqli_num_rows($sql) > 0){
		session_start();
		echo"login_ok";
		echo",";
		while($dados = $sql->fetch_array()){
				$dt_nasc = $dados['dt_nasc'];
				$dt_nasc_sem_hora = substr($dt_nasc, 0,10);
				$dt_nasc_volta = explode("-", $dt_nasc_sem_hora );
				$dia = $dt_nasc_volta[2]; //Posição do DIA que o usuario digitou
				$mes = $dt_nasc_volta[1];	//Posição do MES que o usuario digitou
				$ano = $dt_nasc_volta[0];	//Posição do ANO que o usuario digitou
				
				// pega o DIA MES e ANO para o padrão do banco de dados
				$dt_nasc_volta = $dia."/".$mes."/".$ano;
			
				echo utf8_encode ($dados['id_cliente']);
				echo",";
				echo utf8_encode ($dados['milhas']);
				echo",";
				echo utf8_encode ($dados['nome_cliente']);
				echo",";
				echo utf8_encode ($dados['rg_cliente']);
				echo",";
				echo utf8_encode ($dados['cpf_cliente']);
				echo",";
				echo utf8_encode ($dados['email_cliente']);
				echo",";
				echo utf8_encode ($dados['senha_cliente']);
				echo",";
				echo utf8_encode ($dados['celular_cliente']);
				echo",";
				echo utf8_encode ($dados['foto_cliente']);
				echo",";
				echo utf8_encode ($dt_nasc_volta);
				
		}
	}else{
		echo"login_erro";
	}




?>
