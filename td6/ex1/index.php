<?php
require_once 'controllers/TaskController.php';

$controller = new TaskController();
$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'list':
        $controller->listTasks();
        break;
    case 'form':
        $controller->showTaskForm($id);
        break;
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addTask($_POST['nom'], $_POST['description'], $_POST['echeance']);
        }
        break;
    case 'edit':
        $controller->showTaskForm($id);
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateTask($id, $_POST['nom'], $_POST['description'], $_POST['echeance']);
        }
        break;
    case 'delete':
        $controller->deleteTask($id);
        break;
    
    default:
        $controller->listTasks();
}
