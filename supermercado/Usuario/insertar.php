<<?php
$nombre_cliente = $_POST["Nom_cli"];
$fecha_nacimiento = $_POST["Fec_nac_cli"];
$telefono = $_POST["Tel_cli"];
$email = $_POST["Email_cli"];

#Conexion
include '../conexion.php';
#Hace la insersion del nuevo cliente
$sql="insert into cliente (Nom_cli, Fec_nac_cli, Tel_cli, Email_cli) values('$nombre_cliente', '$fecha_nacimiento', $telefono, '$email')";
if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo cliente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>