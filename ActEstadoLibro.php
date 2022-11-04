<?php include 'template/header.php' ?>
<?php echo '<link href="css/styles.css" type="text/css" rel="stylesheet">';?>
<?php
if (!isset($_GET['codigo'])) {
    header('Location: Libros.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$codigo = $_GET['codigo'];
$sentencia = $bd->prepare("select * from libros where id = ?;");
$sentencia->execute([$codigo]);
$libros = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Actualizar Estado:
                </div>
                <form class="p-4" method="POST" action="procesoEditadoL.php">
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" autofocus required 
                        value="">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="1">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>