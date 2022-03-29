<?php

namespace app\controllers;
use app\Router;
class ProductController {
    public function index(Router $router) {
        $search = $_GET['search'] ?? '';
        $products = $router->db->getProducts($search);
        $router->renderView('products/index', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function create(Router $router) {
        $errors = [];
        $product = [
            'title' => '',
            'description' => '',
            'image' => '',
            'price' => ''
        ];
        $router->renderView('products/create', [
            'errors' => $errors,
            'product' => $product
        ]);
    }

    public function update($router) {
        $router->renderView('products/update');
    }

    public function delete($router) {
        $router->renderView('products/delete');
    }
}
