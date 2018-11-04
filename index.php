<?php
	session_start();
	if(isset($_SESSION['user']))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/pie.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
  <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <meta name="viewport" content="width=device-width, user-scalable=, initial-scale=1, maximum-scale=1, minima-scale=1">

</head>
  <body>

    <div id="wrapper" >

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
                    <a id="inicio" href="">Inicio</a>
                </li>
                <li>
                    <a id="recargarDocentes" href="docente.php">Docentes</a>
                </li>
                <li>
                    <a href="horario.php">Horarios</a>
                </li>
                <li>
                    <a href="materia.php">Materias</a>
                </li>
        </ul>
    </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                    <div id="contenido">
                    </div>
                
            </div>

                <h1>Signature igs-16</h1>
                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Ver Menù</a>
        </div>


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
                $('#recargarDocentes').click(function(){
                $("#contenido").load("docente.php");
                                             });

                $(document).ready(function(){
                $('#inicio').click(function(){
                $("#contenido").load("index.php");
                                             });
                </script>
<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
		 <?php
	}
?>