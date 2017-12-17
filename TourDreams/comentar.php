

<?php
	
	include("conexao_banco.php");
	
	$id_cliente = $_GET['id_cliente'];
	$nome_cliente = $_GET['nome_cliente'];
	$id_reserva = $_GET['id_reserva'];
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		$comentario = $_POST ['comentario'];
			
		$sql_insert_reserva="insert into tbl_comentario(id_milhas,id_cliente,comentario,id_reserva,data)";
		$sql_insert_reserva=$sql_insert_reserva."values('2',".$id_cliente.",'".$comentario."',".$id_reserva.",now())";
			
		
			
		mysql_query ($sql_insert_reserva);
	}
?>


	<div class="col-md-6" style="width:100%;">
		<div class="box-for overflow">
			<div class="col-md-12 col-xs-12 login-blocks">
				<h2>Comentar</h2>
				   <div class="form-group">
						<label>Comentario</label>
						<textarea id="comentario" class="form-control" name="comentario" cols="2" rows="10" style="resize:none;"></textarea>
					</div>
					<div class="text-center">
						<button name="btn_comentar" class="btn btn-default" onClick="Comentar(<?php echo $id_reserva?>,<?php echo $id_cliente?>,'<?php echo $nome_cliente?>')"> Comentar</button>
					</div>
				<br>
			</div>

		</div>
    </div>
