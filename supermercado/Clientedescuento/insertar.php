<?php
$id_cliente = $_POST["Id_cli"];
$id_descuento = $_POST["Id_des"];


#Conexion
include '../conexion.php';
#Hace la insersion del nuevo clientedescuento
$sql="insert into clientedescuento (Id_cli, Id_des) values($id_cliente, $id_descuento)";

if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo clientedescuento";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>