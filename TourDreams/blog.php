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
				header("location:Parceiro/index.php?nome_empresa=".$nome_empresa."&id_parceiro=".$id);
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
        <title>TourDreams | Conheça seu destino</title>


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
	
	
	
    </head>
    <body>


		<?php      	
      	   include('header.php');
        ?>
		



        <?php      	
      	   include('menu.php');
        ?>





			<section id="blog-section" >
			 <div class="container">
			   <div class="row">
				<div class="col-lg-8">
					<?php
						if(isset($_GET['id_cliente'])){
					?>
				
					<div class="row">
						<?php
							$sql="select * from view_blog2";							
							if(isset($_GET['btn_pesquisa_blog'])){
								$nome_estilo_produto=$_GET['btn_pesquisa_blog'];
								$sql = $sql . " where nome_estilo_produto LIKE '%$nome_estilo_produto%'";
							}
							$select = mysql_query($sql) or die (mysql_error());
							
							while($rs = mysql_fetch_array($select)){
							
						?>	
					
						<div class="col-lg-6 col-md-6">
						<aside>
							<a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto']?>&id_cliente=<?php echo $_GET['id_cliente']?>&nome_cliente=<?php echo $_GET['nome_cliente']?>"><?php echo "<img class = 'img-responsive' src='Arquivos_Conheca_Destino/".$rs['foto_blog']."'>"?></a>
							<div class="content-title">
							<div class="text-center">
							<h3><a href="#"><?php echo $rs['descricao_blog']?></a></h3>
							</div>
							</div>
							<div class="content-footer">
							<?php echo "<img class = 'user-small-img' src='Arquivos_Conheca_Destino/".$rs['foto_blog']."'>"?>
							<span style="font-size: 16px;color: #fff;"><?php echo $rs['nome_cliente']?></span>
							</div>
						</aside>
						
						</div>
						<?php
							}
						?>
					</div>
					
					<?php	
						}else{
						
					?>
					
					<div class="row">
						<?php
							$sql_blog="select * from view_blog2";							
							if(isset($_GET['btn_pesquisa_blog'])){
								$nome_estilo_produto=$_GET['btn_pesquisa_blog'];
								$sql_blog = $sql_blog . " where nome_estilo_produto LIKE '%$nome_estilo_produto%'";
							}
							
							
							
							$select = mysql_query($sql_blog) or die (mysql_error());
							
							while($rs = mysql_fetch_array($select)){
							
						?>	
					
						<div class="col-lg-6 col-md-6">
						<aside>
							<a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto']?>"><?php echo "<img class = 'img-responsive' src='Arquivos_Conheca_Destino/".$rs['foto_blog']."'>"?></a>
							<div class="content-title">
							<div class="text-center">
							<h3><a href="#"><?php echo $rs['descricao_blog']?></a></h3>
							</div>
							</div>
							<div class="content-footer">
							<?php echo "<img class = 'user-small-img' src='Foto_clientes/".$rs['foto_cliente']."'>"?>
							<span style="font-size: 16px;color: #fff;"><?php echo $rs['nome_cliente']?></span>
							</div>
						</aside>
						
						</div>
						<?php
							}
						?>
					</div>
					
					
					<?php	
						}
						
					?>
					
				</div>
				  
				  
				  


				  <?php
					if(isset($_GET['id_cliente'])){
				  ?>
				  
					<div class="col-lg-4">
						 <div class="widget-sidebar">
						  <h2 class="title-widget-sidebar">Filtrar</h2>

							<?php
								$id_cliente = $_GET['id_cliente'];
								$nome_cliente = $_GET['nome_cliente'];
							
								$sql = "select * from tbl_estilo_produto";
								$select = mysql_query($sql);
								while($rs = mysql_fetch_array($select)){
								
							?>
							<form method="get" action="blog.php?id=<?php echo($rs['id_estilo_produto'])?>&id_cliente=<?php echo $id_cliente?>&nome_cliente="<?php echo $nome_cliente?>>
								<button class="categories-btn" name="btn_pesquisa_blog" type="submit" value="<?php echo($rs['nome_estilo_produto']);?>"><?php echo($rs['nome_estilo_produto']);?></button>
							</form>
							<?php
								}
							?>
						 </div>
					</div>
					
					<?php
						}else{
					?>
					
					<div class="col-lg-4">
						 <div class="widget-sidebar">
						  <h2 class="title-widget-sidebar">Filtrar</h2>

							<?php
								$sql = "select * from tbl_estilo_produto";
								$select = mysql_query($sql);
								while($rs = mysql_fetch_array($select)){
								
							?>
							<form method="get" action="blog.php">
								<button class="categories-btn" name="btn_pesquisa_blog" type="submit" value="<?php echo($rs['nome_estilo_produto']);?>"><?php echo($rs['nome_estilo_produto']);?></button>
							</form>
							<?php
								}
							?>
						 </div>
					</div>
					
					<?php
						}
					?>
					
				   </div>
				 </div>

			</section>


			
        <?php      	
      	   include('rodape.php');
        ?>


	 <script src="js/jquery-3.1.1.js"></script>
	 <script src="js/bootstrap.js"></script>
	 <script>
         $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
         });





var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>

		

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
