<?php
//print_r($_POST);
if (empty($_POST["txtAlquiler"]) || empty($_POST["txtFecha_Alquiler"]) || empty($_POST["txtFecha_Devolucion"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$alquiler = $_POST["txtAlquiler"];
$fecha_alquiler = $_POST["txtFecha_Alquiler"];
$fecha_devolucion = $_POST["txtFecha_Devolucion"];
$id = $_POST["txtId"];


$sentencia = $bd->prepare("insert alquiler(alquiler, fecha_alquiler, fecha_devolucion, id) values (?,?,?,?);");
$resultado = $sentencia->execute([$alquiler, $fecha_alquiler, $fecha_devolucion, $id ]);

if ($resultado === TRUE) {
    header('Location: agregarAlquiler.php?codigo='.$id);
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
