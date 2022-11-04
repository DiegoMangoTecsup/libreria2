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
                    Editar libro:
                </div>
                <form class="p-4" method="POST" action="procesoEditadoL.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $libros->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor: </label>
                        <input type="text" class="form-control" name="txtAutor" autofocus required
                        value="<?php echo $libros->autor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial: </label>
                        <input type="text" class="form-control" name="txtEditorial" autofocus required
                        value="<?php echo $libros->editorial; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" autofocus required
                        value="<?php echo $libros->estado; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $libros->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>