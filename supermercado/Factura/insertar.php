<?php
$cantidad_producto = $_POST["cant_pro"];
$tipo_pago = $_POST["tip_pag"];
$fecha_factura = $_POST["fec_fac"];
$id_producto = $_POST["Id_pro"];
$id_cliente = $_POST["Id_cli"];
$id_empleado = $_POST["Id_emp"];

#Conexion
include '../conexion.php';
#Hace la insersion de la nuevo factura
$sql="insert into factura (cant_pro, tip_pag, fec_fac, Id_pro, Id_cli, Id_emp) values($cantidad_producto, '$tipo_pago', '$fecha_factura', $id_producto, $id_cliente, $id_empleado)";

if ($conn->query($sql) === TRUE) {
  echo "se creo una nueva factura";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>