<?php

session_start();

include("conexao_banco.php");

if(isset($_POST['btnRegistrar_parceiro']))
{
  $empresa = $_POST['empresa'];
  $nome_parceiro = $_POST['nome_parceiro'];
  $cnpj = $_POST['cnpj'];
  $senha = $_POST['senha'];
  $gerente = $_POST['gerente'];
  $telefone = $_POST['telefone'];
  $celular = $_POST['celular'];
  $email = $_POST['email'];



  $sql="insert into tbl_parceiros(nome_empresa, nome_fantasia, cnpj, senha, nome_gerente, telefone, celular, email)";
  $sql=$sql."values('".$empresa."', '".$nome_parceiro."', '".$cnpj."', '".$senha."', '".$gerente."', '".$celular."', '".$telefone."', '".$email."')";
  mysql_query($sql);

	$id_parceiro=mysql_insert_id();

	$sql = "SELECT * FROM tbl_parceiros where id_parceiro='".$id_parceiro."'";
	$sqlResult = mysql_query($sql);

  if($consulta=mysql_fetch_array($sqlResult)){
		$id = $consulta['id_parceiro'];
		$nome_empresa = $consulta['nome_empresa'];
		header("location:Parceiro/cadastro_parceiro.php?nome_empresa=".$nome_empresa."&id_parceiro=".$id);
	}
}

 ?>

<?php


	if(isset($_POST['btn_logar_parceiro']))
	{
		$cnpj=$_POST['cnpj'];
		$senha=$_POST['senha'];


		include("conexao_banco.php");

		$sql = "SELECT * FROM tbl_parceiros where cnpj = '".$cnpj."' AND senha= '".$senha."'";
		$sqlResult = mysql_query($sql);

		if(mysql_num_rows ($sqlResult) > 0){
			$_SESSION['cnpj'] = $cnpj;
			$_SESSION['senha'] = $senha;

			if($consulta=mysql_fetch_array($sqlResult)){
				header("location:Parceiro/index.php");
			}

		}else{
			echo "<script type='text/javascript'>
			window.alert('Login ou Senha inválidos')
			</script>";
		}
	}
?>

<?php
		$cor = "#fff";
		$sql = "select * from tbl_cores";
		$select = mysql_query($sql);
		if($rsConsulta=mysql_fetch_array($select)){
			$cores=$rsConsulta['cores'];
		}
?>





