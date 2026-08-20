<?php
require_once __DIR__ . "/controllers/NagaController.php";

$controller = new NagaController();

// Routing sederhana
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'detail':
        $controller->detail($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}
