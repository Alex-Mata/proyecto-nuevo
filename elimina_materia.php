<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>

  					<!--borrar un registro.. algoritmo php-->
<?php
$mysqli = new mysqli("localhost", "root", "", "signature_igs16");

$id_delete = intval($_GET['id']);
				$query = mysqli_query($mysqli, "SELECT * FROM materias WHERE id='$id_delete'");
				if(mysqli_num_rows($query) == 0){
					echo"<script>alert('No Se Encontraron Datos')</script>";
				}else{
					$delete = mysqli_query($mysqli, "DELETE FROM materias WHERE id='$id_delete'");
					if($delete){
						echo"<script>alert('Materia Eliminada Con Exito')</script>";
						?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=materia.php">
				<?php
					}else{
						echo"<script>alert('Error Al Eliminar La Materia')</script>";
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