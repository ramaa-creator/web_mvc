<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Isi mentah file index.php yang sebenarnya</h2>";
echo "<pre>" . htmlspecialchars(file_get_contents(__DIR__ . "/index.php")) . "</pre>";

echo "<hr><h2>Isi mentah bagian atas views/naga_view.php</h2>";
$viewContent = file_get_contents(__DIR__ . "/views/naga_view.php");
echo "<pre>" . htmlspecialchars(substr($viewContent, 0, 1500)) . "</pre>";

echo "<hr><h2>Menjalankan NagaController->index() langsung</h2>";
require_once __DIR__ . "/controllers/NagaController.php";
$controller = new NagaController();

ob_start();
$controller->index();
$output = ob_get_clean();

echo "<p><strong>Panjang output HTML:</strong> " . strlen($output) . " karakter</p>";
echo "<p><strong>Mengandung 'Data naga tidak ditemukan'?</strong> " . (strpos($output, 'tidak ditemukan') !== false ? 'YA' : 'TIDAK') . "</p>";
echo "<p><strong>Mengandung 'Naga Tiongkok'?</strong> " . (strpos($output, 'Naga Tiongkok') !== false ? 'YA' : 'TIDAK') . "</p>";

echo "<hr><h3>Output HTML lengkap (dibungkus, tidak dirender):</h3>";
echo "<textarea style='width:100%; height:400px;'>" . htmlspecialchars($output) . "</textarea>";
