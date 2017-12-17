<?php
	include("conexao_banco.php");
	
	if(isset($_GET['id_cliente'])){
?>

<div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> (11) 4222-2020</span>
                                <span><i class="pe-7s-mail"></i> tour_dreams@tour.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>



<form action="" method="post">

			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			  <div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Faça login na sua conta</h1><br>
					  <form>
						<input type="text" name="cpf" placeholder="CPF">
						<input type="password" name="senha" placeholder="Senha">
						<input type="submit" name="btn_logar_cliente" class="login loginmodal-submit" value="Entrar">
					  </form>
					</div>
				</div>
			</div>

</form>

<?php

	}else{
		
		
		if(isset($_POST['btn_logar_cliente']))
		{
			$cpf=$_POST['cpf'];
			$senha=$_POST['senha'];


			include("conexao_banco.php");

			$sql = "SELECT * FROM tbl_cliente where cpf_cliente = '".$cpf."' AND senha_cliente= '".$senha."'";
			$sqlResult = mysql_query($sql);

			if(mysql_num_rows ($sqlResult) > 0){
				$_SESSION['cpf_cliente'] = $cpf;
				$_SESSION['senha_cliente'] = $senha;

				if($consulta=mysql_fetch_array($sqlResult)){
					$id_cliente = $consulta['id_cliente'];
					$nome_cliente = $consulta['nome_cliente'];
					header("location:index.php?id_cliente=".$id_cliente."&nome_cliente=".$nome_cliente."");
				}

			}else{
				echo "<script type='text/javascript'>
				window.alert('Login ou Senha inválidos')
				</script>";
			}
		}



?>


<div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> (11) 4222-2020</span>
                                <span><i class="pe-7s-mail"></i> tour_dreams@tour.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i> Já sou cliente</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>



<form action="" method="post">

			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			  <div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Faça login na sua conta</h1><br>
					  <form>
						<input type="text" name="cpf" placeholder="CPF">
						<input type="password" name="senha" placeholder="Senha">
						<input type="submit" name="btn_logar_cliente" class="login loginmodal-submit" value="Entrar">
					  </form>
					</div>
				</div>
			</div>

</form>

<?php

	}

?>