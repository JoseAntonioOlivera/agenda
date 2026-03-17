<?php
// model/Contacto.php
// El modelo realiza el CRUD en la tabla "contactos" (solo base de datos).

require_once __DIR__ . '/../../config.php';

class Contacto
{
    // Reglas: nombre obligatorio, el resto opcionales.
    public static function validate(array $data): array
    {
        $errors = [];
        $nombre = trim($data['nombre'] ?? '');

        if ($nombre === '') {
            $errors['nombre'] = 'El nombre es obligatorio.';
        }

        return $errors;
    }

    // Listar todos los contactos
    public static function all(): array
    {
        $stmt = db()->query("SELECT id, nombre, telefono, email, notas FROM contactos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un contacto por id
    public static function find(int $id): ?array
    {
        $stmt = db()->prepare("SELECT id, nombre, telefono, email, notas FROM contactos WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $contacto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contacto ?: null;
    }

    // Crear un contacto
    public static function create(array $data): void
    {
        $stmt = db()->prepare("
            INSERT INTO contactos (nombre, telefono, email, notas)
            VALUES (:nombre, :telefono, :email, :notas)
        ");

        $stmt->execute([
            ':nombre'   => trim($data['nombre']),
            ':telefono' => trim($data['telefono'] ?? ''),
            ':email'    => trim($data['email'] ?? ''),
            ':notas'    => trim($data['notas'] ?? ''),
        ]);
    }

    // Actualizar un contacto
    public static function update(int $id, array $data): void
    {
        $stmt = db()->prepare("
            UPDATE contactos
            SET nombre = :nombre, telefono = :telefono, email = :email, notas = :notas
            WHERE id = :id
        ");

        $stmt->execute([
            ':id'       => $id,
            ':nombre'   => trim($data['nombre']),
            ':telefono' => trim($data['telefono'] ?? ''),
            ':email'    => trim($data['email'] ?? ''),
            ':notas'    => trim($data['notas'] ?? ''),
        ]);
    }

    // Borrar un contacto
    public static function delete(int $id): void
    {
        $stmt = db()->prepare("DELETE FROM contactos WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
