<?php
// src/ProductRepository.php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Database.php';

class ProductRepository
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->conn->query('SELECT * FROM products');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->conn->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }

    /**
     * Crea un nuevo producto en la base de datos.
     *
     * @param array $data  Datos del producto (name, price)
     * @return int|null    ID del nuevo producto, o null si falla
     */
    public function create(array $data): ?int
    {
        $stmt = $this->conn->prepare(
            'INSERT INTO products (name, price) VALUES (:name, :price)'
        );

        $success = $stmt->execute([
            'name'  => $data['name'],
            'price' => $data['price']
        ]);

        return $success ? (int)$this->conn->lastInsertId() : null;
    }

    /**
     * Actualiza un producto existente.
     * TODO: Completar implementación en la Actividad 3
     */
    public function update(int $id, array $data): bool
    {
        // TODO: Implementar UPDATE (Actividad 3)
        return false;
    }

    /**
     * Elimina un producto.
     * TODO: Completar implementación en la Actividad 3
     */
    public function delete(int $id): bool
    {
        // TODO: Implementar DELETE (Actividad 3)
        return false;
    }
}
