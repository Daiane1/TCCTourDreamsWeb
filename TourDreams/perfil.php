<?php

session_start();

 include("conexao_banco.php");
 
$id_cliente=$_GET['id_cliente'];
$nome_cliente=$_GET['nome_cliente'];

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
        <title>TourDreams | Meu Perfil</title>

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

	
	<script type="text/javascript" src="jquery.js"></script>
	
	<script>
	function Modal(id_reserva,id_cliente,nome_cliente){
		$.ajax({
			type: "GET",
			url: "comentar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {},
			cache:false,
            contentType:false,
            processData:false,
            async:true,
			success: function(dados){
				$('.comentar_reserva').html(dados);
			}
		});
	}
	
	function Comentar(id_reserva,id_cliente,nome_cliente){
		$.ajax({
			type: "POST",
			url: "comentar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {comentario: $("#comentario").val()},
			success: function(dados){
				$('.comentar_reserva').html(dados);
				
				alert("Comentado com sucesso");
			}
		});
		
	}
	
	
	function Avaliacao(id_reserva,id_cliente,nome_cliente){
		
		
		var av0 =  $('input[name=avaliar]:checked').val();
		var av1 =  $('input[name=avaliar1]:checked').val();
		var av2 =  $('input[name=avaliar2]:checked').val();
		var av3 =  $('input[name=avaliar3]:checked').val();
		
		$.ajax({
			type: "POST",
			url: "avaliar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {avaliar: av0,   avaliar1: av1,  avaliar2: av2,  avaliar3: av3},
			success: function(dados_avaliar){
				$('.comentar_reserva').html(dados_avaliar);
				
				alert("Avaliacão feita com sucesso");
				
			}
		});
		
	}
	
	
	function Modal_Avaliar(id_reserva,id_cliente,nome_cliente){
		$.ajax({
			type: "GET",
			url: "avaliar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {},
			cache:false,
            contentType:false,
            processData:false,
            async:true,
			success: function(dados){
				$('.comentar_reserva').html(dados);
			}
		});
	}
	
	
	function Modal_Postar(id_reserva,id_cliente,nome_cliente){
		$.ajax({
			type: "GET",
			url: "postar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {},
			cache:false,
            contentType:false,
            processData:false,
            async:true,
			success: function(dados){
				$('.postar_reserva').html(dados);
			}
		});
	}
	
	function Postar(id_reserva,id_cliente,nome_cliente){
		$.ajax({
			type: "POST",
			url: "postar.php?id_cliente=" + id_cliente + "&nome_cliente=" + nome_cliente +  "&id_reserva=" + id_reserva,
			data: {coment: $("#coment").val(), file_foto:$("#file_foto").val()},
			success: function(dados){
				$('.postar_reserva').html(dados);
				
				alert("Postado com sucesso");
			}
		});
		
	}
	
	
	</script>
	
	
    </head>
    <body>






        <?php      	
      	   include('header.php');
        ?>
		


       
        <?php      	
      	   include('menu.php');
        ?>

        <hr>
				<div class="container bootstrap snippet">
				
			
				
					<div class="row">
					</div>
					<div class="row">
						<div class="col-sm-3"><!--left col-->

						<ul class="list-group">
							<li class="list-group-item text-muted">Informações Pessoais</li>
							<?php
								if (isset ($_GET['id_cliente'])) {
								$id_cliente = (int)$_GET['id_cliente'];
								$sql = "select * from tbl_cliente where id_cliente=".$id_cliente;
								$select = mysql_query($sql);
								while($rs = mysql_fetch_array($select)){
							?>
							<li class="list-group-item text-right"><span class="pull-left"><strong>Nome</strong></span> <?php echo $rs['nome_cliente'];?></li>
							<li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span> <?php echo $rs['email_cliente'];?></li>
							<li class="list-group-item text-right"><span class="pull-left"><strong>RG</strong></span> <?php echo $rs['rg_cliente'];?></li>
							<li class="list-group-item text-right"><span class="pull-left"><strong>CPF</strong></span> <?php echo $rs['cpf_cliente'];?></li>
							<li class="list-group-item text-right"><span class="pull-left"><strong>Celular</strong></span> <?php echo $rs['celular_cliente'];?></li>
							<?php
								}
							}
							?>
						</ul>
						</div><!--/col-3-->
						<div class="col-sm-9">

						  <ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#home" data-toggle="tab">Reservas Finalizadas</a></li>
							<li><a href="#messages" data-toggle="tab">Acompanhamento da Reserva</a></li>
							<li><a href="#postar" data-toggle="tab">Viagens em andamento</a></li>
						  </ul>

						  <div class="tab-content">
							<div class="tab-pane active" id="home">
							  <div class="table-responsive">
								<table class="table table-hover">
								  <thead>
									<tr>
									  <th>Data Finalizada</th>
									  <th>Milhas Ganhas</th> 
									  <th>Local</th>
									  <th>Empresa Parceira</th>
									  <th>Comentar</th>
									  <th>Avaliar</th>
									</tr>
								  </thead>
									<tbody id="items">
									<?php
										$id_cliente=$_GET['id_cliente'];
										$nome_cliente = "'".addslashes ($_GET['nome_cliente'])."'";
									
										$sql = "select * from view_reserva_cliente where(dt_saida < now()) and id_cliente=".$_GET['id_cliente'];
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
											$dt_saida=$rs['dt_saida'];
											$dt_nasc_sem_hora_saida = substr($dt_saida, 0,10);
											$dt_nasc_sem_hora_saida = explode("-", $dt_saida );
										
											$dia_saida = $dt_nasc_sem_hora_saida[2]; 
											$mes_saida = $dt_nasc_sem_hora_saida[1];	
											$ano_saida = $dt_nasc_sem_hora_saida[0];
									
											$dt_nasc_volta_saida = $dia_saida."/".$mes_saida."/".$ano_saida;
										?>
										<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">
										  <td><?php echo $dt_nasc_volta_saida?></td>
										  <td><?php echo $rs['qtd_milhas'];?></td>
										  <td><?php echo $rs['logradouro'];?>, <?php echo $rs['numero'];?> </td>
										  <td><?php echo $rs['nome_fantasia'];?></td>
										  
										  <td><button type="button" class="btn btn-default btn-xs" onclick="Modal(<?php echo($rs["id_reserva"])?>,<?php echo $id_cliente?>,<?php echo $nome_cliente?>)"><span class="glyphicon glyphicon-plus"></span></button></td>
										  <td><button type="button" class="btn btn-default btn-xs" onclick="Modal_Avaliar(<?php echo($rs["id_reserva"])?>,<?php echo $id_cliente?>,<?php echo $nome_cliente?>)"><span class="glyphicon glyphicon-plus"></span></button></td>
										
										<?php
											}
										?>
										</tr>
										
						<tr>		</tbody>
							
							<td colspan="12" class="hiddenRow">
							
								<div class="comentar_reserva">
									
								</div>
							
							</td>
							
							
							
							
							
						</tr>



									  </tbody>

								</table>
								<hr>
							   <div class="row">
								  <div class="col-md-6 col-md-offset-4 text-center">
									<ul class="pagination" id="myPager"></ul>
								  </div>
								</div>
							  </div><!--/table-resp-->


							  <hr>

							 </div><!--/tab-pane-->
							 <div class="tab-pane" id="messages">

							   <h2></h2>

							  <div class="table-responsive">
								<table class="table table-hover">
								  <thead>
									<tr>
									  <th>Data Entrada</th>
									  <th>Data Saída</th>
									  <th>Empresa Parceira</th>
									  <th>Local</th>
									  <th>Preço reserva</th>
									  <th>Status</th>
									</tr>
								  </thead>
								  <tbody id="items">
									<?php
										$sql = "select * from view_reserva_cliente where id_cliente=".$_GET['id_cliente'];
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
											$preco_diaria=$rs['valor_reserva'];
											$dt_entrada=$rs['dt_entrada'];
											$dt_saida=$rs['dt_saida'];
											$dt_nasc_sem_hora_entrada = substr($dt_entrada, 0,10);
											$dt_nasc_sem_hora_saida = substr($dt_saida, 0,10);
											
											$dt_nasc_sem_hora_entrada = explode("-", $dt_entrada );
											$dt_nasc_sem_hora_saida = explode("-", $dt_saida );
											
											$dia = $dt_nasc_sem_hora_entrada[2]; 
											$mes = $dt_nasc_sem_hora_entrada[1];	
											$ano = $dt_nasc_sem_hora_entrada[0];
											
											$dia_saida = $dt_nasc_sem_hora_saida[2]; 
											$mes_saida = $dt_nasc_sem_hora_saida[1];	
											$ano_saida = $dt_nasc_sem_hora_saida[0];
										
										
											$dt_nasc_volta_entrada = $dia."/".$mes."/".$ano;
											$dt_nasc_volta_saida = $dia_saida."/".$mes_saida."/".$ano_saida;
										?>
									<tr>
										
										<td><?php echo $dt_nasc_volta_entrada?></td>
										<td><?php echo $dt_nasc_volta_saida?></td>
										<td><?php echo $rs['nome_fantasia'];?></td>
										<td><?php echo $rs['logradouro'];?>, <?php echo $rs['numero'];?> </td>
										<td>R$ <?php echo number_format($preco_diaria, 2, ',', '');?></td>
										<td><?php echo $rs['status_reserva'];?></td>
										<?php
											}
										?>
									</tr>
								  </tbody>
								</table>
								</div>

							 </div><!--/tab-pane-->
							 
							 
							 <div class="tab-pane" id="postar">

							   <h2></h2>

							  <div class="table-responsive">
								<table class="table table-hover">
								  <thead>
									<tr>
									  <th>Data Entrada</th>
									  <th>Data Saída</th>
									  <th>Empresa Parceira</th>
									  <th>Postar</th>
									</tr>
								  </thead>
								  <tbody id="items">
									<?php
										$sql = "select * from view_reserva_cliente where (now() between dt_entrada and dt_saida) or (now() between dt_entrada and dt_saida) and id_cliente=".$_GET['id_cliente']." and status_reserva='Aprovada'";
										$select = mysql_query($sql);
										while($rs = mysql_fetch_array($select)){
											$preco_diaria=$rs['valor_reserva'];
											$dt_entrada=$rs['dt_entrada'];
											$dt_saida=$rs['dt_saida'];
											$dt_nasc_sem_hora_entrada = substr($dt_entrada, 0,10);
											$dt_nasc_sem_hora_saida = substr($dt_saida, 0,10);
											
											$dt_nasc_sem_hora_entrada = explode("-", $dt_entrada );
											$dt_nasc_sem_hora_saida = explode("-", $dt_saida );
											
											$dia = $dt_nasc_sem_hora_entrada[2]; 
											$mes = $dt_nasc_sem_hora_entrada[1];	
											$ano = $dt_nasc_sem_hora_entrada[0];
											
											$dia_saida = $dt_nasc_sem_hora_saida[2]; 
											$mes_saida = $dt_nasc_sem_hora_saida[1];	
											$ano_saida = $dt_nasc_sem_hora_saida[0];
										
										
											$dt_nasc_volta_entrada = $dia."/".$mes."/".$ano;
											$dt_nasc_volta_saida = $dia_saida."/".$mes_saida."/".$ano_saida;
										?>
									<tr>
										
										<td><?php echo $dt_nasc_volta_entrada?></td>
										<td><?php echo $dt_nasc_volta_saida?></td>
										<td><?php echo $rs['nome_fantasia'];?></td>
										<td><button type="button" class="btn btn-default btn-xs" onclick="Modal_Postar(<?php echo($rs["id_reserva"])?>,<?php echo $id_cliente?>,<?php echo $nome_cliente?>)"><span class="glyphicon glyphicon-plus"></span></button></td>
										<?php
											}
										?>
									</tr>
								  </tbody>
								  
									<td colspan="12" class="hiddenRow">
							
										<div class="postar_reserva">
											
										</div>
							
									</td>
								  
								</table>
								</div>

							 </div><!--/tab-pane-->
							 
							 
							 
							  </div><!--/tab-pane-->
						  </div><!--/tab-content-->						
					</div><!--/col-9-->
				</div><!--/row-->
                               </hr>
				

		<div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">
                <div class="row">
				
				<div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <h2>Seus Locais Visitados</h2>
                    <p>"Encontre, Conheça, Reserve e Curta a sua viagem em nosso Portal de Viagens"</p>
				</div>
				
				
            <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">

						<?php
						$sql = "select * from view_reserva_cliente where id_cliente =".$_GET['id_cliente'];
						$select = mysql_query($sql) or die (mysql_error());
						while($rs = mysql_fetch_array($select)){
							$preco_diaria=$rs['valor_reserva'];
						?>
                            <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <?php echo "<img src='Parceiro/Arquivos/".$rs['foto_principal_site']."'>"?>
                                        </div>

                                        <div class="item-entry overflow">
											<h5><a href=""><?php echo($rs['nome_fantasia'])?></a></h5>
											<div class="dot-hr"></div>
											<span class="pull-left"><i class="fa fa-binoculars"></i>  <b>Milhas :</b> <?php echo($rs['qtd_milhas']);?> </span>
											<span class="proerty-price pull-right">R$ <?php echo number_format($preco_diaria, 2, ',', '');?></span>
										</div>

										<div class="vote">
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											<label>
												<input name="fb" value="2" />
												<i class="fa"></i>
											</label>
											<label>
												<input  name="fb" value="3" />
												<i class="fa"></i>
											</label>
											<label>
												<input  name="fb" value="4" />
												<i class="fa"></i>
											</label>
											<label>
												<input name="fb" value="5" />
												<i class="fa"></i>
											</label>
										</div>
                                    </div>
                            </div>
							<?php
								}

							?>
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
 
 
 <script>
	$(function(){
    var loading = $('#loadbar').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
    }).ajaxStop(function () {
    	loading.hide();
    });
    
    $("label.btn").on('click',function () {
    	var choice = $(this).find('input:radio').val();
    	$('#loadbar').show();
    	$('#quiz').fadeOut();
    	setTimeout(function(){
           $( "#answer" ).html(  $(this).checking(choice) );      
            $('#quiz').show();
            $('#loadbar').fadeOut();
           /* something else */
    	}, 1500);
    });

    $ans = 3;

    $.fn.checking = function(ck) {
        if (ck != $ans)
            return 'INCORRECT';
        else 
            return 'CORRECT';
    }; 
});	
 
 </script>
 

</html>
