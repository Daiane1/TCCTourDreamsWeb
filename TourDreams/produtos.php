<?php
	if(isset($_GET['id_cliente'])){
?>
			
			
			<div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">

						<?php
						@$estado = (string)$_GET['estado'];
						@$cidade = (string)$_GET['cidade'];
						@$selectHospedagem = (int)$_GET['selectHospedagem'];
						@$selectViagem = (int)$_GET['selectViagem'];

						$sql = "select * from view_produto where status = 'Aprovado'";

						if($estado !=''){
							$sql = $sql . "and estado LIKE'%$estado%'";
						}

						if($cidade !=''){
							$sql = $sql . "and cidade LIKE'%$cidade%'";
						}

						if($selectHospedagem !=''){
							$sql = $sql . "and id_estilo LIKE '%$selectHospedagem%'";
						}

						if($selectViagem !=''){
							$sql = $sql . "and id_tipo LIKE '%$selectViagem%'";
						}

						$select = mysql_query($sql) or die (mysql_error());



						while($rs = mysql_fetch_array($select)){
							$preco_diaria=$rs['preco_diaria'];
						?>
                            <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto']?>&id_cliente=<?php echo $_GET['id_cliente']?>&nome_cliente=<?php echo $_GET['nome_cliente']?>"><?php echo "<img src='Parceiro/Arquivos/".$rs['foto_principal']."'>"?></a>
                                        </div>

                                        <div class="item-entry overflow">
											<h5><a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto']?>&id_cliente=<?php echo $_GET['id_cliente']?>&nome_cliente=<?php echo $_GET['nome_cliente'];?>"><?php echo($rs['nome_fantasia'])?></a></h5>
											<div class="dot-hr"></div>
											<span class="pull-left"><i class="fa fa-binoculars"></i>  <b>Milhas :</b> <?php echo($rs['qtd_milhas']);?> </span>
											<span class="proerty-price pull-right">R$ <?php echo number_format($preco_diaria, 2, ',', '');?></span>
										</div>
										
										<div class="vote">
											<?php
												$sql_select_avalaiacoes = "select quarto.id_produto,	
												AVG(ava.nota_limpeza) as limpeza,
														
												AVG (ava.nota_restaurante) as restaurante, 
														
												AVG(ava.nota_atendimento) as atendimento, 
														
												AVG(ava.nota_lazer) as lazer,
														
												AVG(((((ava.nota_limpeza + ava.nota_atendimento) + ava.nota_restaurante) + ava.nota_lazer) / 4)) AS media_geral
												from tbl_quartos as quarto
													
												inner join tbl_reserva as rs
													
												on rs.id_quarto = quarto.id_quarto
													
												inner join tbl_avaliacoes as ava
													
												on ava.id_reserva = rs.id_reserva where id_produto =".$rs['id_produto'];
												$select_avaliacoes = mysql_query($sql_select_avalaiacoes);
												while($rsconsulta = mysql_fetch_array($select_avaliacoes)){
														

											?>
								
										
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 1){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 2){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 3){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 4){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 5){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
											}
											?>
											
										</div>
										
                                    </div>
                            </div>
							<?php
								}

							?>
                        </div>
                    </div>


            </div>
			
<?php

	}else{
		

?>

	<div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear">
                        <div id="list-type" class="proerty-th">

						<?php
						@$estado = (string)$_GET['estado'];
						@$cidade = (string)$_GET['cidade'];
						@$selectHospedagem = (int)$_GET['selectHospedagem'];
						@$selectViagem = (int)$_GET['selectViagem'];

						$sql = "select * from view_produto where status = 'Aprovado'";

						if($estado !=''){
							$sql = $sql . "and estado LIKE'%$estado%'";
						}

						if($cidade !=''){
							$sql = $sql . "and cidade LIKE'%$cidade%'";
						}

						if($selectHospedagem !=''){
							$sql = $sql . "and id_estilo LIKE '%$selectHospedagem%'";
						}

						if($selectViagem !=''){
							$sql = $sql . "and id_tipo LIKE '%$selectViagem%'";
						}

						$select = mysql_query($sql) or die (mysql_error());



						while($rs = mysql_fetch_array($select)){
							$preco_diaria=$rs['preco_diaria'];
						?>
                            <div class="col-sm-6 col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>"><?php echo "<img src='Parceiro/Arquivos/".$rs['foto_principal']."'>"?></a>
                                        </div>

                                        <div class="item-entry overflow">
											<h5><a href="detalhes_produto.php?id_produto=<?php echo $rs['id_produto'];?>"><?php echo($rs['nome_fantasia']);?></a></h5>
											<div class="dot-hr"></div>
											<span class="pull-left"><i class="fa fa-binoculars"></i>  <b>Milhas :</b> <?php echo($rs['qtd_milhas']);?> </span>
											<span class="proerty-price pull-right">R$ <?php echo number_format($preco_diaria, 2, ',', '');?></span>
										</div>

										<div class="vote">
											<?php
												$sql_select_avalaiacoes = "select quarto.id_produto,	
												AVG(ava.nota_limpeza) as limpeza,
														
												AVG (ava.nota_restaurante) as restaurante, 
														
												AVG(ava.nota_atendimento) as atendimento, 
														
												AVG(ava.nota_lazer) as lazer,
														
												AVG(((((ava.nota_limpeza + ava.nota_atendimento) + ava.nota_restaurante) + ava.nota_lazer) / 4)) AS media_geral
												from tbl_quartos as quarto
													
												inner join tbl_reserva as rs
													
												on rs.id_quarto = quarto.id_quarto
													
												inner join tbl_avaliacoes as ava
													
												on ava.id_reserva = rs.id_reserva where id_produto =".$rs['id_produto'];
												$select_avaliacoes = mysql_query($sql_select_avalaiacoes);
												while($rsconsulta = mysql_fetch_array($select_avaliacoes)){
														

											?>
								
										
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 1){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 2){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 3){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 4){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											
											<?php
												if(number_format($rsconsulta['media_geral'], 1, ',', '.') == 5){
											?>
										
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<label>
												<input  name="fb" value="1" />
												<i class="fa"></i>
											</label>
											
											<?php
											}
											?>
											
											<?php
											}
											?>
											
										</div>
                                    </div>
                            </div>
							<?php
								}

							?>
                        </div>
                    </div>


            </div>



<?php

	}

?>