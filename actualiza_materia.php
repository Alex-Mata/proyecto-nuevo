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
		$bloque = mysqli_real_escape_string($mysqli,(strip_tags($_POST['bloque'], ENT_QUOTES)));
		$licenciatura  = mysqli_real_escape_string($mysqli,(strip_tags($_POST['licenciatura'], ENT_QUOTES)));
	
		if($nombre != null){
			if($bloque != null){
				if($licenciatura != null){
			
			mysqli_query ($mysqli, "UPDATE materias m INNER JOIN areas a ON m.area_id = a.id SET m.nombre = '$nombre', m.bloque = '$bloque', a.nombre = '$licenciatura' WHERE m.id = '$id'") or die (mysql_error());
			echo"<script>alert('Materia Editada Con Exito')</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=materia.php">
				<?php

				} else
				echo"<script>alert('Ingrese Licenciatura')</script>";
			} else
			echo"<script>alert('Ingrese Bloque')</script>";
		} else
		echo"<script>alert('Ingrese Nombre')</script>";
		
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