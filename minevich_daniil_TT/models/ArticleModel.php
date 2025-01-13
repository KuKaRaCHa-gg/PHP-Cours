<?php

class ArticleModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllArticles() {
        $stmt = $this->db->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addArticle($title, $content, $summary, $imagePath = null) {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content, summary, image_path) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $summary, $imagePath]);
        return $this->db->lastInsertId();
    }

    public function updateArticle($id, $title, $content, $summary, $imagePath = null) {
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ?, summary = ?, image_path = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$title, $content, $summary, $imagePath, $id]);
        return $stmt->rowCount();
    }

    public function deleteArticle($id) {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
?>
