<?php
$a=$_POST["fcod"];
$b=$_POST["fnom"];
$c=$_POST["fedad"];

include 'conexion.php';

$sql="insert into alumnos values('$a','$b',$c)";
if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo estudiante";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>