<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TourDreams | Detalhes</title>


        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel='stylesheet' type='text/css'>


		
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/lightslider.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
		

		<style type="text/css">
			.header-connect{
				padding-top: 10px;
				background-color:<?php switch ($cores) {case "": echo $cor;break; default: echo $cores;break;}?>;
			}
			
			
			
			
		</style>
		
		
	
		
		<script type="text/javascript" src="jquery.js"></script>
		
		<script>
		
		function Nome(produto, cliente, nome){
             $("#form_reserva").submit(function(event){
				 
				 
                 event.preventDefault();
                 
                $.ajax({
                    type: "POST",
			        url: "quartos.php?id_produto=" + produto + "&id_cliente=" + cliente + "&nome_cliente=" + nome,
                    data: new FormData($("#form_reserva")[0]),
                    cache:false,
                    contentType:false,
                    processData:false,
                    async:true,
                    success: function(dados){
                         $('.reserva_disponivel').html(dados);
						
						var $doc = $('html, body');
						$doc.animate({
							//scrollTop: $( $.attr(this, 'href') ).offset().top
							scrollTop: $('#quartos').offset().top
							
						}, 1000);
						return false;
                        
                    }
                });
                 
             });
		}; 		
        </script>
	

    </head>
    <body>



        <?php      	
      	   include('header.php');
        ?>
		


       
        <?php      	
      	   include('menu.php');
        ?>



        <div class="content-area single-property" style="background-color: #FFF;">&nbsp;
            <div class="container">

            <div class="clearfix padding-top-40" >

                <div class="col-md-8 single-property-content prp-style-2">
                        <div class="">
                            <div class="row">
                                <div class="light-slide-item">
                                    <div class="clearfix">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
										<?php
										if (isset ($_GET['id_produto'])) {
												$id_produto = (int)$_GET['id_produto'];
												$sql = "select * from view_fotos_produtos where id_produto =".$id_produto;
												$select = mysql_query($sql);
												while($rs = mysql_fetch_array($select)){

										?>
											<?php echo "<li data-thumb='Parceiro/Arquivos/".$rs['foto_detalhes']."'>"?>
                                                <?php echo "<img src='Parceiro/Arquivos/".$rs['foto_detalhes']."'>"?>
                                            </li>
										<?php
											}
										}
										?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

						<div class="single-property-wrapper">
                            <div class="single-property-header">
                                <h1 class="property-title pull-left">Características</h1>
                            </div>

                            <div class="property-meta entry-meta clearfix ">

								<?php
								if (isset ($_GET['id_produto'])) {
									$id_produto = (int)$_GET['id_produto'];
									$sql = "select * from view_caracteristica where id_produto =".$id_produto;
									$select = mysql_query($sql);
									while($rs = mysql_fetch_array($select)){
								?>
                                <div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
                                    <span class="property-info-icon icon-garage">
                                        <i class="fa <?php echo($rs['foto_caracteristica']);?>"></i>
                                    </span>
                                    <span class="property-info-entry">
                                        <span class="property-info-label"><?php echo($rs['nome_caracteristica']);?></span>
                                    </span>
                                </div>
								<?php
									}
								}
								?>


                            </div>

                            <div class="single-property-wrapper">

                                <div class="section">
                                    <h4 class="s-property-title">Descrição</h4>
									<?php
									if (isset ($_GET['id_produto'])) {
										$id_produto = (int)$_GET['id_produto'];
										$sql = "select * from view_produto where id_produto =".$id_produto;
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
									?>
                                    <div class="s-property-content">
                                        <p><?php echo($rs['descricao_produto']);?></p>
                                    </div>
									<?php
										}
									}
									?>
                                </div>


                            </div>



                        </div>


						<section id="comments" class="comments wow fadeInRight animated">
                            <h4 class="text-uppercase wow fadeInLeft animated">Comentários</h4>

							<?php
							$sql_select_coment = "select * from view_coment where id_produto =".$_GET['id_produto'];
								$select_coment = mysql_query($sql_select_coment);
								while($rsconsulta = mysql_fetch_array($select_coment)){
									
							?>

                            <div class="row comment">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
										<?php echo "<img class = 'img-responsive img-circle' alt='' src='Foto_clientes/".$rsconsulta['foto_cliente']."'>";?>
										
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5 class="text-uppercase"><?php echo($rsconsulta['nome_cliente']);?></h5>
                                    <p class="posted"><i class="fa fa-clock-o"></i> <?php echo($rsconsulta['data']);?></p>
                                    <p><?php echo($rsconsulta['comentario']);?></p>
                                </div>
                            </div>
							
							<?php
								}
							?>



                            

                        </section>
						
						<div class="section additional-details">

                                <h4 class="s-property-title">Avaliações dos clientes</h4>

                                <ul class="additional-details-list clearfix">
									
									<?php
									$sql_select_avalaiacoes = "select quarto.id_produto,	
										AVG(ava.nota_limpeza) as limpeza,
												
										AVG (ava.nota_restaurante) as restaurante, 
												
										AVG(ava.nota_atendimento) as atendimento, 
												
										AVG(ava.nota_lazer) as lazer,
												
										AVG(((((ava.nota_limpeza + ava.nota_atendimento) + ava.nota_restaurante) + ava.nota_lazer) / 4)) AS media_geral
										from tbl_quartos as quarto
											
										inner join tbl_reserva as rs
											
										on rs.id_quarto = quarto.id_quarto
											
										inner join tbl_avaliacoes as ava
											
										on ava.id_reserva = rs.id_reserva where id_produto =".$_GET['id_produto'];
									$select_avaliacoes = mysql_query($sql_select_avalaiacoes);
									while($rsconsulta = mysql_fetch_array($select_avaliacoes)){
										

									?>
								
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Limpeza</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo number_format($rsconsulta['limpeza'], 1, ',', '.');?></span>
                                    </li>
									
									<li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Restaurante</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo number_format($rsconsulta['restaurante'], 1, ',', '.');?></span>
                                    </li>
									
									
									<li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Atendimento</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo number_format($rsconsulta['atendimento'], 1, ',', '.');?></span>
                                    </li>
									
									<li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Lazer</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo number_format($rsconsulta['lazer'], 1, ',', '.');?></span>
                                    </li>

									<?php
									 }
									?>
                                    
                                </ul>
                        </div> 

					
						<div class="reserva_disponivel" id="quartos">
						
						</div>
						
						
                    </div>
                </div>

				<div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right property-style2">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
									<?php
									if (isset ($_GET['id_produto'])) {
										$id_produto = (int)$_GET['id_produto'];
										$sql = "select * from view_produto where id_produto =".$id_produto;
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
											$preco_diaria=$rs['preco_diaria'];
									?>
                                        <div class="single-property-header">
                                            <h1 class="property-title"><?php echo($rs['nome_fantasia']);?></h1>
                                            <span class="property-price">R$ <?php echo number_format($preco_diaria, 2, ',', '');?></span>
                                        </div>
									<?php
										}
									}
									?>
                                    </div>
                                </div>
                            </div>

						
						<?php
						
						if(isset($_GET['id_cliente'])){
						
						$id_cliente = $_GET['id_cliente'];
						$id_produto = $_GET['id_produto'];
						$nome_cliente = "'".addslashes ($_GET['nome_cliente'])."'";


						
						if(isset($_POST['btn_verificar'])){
							$entrada = $_POST['entrada'];
							$saida = $_POST['saida'];
							$entrada_banco = implode("-",array_reverse(explode("/",$entrada)));	
							$saida_banco = implode("-",array_reverse(explode("/",$saida)));
							$sql_code_select_disponivel="select * from tbl_quartos where id_produto = '$id_produto'  and id_quarto not in(
							select id_quarto from tbl_reserva where('$entrada_banco' between dt_entrada and dt_saida) or ('$saida_banco' between dt_entrada and dt_saida)
							);";
							$select_result = mysql_query($sql_code_select_disponivel) or die (mysql_error());
							if(mysql_num_rows($select_result) > 0){
								echo "<script type='text/javascript'>
								location.hash='#quartos';
								</script>";
								
								
							}else{
								echo "<script type='text/javascript'>
								window.alert('Todos os quartos já foram alugados nessas datas')
								</script>";
							}
						}
						
						}
						
						?>

						<?php
								if(isset($_GET['id_cliente'])){
							
						?>
							
						
						<form method="post" id="form_reserva" action="">
							<div class="col-sm-6">
                                <div class="form-group">
									<i class="fa fa-calendar"></i>   <label>Entrada</label>
                                    <input type="date" class="form-control" name="entrada" required>
                                </div>
                            </div>


							<div class="col-sm-6">
                                <div class="form-group">
									<i class="fa fa-calendar"></i>   <label>Saída</label>
                                    <input type="date" class="form-control" name="saida" required>
                                </div>
                            </div>
							
							
							
							<div class="col-sm-12 text-center">
								<input type="submit" onclick="Nome(<?php echo $id_produto?>,<?php echo $id_cliente?>,<?php echo $nome_cliente?>)" class="btn btn-primary" name="btn_verificar" value="Verificar">
							</div>
						</form>
						
						<?php
							}else{
						?>

						<form method="post" action="registrar_user.php">
							<div class="col-sm-6">
                                <div class="form-group">
									<i class="fa fa-calendar"></i>   <label>Entrada</label>
                                    <input type="date" class="form-control" name="entrada">
                                </div>
                            </div>


							<div class="col-sm-6">
                                <div class="form-group">
									<i class="fa fa-calendar"></i>   <label>Saída</label>
                                    <input type="date" class="form-control" name="saida">
                                </div>
                            </div>
							
							
							
							<div class="col-sm-12 text-center">
								<input type="submit" class="btn btn-primary" value="Registrar"/>
							</div>
						</form>
						
						<?php
							}
						?>
						
						
                        </aside>
                </div>
				
				
			</div>
            </div>
        </div>

      
        <?php      	
      	   include('rodape.php');
        ?>
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/icheck.min.js"></script>
        <script src="assets/js/price-range.js"></script>
        <script type="text/javascript" src="assets/js/lightslider.min.js"></script>
        <script src="assets/js/main.js"></script>
		
		
		
		

	
		
		
        <script>
			$(document).ready(function () {

				$('#image-gallery').lightSlider({
					gallery: true,
					item: 1,
					thumbItem: 9,
					slideMargin: 0,
					speed: 500,
					auto: true,
					loop: true,
					onSliderLoad: function () {
						$('#image-gallery').removeClass('cS-hidden');
					}
				});
			});
        </script>

        <script>
      		function mascaraCelular(o,f){
      		v_obj=o
      		v_fun=f
      		setTimeout("execmascara()",1)
      		}
      		function execmascara(){
      			v_obj.value=v_fun(v_obj.value)
      		}
      		function mtel(v){
      			v=v.replace(/\D/g,"");
      			v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
      			v=v.replace(/(\d)(\d{4})$/,"$1-$2");
      			return v;
      		}

      		</script>

    </body>
</html>
