<?php
$nombre_descuento = $_POST["Nom_des"];
$porcentaje_descuento = $_POST["Por_des"];
#Conexion
include '../conexion.php';
#Hace la insersion del nuevo descuento
$sql="insert into descuento (Nom_des, Por_des) values('$nombre_descuento', $porcentaje_descuento)";
if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo descuento";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>