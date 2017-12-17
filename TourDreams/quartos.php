<?php
	include("conexao_banco.php");

	session_start();
	
	$id_produto = $_GET['id_produto'];
	$id_cliente = $_GET['id_cliente'];
	$nome_cliente = $_GET['nome_cliente'];
	
	
	
	if(isset($_POST['entrada'])){
		$entrada=$_POST['entrada'];
		$saida=$_POST['saida'];
		$_SESSION['entrada'] = $entrada;
		$_SESSION['saida'] = $saida;
		
		
		
		
		if(strtotime($saida) <= strtotime($entrada)){
			echo "<script type='text/javascript'>
			window.alert('Datas Inválidas')
			</script>";
		}else{
			?>
		<div class="container">
			<h4 class="text-uppercase wow fadeInLeft animated">Quarto(s) disponível(s)</h4>
			<div class="row">
				<ul class="thumbnails">
					<?php
							$sql_quartos = "select quartos.id_quarto, quartos.id_produto, quartos.descricao_quarto,
							(quartos.preco_diaria +((quartos.preco_diaria * 10) / 100)) as preco_diaria, ft_quarto.foto_quarto from tbl_quartos as quartos
							inner join tbl_fotos_quartos as ft_quarto
							on quartos.id_quarto =  ft_quarto.id_quarto 
							where id_produto = '$id_produto' and quartos.id_quarto not in(
								select id_quarto from tbl_reserva where('$entrada' between dt_entrada and dt_saida) or ('$saida' between dt_entrada and dt_saida)
							)group by id_quarto;";
							$select_quartos_disponiveis = mysql_query($sql_quartos);
						while($rs = mysql_fetch_array($select_quartos_disponiveis)){
								$preco_diaria=$rs['preco_diaria'];
								
								$diferenca = strtotime($_SESSION['saida']) - strtotime($_SESSION['entrada']);
								$dias = floor($diferenca / (60 * 60 * 24));
								
								$result = $dias * $preco_diaria;
								
								$_SESSION['result'] = $result;
								
								
								$id_quarto=$rs['id_quarto'];
								$_SESSION['id_quarto'] = $id_quarto;
					?>
					<div class="col-md-4">
						<div class="thumbnail">
							<?php echo "<img class= 'img-responsive' src='Parceiro/Arquivos/".$rs['foto_quarto']."'>"?>
							<div class="caption">
								<h4><?php echo($rs['descricao_quarto']);?></h4>
							<div class="property-meta entry-meta clearfix ">
								<?php
									$sql = "select * from view_carac_quartos where id_quarto =".$_SESSION['id_quarto'];
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
								<h4 align="center">Preço final em: R$ <?php echo number_format($result, 2, ',', '');?></h4>
							</div>
						</div>
						<div class="botao_reservar">
							<a href="reserva.php?id_produto=<?php echo $id_produto?>&id_cliente=<?php echo $id_cliente?>&nome_cliente=<?php echo $nome_cliente?>&id_quarto=<?php echo $rs['id_quarto']?>">
								<input class="btn btn-primary" value="Reservar" type="submit">
							</a>
						</div>
					</div>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
					<?php
				}
			}
		?>




