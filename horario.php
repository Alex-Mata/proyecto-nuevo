<?php
  session_start();
  if(isset($_SESSION['user']))
  {
?>

<!DOCTYPE html>
<html>
<head>
  <title>horarios</title>
  <link rel="stylesheet" type="text/css" href="css/pie.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script><meta name="viewport" content="width=device-width, user-scalable=, initial-scale=1, maximum-scale=1, minima-scale=1">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <script>
    $(function(){
      $('.dates #fecha').datepicker({
        'format' : "yyyy-mm-dd",
        'clearBtn' : true,
        'language' : "es"

      });
    });
  </script>
</head>
<body>

</body><body>
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <ul>
          <li><div class="r"><img src="img/igs.jpeg" style="width: 45%;" class="rounded mx-auto d-block" alt="..."></div></li>
        </ul>
            <ul style="margin-top: 40%;" class="sidebar-nav">
                <li class="sidebar-brand">

                    <a href="#">
                ¿Que desea realizar?
                    </a>
                </li>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="docente.php">Docentes</a>
                </li>
                <li>
                    <a href="#">Horarios</a>
                </li>
                <li>
                    <a href="#">Materias</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">


               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Docente</h5>
      </div>
      <div class="modal-body">

  <form class="form-horizontal" action="insertar_horario.php" method="GET" autocomplete="">  
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
    echo '<option value="'.$row[id].'">'.$row[nombre].'</option>';
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
    echo '<option value="'.$row[id].'">'.$row[nombre].'</option>';
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
    <div class="dates">
      <label class="form-label col-md-3 " >Fecha Inicio:</label>
       <div class="col-md-9">
      <input type="text" autocomplete="off" id="fecha" name="f_i" class="form-control" placeholder="Seleccione Fecha">
    </div>
    </div>
    </div>

    <div class="form-group">
    <div class="dates">
      <label class="form-label col-md-3 " >Fecha Fin:</label>
      <div class="col-md-9">
      <input class="form-control" id="fecha" name="f_f" type="text" autocomplete="off" placeholder="Seleccione Fecha"></input>
      </div>
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
    </div>
    <div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  <button type="button submit" value="guardar" class="btn btn-primary">Guardar</button> 
</div>             
  </div>
  
 
 

</form>
      
      
      </div>
    </div>
  </div>
</div>


<section style="padding-top: 5%;">
<div class="panel panel-primary">
 
<div class="panel-heading"><h4>Alta Horario</h4> 
<div align="right">
 <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Ver Menù</a>
  <button style="padding-top:20;" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      <span class="glyphicon glyphicon-plus-sign"></span> Agregar Horario
   </button>
<a href="reportePDF.php" target="_blank" class="btn btn-success" id="menu-toggle">Visualizar PDF</a>
  </div>
</div>
    <div class="panel-body">
  <div class="">
    <div class="row">
    <table class="table table-hover table-striped table-condensed">
      <thead>
        <tr>
          <th scope="col">ID:</th>
          <th scope="col">MATERIA:</th>
          <th scope="col">DOCENTE:</th>
          <th scope="col">DIAS:</th>
          <th scope="col">GRUPO:</th>
          <th scope="col">FECHA DE INICIO:</th>
          <th scope="col">FECHA FIN:</th>
          <th scope="col">HORA DE INICIO:</th>
          <th scope="col">HORA FIN</th><th>
          <span class="glyphicon glyphicon-wrench"></span></th>
        </tr>
      </thead>    
    <?php
    $mysqli = new mysqli("localhost", "root", "", "signature_igs16"); 
    $sql = $mysqli->query("SET NAMES 'utf8'");  
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          exit();
      }
      $consulta= "SELECT horarios.id, materias.nombre, docentes.nombre, horarios.dias, horarios.grupo, horarios.fecha_inicio, horarios.fecha_fin, horarios.hora_inicio, horarios.hora_fin FROM horarios\n"

    . "JOIN materias ON materia_id = materias.id\n"

    . "JOIN docentes ON docente_id = docentes.id";
      if ($resultado = $mysqli->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<tr>";
          echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td><td>$fila[8]</td>"; 
          echo"<td>";           
            echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-materia='" .$fila[1] ."' data-docente='" .$fila[2] ."' data-dias='" .$fila[3] ."' data-grupo='" .$fila[4] ."' data-f_i='" .$fila[5] ."' data-f_f='" .$fila[6] ."' data-h_i='" .$fila[7] ."' data-h_f='" .$fila[8] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Editar</a> ";        
          echo "</td>";
          echo "</tr>";
        }
        $resultado->close();
      }
      $mysqli->close();
      ?>
    </table>
    </div>

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
    <div class="dates">
      <label class="form-label col-md-3 " >Fecha Inicio:</label>
       <div class="col-md-9">
      <input type="text" autocomplete="off" id="fecha" name="f_i" class="form-control" placeholder="Seleccione Fecha">
    </div>
    </div>
    </div>

    <div class="form-group">
    <div class="dates">
      <label class="form-label col-md-3 " >Fecha Fin:</label>
      <div class="col-md-9">
      <input class="form-control" id="fecha" name="f_f" type="text" autocomplete="off" placeholder="Seleccione Fecha"></input>
      </div>
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
</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>

<?php
  }
  else
  {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
     <?php
  }
?>