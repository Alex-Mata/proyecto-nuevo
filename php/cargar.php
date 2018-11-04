<?php 
require_once 'conexion.php';

function getdocentes(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `docentes`';
  $result = $mysqli->query($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_docente]'>$row[nombre]</option>";
  }
  return $listas;
}

echo getdocentes();