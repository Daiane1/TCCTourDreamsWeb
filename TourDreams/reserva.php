,<?php
	
		session_start();
		
		include("conexao_banco.php");

		$cor = "#fff";
		$sql = "select * from tbl_cores";
		$select = mysql_query($sql);
		if($rsConsulta=mysql_fetch_array($select)){
			$cores=$rsConsulta['cores'];
		}
?>

	<?php

	$cpf_cliente="";
	$celular_cliente="";
	$email_cliente="";

	$id_quarto = $_GET['id_quarto'];
	$id_cliente = $_GET['id_cliente'];

	if(isset($_POST['btn_reserva_finalizada'])){
	  $responsavel = $_POST['responsavel'];
	  $entrada = $_POST['entrada'];
	  $saida = $_POST['saida'];
	  $qtd_criancas = $_POST['selectKids'];
	  $qtd_adulto = $_POST['selectAdultos'];

		
	  $entrada_banco = implode("-",array_reverse(explode("/",$entrada)));	
	  $saida_banco = implode("-",array_reverse(explode("/",$saida)));
	  $result = $_SESSION['dias'] * $_SESSION['preco_diaria'];
	 

	  $sql="insert into tbl_reserva(id_quarto, id_cliente, dt_entrada, dt_saida, nome_responsavel, id_adulto, id_crianca, valor_reserva,status_reserva)";
	  $sql=$sql."values(".$id_quarto.", ".$id_cliente.", '".$entrada_banco."', '".$saida_banco."', '".$responsavel."', ".$qtd_criancas.", ".$qtd_adulto.", '".$result."','Pendente')";
	  mysql_query($sql);
	  
	  
	  echo "<script type='text/javascript'>
	  window.alert('Reservado com sucesso')
	  </script>";
	  
	}

	 ?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TourDreams | Reserva</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link  rel='stylesheet' type='text/css'>



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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">

		<style type="text/css">
		.header-connect{
			padding-top: 10px;
			background-color:<?php switch ($cores) {case "": echo $cor;break; default: echo $cores;break;}?>;
		}
		</style>
		
		
		
		
    </head>
    <body>




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
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <?php      	
      	   include('menu.php');
        ?>

		



        <div class="content-area home-area-1 recent-property" style="background-color: #FFF; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="proerty-th">
							<ul class="thumbnails">
								<?php
								
								$diferenca = strtotime($_SESSION['saida']) - strtotime($_SESSION['entrada']);
								$dias = floor($diferenca / (60 * 60 * 24));
								
								$_SESSION['dias'] = $dias;
								
								
								$entrada=$_SESSION['entrada'];
								$saida=$_SESSION['saida'];
								
							
								
								if (isset ($_GET['id_quarto'])) {
										$sql = "select * from view_quartos where id_quarto =".$_GET['id_quarto']." group by id_quarto;";
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
											$preco_diaria=$rs['preco_diaria'];
											$_SESSION['preco_diaria'] = $preco_diaria;
											$id_quarto=$rs['id_quarto'];
								?>
								<div class="col-md-4">
									<div class="thumbnail" id="quartos">
										<?php echo "<img class= 'img-responsive' src='Parceiro/Arquivos/".$rs['foto_quarto']."'>"?>
										<div class="caption">
											<h4><?php echo($rs['descricao_quarto']);?></h4>
										<div class="property-meta entry-meta clearfix ">
											<?php
												$sql = "select * from view_carac_quartos where id_quarto =".$_GET['id_quarto'];
												$select = mysql_query($sql);
												while($rs_consulta = mysql_fetch_array($select)){
											?>
											<div class="col-xs-3 col-sm-3 col-md-3 p-b-15">
												<span class="property-info-icon icon-garage">
													<i class="fa <?php echo($rs_consulta['foto_caracteristica_quarto']);?>"></i>
												</span>
												<span class="property-info-entry">
													<span class="property-info-label"><?php echo($rs_consulta['caracteristica_quarto']);?></span>
												</span>
											</div>
											<?php
												}
											?>
										</div>
											<h4 align="center">R$ <?php echo number_format($preco_diaria, 2, ',', '');?></h4>
											
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
							</ul>
						

						<div class="col-md-6">
							<div class="box-for overflow">
								<div class="col-md-12 col-xs-12 login-blocks">
									<h2>Reserva</h2>
									
									<?php
										$select_reserva="select * from tbl_cliente where id_cliente=".$_GET['id_cliente'];
										$select_code_result_reserva = mysql_query($select_reserva);
										if($rsConsulta=mysql_fetch_array($select_code_result_reserva)){
											$cpf_cliente=$rsConsulta['cpf_cliente'];
											$email_cliente=$rsConsulta['email_cliente'];
											$celular_cliente=$rsConsulta['celular_cliente'];
										}
										
									
									?>
									
									<form action="" method="post">
										<div class="form-group">
											<label>Responsável pela reserva</label>
											<input type="text" class="form-control" placeholder="Obs: Cliente que fará o pagamento no hotel/resort/pousada" name="responsavel">
										</div>
										<div class="form-group">
											<label>Data de Entrada</label>
											<input id="entrada" type="text" class="form-control" name="entrada" value="<?php echo date('d/m/Y', strtotime($entrada));?>" readonly>
										</div>
										<div class="form-group">
											<label>Data de Saída</label>
											<input id="saida"  type="text"  class="form-control" name="saida" value="<?php echo date('d/m/Y', strtotime($saida));?>" readonly>
										</div>
										<div class="form-group">
											<label>CPF</label>
											<input type="text" class="form-control" name="cpf"  placeholder="Digite seu cpf" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' onkeypress='return SomenteNumero(event)' maxlength="14" value="<?php echo $cpf_cliente?>" readonly>
										</div>
										<div class="form-group">
											<label>Celular</label>
											<input type="text" class="form-control" placeholder="Digite seu celular" name="celular" onkeyup="mascaraCelular( this, mtel );"  onkeypress='return SomenteNumero(event)' maxlength="15" value="<?php echo $celular_cliente?>" readonly>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" placeholder="Digite seu email" name="email" value="<?php echo $email_cliente?>" readonly>
										</div>
										<div class="form-group">
											<label>Adultos</label>
											<select name = "selectAdultos" id="basic" class="selectpicker show-tick form-control">
												<?php
												$sql = "select * from tbl_qtdadultos where id_adulto > 0";
										
												if($qtd_adulto != ''){
													$sql = $sql . " and id_adulto !=".$id_adulto;
													?>
													<option value="<?php echo($id_adulto);?>"><?php echo($qtd_adulto);?></option>		
												<?php }?>
												
												
												<?php
													$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
												?>
													<option value="<?php echo($rs['id_adulto']);?>"><?php echo($rs['qtd_adulto']);?></option>														
												<?php
													}
												?>
													
											</select>
										</div>
										<div class="form-group">
											<label>Crianças</label>
											<select name = "selectKids" id="basic" class="selectpicker show-tick form-control">
												<?php
												$sql = "select * from tbl_qtdcriancas where id_crianca > 0";
										
												if($qtd_criancas != ''){
													$sql = $sql . " and id_crianca !=".$id_crianca;
													?>
													<option value="<?php echo($id_crianca);?>"><?php echo($qtd_criancas);?></option>		
												<?php }?>
												
												
												<?php
													$select = mysql_query($sql);
													while($rs = mysql_fetch_array($select)){
												?>
													<option value="<?php echo($rs['id_crianca']);?>"><?php echo($rs['qtd_criancas']);?></option>														
												<?php
													}
												?>
													
											</select>
										</div>

										<div class="text-center">
											<button type="submit" class="btn btn-default" name="btn_reserva_finalizada"> Reservar</button>
										</div>
									</form>
									<br>
								</div>

							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>












        
        <?php      	
      	   include('rodape.php');
        ?>

        <script src="assets/js/modernizr-2.6.2.min.js"></script>

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

        <script src="assets/js/main.js"></script>

    </body>

	<script>

		$('.vote label i.fa').on('click mouseover',function(){
		// remove classe ativa de todas as estrelas
		$('.vote label i.fa').removeClass('active');
		// pegar o valor do input da estrela clicada
		var val = $(this).prev('input').val();
		//percorrer todas as estrelas
		$('.vote label i.fa').each(function(){
			/* checar de o valor clicado é menor ou igual do input atual
			*  se sim, adicionar classe active
			*/
			var $input = $(this).prev('input');
			if($input.val() <= val){
				$(this).addClass('active');
			}
		});
		$("#voto").html(val); // somente para teste
	});
	//Ao sair da div vote
	$('.vote').mouseleave(function(){
		//pegar o valor clicado
		var val = $(this).find('input:checked').val();
		//se nenhum foi clicado remover classe de todos
		if(val == undefined ){
			$('.vote label i.fa').removeClass('active');
		} else {
			//percorrer todas as estrelas
			$('.vote label i.fa').each(function(){
				/* Testar o input atual do laço com o valor clicado
				*  se maior, remover classe, senão adicionar classe
				*/
				var $input = $(this).prev('input');
				if($input.val() > val){
					$(this).removeClass('active');
				} else {
					$(this).addClass('active');
				}
			});
		}
	});


	</script>



	<script>
			function mascaraMutuario(o,f){
				v_obj=o
				v_fun=f
				setTimeout('execmascara()',1)
			}

			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}

			function cpfCnpj(v){

				//Remove tudo o que não é dígito
				v=v.replace(/\D/g,"")

				if (v.length <= 14) { //CPF

					//Coloca um ponto entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d)/,"$1.$2")

					//Coloca um ponto entre o terceiro e o quarto dígitos
					//de novo (para o segundo bloco de números)
					v=v.replace(/(\d{3})(\d)/,"$1.$2")

					//Coloca um hífen entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

				} else { //CNPJ

					//Coloca ponto entre o segundo e o terceiro dígitos
					v=v.replace(/^(\d{2})(\d)/,"$1.$2")

					//Coloca ponto entre o quinto e o sexto dígitos
					v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")

					//Coloca uma barra entre o oitavo e o nono dígitos
					v=v.replace(/\.(\d{3})(\d)/,".$1/$2")

					//Coloca um hífen depois do bloco de quatro dígitos
					v=v.replace(/(\d{4})(\d)/,"$1-$2")

				}

				return v

			}
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


		<script>
		 function somenteNumeros(num) {
			var er = /[^0-9.]/;
			er.lastIndex = 0;
			var campo = num;
			if (er.test(campo.value)) {
			  campo.value = "";
			}
		}
	</script>


</html>
