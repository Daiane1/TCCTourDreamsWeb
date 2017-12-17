<?php	
	include ('conexao_banco.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>TourDreams | Perfil do Parceiro</title>

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
					<a href="index.html" class="navbar-brand">
						<small>
							TourDreams
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Bem Vindo,</small>
									<?php echo $_GET['nome_empresa'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="perfil_parceiro.php?nome_empresa=<?php echo$_GET['nome_empresa'];?>&id_parceiro=<?php echo$_GET['id_parceiro'];?>">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="..\index.php">
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

			

				
				<ul class="nav nav-list">
					<li class="active">
						<a href="index_parceiro.php?nome_empresa=<?php echo$_GET['nome_empresa'];?>&id_parceiro=<?php echo$_GET['id_parceiro'];?>">
							<i class="menu-icon fa fa-briefcase"></i>
							<span class="menu-text"> Home </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="cadastro_quartos.php?nome_empresa=<?php echo$_GET['nome_empresa'];?>&id_parceiro=<?php echo$_GET['id_parceiro'];?>">
							<i class="menu-icon fa fa-bed"></i>
							<span class="menu-text"> Cadastro de quartos </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="minhas_reservas.php?nome_empresa=<?php echo$_GET['nome_empresa'];?>&id_parceiro=<?php echo$_GET['id_parceiro'];?>">
							<i class="menu-icon fa fa-building-o"></i>
							<span class="menu-text"> Minhas Reservas </span>
						</a>

						<b class="arrow"></b>
					</li>
					
				</ul>

					
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			
			<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">

						<div class="page-header">
							<h1>
								Meu Perfil
							</h1>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="hr dotted"></div>

								<div>
								<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
													<?php
														if (isset ($_GET['id_parceiro'])) {
														$id_parceiro = (int)$_GET['id_parceiro'];
														$sql = "select * from tbl_parceiros where id_parceiro=".$id_parceiro;
														$select = mysql_query($sql);
														while($rs = mysql_fetch_array($select)){
													?>
												<span class="profile-picture">
													<?php echo "<img class = 'editable img-responsive' id='avatar' src='Arquivos/".$rs['logo_parceiro']."'>"?>
												</span>
													<?php
														}
													}
													?>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
												<?php
													if (isset ($_GET['id_parceiro'])) {
													$id_parceiro = (int)$_GET['id_parceiro'];
													$sql = "select * from tbl_parceiros where id_parceiro=".$id_parceiro;
													$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
													?>
														<div class="inline position-relative">
															<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
																<i class="ace-icon fa fa-circle light-green"></i>
																<span class="white">  <?php echo($rs['nome_empresa']);?></span>
															</a>
														</div>
													<?php
														}
													}
													?>
												</div>
											</div>

											<div class="space-6"></div>

									

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="space-12"></div>

											
												<?php
												if (isset ($_GET['id_parceiro'])) {
														$id_parceiro = (int)$_GET['id_parceiro'];
														$sql = "select * from tbl_parceiros where id_parceiro=".$id_parceiro;
														$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
												?>
											
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Gerente</div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo($rs['nome_gerente']);?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> CNPJ </div>

													<div class="profile-info-value">
													
														<span class="editable" id="country">  <?php echo($rs['cnpj']);?></span>
														
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Localização </div>

													<div class="profile-info-value">
														
														<?php
														if (isset ($_GET['id_parceiro'])) {
																$id_parceiro = (int)$_GET['id_parceiro'];
																$sql_local = "select c.logradouro, c.numero, c.cidade,c.estado from tbl_parceiros as p inner join tbl_produto as pro on pro.id_parceiro = p.id_parceiro inner join tbl_cep as c on c.id_cep = pro.id_cep where pro.id_parceiro=".$id_parceiro;
																$select_local = mysql_query($sql_local);
															while($rslocal = mysql_fetch_array($select_local)){
														?>
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country">  <?php echo($rslocal['logradouro']);?></span>
														<span class="editable" id="city"><?php echo($rslocal['cidade']);?></span>
														
														<?php
														 }
														}
														?>
													</div>
												</div>


												<div class="profile-info-row">
													<div class="profile-info-name"> Telefone </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo($rs['telefone']);?></span>
													</div>
												</div>
											</div>
											
												<?php
													}
												}
												?>

											<div class="space-20"></div>

											

											<div class="hr hr2 hr-double"></div>

											<div class="space-6"></div>


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
							<span class="blue bolder">Parceiros TourDreams</span>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		
		
		

	

		
		<script src="assets/js/jquery-2.1.4.min.js"></script>

	
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

	
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		

	</body>
</html>
