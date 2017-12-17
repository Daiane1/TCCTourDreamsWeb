<?php
	if(isset($_POST['btn_logar'])){
		$email=$_POST['email'];
		$senha=$_POST['senha'];
	
		include("conexao_banco.php");
			
		$sql = "SELECT * FROM tbl_administradores where email_empresa = '".$email."' AND senha= '".$senha."'"; 
		$sqlResult = mysql_query($sql);
		
		if(mysql_num_rows ($sqlResult) > 0){
			$_SESSION['email_empresa'] = $email;
			$_SESSION['senha'] = $senha;
			
			if($consulta=mysql_fetch_array($sqlResult)){
				$id_administrador = $consulta['id_administrador'];
				$nome_administrador = $consulta['nome_administrador'];
				$id_nivel_usuario = $consulta['id_nivel_usuario'];
				header("location:home.php?nome_administrador=".$nome_administrador."&id_administrador=".$id_administrador."&id_nivel_usuario=".$id_nivel_usuario);		
			}
			
		}else{
			echo "<script type='text/javascript'>
			window.alert('Login ou Senha inválidos')
			</script>";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login CMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<div class="space-6"></div>

											<form action="index.php" name="frm_login" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Email corporativo" name="email"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Senha" name="senha"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="btn_logar">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</body>
</html>
