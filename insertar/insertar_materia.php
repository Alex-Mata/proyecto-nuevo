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
		$bloque = $_GET['bloque'];
		$area = $_GET['area'];

		$sql = "INSERT INTO materias (nombre, bloque, area_id) VALUES ('$materia', '$bloque', '$area')";

		if ($mysqli->query($sql) === true) {
			echo"<script>alert('Guardado exitoso.')</script>";
			?>
			<META HTTP-EQUIV="Refresh" CONTENT="0; URL=materia.php">
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