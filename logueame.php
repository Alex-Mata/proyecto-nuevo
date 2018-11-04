<?php

session_start();
$connect = mysqli_connect("localhost","root","","signature_igs16");

if(isset($_POST["user"]) && isset($_POST["pass"])){
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  $sql = "SELECT nombre FROM administrador WHERE (nombre='$user' OR email='$user') AND contra='$pass'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["user"] = $data["nombre"];
    echo "1";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
