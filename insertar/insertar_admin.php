<?php
		$mysqli = new mysqli("localhost", "root", "", "signature_igs16");
		if($mysqli->connect_error){
			die("conexion fallida: " . $mysqli->connect_error);
		}

		if(isset($_GET['nombre'])){
		$nombre = $_GET['nombre'];
		$cargo = $_GET['cargo'];
		$contra = $_GET['contra'];
		$email = $_GET['email'];

		$sql = "INSERT INTO administrador (nombre, cargo, contra, email) VALUES ('$nombre', '$cargo', '$contra', '$email')";
		
		if ($mysqli->query($sql) === true) {
				echo"<script>alert('Guardado exitoso.')</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
				<?php
			}else{
			die("error al insertar datos: " . $mysqli->error);
		}
}
	
		?>