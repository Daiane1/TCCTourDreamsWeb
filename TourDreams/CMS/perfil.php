<?php
	$nome_administrador = $_GET['nome_administrador'];	
	$id_administrador = $_GET['id_administrador'];
	@$nivel = $_GET['id_nivel_usuario'];
	
	include ('conexao_banco.php');
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>TourDreams | Perfil</title>

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
									<?php echo $_GET['nome_administrador'];?>
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
														if (isset ($_GET['id_administrador'])) {
														$usuario_id = (int)$_GET['id_administrador'];
														$sql = "select * from tbl_administradores where id_administrador=".$usuario_id;
														$select = mysql_query($sql);
														while($rs = mysql_fetch_array($select)){
													?>
												<span class="profile-picture">
													<?php echo "<img class = 'editable img-responsive' id='avatar' src='Arquivos/".$rs['foto']."'>"?>
												</span>
													<?php
														}
													}
													?>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
												<?php
													if (isset ($_GET['id_administrador'])) {
													$usuario_id = (int)$_GET['id_administrador'];
													$sql = "select * from tbl_administradores where id_administrador=".$usuario_id;
													$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
													?>
														<div class="inline position-relative">
															<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
																<i class="ace-icon fa fa-circle light-green"></i>
																<span class="white">  <?php echo($rs['nome_administrador']);?></span>
															</a>
														</div>
													<?php
														}
													}
													?>
												</div>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
												<div class="profile-contact-links align-left">
													<?php
													if (isset ($_GET['id_administrador'])) {
													$usuario_id = (int)$_GET['id_administrador'];
													$sql = "select * from tbl_administradores where id_administrador=".$usuario_id;
													$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
													?>
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
														<?php echo($rs['email_empresa']);?>
													</a>
													<?php
														}
													}
													?>
													
												</div>

												<div class="space-6"></div>

											</div>

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="space-12"></div>

											
												<?php
												if (isset ($_GET['id_administrador'])) {
														$usuario_id = (int)$_GET['id_administrador'];
														$sql = "select * from tbl_administradores where id_administrador=".$usuario_id;
														$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
											
														$dt_nasc=$rs['dt_nasc'];
														$dt_nasc_sem_hora = substr($dt_nasc, 0,10);
														$dt_nasc_volta = explode("-", $dt_nasc_sem_hora );
														$dia = $dt_nasc_volta[2]; //Posição do DIA que o usuario digitou
														$mes = $dt_nasc_volta[1];	//Posição do MES que o usuario digitou
														$ano = $dt_nasc_volta[0];	//Posição do ANO que o usuario digitou
														
														// pega o DIA MES e ANO para o padrão do banco de dados
														$dt_nasc_volta = $dia."/".$mes."/".$ano;
												?>
											
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nome </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo($rs['nome_administrador']);?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Natutal </div>

													<div class="profile-info-value">
													<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country">  <?php echo($rs['cidade_nascimento']);?></span>
														<span class="editable" id="city"> <?php echo($rs['estado_nascimento']);?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Idade </div>

													<?php
														$sql_idade = "SELECT YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(dt_nasc))) AS idade FROM tbl_administradores where id_administrador=".$usuario_id;
														$select_idade = mysql_query($sql_idade);
														while($rs_idade = mysql_fetch_array($select_idade)){
															
													?>
													
													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo($rs_idade['idade']);?></span>
													</div>
													<?php
														}
													?>
													
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Nascimento </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo ($dt_nasc_volta);?></span>
													</div>
												</div>
											</div>
											
												<?php
													}
												}
												?>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Notificações
													</h4>

													<div class="widget-toolbar action-buttons">
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh blue"></i>
														</a>
															&nbsp;
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
															<div class="profile-activity clearfix">
																<div>
																	Maria José da Silva
																	nova parceira, Hotel Maneiro
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>
														</div>
														
														<div id="profile-feed-1" class="profile-feed">
															<div class="profile-activity clearfix">
																<div>
																	Rodrigo atualizou o cadastro do seu 
																	Resort (Resort Cara)
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>
														</div>
														
														
														<div id="profile-feed-1" class="profile-feed">
															<div class="profile-activity clearfix">
																<div>
																	Pedro excluir o cadastro da
																	Pousada Solar
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

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
