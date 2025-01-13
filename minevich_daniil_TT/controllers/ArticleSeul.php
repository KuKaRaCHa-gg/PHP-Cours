
<?php

require_once 'config/database.php';
require_once 'models/ArticleModel.php';

$db = getDatabaseConnection();
$articleModel = new ArticleModel($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = $articleModel->getArticleById($id);

    if ($article) {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= htmlspecialchars($article['titre']) ?></title>
            <link rel="stylesheet" href="assets/css/main.css">
        </head>
        <body>
            <header>
                <h1>Article : <?= htmlspecialchars($article['titre']) ?></h1>
                <nav>
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/about">À propos</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <article>
                    <h2><?= htmlspecialchars($article['titre']) ?></h2>
                    <p>Par <?= htmlspecialchars($article['auteur']) ?>, publié le <?= htmlspecialchars($article['date_publication']) ?></p>
                    <div>
                        <?php if (!empty($article['image_path'])): ?>
                            <img src="/images/<?= htmlspecialchars($article['image_path']) ?>" alt="<?= htmlspecialchars($article['titre']) ?>" />
                        <?php else: ?>
                            <img src="/images/default-image.jpg" alt="Image par défaut" />
                        <?php endif; ?>
                    </div>
                    <div>
                        <?= nl2br(htmlspecialchars($article['contenu'])) ?>
                    </div>
                </article>
                <a href="/">Retour à la liste des articles</a>
            </main>

            <footer>
                <p>&copy; 2024 Blog. Tous droits réservés.</p>
            </footer>
        </body>
        </html>
        <?php
    } else {
        echo "Article non trouvé.";
    }
} else {
    echo "Aucun ID d'article fourni.";
}
?>
