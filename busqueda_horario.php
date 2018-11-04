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
            <li><a href="mostrar_horario.php">Mostrar Horarios</a></li>
          </ul>       
        </div>
      </div>
    </nav>
  </header>
</div>

	<div class="container">
		<div class="row">
		<table class="table">
			<tr>
					<th>ID:</th>
					<th>MATERIA:</th>
					<th>DOCENTE:</th>
					<th>DIAS:</th>
					<th>GRUPO:</th>
					<th>FECHA DE INICIO:</th>
					<th>FECHA FIN:</th>
					<th>HORA DE INICIO:</th>
					<th>HORA FIN</th><th>
					<span class="glyphicon glyphicon-wrench"></span></th>
				</tr>	
		<?php
		$mysqli = new mysqli("localhost", "root", "", "signature_igs16") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		$sql = $mysqli->query("SET NAMES 'utf8'");
			
			$palabra=$_GET['caja_busqueda'];
			$sql="SELECT horarios.id, materias.nombre, docentes.nombre, horarios.dias, horarios.grupo, horarios.fecha_inicio, horarios.fecha_fin, horarios.hora_inicio, horarios.hora_fin FROM horarios JOIN materias ON materia_id = materias.id JOIN docentes ON docente_id = docentes.id WHERE docentes.nombre LIKE '%$palabra%'";
			$consulta3=$mysqli->query($sql);
	if($consulta3->num_rows>=1){

		while ($fila = $consulta3->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td><td>$fila[8]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-materia='" .$fila[1] ."' data-docente='" .$fila[2] ."' data-dias='" .$fila[3] ."' data-grupo='" .$fila[4] ."' data-f_i='" .$fila[5] ."' data-f_f='" .$fila[6] ."' data-h_i='" .$fila[7] ."' data-h_f='" .$fila[8] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina_horario.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>";		
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
                         <h4>Editar Horario:</h4>
                    </div>
                    <div class="modal-body">                      
                       <form class="form-horizontal" action="actualiza_horario.php" method="POST" autocomplete="off">                       		

                       		        <input class="form-control" id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
      <label class="form-label col-md-2 " >Materia:</label>
      <div class="col-md-10">
        <select class="form-control" id="materia" name="materia">
        <option value="0">Seleccione:</option>
        <?php
    $mysqli = mysqli_connect('localhost', 'root', '', "signature_igs16");
    $sql = $mysqli->query("SET NAMES 'utf8'");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  $query = 'SELECT * FROM `materias`';
  $result = $mysqli->query($query);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo '<option value="'.$row[nombre].'">'.$row[nombre].'</option>';
  }
      ?>
      </select>
    </div>
    </div>

    <div class="form-group">
      <label class="form-label col-md-2 " >Docente:</label>
      <div class="col-md-10">
        <select class="form-control" id="docente" name="docente">
        <option value="0">Seleccione:</option>
        <?php
    $mysqli = mysqli_connect('localhost', 'root', '', "signature_igs16");
    $sql = $mysqli->query("SET NAMES 'utf8'");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  $query = 'SELECT * FROM `docentes`';
  $result = $mysqli->query($query);
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo '<option value="'.$row[nombre].'">'.$row[nombre].'</option>';
  }
      ?>
      </select>
    </div>
    </div>

    <div class="form-group">
           <label class="form-label col-md-4" >Dias Laborales:</label>
           <div class="col-md-8">
              <select class="form-control" id="dias" name="dias">
                 <option value="0">Seleccione:</option>
                 <option value="Sabado">Sabado</option>
                 <option value="Domigo">Domigo</option>
              </select>
             </div>
    </div>
                          
  <div class="form-group">
   <label class="form-label col-md-2 " >Grupo:</label>
   <div class="col-md-10">
         <input class="form-control" id="grupo" name="grupo" type="text" autocomplete="off" placeholder="Ingrese Grupo"></input>
  </div>
  </div>

    <div class="form-group">
      <label class="form-label col-md-3 " >Fecha Inicio:</label>
      <div class="col-md-9">
      <input class="form-control" id="f_i" name="f_i" type="date" autocomplete="off" placeholder="Ingrese Fecha 0000-00-00"></input>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label col-md-3 " >Fecha Fin:</label>
      <div class="col-md-9">
      <input class="form-control" id="f_f" name="f_f" type="date" autocomplete="off" placeholder="Ingrese Fecha 0000-00-00"></input>
      </div>
    </div>
 
    <div class="form-group">
      <label class="form-label col-md-3 " >Horario Inicio:</label>
      <div class="col-md-9">
      <input class="form-control" id="h_i" name="h_i" type="time" autocomplete="off" placeholder="Ingrese Hora 00:00:00"></input>
    </div>
    </div>

    <div class="form-group">
      <label class="form-label col-md-3 " >Horario Fin:</label>
      <div class="col-md-9">
      <input class="form-control" id="h_f" name="h_f" type="time" autocomplete="off" placeholder="Ingrese Hora 00:00:00"></input>
    </div>
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
        </div>



        <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	


	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Boton que activa el modal
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('materia')
		  var recipient2 = button.data('docente')
		  var recipient3 = button.data('dias')
		  var recipient4 = button.data('grupo')
		  var recipient5 = button.data('f_i')
		  var recipient6 = button.data('f_f')
		  var recipient7 = button.data('h_i')
		  var recipient8 = button.data('h_f')

			//Extraer información de los atributos data- *
			// Si es necesario, puede iniciar una solicitud AJAX aquí (y luego hacer la actualización en una devolución de llamada).
			// Actualiza el contenido modal. Utilizaremos jQuery aquí, pero en su lugar podría usar una biblioteca de enlace de datos u otros métodos.
		  
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #materia').val(recipient1)
		  modal.find('.modal-body #docente').val(recipient2)
		  modal.find('.modal-body #dias').val(recipient3)	
		  modal.find('.modal-body #grupo').val(recipient4)
		  modal.find('.modal-body #f_i').val(recipient5)	 
		  modal.find('.modal-body #f_f').val(recipient6)	
		  modal.find('.modal-body #h_i').val(recipient7)
		  modal.find('.modal-body #h_f').val(recipient8)	 
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