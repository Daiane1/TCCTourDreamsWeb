<?php
	include ('conexao_banco.php');
	
	$nome_administrador = $_GET['nome_administrador'];	
	$id_administrador = $_GET['id_administrador'];	
	@$nivel = $_GET['id_nivel_usuario'];
	
	$sql = "select * from tbl_produto";
	$select = mysql_query($sql);
	while($rs = mysql_fetch_array($select)){
		$id_produto=$rs['id_produto'];
		$_SESSION['id_produto'] = $id_produto;
	}
	
	
	
	


	if(isset($_GET['modo'])){
		$modo=$_GET['modo'];
		if ($modo=='ativarProduto'){
		    $preco_diaria = $_SESSION['preco_diaria'];		
			$nome_administrador=$_GET['nome_administrador'];	
			$sql="update tbl_produto set id_status = 2 where id_produto=".$_SESSION['id_produto'];
			mysql_query($sql);
			header("location:parceiros.php?nome_administrador=".$nome_administrador."&id_administrador=".$id_administrador."&id_nivel_usuario=".$nivel);
		}elseif($modo=='desativarProduto'){
				$sql="update tbl_produto set id_status = 3 where id_produto=".$_SESSION['id_produto'];
				$select = mysql_query($sql);
				header("location:parceiros.php?nome_administrador=".$nome_administrador."&id_administrador=".$id_administrador."&id_nivel_usuario=".$nivel);
			}
	}
?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>TourDreams | Parceiros</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	

		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		
		<script src="assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="home.php" class="navbar-brand">
						<small>
							TourDreams
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">2</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									2 Notificações
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														Hotel X fez virou parceiro
													</span>
												</div>
											</a>
										</li>


										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														Maria excluiu produto
													</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Bem Vindo,</small>
									<?php echo$_GET['nome_administrador'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="perfil.php?nome_administrador=<?php echo($nome_administrador);?>&id_administrador=<?php echo($id_administrador);?>&id_nivel_usuario=<?php echo($nivel);?>">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="index.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

			

				<?php include('menu.php'); ?>
					

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<a href="#">Parceiros</a>
							</li>
							<li class="active">Administração de Parceiros</li>
						</ul>

						
					</div>

					<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								
								
								<div class="hr hr-18 dotted hr-double"></div>

								

								

								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										
										
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>Empresa</th>
														<th>CEP</th>
														<th>
															Gerente 
														</th>
														<th>Contato gerente</th>
														<th>Status do produto</th>
														<th>Status</th>
													</tr>
												</thead>

												<?php
												$sql = "select * from view_produto";
												$select = mysql_query($sql);
												while($rs = mysql_fetch_array($select)){
												?>
												
												<tbody>
													<tr>
														

														<td>
															<?php echo($rs['nome_fantasia']);?>
														</td>
														<td><?php echo($rs['numero_cep']);?></td>
														<td class="hidden-480"><?php echo($rs['nome_gerente']);?></td>
														<td><?php echo($rs['email']);?></td>
														<td><?php echo($rs['status']);?></td>
														

														

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="parceiros.php?modo=ativarProduto&id_produto=<?php echo($rs['id_produto']);?>&nome_administrador=<?php echo($_GET['nome_administrador']);?>&id_administrador=<?php echo($_GET['id_administrador']);?>&id_nivel_usuario=<?php echo($nivel);?>">
																	<i class="ace-icon fa fa-thumbs-up"></i>
																</a>
																
																<a class="red" href="parceiros.php?modo=desativarProduto&id_produto=<?php echo($rs['id_produto']);?>&nome_administrador=<?php echo($_GET['nome_administrador']);?>&id_administrador=<?php echo($_GET['id_administrador']);?>&id_nivel_usuario=<?php echo($nivel);?>">
																	<i class="ace-icon fa fa-thumbs-down"></i>
																</a>
															</div>
															
															

														</td>
													</tr>
													<?php
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">TourDreams</span>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>

	

		
		<script src="assets/js/jquery-2.1.4.min.js"></script>

	
		
		
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		
		
		

		
	</body>
</html>
