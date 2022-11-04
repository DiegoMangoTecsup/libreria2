<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $alquiler = $_POST["txtAlquiler"];
    $fecha_alquiler = $_POST["txtFecha_Alquiler"];
    $fecha_devolucion = $_POST["txtFecha_Devolucion"];
    $id = $_POST["txtId"];
    

    $sentencia = $bd->prepare("update alquiler set alquiler = ?, fecha_alquiler = ?, fecha_devolucion = ?, id = ?, where codigo = ?;");
    $resultado = $sentencia->execute([$alquiler, $fecha_alquiler, $fecha_devolucion, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
