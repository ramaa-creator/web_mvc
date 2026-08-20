<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/config/Database.php";
require_once __DIR__ . "/models/NagaModel.php";

echo "<h2>Debug NagaModel</h2>";

try {
    $database = new Database();
    $db = $database->getConnection();

    $model = new NagaModel($db);
    $hasil = $model->getAll();

    echo "<p><strong>Tipe hasil:</strong> " . gettype($hasil) . "</p>";
    echo "<p><strong>Jumlah data dari NagaModel::getAll():</strong> " . count($hasil) . "</p>";

    echo "<pre>";
    print_r($hasil);
    echo "</pre>";
} catch (Throwable $e) {
    echo "<p style='color:red'><strong>ERROR:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "<hr><h2>Debug NagaController</h2>";
try {
    require_once __DIR__ . "/controllers/NagaController.php";
    $refClass = new ReflectionClass('NagaController');
    echo "<p>File NagaController yang dimuat: <strong>" . htmlspecialchars($refClass->getFileName()) . "</strong></p>";

    $refModel = new ReflectionClass('NagaModel');
    echo "<p>File NagaModel yang dimuat: <strong>" . htmlspecialchars($refModel->getFileName()) . "</strong></p>";

    $refView = __DIR__ . "/views/naga_view.php";
    echo "<p>File naga_view.php seharusnya di: <strong>" . htmlspecialchars($refView) . "</strong> - " .
         (file_exists($refView) ? "ADA" : "TIDAK DITEMUKAN") . "</p>";
} catch (Throwable $e) {
    echo "<p style='color:red'><strong>ERROR:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
}
