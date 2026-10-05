<?php

require_once __DIR__ . '/controllers/FacultyController.php';

$action = $_GET['action'] ?? 'index';

$controller = new FacultyController();

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'index':
    default:
        $controller->index();
        break;
}