<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: Libros.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $estado = $_POST['txtEstado'];


    $sentencia = $bd->prepare("UPDATE libros SET estado = ? where id = ?;");
    $resultado = $sentencia->execute([$estado, $codigo]);

    if ($resultado === TRUE) {
        header('Location: Libros.php?mensaje=editado');
    } else {
        header('Location: Libros.php?mensaje=error');
        exit();
    }
?>