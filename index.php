<?php
include 'plantilla.php';
include 'conexion/db_conexion.php';
$result = $conn->query("SELECT * FROM personajes");

if (!file_exists('conexion/db_conexion.php')) {
    header("Location: instalador.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breaking Bad - CRUD</title>

</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Personajes de Breaking Bad</h2>
    <a href="agregar.php" class="btn btn-success mb-3"> Agregar Personaje</a>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Tipo</th>
            <th>Nivel</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT * FROM personajes");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><img src="<?= $row['foto'] ?>" width="50" height="50" style="border-radius: 50%;"></td>
            <td><?= $row['nombre'] ?></td>
            <td style="color: <?= $row['color'] ?>;"><?= $row['color'] ?></td>
            <td><?= $row['tipo'] ?></td>
            <td><?= $row['nivel'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" >🗑 Eliminar</a>
                <a href="descargar_pdf.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">📄 PDF</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
</body>
</html>
