<?php include 'template/header.php' ?>
<?php echo '<link href="css/styles.css" type="text/css" rel="stylesheet">';?>
<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("select * from alquiler where codigo = ?;");
    $sentencia->execute([$codigo]);
    $alquiler = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                <form class="p-4" method="POST" action="editarLibroProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Alquiler: </label>
                        <input type="text" class="form-control" name="txtAlquiler" autofocus required 
                        value="<?php echo $alquiler->Alquiler; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha del Alquiler: </label>
                        <input type="date" class="form-control" name="txtFecha_Alquiler" autofocus required
                        value="<?php echo $alquiler->fecha_alquiler; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Devolucion: </label>
                        <input type="date" class="form-control" name="txtFecha_Devolucion" autofocus required
                        value="<?php echo $alquiler->fecha_devolucion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID del cliente: </label>
                        <input type="number" class="form-control" name="txtId" autofocus required
                        value="<?php echo $alquiler->Id; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $alquiler->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>