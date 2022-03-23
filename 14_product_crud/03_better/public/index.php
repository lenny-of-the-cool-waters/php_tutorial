<?php 
require_once '../vendor/autoload.php';

use app\Router;
use app\controllers\MainController;

$router = new Router();

$router->get('/', [MainController::class, 'index']);
$router->get('/products', [MainController::class, 'index']);
$router->get('/products/create', [MainController::class, 'create']);
$router->get('/products/update', [MainController::class, 'update']);

$router->post('/products/create', [MainController::class, 'create']);
$router->post('/products/update', [MainController::class, 'update']);
$router->post('/products/delete', [MainController::class, 'delete']);


?>