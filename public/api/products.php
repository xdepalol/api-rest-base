<?php
// public/api/products.php

require_once __DIR__ . '/../../src/ProductRepository.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$repo   = new ProductRepository();

// -----------------------------------------------------------------------------
// GET /products (listar todos)
// -----------------------------------------------------------------------------

/**
 * @api {get} /api/products Obtener todos los productos
 * @apiName GetProducts
 * @apiGroup Products
 * @apiSuccess {Object[]} products Lista de productos
 */
if ($method === 'GET' && !isset($_GET['id'])) {
    echo json_encode($repo->findAll());
    exit;
}

// -----------------------------------------------------------------------------
// GET /products?id=:id (obtener producto por ID)
// -----------------------------------------------------------------------------

/**
 * @api {get} /api/products?id=:id Obtener un producto por ID
 * @apiName GetProductById
 * @apiGroup Products
 * @apiParam {Number} id ID único del producto
 * @apiError ProductNotFound El producto no existe
 */
if ($method === 'GET' && isset($_GET['id'])) {
    $id   = (int) $_GET['id'];
    $prod = $repo->findById($id);

    if ($prod) {
        echo json_encode($prod);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Producto no encontrado']);
    }
    exit;
}

// -----------------------------------------------------------------------------
// POST /products (crear nuevo producto)
// -----------------------------------------------------------------------------

/**
 * @api {post} /api/products Crear un nuevo producto
 * @apiName CreateProduct
 * @apiGroup Products
 * @apiParam (Body) {String} name Nombre del producto
 * @apiParam (Body) {Number} price Precio del producto
 * @apiSuccess (201) {Number} id ID del nuevo producto
 * @apiSuccess (201) {String} name Nombre del producto
 * @apiSuccess (201) {Number} price Precio del producto
 * @apiError (400) MissingFields Faltan campos obligatorios
 */
if ($method === 'POST') {

    // Leer el cuerpo del POST
    $data = json_decode(file_get_contents('php://input'), true);

    // TODO: Añadir validaciones básicas (Activity 3)
    if (!isset($data['name'], $data['price'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Faltan campos obligatorios']);
        exit;
    }

    $newId = $repo->create($data);

    if ($newId) {
        http_response_code(201);
        echo json_encode([
            'id'    => $newId,
            'name'  => $data['name'],
            'price' => $data['price']
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Error al crear el producto']);
    }
    exit;
}

// -----------------------------------------------------------------------------
// TODO: PUT y DELETE se implementarán en la Actividad 3
// -----------------------------------------------------------------------------

http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);
exit;
