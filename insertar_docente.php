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

		if(isset($_GET['nombre'])){
		$nombre = $_GET['nombre'];
		$titulo = $_GET['titulo'];
		$telefono = $_GET['telefono'];
		$exclusividad = $_GET['opciones'];
		$cedula = $_GET['cedula'];

		$sql = "INSERT INTO docentes (nombre, titulo, telefono, exclusividad, cedula_profesional) VALUES ('$nombre', '$titulo', '$telefono', '$exclusividad', '$cedula')";
		
		if ($mysqli->query($sql) === true) {
				echo"<script>alert('Guardado exitoso.')</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=docente.php">
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