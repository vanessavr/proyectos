<?php
$stock = $_POST["Stock_pro"];
$nombre_producto = $_POST["Nom_pro"];
$id_categoria = $_POST["Id_cat"];
$precio_producto = $_POST["Pre_pro"];

#Conexion
include '../conexion.php';

#Hace la insersion del nuevo producto
$sql="insert into productos (Nom_pro, Stock_pro, Id_cat, Pre_pro) values('$nombre_producto', $stock, $id_categoria, $precio_producto)";

if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo producto";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>