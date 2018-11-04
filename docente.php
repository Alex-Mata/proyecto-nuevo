<?php
  session_start();
  if(isset($_SESSION['user']))
  {
?>
<!DOCTYPE html>
<html>
<head>
  <title>DOCENTE</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>
  </head>


<!-- Button trigger modal -->

<body>
<div id="wrapper">
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
<div id="page-content-wrapper">
  <div class="container-fluid">

<!--modal para agregar nuevo docente-->               
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

 <form class="form-horizontal" action="insertar_docente.php" method="GET" autocomplete="off">  

<div class="form-group">
  <label class="form-label col-md-2" for="nombre">Nombre:</label>
    <div class="col-md-10">
    <input class="form-control" id="nombre" requiered name="nombre" type="text" autocomplete="off" placeholder="Ingrese Nombre"></input>
    </div>
 </div>

<div class="form-group">
  <label class="form-label col-md-2" for="titulo">Titulo:</label>
  <div class="col-md-10">
   <input class="form-control" id="titulo" required name="titulo" type="text"  placeholder="Ingrese Titulo"></input>
  </div>
</div>

<div class="form-group">
  <label class="form-label col-md-2" for="telefono">Telefono:</label>
    <div class="col-md-10">
    <input class="form-control" id="telefono" required  name="telefono" type="text"  placeholder="Ingrese Telefono"></input>
    </div>
</div>

<div class="form-group">
  <label class="form-label col-md-3 "  for="exclusividad">Exclusividad:</label>
   <div class="col-md-9">
     <select class="form-control" name="opciones">
     <option value="Fijo">Fijo</option>
     <option value="Temporal">Temporal</option>
     <option value="Inactivo">Inactivo</option>
     </select>
  </div>
</div>  

<div class="form-group">
  <label class="form-label col-md-4"  for="cedula">Cedula Profesional:</label>
    <div class="col-md-8">
    <input class="form-control" id="cedula" required  name="cedula" type="text" autocomplete="off" placeholder="Ingrese Cedula Profesional"></input>
    </div>
</div>
  
 
 
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  <button type="button submit" value="guardar" class="btn btn-primary">Guardar Cambios</button> 
</div>             
</form>
      
      
      </div>
    </div>
  </div>
</div>

<section style="padding-top: 5%;">
<div class="panel panel-primary">
 
<div class="panel-heading"><h4>Alta Docentes</h4> 
<div align="right">
 <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Ver Menù</a>
  <button style="padding-top:20;" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      <span class="glyphicon glyphicon-plus-sign"> Agregar Docente</span>
   </button>
  </div>
</div>

<div class="panel-body">
  <div class="">
    <div class="row">
    <table class="table table-hover table-striped table-condensed">
      <thead>
        <tr>
          <th scope="col">ID:</th>
          <th scope="col">NOMBRE:</th>
          <th scope="col">TITULO:</th>
          <th scope="col">TELEFONO:</th>
          <th scope="col">EXCLUSIVIDAD:</th>
          <th scope="col">CEDULA PROFESIONAL:</th>
          <th><span class="glyphicon glyphicon-wrench"></span></th>
        </tr> 
      </thead>


    <?php
      //paginadorf
    
    $mysqli = new mysqli("localhost", "root", "", "signature_igs16"); 
    $sql = $mysqli->query("SET NAMES 'utf8'");  
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          exit();
      }
    $sql_registe = mysqli_query($mysqli, "SELECT COUNT(*) as total_registro FROM docentes");
    $result_register = mysqli_fetch_array($sql_registe);
    $total_registro = $result_register['total_registro'];
    $por_pagina = 10;
    if(empty($_GET['pagina'])){
      $pagina = 1;
    }else {
      $pagina=$_GET['pagina'];
    }

    $desde = ($pagina-1)*$por_pagina;
    $total_paginas = ceil($total_registro / $por_pagina);

      $consulta= "SELECT * FROM docentes ORDER BY id ASC LIMIT $desde,$por_pagina";
      if ($resultado = $mysqli->query($consulta)) 
      {
        while ($fila = $resultado->fetch_row()) 
        {         
          echo "<tr>";
          echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>";  
          echo"<td>";           
            echo "<a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-nombre='" .$fila[1] ."' data-titulo='" .$fila[2] ."' data-telefono='" .$fila[3] ."' data-exclusividad='" .$fila[4] ."' data-cedula_profesional='" .$fila[5] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> </a> ";        
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
                        <h4>Editar Docente</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php"  enctype="multipart/form-data" method="POST" autocomplete="off">                          

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
                              <option value="Inactivo">Inactivo</option>
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
    </div>

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
  <div class="panel-footer panel-primary">
  <div align="right">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item disabled"><a class="page-link" href="?pagina=<?php echo $pagina -1;?>">Previous</a></li>
          <?php
          for ($i=1; $i <=$total_paginas; $i++) { 
            //if ($i == $pagina) {
              //echo '<li class="page-item">'.$i.'</li>';
            //}else{
            echo '<li class="page-item">
                  <a class="page-link"  href="?pagina='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
              </li>';
          //}
        }
          ?>
          <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina +1;?>">Next</a></li>
       </ul>
    </nav>
    </div>
    </div></div>

</div>
  </div>

</section>

  <div id=""></div>
            </div>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('mostrar.php');
  });
</script>
<?php
  }
  else
  {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
     <?php
  }
?>