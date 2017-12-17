<?php
	
	include ('conexao_banco.php');
	
	session_start();
	
	if(isset($_POST['btn_produto'])){
		
		$id = $_GET['id_parceiro'];
		$nome_empresa = $_GET['nome_empresa'];	
		
		$cep=$_POST['cep'];
		$logradouro=$_POST['logradouro'];
		$numero=$_POST['numero'];
		$complemento=$_POST['complemento'];
		$bairro=$_POST['bairro'];
		$cidade=$_POST['cidade'];
		$estado=$_POST['estado'];
		$pais=$_POST['pais'];
		
		
		$id_estilo_produto=$_POST['selectEstiloViagem'];
		$id_tipo_viagem=$_POST['selectViagem'];
		
		$descricao_produto=$_POST['descricao_produto'];
		
		$chk_caracteristicas=$_POST['caracteristicas'];
		
		
		
		$sql_code = "INSERT INTO tbl_cep(numero_cep,logradouro,numero,complemento,bairro,cidade,estado,pais)";
		$sql = $sql_code."values('".$cep."','".$logradouro."','".$numero."','".$complemento."','".$bairro."','".$cidade."','".$estado."','".$pais."')";
		mysql_query($sql) or die(mysql_error());
		
		$id_cep=mysql_insert_id();
		
		
		$extensao = strtolower(substr($_FILES['foto_principal']['name'], -4));
		$foto_principal_site = md5(time()).$extensao;
		$diretorio = "Arquivos/";
		move_uploaded_file($_FILES['foto_principal']['tmp_name'], $diretorio.$foto_principal_site);
		
		if (isset($_GET['id_parceiro'])) {
			$id_parceiro = (int)$_GET['id_parceiro'];
			$sql_code2 = "INSERT INTO tbl_produto(id_status,id_tipo_viagem,id_estilo_produto,id_milhas,id_parceiro,id_cep,foto_principal_site,descricao_produto)";
			$sql2 = $sql_code2."values('1',".$id_tipo_viagem.",".$id_estilo_produto.",'1',".$id_parceiro.",".$id_cep.",'".$foto_principal_site."','".$descricao_produto."')";
			mysql_query($sql2) or die(mysql_error());
		}
		
		$id_produto=mysql_insert_id();
		
		for ($i=0; $i<sizeof($chk_caracteristicas); $i++){
			$sql_code3 = "INSERT INTO tbl_caracteristicas_produto(id_produto,id_caracteristicas)";
			$sql3 = $sql_code3."values(".$id_produto.",".$chk_caracteristicas[$i].")";
			mysql_query($sql3) or die(mysql_error());
		}

		
			foreach ($_FILES["foto_destaque"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["foto_destaque"]["tmp_name"][$key];
					$name = $_FILES["foto_destaque"]["name"][$key];
					move_uploaded_file($tmp_name, "Arquivos/$name");
					
				$sql_code4 = "INSERT INTO tbl_fotos_produtos(id_produtos,foto_detalhes)";
				$sql4 = $sql_code4."values(".$id_produto.",'".$name."')";
				mysql_query($sql4) or die(mysql_error());
				}
			}
			
			
		$extensao = strtolower(substr($_FILES['logo']['name'], -4));
		$logo = md5(time()).$extensao;
		$diretorio = "Arquivos/";
		move_uploaded_file($_FILES['logo']['tmp_name'], $diretorio.$logo);
			
		if (isset ($_GET['id_parceiro'])) {
			$id_parceiro = (int)$_GET['id_parceiro'];
			$sql_code5 = "update tbl_parceiros set logo_parceiro='".$logo."' where id_parceiro = ".$id_parceiro;
			mysql_query($sql_code5) or die(mysql_error());
		}	
			
		header("location:index_parceiro.php?nome_empresa=".$nome_empresa."&id_parceiro=".$id);
		
	}
	
	
	
	
	
	


