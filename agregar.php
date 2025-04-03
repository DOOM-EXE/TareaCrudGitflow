<?php
include 'conexion/db_conexion.php';
include 'plantilla.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];
    $foto = $_POST['foto']; // URL de la imagen

    $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES ('$nombre', '$color', '$tipo', '$nivel', '$foto')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Agregar Nuevo Personaje</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Color Representativo:</label>
            <input type="text" name="color" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <input type="text" name="tipo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nivel:</label>
            <input type="number" name="nivel" class="form-control">
        </div>
        <div class="mb-3">
            <label>Foto (URL):</label>
            <input type="text" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
