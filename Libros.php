<?php include 'template/header.php' ?>
<?php echo '<link href="css/styles.css" type="text/css" rel="stylesheet">';?>
<?php

include_once "model/conexion.php";
$sentencia = $bd->query("select * from libros");
$libros = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    Lista de libros:
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID del libro</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Editorial</th>
                                <th scope="col">Estado</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($libros as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->Nombre; ?></td>
                                    <td><?php echo $dato->Autor; ?></td>
                                    <td><?php echo $dato->Editorial; ?></td>
                                    <td><?php echo $dato->Estado; ?></td>
                                    <td><center><a class="text-primary" href="ActEstadoLibro.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></center></td>                                </tr>
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