<?php

	session_start();

	include("conexao_banco.php");

	if(isset($_POST['btn_enviar_mensagem'])){
		$nome=$_POST['nome'];
		$celular=$_POST['celular'];
		$email=$_POST['email'];
		$observacao=$_POST['observacao'];

		$sql="insert into tbl_fale_conosco (nome, email, celular, observacao)";
		$sql =$sql."values('".$nome."' , '".$email."' , '".$celular."' , '".$observacao."')";

		mysql_query($sql);
		header('location:index.php');
	}

?>

<?php

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

<html class="no-js">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TourDreams | Fale Conosco</title>

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



		<?php      	
      	   include('header.php');
        ?>
		

        <?php      	
      	   include('menu.php');
        ?>



        <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="" id="contact1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-map-marker"></i> Endereço</h3>
                                    <p>
                                        Av. Luiz Carlos Berrini
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-phone"></i> Telefone</h3>
                                    <p>(11) 4222-2020</p>
                                </div>
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-envelope"></i> E-mail</h3>
                                    <p>tour_dreams@tour.com</p>
                                </div>
                            </div>
                            <hr>

                            <hr>
                            <h2>Contato</h2>
                            <form action="fale_conosco.php" name="frmfale" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control"  placeholder="Digite seu nome" name="nome">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control"  placeholder="Digite seu E-mail" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input type="text" class="form-control" placeholder="Digite seu celular" name="celular" onkeyup="mascaraCelular( this, mtel );"  onkeypress='return SomenteNumero(event)' maxlength="15">
                                        </div>
                                    </div>




                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Observação</label>
                                            <textarea  class="form-control" rows="8" placeholder="Sugestão/Criticas" name="observacao" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary" name="btn_enviar_mensagem"><i class="fa fa-envelope-o"></i> Enviar</button>
                                    </div>
                                </div>

                            </form>
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


        <script src="assets/js/gmaps.js"></script>
        <script src="assets/js/gmaps.init.js"></script>

        <script src="assets/js/main.js"></script>


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
