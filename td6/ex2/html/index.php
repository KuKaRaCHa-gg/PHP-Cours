<?php
require_once 'db.php';

// Récupération des articles publiés
$stmt = $pdo->query("SELECT id, titre, auteur, date_creation FROM articles WHERE statut = 'publie'");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tableau d'images disponibles
$images = [
    "images/pic01.jpg",
    "images/pic02.jpg",
    "images/pic03.jpg",
    "images/pic04.jpg",
    "images/pic05.jpg",
    "images/pic06.jpg",
    "images/pic07.jpg"
];

// Compteur pour les images
$imageIndex = 0;
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Liste des articles</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload homepage">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">
                <div id="logo">
                    <h1><a href="index.php">Blog</a></h1>
                </div>
            </header>
        </div>

        <!-- Features -->
        <div id="features-wrapper">
            <div class="container">
                <div class="row">
                    <?php foreach ($articles as $article): ?>
                        <div class="col-4 col-12-medium">
                            <section class="box feature">
                                <!-- Utilise une image du tableau -->
                                <a href="article.php?id=<?= $article['id']; ?>" class="image featured">
                                    <img src="<?= $images[$imageIndex]; ?>" alt="<?= htmlspecialchars($article['titre']); ?>" />
                                </a>
                                <div class="inner">
                                    <header>
                                        <h2><?= htmlspecialchars($article['titre']); ?></h2>
                                        <p>Par <?= htmlspecialchars($article['auteur']); ?> le <?= htmlspecialchars($article['date_creation']); ?></p>
                                    </header>
                                    <a href="article.php?id=<?= $article['id']; ?>" class="button">Lire l'article</a>
                                </div>
                            </section>
                        </div>
                        <?php 
                        // Incrémente l'index pour changer d'image
                        $imageIndex++;
                        // Revient au début si on dépasse le nombre d'images
                        if ($imageIndex >= count($images)) {
                            $imageIndex = 0;
                        }
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
            <footer id="footer" class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="copyright">
                            <ul class="menu">
                                <li>&copy; Untitled. All rights reserved</li>
                                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
