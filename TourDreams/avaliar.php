

<?php
	
	include("conexao_banco.php");
	
	$id_cliente = $_GET['id_cliente'];
	$nome_cliente = $_GET['nome_cliente'];
	$id_reserva = $_GET['id_reserva'];
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$avaliar = $_POST ['avaliar'];
		$avaliar1 = $_POST ['avaliar1'];
		$avaliar2 = $_POST ['avaliar2'];
		$avaliar3 = $_POST ['avaliar3'];
			
		$sql_insert_reserva_avaliacao="insert into tbl_avaliacoes(id_milhas,id_cliente,nota_limpeza,nota_restaurante,nota_atendimento,nota_lazer,id_reserva)";
		$sql_insert_reserva_avaliacao=$sql_insert_reserva_avaliacao."values('3',".$id_cliente.",'".$avaliar."','".$avaliar1."','".$avaliar2."','".$avaliar3."',".$id_reserva.")";
		
		
			
		mysql_query ($sql_insert_reserva_avaliacao);
	}
?>


	<div class="col-md-6" style="width:100%;">
		<div class="box-for overflow">
			<div class="col-md-12 col-xs-12 login-blocks">
				<h2>Avaliações</h2>
					<div class="form-group">
						<h4>Limpeza</h4></br>
						<div data-toggle="buttons">
						  <label  class="btn btn-default btn-circle btn-lg"><input id="avaliar" type="radio" name="avaliar" value="0">0</label>
						  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar" type="radio" name="avaliar" value="1">1</label>
						  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar" type="radio" name="avaliar" value="2">2</label>
						  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar" type="radio" name="avaliar" value="3">3</label>
						  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar" type="radio" name="avaliar" value="4">4</label>
						  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar" type="radio" name="avaliar" value="5">5</label>
						</div>
						<div class="form-group">
							<h4>Restaurante</h4></br>
							<div data-toggle="buttons">
							  <label  class="btn btn-default btn-circle btn-lg"><input id="avaliar1" type="radio" name="avaliar1" value="0">0</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar1" type="radio" name="avaliar1" value="1">1</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar1" type="radio" name="avaliar1" value="2">2</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar1" type="radio" name="avaliar1" value="3">3</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar1" type="radio" name="avaliar1" value="4">4</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar1" type="radio" name="avaliar1" value="5">5</label>
							</div>
						</div>
						<div class="form-group">
							<h4>Atendimento</h4></br>
							<div data-toggle="buttons">
							  <label  class="btn btn-default btn-circle btn-lg"><input id="avaliar2" type="radio" name="avaliar2" value="0">0</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar2" type="radio" name="avaliar2" value="1">1</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar2" type="radio" name="avaliar2" value="2">2</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar2" type="radio" name="avaliar2" value="3">3</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar2" type="radio" name="avaliar2" value="4">4</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar2" type="radio" name="avaliar2" value="5">5</label>
							</div>
						</div>
						<div class="form-group">
							<h4>Lazer</h4></br>
							<div data-toggle="buttons">
							  <label  class="btn btn-default btn-circle btn-lg"><input id="avaliar3" type="radio" name="avaliar3" value="0">0</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar3" type="radio" name="avaliar3" value="1">1</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar3" type="radio" name="avaliar3" value="2">2</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar3" type="radio" name="avaliar3" value="3">3</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar3" type="radio" name="avaliar3" value="4">4</label>
							  <label  class="btn btn-default btn-circle btn-lg">       <input id="avaliar3" type="radio" name="avaliar3" value="5">5</label>
							</div>
						</div>
					</div>
					<div class="text-center" style="margin-top:50px;">
						<button name="btn_avaliar" class="btn btn-default" onClick="Avaliacao(<?php echo $id_reserva?>,<?php echo $id_cliente?>,'<?php echo $nome_cliente?>')"> Concluir Avaliação</button>
					</div>
				<br>
			</div>

		</div>
    </div>
