<?php
	
	session_start();
	
	$idNivel="";
	$nome="";
	$email="";
	$cidade="";
	$estado="";
	$dt_nasc="";
	$foto="";
	$senha_user="";
	$nomeNivel="";
	$botao="Cadastrar";
	
	include ('conexao_banco.php');
	
	
	$nome_administrador = $_GET['nome_administrador'];	
	$id_administrador = $_GET['id_administrador'];	
	@$nivel = $_GET['id_nivel_usuario'];
	
	if(isset($_POST['btn_cadastro'])){
		$nome=$_POST['nome'];
		$email=$_POST['email'];
		$cidade=$_POST['cidade'];
		$estado=$_POST['estado'];
		$data=$_POST['data'];
		$senha=$_POST['senha'];
		$idNivel=$_POST['selectCadastroUser'];
	
	
		$extensao = strtolower(substr($_FILES['foto_user']['name'],-4));
		$foto_user = md5(time()).$extensao;
		$diretorio = "Arquivos/";
		move_uploaded_file($_FILES['foto_user']['tmp_name'], $diretorio.$foto_user);
		
		$data = explode("/", $data );
		$dia = $data[0]; 
		$mes = $data[1];	
		$ano = $data[2];
		
		
		$dt_nasc_banco = $ano."-".$mes."-".$dia;
		
		$sql_code = "INSERT INTO  tbl_administradores(id_nivel_usuario,nome_administrador,email_empresa,cidade_nascimento,estado_nascimento,dt_nasc,foto,senha)";
		if($_POST['btn_cadastro']=='Cadastrar'){
			$sql = $sql_code."values(".$idNivel.",'".$nome."','".$email."','".$cidade."','".$estado."','".$dt_nasc_banco."','".$foto_user."','".$senha."')";
			mysql_query($sql) or die(mysql_error());
		}elseif($_POST['btn_cadastro']=='Alterar'){
			$sql = "update tbl_administradores set id_nivel_usuario=".$idNivel.",nome_administrador='".$nome."',email_empresa='".$email."',cidade_nascimento='".$cidade."',estado_nascimento='".$estado."',dt_nasc='".$dt_nasc_banco."',foto='".$foto_user."',senha='".$senha."' where id_administrador = ".$_SESSION['id_administrador'];
			mysql_query($sql) or die(mysql_error());
				header("location:admUser.php?nome_administrador=".$nome_administrador."&id_administrador=".$id_administrador."&id_nivel_usuario=".$nivel);
		}		
	}
	
	if(isset($_GET['modo'])){
		$modo=$_GET['modo'];
		if ($modo=='excluir'){
			$id_user_exluir=$_GET['id_user_exluir'];
			$id_administrador=$_GET['id_administrador'];
			$nome_administrador = $_GET['nome_administrador'];
			$sql="delete from tbl_administradores where id_administrador=".$id_user_exluir;
			mysql_query($sql);	
			header("location:admUser.php?nome_administrador=".$nome_administrador."&id_user_exluir=".$id_user_exluir."&id_administrador=".$id_administrador."&id_nivel_usuario=".$nivel);
		}elseif($modo=='editar'){
			$id_administrador=$_GET['id_administrador'];
			$nome_administrador = $_GET['nome_administrador'];
			$_SESSION['id_administrador'] = $id_administrador;
			$sql = "select a.id_administrador,a.id_nivel_usuario,a.nome_administrador,a.email_empresa,a.cidade_nascimento,a.estado_nascimento,a.dt_nasc,a.foto,a.senha, n.nome_nivel from tbl_nivel_usuario as n inner join tbl_administradores as a on a.id_nivel_usuario = n.id_nivel_usuario where a.id_administrador = ".$id_administrador;
			$select = mysql_query($sql);
			if($rsConsulta=mysql_fetch_array($select)){
					$idNivel=$rsConsulta['id_nivel_usuario'];
					$nome=$rsConsulta['nome_administrador'];
					$email=$rsConsulta['email_empresa'];
					$cidade=$rsConsulta['cidade_nascimento'];
					$estado=$rsConsulta['estado_nascimento'];
					$dt_nasc=$rsConsulta['dt_nasc'];
					
					
					$dt_nasc_sem_hora = substr($dt_nasc, 0,10);
					$dt_nasc_volta = explode("-", $dt_nasc_sem_hora );
					$dia = $dt_nasc_volta[2]; //Posição do DIA que o usuario digitou
					$mes = $dt_nasc_volta[1];	//Posição do MES que o usuario digitou
					$ano = $dt_nasc_volta[0];	//Posição do ANO que o usuario digitou
					
					// pega o DIA MES e ANO para o padrão do banco de dados
					$dt_nasc_volta = $dia."/".$mes."/".$ano;
			
					
					$foto=$rsConsulta['foto'];
					$senha_user=$rsConsulta['senha'];
					$nomeNivel=$rsConsulta['nome_nivel'];
					$botao="Alterar";
				}
		}
	}
	
	
	
	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title> TourDreams - Cadastro Usuários</title>

		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		
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
								Cadastro de Usuário
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Administração de Usuários
								</small>
							</h1>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="admUser.php?nome_administrador=<?php echo($nome_administrador);?>&id_administrador=<?php echo($id_administrador);?>&id_nivel_usuario=<?php echo($nivel);?>" name="frmCadastro" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nome </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Nome" class="col-xs-10 col-sm-5" name="nome" value="<?php echo($nome);?>" />
										</div>
									</div>

									

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email TourDreams </label>

										<div class="col-sm-9">
											<input type="email" id="form-field-1" placeholder="Email" class="col-xs-10 col-sm-5" name="email" value="<?php echo($email);?>"/>
										</div>
									</div>
									

									<div class="space-4"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cidade de Nascimento </label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1" placeholder="Cidade" class="col-xs-10 col-sm-5" name="cidade" value="<?php echo($cidade);?>"/>
											</div>
										</div>
									

									<div class="space-4"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Estado de Nascimento </label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1" placeholder="Estado" class="col-xs-10 col-sm-5" name="estado" value="<?php echo($estado);?>"/>
											</div>
										</div>
										
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Data de Nascimento </label>

										<div class="col-sm-9">
											<input type="text" style="width:150px;" id="form-field-mask-1 placeholder" class="form-control input-mask-date" placeholder = "Data de nascimento" name="data" value="<?php echo($dt_nasc_volta);?>"/>
										</div>
									</div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Senha </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-1" placeholder="Senha" class="col-xs-10 col-sm-5" name="senha" value="<?php echo($senha_user);?>"/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo de Usuários </label>

										<div class="col-sm-9">
											<select class="form-control" id="form-field-select-1" style="width:250px;" name="selectCadastroUser">
												<?php
														$sql = "select * from tbl_nivel_usuario where id_nivel_usuario > 0";
												
														if($nomeNivel != ''){
															$sql = $sql . " and id_nivel_usuario !=".$idNivel;
															?>
															<option value="<?php echo($idNivel);?>"><?php echo($nomeNivel);?></option>		
														<?php }?>
														
														
														<?php
															$select = mysql_query($sql);
															while($rs = mysql_fetch_array($select)){
														?>
															<option value="<?php echo($rs['id_nivel_usuario']);?>"><?php echo($rs['nome_nivel']);?></option>														
														<?php
															}
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-xs-12">
											<input multiple="" type="file" id="id-input-file-3" name="foto_user" value="<?php echo($foto);?>"/>
										</div>
									</div>
									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input class="btn btn-info" type="submit" name="btn_cadastro" value="<?php echo($botao)?>">
										</div>
									</div>
								</form>
							</div>
						</div>
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
														
														<th>Nível</th>
														<th>Nome</th>
														<th class="hidden-480">Email</th>

														<th>
															Cidade
														</th>
														
														<th>Estado</th>
														<th>Data de nascimento</th>
														
														<th>Status</th>
													</tr>
												</thead>

												<?php
												$sql = "select * from tbl_administradores as a inner join tbl_nivel_usuario as n on n.id_nivel_usuario = a.id_nivel_usuario";
												$select = mysql_query($sql);
												while($rs = mysql_fetch_array($select)){
													
													$dt_nasc=$rs['dt_nasc'];
													$dt_nasc_sem_hora = substr($dt_nasc, 0,10);
													$dt_nasc_volta = explode("-", $dt_nasc_sem_hora );
													$dia = $dt_nasc_volta[2]; //Posição do DIA que o usuario digitou
													$mes = $dt_nasc_volta[1];	//Posição do MES que o usuario digitou
													$ano = $dt_nasc_volta[0];	//Posição do ANO que o usuario digitou
													$dt_nasc_volta = $dia."/".$mes."/".$ano;
													
												?>
												
												<tbody>
													<tr>
														

														<td>
															<?php echo($rs['nome_nivel']);?>
														</td>
														<td><?php echo($rs['nome_administrador']);?></td>
														<td class="hidden-480"><?php echo($rs['email_empresa']);?></td>
														<td><?php echo($rs['cidade_nascimento']);?></td>
														<td><?php echo($rs['estado_nascimento']);?></td>
														<td><?php echo($dt_nasc_volta);?></td>

														

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="red" href="admUser.php?modo=excluir&id_user_exluir=<?php echo($rs['id_administrador']);?>&nome_administrador=<?php echo($_GET['nome_administrador']);?>&id_administrador=<?php echo($_GET['id_administrador']);?>&id_nivel_usuario=<?php echo($nivel);?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
																<a class="green" href="admUser.php?modo=editar&id_administrador=<?php echo($rs['id_administrador']);?>&nome_administrador=<?php echo($_GET['nome_administrador']);?>&id_nivel_usuario=<?php echo($nivel);?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
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
			
		</div>

		

		
		<script src="assets/js/jquery-2.1.4.min.js"></script>

	
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Foto do funcionário TourDreams',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
	</body>
</html>
