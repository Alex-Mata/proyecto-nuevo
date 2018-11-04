<?php
  session_start();
  if(isset($_SESSION['user']))
  {
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/pie.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script><meta name="viewport" content="width=device-width, user-scalable=, initial-scale=1, maximum-scale=1, minima-scale=1">
</head>
<body>

<div id="wrapper">
<button type="button" class="btn btn-outline-danger">Info</button>
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
                    <a href="horario.php">Horarios</a>
                </li>
                <li>
                    <a href="#">Materias</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">


<div class="container-fluid">
  <h1>Registro de Materias</h1>
    <div class="container-fluid">
               
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="form-horizontal" action="insertar_materia.php" method="GET" autocomplete="off">   

<div class="form-group">
  <label class="form-label col-md-2 " for="materia">Materia:</label>
  <div class="col-md-10">
    <input class="form-control" id="materia" name="materia" type="text" autocomplete="off" placeholder="Ingrese Materia"></input>
  </div>
</div>

<div class="form-group">
  <label class="form-label col-md-2 " for="bloque">Bloque:</label>
    <div class="col-md-10">
    <input class="form-control" id="bloque" name="bloque" type="text" autocomplete="off" placeholder="Ingrese Bloque"></input>
    </div>
</div>

<div class="form-group">
  <label class="form-label col-md-3 ">Licenciatura:</label>
    <div class="col-md-9">
      <select class="form-control" id="area" name="area">
        <option value="0">Seleccione:</option>
        <?php
          $mysqli = mysqli_connect('localhost', 'root', '', "signature_igs16");
          $sql = $mysqli->query("SET NAMES 'utf8'");
          if (mysqli_connect_errno($mysqli))
          echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
          $mysqli->set_charset('utf8');
          $query = 'SELECT * FROM `areas`';
          $result = $mysqli->query($query);
          while($row = $result->fetch_array(MYSQLI_ASSOC)){
          echo '<option value="'.$row[id].'">'.$row[nombre].'</option>';
          }
        ?>
    </select>
  </div>
</div>
</div>
  
 
 
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button submit" value="guardar" class="btn btn-primary">Save changes</button> 
</div>             
</form>
      
      
      </div>
    </div>
  </div>
</div>
                
        <!-- /#page-content-wrapper -->

<section>
  <div class="container">
  <span class="d-block p-2 bg-primary text-white"><button class="btn btn-outline-success" type="button">Main button</button>
    <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Ver Menù</a>
    <button style="padding-top:20;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Materias
 </button></span>
  
<div class="table-resposive">
    <div class="row">
    <table class="table table-hover table-striped table-condensed">
      <thead>
        <tr>
          <th scope="col">ID:</th>
          <th scope="col">NOMBRE:</th>
          <th scope="col">BLOQUE:</th>
          <th scope="col">LICENCIATURA:</th>
          <th scope="col"><span class="glyphicon glyphicon-wrench"></span></th>
        </tr>
      </thead>    
    <?php
   
    $mysqli = new mysqli("localhost", "root", "", "signature_igs16");   
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          exit();
      }
      $sql = $mysqli->query("SET NAMES 'utf8'");
      $consulta= "SELECT m.id, m.nombre, m.bloque, a.nombre FROM materias m \n"

    . "JOIN areas a ON area_id = a.id";
      if ($resultado = $mysqli->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<tr>";
          echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";  
          echo"<td>";           
            echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-bloque='" .$fila[2] ."' data-licenciatura='" .$fila[3] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Editar</a> ";      
          echo "<a class='btn btn-danger' href='elimina_materia.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>";   
          echo "</td>";
          echo "</tr>";
        }
        $resultado->close();
      }
      $mysqli->close();
      ?>
    </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Materia:</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza_materia.php" method="POST" autocomplete="off">                           

                                  <input class="form-control" id="id" name="id" type="hidden" ></input>       
                              <div class="form-group">
                                <label class="form-label col-md-3 " for="nombre">NOMBRE:</label>
                                <input class="form-control" required id="nombre" name="nombre" type="text"></input>
                              </div>
                              <div class="form-group">
                                <label class="form-label col-md-3 " for="titulo">BLOQUE:</label>
                                <input class="form-control" required id="bloque" name="bloque" type="text"></input>
                              </div>
                              <div class="form-group">
                                <label class="form-label col-md-3 " for="licenciatura">Licenciatura:</label>
                            <select class="form-control" id="licenciatura" name="licenciatura">
                              <option value="0">Seleccione:</option>
                              <?php
                                $mysqli = mysqli_connect('localhost', 'root', '', "signature_igs16");
                                $sql = $mysqli->query("SET NAMES 'utf8'");
                                if (mysqli_connect_errno($mysqli))
                                echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
                                $mysqli->set_charset('utf8');
                                $query = 'SELECT * FROM `areas`';
                                $result = $mysqli->query($query);
                                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                echo '<option value="'.$row[nombre].'">'.$row[nombre].'</option>';
                                }
                              ?>
                           </select>
                              </div>

                  <input type="submit" class="btn btn-success" value="Editar">
                  
                       
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
      var recipient1 = button.data('nombre')
      var recipient2 = button.data('bloque')
      var recipient3 = button.data('licenciatura')

      //Extraer información de los atributos data- *
      // Si es necesario, puede iniciar una solicitud AJAX aquí (y luego hacer la actualización en una devolución de llamada).
      // Actualiza el contenido modal. Utilizaremos jQuery aquí, pero en su lugar podría usar una biblioteca de enlace de datos u otros métodos.
      
     
      var modal = $(this)    
      modal.find('.modal-body #id').val(recipient0)
      modal.find('.modal-body #nombre').val(recipient1)
      modal.find('.modal-body #bloque').val(recipient2)
      modal.find('.modal-body #licenciatura').val(recipient3) 
    });
    
  </script>
</section>
    </div>
  </div>
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
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
     <?php
  }
?>