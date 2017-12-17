<?php
	if(isset($_GET['id_cliente'])){



?>


<div id="list-type" class="proerty-th">
	<?php
	$sql = "select * from view_promocoes";
	$select = mysql_query($sql);
	while($rs = mysql_fetch_array($select)){
		$preco_diaria=$rs['preco_diaria'];
	?>
		<div class="col-sm-6 col-md-4 p0">
				<div class="box-two proerty-item">
					<div class="item-thumb">
						<a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>&id_cliente=<?php echo $_GET['id_cliente'];?>&nome_cliente=<?php echo $_GET['nome_cliente'];?>"><?php echo "<img src='Parceiro/Arquivos/".$rs['foto_principal']."'>"?></a>
					</div>

					<div class="item-entry overflow">
						<h5><a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>&id_cliente=<?php echo $_GET['id_cliente'];?>&nome_cliente=<?php echo $_GET['nome_cliente'];?>"></a></h5>
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

					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#detalhes_promocao"> <i class="fa fa-eye"></i> Ver mais</button>
					</div>
				</div>
		</div>
		<?php
			}
		?>
</div>
<?php
	
	}else{


?>

<div id="list-type" class="proerty-th">
	<?php
	$sql = "select * from view_promocoes";
	$select = mysql_query($sql);
	while($rs = mysql_fetch_array($select)){
		$preco_diaria=$rs['preco_diaria'];
	?>
		<div class="col-sm-6 col-md-4 p0">
				<div class="box-two proerty-item">
					<div class="item-thumb">
						<a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>"><?php echo "<img src='Parceiro/Arquivos/".$rs['foto_principal']."'>"?></a>
					</div>

					<div class="item-entry overflow">
						<h5><a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>" ><?php echo($rs['nome_fantasia']);?></a></h5>
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

					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#detalhes_promocao"> <i class="fa fa-eye"></i> Ver mais</button>
					</div>
				</div>
		</div>
		<?php
			}
		?>
</div>

<?php
	}
?>
