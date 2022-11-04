<?php include 'template/header.php' ?>
<?php echo '<link href="css/styles.css" type="text/css" rel="stylesheet">';?>
<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from clientes where id = ?;");
$sentencia->execute([$codigo]);
$clientes = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_alquiler = $bd->prepare("select * from alquiler where id = ?;");
$sentencia_alquiler->execute([$codigo]);
$alquiler = $sentencia_alquiler->fetchAll(PDO::FETCH_OBJ); 

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos para el Alquiler:
                </div>
                <form class="p-4" method="POST" action="registrarAlquiler.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Libro prestado: </label>
                        <input type="text" class="form-control" name="txtAlquiler" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha del prestamo: </label>
                        <input type="date" class="form-control" name="txtFecha_Alquiler" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de devolucion: </label>
                        <input type="date" class="form-control" name="txtFecha_Devolucion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID del cliente: </label>
                        <input type="number" class="form-control" name="txtId" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7">
            <?php include 'mensajes/mensajes.php' ?>
            <div class="card">
                <div class="card-header">
                    Lista de Alquileres Registrados:
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Alquiler</th>
                                <th scope="col">Fecha del Alquiler</th>
                                <th scope="col">Fecha de la Devolucion</th>
                                <th scope="col">ID del cliente</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($alquiler as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->alquiler; ?></td>
                                    <td><?php echo $dato->fecha_alquiler; ?></td>
                                    <td><?php echo $dato->fecha_devolucion; ?></td>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarAlquiler.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>