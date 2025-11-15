<?php
// public/api/helloworld/index.php

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// -----------------------------------------------------------------------------
// GET /helloworld (ping de la API)
// -----------------------------------------------------------------------------

/**
 * @api {get} /helloworld Saludo de la API
 * @apiName HelloWorld
 * @apiGroup Status
 * @apiSuccess {String} message Mensaje de bienvenida
 */
if ($method === 'GET') {
    echo json_encode(array('message' => "Hello World!"));
    exit;
}

http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);
exit;
