<!DOCTYPE HTML>
<html>
    <head>
        <title>Examen PHP 2024</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="/COURS/minevich_daniil_TT/assets/css/main.css" />
    </head>
    <body class="is-preload">

        <div id="wrapper">

            <header id="header">
                <div class="logo">
                    <h1><a href="/COURS/minevich_daniil_TT/">Examen PHP 2024</a></h1>
                </div>
                <nav class="links">
                    <ul>
                        <li><a href="/COURS/minevich_daniil_TT/">Accueil</a></li>
                        <li><a href="/COURS/minevich_daniil_TT/about">À propos</a></li>
                        <li><a href="/COURS/minevich_daniil_TT/contact">Contact</a></li>
                    </ul>
                </nav>
            </header>

            <div id="main">

                <h2>Liste des articles</h2>
                <div class="articles-grid">
                    <?php foreach ($articles as $article): ?>
                        <div class="article-item">
                            <a href="/COURS/minevich_daniil_TT/article/<?= htmlspecialchars($article['id']) ?>" class="article-link">
                                <div class="article-image">
                                    <?php
                                        $imagePath = !empty($article['image_path']) ? $article['image_path'] : 'default-image.jpg';
                                    ?>
                                    <img src="/COURS/minevich_daniil_TT/images/<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($article['titre']) ?>" />
                                </div>
                                <div class="article-content">
                                    <h3><?= htmlspecialchars($article['titre']) ?></h3>
                                    <p class="article-summary"><?= htmlspecialchars(substr($article['contenu'], 0, 100)) ?>...</p>
                                    <p class="article-meta">Par <?= htmlspecialchars($article['auteur']) ?>, publié le <?= htmlspecialchars($article['date_publication']) ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <ul class="actions pagination">
                    <li><a href="#" class="disabled button large previous">Page précédente</a></li>
                    <li><a href="#" class="button large next">Page suivante</a></li>
                </ul>

            </div>

            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                    <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; 2024 Examen PHP. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
            </section>

        </div>

        <script src="/COURS/minevich_daniil_TT/assets/js/jquery.min.js"></script>
        <script src="/COURS/minevich_daniil_TT/assets/js/browser.min.js"></script>
        <script src="/COURS/minevich_daniil_TT/assets/js/breakpoints.min.js"></script>
        <script src="/COURS/minevich_daniil_TT/assets/js/util.js"></script>
        <script src="/COURS/minevich_daniil_TT/assets/js/main.js"></script>

    </body>
</html>
