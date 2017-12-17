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
				$id = $consulta['id_parceiro'];
				$nome_empresa = $consulta['nome_empresa'];
				header("location:Parceiro/index_parceiro.php?nome_empresa=".$nome_empresa."&id_parceiro=".$id);
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
        <title>TourDreams | Home</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link  rel='stylesheet' type='text/css'>

		
		<link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">
		
	
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


		



        <?php      	
      	   include('header.php');
        ?>
		


        <?php      	
      	   include('menu.php');
        ?>


        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
				<?php
					$sql = "select * from tbl_slide where aprovacao ='1'";
					$select = mysql_query($sql);
					while($rs = mysql_fetch_array($select)){
					?>
                    <div class="item"> <?php echo "<img src='CMS/Fotos_Slides/".$rs['imagem_slide']."'>"?></div>
                    <?php
						}
					?>
                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <img src="assets/img/2.png" alt="">
                        <div class="search-form wow pulse" data-wow-delay="0.8s">
							<?php
								if(isset($_GET['btn_pesquisar'])){
									$estado= $_GET['estado'];
									$cidade=$_GET['cidade'];
									$selectHospedagem=$_GET['selectHospedagem'];
									$selectViagem=$_GET['selectViagem'];
								}
							?>
							<form method="get" action="melhores_destinos.php" name="pesquisar" class=" form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Estado" name="estado">
                                </div>

								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cidade" name="cidade">
                                </div>

                                <div class="form-group">
									<select id="basic" class="selectpicker show-tick form-control" name="selectHospedagem">
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

								<div class="form-group">
									<select id="basic" class="selectpicker show-tick form-control" name="selectViagem">
										<?php
										$sql = "select * from tbl_tipo_viagem where id_tipo_viagem > 0 ORDER BY id_tipo_viagem DESC";

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
									<button class="btn search-btn" type="submit" name="btn_pesquisar"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>















        <!-- Footer area-->

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
