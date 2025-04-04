<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
include 'conexion/db_conexion.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM personajes WHERE id=$id");
$personaje = $result->fetch_assoc();

// Configuración de DomPDF
$options = new Options();
$options->set('defaultFont', 'Arial');
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);
// Contenido del PDF
$html = "
<style>
    body { font-family: Arial, sans-serif; color: #333; }
    .container { text-align: center; padding: 20px; }
    .title { font-size: 22px; color: #007BFF; font-weight: bold; }
    .profile-img { border-radius: 10px; margin-bottom: 15px; }
    .info { font-size: 16px; margin: 10px 0; }
    .footer { font-size: 12px; color: #777; margin-top: 20px; }
</style>

<div class='container'>
    <h2 class='title'>Perfil del Personaje</h2>
    <hr>
    <img class='profile-img' src='{$personaje['foto']}' width='150' height='150'>
    <p class ='info'><strong>Nombre:</strong>{$personaje['nombre']}</p>
    <p class='info'><strong>Color Representativo:</strong> {$personaje['color']}</p>
    <p class='info'><strong>Tipo:</strong> {$personaje['tipo']}</p>
    <p class='info'><strong>Nivel:</strong> {$personaje['nivel']}</p>
    <hr>
    <p class='footer'>Generado automáticamente por Breaking Bad CRUD</p>
</div>
";

// Generar el PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("perfil_{$personaje['nombre']}.pdf", ["Attachment" => false]); // false para abrir en el navegador
?>
