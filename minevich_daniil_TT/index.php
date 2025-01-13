<?php

require_once 'config/database.php';
require_once 'controllers/ArticleController.php';

$db = getDatabaseConnection();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/COURS/minevich_daniil_TT';
$uri = str_replace($basePath, '', $uri);

$controller = new ArticleController($db);

if (preg_match('/^\/article\/([0-9]+)$/', $uri, $matches)) {
    $id = $matches[1];
    $controller->show($id);
} else {
    $controller->index();
}
