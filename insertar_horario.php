<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>

<?php
		$mysqli = new mysqli("localhost", "root", "", "signature_igs16");
		if($mysqli->connect_error){
			die("conexion fallida: " . $mysqli->connect_error);
		}

		if(isset($_GET['materia'])){
		$materia = $_GET['materia'];
		$docente = $_GET['docente'];
		$dias = $_GET['dias'];
		$grupo = $_GET['grupo'];
		$fecha_i = $_GET['f_i'];
		$fecha_f = $_GET['f_f'];
		$hora_i = $_GET['h_i'];
		$hora_f = $_GET['h_f'];
		

		$sql = "INSERT INTO horarios (materia_id, docente_id, dias, grupo, fecha_inicio, fecha_fin, hora_inicio, hora_fin) VALUES ('$materia', '$docente', '$dias', '$grupo', '$fecha_i', '$fecha_f', '$hora_i', '$hora_f')";

		if ($mysqli->query($sql) === true) {
			echo"<script>alert('Guardado exitoso.')</script>";
			?>
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=horario.php">
			<?php
		}else{
			die("error al insertar datos: " . $mysqli->error);
		}

	}
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