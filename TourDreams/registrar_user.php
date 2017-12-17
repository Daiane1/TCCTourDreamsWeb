<?php

session_start();

include("conexao_banco.php");



if(isset($_POST['btnRegistrar'])){


  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $senha = $_POST['senha'];
  $dt_nasc = $_POST['dt_nasc'];

  $dt_nasc = explode("/", $dt_nasc);

	$dia = $dt_nasc[0];
	$mes = $dt_nasc[1];
	$ano = $dt_nasc[2];

	$dt_banco = $ano."-".$mes."-".$dia;
	
	
	
	
	$extensao = strtolower(substr($_FILES['file']['name'], -4));
	$file = md5(time()).$extensao;
	$diretorio = "Foto_clientes/";
	move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$file);


	  $sql="insert into tbl_cliente(nome_cliente, email_cliente, celular_cliente, cpf_cliente, rg_cliente, senha_cliente, foto_cliente, dt_nasc)";
	  $sql=$sql."values('".$nome."', '".$email."', '".$celular."', '".$cpf."', '".$rg."', '".$senha."', '".$file."', '".$dt_banco."')";

	  mysql_query($sql);

  

   $id_cliente=mysql_insert_id();

   $sql_entrar = "SELECT * FROM tbl_cliente where id_cliente='".$id_cliente."'";
   $sqlResult = mysql_query($sql_entrar);
   
    if($consulta=mysql_fetch_array($sqlResult)){
		$id_cliente = $consulta['id_cliente'];
		$nome_cliente = $consulta['nome_cliente'];
		header("location:index.php?id_cliente=".$id_cliente."&nome_cliente=".$nome_cliente);
	}else{
		echo "<script type='text/javascript'>
			window.alert('Erro no cadastro, tente novamente')
		</script>";
	}


}



 ?>




<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TourDreams | Cadastro User</title>

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
        <script type="text/javascript">

        function mascaraData( campo, e )
          {
          	var kC = (document.all) ? event.keyCode : e.keyCode;
          	var data = campo.value;

          	if( kC!=8 && kC!=46 )
          	{
          		if( data.length==2 )
          		{
          			campo.value = data += '/';
          		}
          		else if( data.length==5 )
          		{
          			campo.value = data += '/';
          		}
          		else
          			campo.value = data;
          	}
          }
        </script>

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
		
		


			<div class="content-area user-profiel" style="background-color: #FFF;">&nbsp;
				<div class="container">   
					<div class="row">
							<div class="col-sm-10 col-sm-offset-1 profiel-container">

								<form action="registrar_user.php" method="post" enctype="multipart/form-data">
										<div class="profiel-header">
											<h3>
												<b>Vem ser nosso cliente <br></b>
												<small>O melhor portal de viagens para você.</small>
											</h3>
											<hr>
										</div>

										<div class="clear">
											<div class="col-sm-3 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="" class="picture-src" id="wizardPicturePreview" title=""/>
														<input type="file" id="wizard-picture">
													</div>
													<h6>Foto Cliente</h6>
												</div>
											</div>

											<div class="col-sm-3 padding-top-25">

												<div class="form-group">
													<label>Nome Completo <small></small></label>
													<input name="nome" type="text" class="form-control" required>
												</div>
												 
												<div class="form-group">
													<label>Email <small></small></label>
													<input name="email" type="email" class="form-control" required>
												</div> 
												<div class="form-group">
													<label>Data de nascimento <small></small></label>
													<input name="dt_nasc" type="text" class="form-control" required onkeypress="mascaraData( this, event )" maxlength="10" >
												</div>
											</div>
											<div class="col-sm-3 padding-top-25">
												<div class="form-group">
													<label>Celular <small></small></label>
													<input name="celular" type="text" class="form-control" required onkeyup="mascaraCelular( this, mtel );"  onkeypress='return SomenteNumero(event)' maxlength="15">
												</div>
												<div class="form-group">
													<label>Senha<small></small></label>
													<input type="password" class="form-control" name="senha">
												</div>
												
											</div>
											
											
											
										</div>

									<div class="clear">
											<br>
											<hr>
											<br>
											<div class="col-sm-5 col-sm-offset-1">
												<div class="form-group">
													<label>CPF :</label>
													<input name="cpf" type="text" class="form-control" onblur='clearTimeout()' onkeypress='return SomenteNumero(event)' maxlength="11">
												</div>
											</div>  

											<div class="col-sm-5">
												<div class="form-group">
													<label>RG</label>
													<input name="rg" type="text" class="form-control" onkeypress='return SomenteNumero(event)' maxlength="9" >
												</div>
										</div>
								
										<div class="col-sm-5 col-sm-offset-1">
											<br>
											<input type="submit" class='btn btn-finish btn-primary' name="btnRegistrar" value="Cadastar" />
										</div>
										<br>
									</div>
								</form>

								
							</div><!-- end row -->

					</div>
				</div>
			</div>
        
        <?php      	
      	   include('rodape.php');
        ?>


         <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="assets/js//jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/icheck.min.js"></script>

        <script src="assets/js/price-range.js"></script> 
        <script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/wizard.js"></script>

        <script src="assets/js/main.js"></script>




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


    </body>
</html>
