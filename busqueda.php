<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery.js" charset="utf-8"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="js/metodos.js"></script>	
</head>
<body>
<div id="co" class="container">
  <header>
    <nav id="nav" class="navbar navbar-light navbar-fixed-top" style="background-color: #1e1e1e;"">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar-1">
          <span class="sr-only">menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
<style type="text/css">
body {
	padding-top: 90px;
}
	.nav li, a {
		color: #fff;
	}
</style>
          <a href="index.php" class="navbar-brand">Signature-IGS16</a>
        </div>
        
        <div class="callapse navbar-collapse" id="navbar-1">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="docente.php">Agregar Docente</a></li>
            <li><a href="horario.php">Agregar Horario</a></li>
            <li><a href="materia.php">Agregar Materia</a></li>
            <li><a href="mostrar.php">Mostrar Docentes</a></li>
          </ul>       
        </div>
      </div>
    </nav>
  </header>
</div>


	<div class="container">
		<div class="row">	
	
							<!--la tabla donde se mostrara todos los resultados de la base de datos... el select-->
			<table class='table'>
				<tr>
					<th>ID:</th><th>NOMBRE:</th><th>TITULO:</th><th>TELEFONO:</th><th>EXCLUSIVIDAD:</th><th>CEDULA PROFESIONAL:</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
	$mysqli = new mysqli("localhost", "root", "", "signature_igs16") or die ("Error de conexion porque: ".$mysqli->connect_errno);
	$sql = $mysqli->query("SET NAMES 'utf8'");

	$palabra=$_POST['caja_busqueda'];
	$query="SELECT * FROM docentes where nombre LIKE '%$palabra%'";
	$consulta3=$mysqli->query($query);
	if($consulta3->num_rows>=1){

		while ($fila = $consulta3->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-titulo='" .$fila[2] ."' data-telefono='" .$fila[3] ."' data-exclusividad='" .$fila[4] ."' data-cedula_profesional='" .$fila[5] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>";		
					echo "</td>";
					echo "</tr>";
				}
		echo "</tbody>
	</table>";
	}else{
		echo "No hemos encotrado ningun registro con la palabra ".$palabra;
	}
	?>


</table>
</div>
</div>

<div class="container">
										<!--al hacer click en editar, para editar el producto-->
<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Docente</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST" autocomplete="off">                       		

                       		        <input class="form-control" id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="nombre">NOMBRE:</label>
		                       			<input class="form-control" required id="nombre" name="nombre" type="text"></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="titulo">TITULO:</label>
		                       			<input class="form-control" required id="titulo" name="titulo" type="text"></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="telefono">TELEFONO:</label>
		                       			<input class="form-control" required id="telefono" name="telefono" type="text"></input>
		                       		</div>
		                       		<div class="form-group">
                            <label  for="exclusividad">Exclusividad:</label>
                            <select id="exclusividad" name="exclusividad" class="form-control">
                              <option value="Fijo">Fijo</option>
                              <option value="Temporal">Temporal</option>
                            </select>
                          </div>
		                       		<div class="form-group">
		                       			<label for="cedula_profesional">CEDULA PROFESIONAL:</label>
		                       			<input class="form-control" required id="cedula_profesional" name="cedula_profesional" type="text"></input>
		                       		</div>

									<input type="submit" class="btn btn-success" value="Editar">
									
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 



        <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	


	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Boton que activa el modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('titulo')
		  var recipient3 = button.data('telefono')
		  var recipient4 = button.data('exclusividad')
		  var recipient5 = button.data('cedula_profesional')

			//Extraer información de los atributos data- *
			// Si es necesario, puede iniciar una solicitud AJAX aquí (y luego hacer la actualización en una devolución de llamada).
			// Actualiza el contenido modal. Utilizaremos jQuery aquí, pero en su lugar podría usar una biblioteca de enlace de datos u otros métodos.
		  
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #titulo').val(recipient2)
		  modal.find('.modal-body #telefono').val(recipient3)	
		  modal.find('.modal-body #exclusividad').val(recipient4)
		  modal.find('.modal-body #cedula_profesional').val(recipient5)	 
		});
		
	</script>
	</body>
	</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>