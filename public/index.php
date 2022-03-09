<?php

require __DIR__."/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\PostController;
use ihate\mvc\Application;
use app\models\User;

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/home/{id}', [SiteController::class, 'home']);

$app->router->get('/gallery', [SiteController::class, 'gallery']);
$app->router->get('/gallery/upload', [PostController::class, 'upload']);
$app->router->post('/gallery/upload', [PostController::class, 'upload']);

$app->router->get('/about', [SiteController::class, 'about']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/login/{id:\d+}/{username}', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [AuthController::class, 'profile']);

$app->router->get('/post/{id:\d+}', [PostController::class, 'post']);
$app->router->get('/post/edit/{id:\d+}', [PostController::class, 'edit']);
$app->router->post('/post/edit/{id:\d+}', [PostController::class, 'edit']);
$app->router->get('/post/delete/{id:\d+}', [PostController::class, 'delete']);
$app->router->post('/post/delete/{id:\d+}', [PostController::class, 'delete']);



$app->run();

?>