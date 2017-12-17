<?php
	include("conexao_banco.php");
	if(isset($_GET['id_cliente'])){
?>


<nav class="navbar navbar-default ">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>"><img src="assets/img/logo.png" alt=""></a>
        </div>


        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                <a class="" href="perfil.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Meu Perfil</button></a>
				<a class="" href="index.php"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Logout</button></a>
			</div>
            <ul class="main-nav nav navbar-nav navbar-right">
			<li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="index.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Home</a></li>
            </li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="melhores_destinos.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Destinos</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="blog.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Blog</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="fale_conosco.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Fale Conosco</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="sobre.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Sobre</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="promocao.php?id_cliente=<?php echo$_GET['id_cliente'];?>&nome_cliente=<?php echo$_GET['nome_cliente'];?>">Promoções</a></li>
            </ul>
        </div>
    </div>
</nav>
	

<?php
	}else{
?>


<nav class="navbar navbar-default ">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>
        </div>


        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                <a class="" href="registrar_user.php"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Cliente</button></a>
  </div>
  <div class="button navbar-right" data-toggle="modal" data-target="#at-login">
                <a class="" href="#"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Parceiro</button></a>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
    <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="index.php">Home</a></li>
                </li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="melhores_destinos.php">Destinos</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="blog.php">Blog</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="fale_conosco.php">Fale Conosco</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="sobre.php">Sobre</a></li>
    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="promocao.php">Promoções</a></li>
            </ul>
        </div>
    </div>
</nav>
			<section class="at-login-form">
				<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
							<div class="modal-body">
										<div class="signup-or-separator">
											<span class="h6 signup-or-separator--text">Entrar</span>
											<hr>
										</div>
										<form  method="post" action="index.php">
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputEmaillog" placeholder="CNPJ" required maxlength="14" name="cnpj">
											</div>
											<div class="form-group">
												<input type="password" class="form-control-form " id="exampleInputPasswordpas" placeholder="Senha" required name="senha"> 
											</div>
											<button type="submit" class="btn-lgin" name="btn_logar_parceiro">Já sou parceiro</button>
										</form>
							</div>
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-6">
												<p class="ta-l"> Ainda não é parceiro ?</p>
											</div>	
											<div class="col-md-4 col-md-offset-2">	
												<button class="btn-gst"  data-toggle="modal"  data-dismiss="modal" data-target="#at-signup" >Ser parceiro </button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="at-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="signup-or-separator">
											<span class="h6 signup-or-separator--text">Ser Parceiro</span>
											<hr>
										</div>
										<form method="post" action="index.php">
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputEmaillog" placeholder="CNPJ" maxlength="14" name="cnpj" required>
											</div>
											<div class="form-group">
												<input type="password" class="form-control-form " id="exampleInputPasswordpas" placeholder="Senha" name="senha" required> 
											</div>
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputPasswordpas" placeholder="Nome Empresa" name="empresa" required> 
											</div>
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputPasswordpas" placeholder="Nome Fantasia" name="nome_parceiro" required> 
											</div>
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputPasswordpas" placeholder="Gerente da hospedagem" name="gerente" required> 
											</div>
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputPasswordpas" placeholder="Celular do Gerente" name="celular" required onkeyup="mascaraCelular( this, mtel );" maxlength="15"> 
											</div>
											<div class="form-group">
												<input type="text" class="form-control-form " id="exampleInputPasswordpas" placeholder="Telefone da empresa" name="telefone" onkeyup="mascaraCelular( this, mtel );" maxlength="14"> 
											</div>
											<div class="form-group">
												<input type="email" class="form-control-form " id="exampleInputPasswordpas" placeholder="Email da empresa" name="email" required> 
											</div>
											<button type="submit" class="btn-lgin" name="btnRegistrar_parceiro">Ser parceiro</button>
										</form>
									</div>
											<div class="modal-footer">
												<div class="row">	
													<div class="col-md-6">
														<p class="ta-l">Já é nosso parceiro? </p>
													</div>	
													<div class="col-md-4 col-md-offset-2">	
														<button class="btn-gst"  data-toggle="modal"  data-dismiss="modal" data-target="#at-login">Entrar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
						</div>
														
								
			</section>
<?php
	}
?>