?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Parceiro | Finalização de Cadastro</title>

		<meta name="description" content="and Validation" />
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

	
		<link rel="stylesheet" href="assets/css/select2.min.css" />

		
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
					<a href="#" class="navbar-brand">
						<small>
							Parceiros
						</small>
					</a>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Cadastro de Produtos
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Cadastre seu produto para entrar de vez na família TourDreams
								</small>
							</h1>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="hr hr-18 hr-double dotted"></div>

								
								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">Cadastre todas as informações do seu produto</h4>
									</div>
								
									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Localização</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Especificações</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Fotos</span>
														</li>
														
														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Confirmação</span>
														</li>
													</ul>
												</div>

												<hr />

												<form class="form-horizontal" id="sample-form" method="post" action="cadastro_parceiro.php?nome_empresa=<?php echo$_GET['nome_empresa'];?>&id_parceiro=<?php echo$_GET['id_parceiro'];?>" enctype="multipart/form-data">
													<div class="step-content pos-rel">
														<div class="step-pane active" data-step="1">
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">CEP</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="cep"/>
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Logradouro</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="logradouro"/>
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Número</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right" style="width:70px;">
																			<input type="text" id="inputInfo" class="width-100" name="numero" />
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Complemento</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="complemento"/>
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Bairro</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="bairro"/>
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Cidade</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="cidade"/>
																		</span>
																	</div>
																</div>
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Estado</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="estado"/>
																		</span>
																	</div>
																</div>
																
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">País</label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="inputInfo" class="width-100" name="pais"/>
																		</span>
																	</div>
																</div>
													
																
														
														</div>

														<div class="step-pane" data-step="2">
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Estilo principal de viagens do seu produto</label>
																	<div class="col-xs-12 col-sm-5">
																		<select name = "selectViagem">
																			<?php
																				$sql = "select * from tbl_tipo_viagem a where id_tipo_viagem > 0";
																		
																				if($nome_tipo_viagem != ''){
																					$sql = $sql . " and id_tipo_viagem !=".$id_tipo_viagem;
																					?>
																					<option value="<?php echo($id_tipo_viagem);?>"><?php echo($nome_tipo_viagem);?></option>		
																				<?php }?>
																				
																				
																				<?php
																					$select = mysql_query($sql);
																					while($rs = mysql_fetch_array($select)){
																				?>
																					<option value="<?php echo($rs['id_tipo_viagem']);?>"><?php echo($rs['nome_tipo_viagem']);?></option>														
																				<?php
																					}
																				?>
																		</select>
																	</div>	
																</div>															
																
																<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">O seu produto é:</label>
																	<div class="col-xs-12 col-sm-5">
																		<select name = "selectEstiloViagem">
																			<?php
																				$sql = "select * from tbl_estilo_produto where id_estilo_produto > 0";
																		
																				if($nome_estilo_produto != ''){
																					$sql = $sql . " and id_estilo_produto !=".$id_estilo_produto;
																					?>
																					<option value="<?php echo($id_estilo_produto);?>"><?php echo($nome_estilo_produto);?></option>		
																				<?php }?>
																				
																				
																				<?php
																					$select = mysql_query($sql);
																					while($rs = mysql_fetch_array($select)){
																				?>
																					<option value="<?php echo($rs['id_estilo_produto']);?>"><?php echo($rs['nome_estilo_produto']);?></option>														
																				<?php
																					}
																				?>
																		</select>
																	</div>	
																</div>

															<div class="form-group has-info">
																	<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Escolha a caracteristicas do seu produto</label>
																	<div class="col-xs-12 col-sm-5">
																		<?php
																			$sql = "select * from tbl_caracteristicas ORDER BY nome_caracteristica ASC";
																			$select = mysql_query($sql);
																			while($rs = mysql_fetch_array($select)){
																		?>
																		<div class="checkbox">
																			<label>
																				<input class="ace ace-checkbox-2" type="checkbox" name="caracteristicas[]" value="<?php echo($rs['id_caracteristicas']);?>"/>
																				<span class="lbl"> <?php echo($rs['nome_caracteristica']);?></span>
																			</label>
																		</div>
																		<?php
																			}
																		?>
																	</div>	
																	
															</div>	
															
															<div class="form-group has-info">
																<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Descritivo do seu produto</label>
																<div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<textarea name="descricao_produto" class="form-control" rows="8" style="resize: none;width: 1000px;"></textarea>
																	</span>
																</div>
															</div>
															
														</div>

														<div class="step-pane" data-step="3">
															<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Imagem principal</label>
															
															<div class="form-group has-info">
																<div class="col-xs-12 col-sm-5">
																	<input multiple="" type="file" id="id-input-file-3" name="foto_principal"/>
																</div>
															</div>
														
															<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Logo da empresa</label>
															
															<div class="form-group has-info">
																<div class="col-xs-12 col-sm-5">
																	<input multiple="" type="file" id="id-input-file-1" name="logo"/>
																</div>
															</div>
														
														<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Imagens descritivas</label>
															
															<div class="form-group has-info">
																<div class="col-xs-12 col-sm-5">
																	<div class="panel panel-default">
																		<div class="panel-heading">
																			<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
																				<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

																				<i class="ace-icon fa fa-camera"></i>
																				&nbsp; Imagens
																			</a>
																		</div>

																		<div class="panel-collapse collapse" id="faq-1-1">
																			<div class="panel-body">
																				<div class="form-group">
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																					<div class="col-xs-12 col-sm-5">
																						<input multiple="" type="file" id="id-input-file-2" name="foto_destaque[]"/>
																					</div>
																					
																				</div>	
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="step-pane" data-step="4">
															<div class="center">
																<h3 class="green">Verifique ou cadastre com sucesso</h3>
																Seu produto irá passar por aprovação pelo nosso administrador!
															</div>
															
															<div class="clearfix form-actions">
																<div class="col-md-offset-3 col-md-9">
																	<input class="btn btn-info" type="submit" name="btn_produto" value="Cadastrar com sucesso">
																</div>
															</div>
															
														</div>
														
														
											
													</div>
												</form>
											</div>

											<hr />
											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Anterior
												</button>

												<button class="btn btn-success btn-next" data-last="Verificar">
													Próximo
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
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
							<span class="blue bolder">Parceiros TourDreams</span>
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

		
		<script src="assets/js/wizard.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery-additional-methods.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		
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
			
				$('[data-rel=tooltip]').tooltip();
			
				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				
				
				
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Obrigado! Suas informações foram salvas com sucesso!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					
				});
			
			
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})
			
			
			
	
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
				
				
				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
			
				
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
				});
			})
			
		</script>
		
		
		
		
		
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
					btn_choose:'Enviar',
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
					btn_choose: 'Foto Destaque da página Sobre',
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

