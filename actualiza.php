<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>


<?php


		$mysqli=mysqli_connect("localhost","root","","signature_igs16");
		$sql = $mysqli->query("SET NAMES 'utf8'");

		$id = intval($_POST['id']);
		$nombre  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['nombre'], ENT_QUOTES)));
		$titulo = mysqli_real_escape_string($mysqli,(strip_tags($_POST['titulo'], ENT_QUOTES)));
		$telefono  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['telefono'], ENT_QUOTES)));
		$exclusividad = mysqli_real_escape_string($mysqli,(strip_tags($_POST['exclusividad'], ENT_QUOTES)));
		$cedula_profesional  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['cedula_profesional'], ENT_QUOTES)));
	
			
			mysqli_query ($mysqli, "UPDATE `docentes` SET `nombre`='$nombre',`titulo`='$titulo',`telefono`='$telefono',`exclusividad`='$exclusividad',`cedula_profesional`='$cedula_profesional'  WHERE id='$id'") or die (mysql_error());
			echo"<script>alert('Docente Editado Con Exito')</script>";
?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=docente.php">
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