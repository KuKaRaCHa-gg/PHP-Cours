<?php
require_once 'config/database.php';
require_once 'models/ArticleModel.php';

$db = getDatabaseConnection();
$articleModel = new ArticleModel($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = $articleModel->getArticleById($id);

    if ($article) {
        $base_url = "/COURS/minevich_daniil_TT/";

        // Si l'article a une image associée
        if (!empty($article['image_path'])) {
            $imagePath = $base_url . "images/" . htmlspecialchars($article['image_path']);
        } else {
            $imagePath = $base_url . "images/default-image.jpg";
        }

        // Affichage de l'article
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= htmlspecialchars($article['titre']) ?></title>
            <link rel="stylesheet" href="<?= $base_url ?>assets/css/main.css">
        </head>
        <body>
            <header>
                <h1>Article : <?= htmlspecialchars($article['titre']) ?></h1>
                <nav>
                    <ul>
                        <li><a href="<?= $base_url ?>">Accueil</a></li>
                        <li><a href="<?= $base_url ?>about">À propos</a></li>
                        <li><a href="<?= $base_url ?>contact">Contact</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <article>
                    <h2><?= htmlspecialchars($article['titre']) ?></h2>
                    <p>Par <?= htmlspecialchars($article['auteur']) ?>, publié le <?= htmlspecialchars($article['date_publication']) ?></p>
                    <div>
                        <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($article['titre']) ?>" />
                    </div>
                    <div>
                        <?= nl2br(htmlspecialchars($article['contenu'])) ?>
                    </div>
                </article>
                <a href="<?= $base_url ?>">Retour à la liste des articles</a>
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
