<?php 
include 'conexion.php';

function getDocenteLis(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `docentes`';
  $result = $mysqli->query($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id]'>$row[nombre]</option>";
  }
  return $listas;
}

echo getDocenteLis();