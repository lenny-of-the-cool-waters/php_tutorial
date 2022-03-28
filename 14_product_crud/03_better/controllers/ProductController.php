<?php

namespace app\controllers;
use app\Router;
class ProductController {
    public function index($router) {
        $search = $_GET['search'] ?? '';
        $products = $router->db->getProducts($search);
        $router->renderView('products/index', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function create($router) {
        $router->renderView('products/create');
    }

    public function update($router) {
        $router->renderView('products/update');
    }

    public function delete($router) {
        $router->renderView('products/delete');
    }
}
