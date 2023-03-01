<?php
$nombre_categoria = $_POST["Nom_cat"];
#Conexion
include '../conexion.php';
#Hace la insersion de la nueva categoria
$sql="insert into categorias (Nom_cat) values('$nombre_categoria')";
if ($conn->query($sql) === TRUE) {
  echo "se creo una nueva categoría";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>