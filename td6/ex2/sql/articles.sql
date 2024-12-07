-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 16 nov. 2023 à 15:57
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_exo_td6`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `mots_cles` varchar(255) DEFAULT NULL,
  `nb_vues` int(11) DEFAULT '0',
  `statut` enum('publie','brouillon') DEFAULT 'brouillon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `auteur`, `date_creation`, `categorie`, `mots_cles`, `nb_vues`, `statut`) VALUES
(1, 'Les bases du HTML', '<p>Le HTML (HyperText Markup Language) est le langage de balisage standard pour la création de pages web.</p><p>Il permet de structurer le contenu en utilisant des balises telles que &lt;h1&gt;, &lt;p&gt;, &lt;a&gt;, etc.</p>', 'WebMaster', '2023-06-01', 'Informatique', 'HTML, Web', 150, 'publie'),
(2, 'Conception responsive', '<p>La conception responsive vise à créer des sites web qui s\'adaptent à différents dispositifs, comme les smartphones et les tablettes.</p><p>Utilisez des techniques CSS telles que les médias queries pour rendre votre site responsive.</p>', 'Designer456', '2023-06-05', 'Design', 'Responsive, CSS', 120, 'publie'),
(3, 'Recette de tarte aux pommes', '<p>Voici une délicieuse recette de tarte aux pommes :</p><ul><li>Ingrédients :</li><li> - Pommes</li><li> - Pâte feuilletée</li><li> - Sucre</li><li> - Cannelle</li></ul><p>Préchauffez le four, étalez la pâte, disposez les pommes, saupoudrez de sucre et de cannelle, puis enfournez.</p>', 'ChefPâtissier', '2023-06-10', 'Cuisine', 'Tarte aux pommes, Dessert', 180, 'publie'),
(4, 'Nouvelles fonctionnalités JavaScript', '<p>JavaScript évolue constamment. Découvrez les dernières fonctionnalités comme les fonctions fléchées, les classes, et les modules ECMAScript 6.</p><p>Mettez à jour vos compétences pour rester à jour avec les dernières pratiques de développement web.</p>', 'JavaScriptDev', '2023-06-15', 'Informatique', 'JavaScript, ECMAScript 6', 200, 'publie'),
(5, 'Techniques avancées de CSS', '<p>Explorez des techniques avancées de CSS pour améliorer la mise en page et le style de vos pages web.</p><p>Utilisez les flexbox, grid layout, et les animations CSS pour créer des designs modernes et attrayants.</p>', 'CSSGuru', '2023-06-20', 'Design', 'CSS, Flexbox, Grid', 160, 'brouillon'),
(6, 'Voyage à travers l\'Europe', '<p>Partagez votre expérience de voyage à travers l\'Europe :</p><ul><li> - Visite de Paris</li><li> - Détente sur la côte italienne</li><li> - Randonnée dans les Alpes suisses</li></ul><p>Explorez différentes cultures, cuisine et paysages tout au long de votre voyage.</p>', 'Explorer123', '2023-06-25', 'Voyages', 'Europe, Voyage', 220, 'brouillon'),
(7, 'Guide complet de PHP', '<p>PHP (Hypertext Preprocessor) est un langage de script côté serveur largement utilisé pour le développement web.</p><p>Apprenez les bases, les fonctions avancées, et la gestion des bases de données avec PHP pour créer des sites dynamiques.</p>', 'PHPDeveloper', '2023-07-01', 'Informatique', 'PHP, Développement web', 250, 'brouillon'),
(8, 'Séances d\'entraînement à domicile', '<p>Maintenez votre forme physique avec des séances d\'entraînement à domicile :</p><ul><li> - Entraînement cardio</li><li> - Renforcement musculaire</li><li> - Yoga</li></ul><p>Adaptez votre routine pour rester en bonne santé.</p>', 'FitnessEnthusiast', '2023-07-05', 'Bien-être', 'Fitness, Entraînement', 180, 'brouillon'),
(9, 'Création d\'une application mobile', '<p>Découvrez les étapes de base pour créer une application mobile :</p><ol><li> - Planification du projet</li><li> - Conception de l\'interface utilisateur</li><li> - Développement</li><li> - Tests</li></ol><p>Explorez les outils tels que React Native pour le développement multiplateforme.</p>', 'MobileDev', '2023-07-10', 'Informatique', 'Application mobile, Développement', 200, 'brouillon'),
(10, 'Astuces de photographie', '<p>Améliorez vos compétences en photographie avec ces astuces :</p><ul><li> - Composez soigneusement vos images</li><li> - Expérimentez avec l\'éclairage</li><li> - Utilisez les modes de la caméra</li></ul><p>Explorez le monde de la photographie pour capturer des moments mémorables.</p>', 'PhotoArtist', '2023-07-15', 'Art', 'Photographie, Astuces', 150, 'brouillon');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
