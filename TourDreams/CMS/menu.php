
<?php 
	$nivel = $_GET['id_nivel_usuario'];	
	if($nivel == 1){		
?>
	
	
	<ul class="nav nav-list">
		<li class="active">
			<a href="home.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Home </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admSobre.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-building"></i>
				<span class="menu-text">  Sobre TourDreams </span>

			</a>

			<b class="arrow"></b>

		</li>
		
		
		<li class="">
			<a href="admMilhas.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-binoculars"></i>
				<span class="menu-text"> Milhas </span>

			</a>

			<b class="arrow"></b>

		</li>

		<li class="">
			<a href="admFale.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-comments-o"></i>
				<span class="menu-text"> Fale Conosco </span>
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="admUser.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Cadastro </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admBrindes.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-shopping-basket"></i>
				<span class="menu-text"> Brindes </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admPromocoes.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-tag"></i>
				<span class="menu-text"> Promoções </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="parceiros.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-bed"></i>
				<span class="menu-text"> Parceiros </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admCaracteristicas.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-copyright"></i>
				<span class="menu-text"> Características </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admSlide.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text"> Slider </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="estilo_viagem.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-paper-plane"></i>
				<span class="menu-text"> Estilos Viagens </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="hospedagens.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-building-o"></i>
				<span class="menu-text"> Hospedagens </span>
			</a>

			<b class="arrow"></b>
		</li>
		
	
		
	</ul>
	
<?php } ?>
		
<?php if($nivel == 2) {		
?>
	<ul class="nav nav-list">
		<li class="">
			<a href="admSobre.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-building"></i>
				<span class="menu-text">  Sobre TourDreams </span>

			</a>

			<b class="arrow"></b>

		</li>
		
		
		<li class="">
			<a href="admBrindes.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-shopping-basket"></i>
				<span class="menu-text"> Brindes </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admPromocoes.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-tag"></i>
				<span class="menu-text"> Promoções </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admCaracteristicas.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-copyright"></i>
				<span class="menu-text"> Características </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="admSlide.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text"> Slider </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		
		<li class="">
			<a href="cores.php?nome_administrador=<?php echo$_GET['nome_administrador'];?>&id_administrador=<?php echo$_GET['id_administrador'];?>&id_nivel_usuario=<?php echo($nivel);?>">
				<i class="menu-icon fa fa-paint-brush"></i>
				<span class="menu-text"> Cores </span>
			</a>

			<b class="arrow"></b>
		</li>
	

	</ul>
		
		
<?php } ?>




