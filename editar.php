<?php
include 'plantilla.php';
include 'conexion/db_conexion.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM personajes WHERE id=$id");
$personaje = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];
    $foto = $_POST['foto'];

    $sql = "UPDATE personajes SET nombre='$nombre', color='$color', tipo='$tipo', nivel='$nivel', foto='$foto' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Editar Personaje</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $personaje['id'] ?>">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= $personaje['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Color Representativo:</label>
            <input type="text" name="color" class="form-control" value="<?= $personaje['color'] ?>">
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <input type="text" name="tipo" class="form-control" value="<?= $personaje['tipo'] ?>">
        </div>
        <div class="mb-3">
            <label>Nivel:</label>
            <input type="number" name="nivel" class="form-control" value="<?= $personaje['nivel'] ?>">
        </div>
        <div class="mb-3">
            <label>Foto (URL):</label>
            <input type="text" name="foto" class="form-control" value="<?= $personaje['foto'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
