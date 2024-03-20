<?php
require 'bd/conexion.php';
$bd = new Database();
$con = $bd->conectar();

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$kilometraje_ini = $_POST['kilometraje_ini'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$id_estado = $_POST['id_estado'];


echo $documento;
echo $nombre;
echo $kilometraje_ini;
echo $marca;
echo $modelo;
echo $id_estado;



$insertsql = $con->prepare("INSERT INTO registro (documento, nombre, kilometraje_inillido, marca, modelo, id_estado, 	) VALUES (?, ?, ?, ?, ?, ?)");
$filaa1 = $insertsql->execute([ $documento, $nombre, $kilometraje_ini, $marca, $modelo, $id_estado,  1]);

if ($filaa1) {
    echo '<script>alert("Datos registrados exitosamente");</script>';
} else {
    echo '<script>alert("Error al registrar los datos. Por favor, inténtelo de nuevo.");</script>';
}

?>