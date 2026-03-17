<?php
// index.php
// Punto de entrada único. Lee ?action=... y llama al controlador de Contactos.

require_once __DIR__ . '/app/controller/ContactoController.php';

$controller = new ContactoController();

// Acción por URL, por defecto: index (listar contactos)
$action = $_GET['action'] ?? 'index';

// ID para operaciones específicas (edit/update/destroy)
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        if ($method !== 'POST') { 
            echo "Método no permitido"; 
            break; 
        }
        $controller->store($_POST);
        break;

    case 'edit':
        if ($id === null) { 
            echo "Falta el ID del contacto"; 
            break; 
        }
        $controller->edit($id);
        break;

    case 'update':
        if ($method !== 'POST') { 
            echo "Método no permitido"; 
            break; 
        }
        if ($id === null) { 
            echo "Falta el ID para actualizar"; 
            break; 
        }
        $controller->update($id, $_POST);
        break;

    case 'destroy':
        // Se asegura de que el borrado solo ocurra por POST por seguridad
        if ($method !== 'POST') { 
            echo "Método no permitido"; 
            break; 
        }
        if ($id === null) { 
            echo "Falta el ID para eliminar"; 
            break; 
        }
        $controller->destroy($id);
        break;

    default:
        // Redirige al index si la acción no existe
        header('Location: index.php?action=index');
        break;
}
