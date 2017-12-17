

<?php
	
	include("conexao_banco.php");
	
	$id_cliente = $_GET['id_cliente'];
	$nome_cliente = $_GET['nome_cliente'];
	$id_reserva = $_GET['id_reserva'];
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		$coment = $_POST ['coment'];
		$file_foto = $_POST ['file_foto'];
		
		
		
			
		$sql_insert_reserva_postar="insert into tbl_blog(id_cliente,foto_blog,descricao_blog,data_publicacao,id_reserva)";
		$sql_insert_reserva_postar=$sql_insert_reserva_postar."values(".$id_cliente.",'".$file_foto."','".$coment."',now(),".$id_reserva.")";
		
		
		
			
		mysql_query ($sql_insert_reserva_postar);
	}
?>


	
	<div class="col-md-6" style="width:100%;">
		<div class="box-for overflow">
			<div class="col-md-12 col-xs-12 login-blocks">
				<h2>Comentar</h2>
				   <div class="form-group">
						<label>Comentario</label>
						<textarea id="coment" class="form-control" name="coment" cols="2" rows="5" style="resize:none;"></textarea>
					</div>
					 <div class="form-group">
						<label>Comentario</label>
						<input id="file_foto" class="form-control" name="file_foto" type="file"/>
					</div>
					<div class="text-center">
						<button name="btn_comentar" class="btn btn-default" onClick="Postar(<?php echo $id_reserva?>,<?php echo $id_cliente?>,'<?php echo $nome_cliente?>')"> Comentar</button>
					</div>
				<br>
			</div>

		</div>
    </div>
