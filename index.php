<?php
session_start();
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_folder = '/dar';
$route = str_replace($base_folder, '', $request);

$protected = ['/dashboard', '/regular-summary', '/split-summary', '/add', '/regular-summary/edit', '/split-summary/edit'];
if (in_array($route, $protected) && !isset($_SESSION['user_id'])) {
    header('Location: ' . $base_folder . '/');
    exit;
}

$routes = [
    '/' => 'views/login.php',
    '/dashboard' => 'views/dashboard.php',
    '/regular-summary' => 'views/regular-summary.php',
    '/split-summary' => 'views/split-summary.php',
    '/add' => 'views/add-property.php',
    '/regular-summary/edit' => 'views/edit-property.php',
    '/split-summary/edit' => 'views/edit-property.php',
    '/forgot' => 'views/forgot.php'
];

$view = array_key_exists($route, $routes) ? $routes[$route] : 'views/404.php';
if ($view === 'views/404.php') http_response_code(404);

require 'views/layouts/main.php';
