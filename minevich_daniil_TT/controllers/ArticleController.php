<?php

require_once 'models/ArticleModel.php';

class ArticleController {
    private $model;

    public function __construct($db) {
        $this->model = new ArticleModel($db); 
    }

    public function index() {
        $articles = $this->model->getAllArticles();
        require 'views/homeView.php';
    }

    public function show($id) {
        $article = $this->model->getArticleById($id);
        if ($article) {
            require 'views/articleView.php'; 
        } else {
            http_response_code(404);
            echo "Article non trouvé";
        }
    }
}
