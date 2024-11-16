<?php
require_once 'models/TaskModel.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
    }

    public function listTasks() {
        $tasks = $this->taskModel->getAllTasks();
        require 'views/task_list.php';
    }

    public function showTaskForm($id = null) {
        if ($id) {
            $tache = $this->taskModel->getTaskById($id);
        }
        require 'views/task_form.php';
    }

    public function addTask($nom, $description, $echeance) {
        $this->taskModel->insertTask($nom, $description, $echeance);
        header('Location: index.php?action=list');
    }

    public function updateTask($id, $nom, $description, $echeance) {
        $this->taskModel->updateTask($id, $nom, $description, $echeance);
        header('Location: index.php?action=list');
    }

    public function deleteTask($id) {
        $this->taskModel->deleteTask($id);
        header('Location: index.php?action=list');
    }
}
