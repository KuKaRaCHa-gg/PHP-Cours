<?php
require_once 'db.php'; // Connexion à la base de données

// Vérifie si un ID valide est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour récupérer un article spécifique
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id AND statut = 'publie'");
    $stmt->execute(['id' => $id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Article non trouvé ou non publié.");
    }
} else {
    die("ID d'article invalide.");
}
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($article['titre']); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload homepage">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">
                <!-- Logo -->
                <div id="logo">
                    <h1><a href="index.php">Blog</a></h1>
                </div>
            </header>
        </div>

        <!-- Main Content -->
        <div id="main-wrapper">
            <div class="container">
                <div id="content">
                    <article>
                        <h2><?= htmlspecialchars($article['titre']); ?></h2>
                        <p>Publié par <?= htmlspecialchars($article['auteur']); ?> le <?= htmlspecialchars($article['date_creation']); ?></p>
                        <p><?= nl2br(htmlspecialchars($article['contenu'])); ?></p>
                    </article>
                    <a href="index.php" class="button">Retour à la liste des articles</a>
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

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
