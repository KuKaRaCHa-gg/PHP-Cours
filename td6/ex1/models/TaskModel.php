<?php
class TaskModel {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getDatabaseConnection();
    }

    // Connexion à la base de données
    private function getDatabaseConnection() {
        try {
            $dsn = 'mysql:host=localhost;dbname=ex2_td5';
            $username = 'root';
            $password = '';
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Récupérer tous les utilisateurs
    public function getUsers() {
        $query = $this->pdo->query("SELECT id, nom, prenom FROM User");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les tâches
    public function getAllTasks() {
        $query = $this->pdo->query("SELECT * FROM Tache");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insérer une nouvelle tâche
    public function insertTask($nom, $description, $echeance) {
        $stmt = $this->pdo->prepare("INSERT INTO Tache (nom, description, echeance) VALUES (:nom, :description, :echeance)");
        $stmt->execute([':nom' => $nom, ':description' => $description, ':echeance' => $echeance]);
    }

    // Récupérer une tâche par son ID
    public function getTaskById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Tache WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une tâche
    public function updateTask($id, $nom, $description, $echeance) {
        $stmt = $this->pdo->prepare("UPDATE Tache SET nom = :nom, description = :description, echeance = :echeance WHERE id = :id");
        $stmt->execute([':nom' => $nom, ':description' => $description, ':echeance' => $echeance, ':id' => $id]);
    }

    // Supprimer une tâche
    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Tache WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    
}
