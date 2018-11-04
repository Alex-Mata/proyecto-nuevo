<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>


<?php


		$mysqli=mysqli_connect("localhost","root","","signature_igs16");
		$sql = $mysqli->query("SET NAMES 'utf8'");

		$id = intval($_POST['id']);
		$materia  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['materia'], ENT_QUOTES)));
		$docente = mysqli_real_escape_string($mysqli,(strip_tags($_POST['docente'], ENT_QUOTES)));
		$dias  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['dias'], ENT_QUOTES)));
		$grupo  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['grupo'], ENT_QUOTES)));
		$f_i = mysqli_real_escape_string($mysqli,(strip_tags($_POST['f_i'], ENT_QUOTES)));
		$f_f  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['f_f'], ENT_QUOTES)));
		$h_i = mysqli_real_escape_string($mysqli,(strip_tags($_POST['h_i'], ENT_QUOTES)));
		$h_f  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['h_f'], ENT_QUOTES)));
			
			mysqli_query ($mysqli, "UPDATE horarios INNER JOIN materias ON materias.id = horarios.materia_id JOIN docentes ON docentes.id = horarios.docente_id SET materias.nombre = '$materia', docentes.nombre = '$docente', horarios.dias = '$dias', horarios.grupo = '$grupo', horarios.fecha_inicio = '$f_i', horarios.fecha_fin = '$f_f', horarios.hora_inicio = '$h_i', horarios.hora_fin = '$h_f' WHERE horarios.id = '$id'") or die (mysql_error());
			echo"<script>alert('Docente Editado Con Exito')</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=horario.php">
				<?php
		
?>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>