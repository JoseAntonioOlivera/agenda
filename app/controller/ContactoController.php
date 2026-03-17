<?php
// controller/ContactoController.php

require_once __DIR__ . '/../model/Contacto.php';



class ContactoController
{
    // Muestra el listado de contactos
    public function index(): void
    {
        $contactos = Contacto::all();
        require __DIR__ . '/../views/contactos/index.php';
    }

    // Muestra el formulario de creación
    public function create(array $old = [], array $errors = []): void
    {
        require __DIR__ . '/../views/contactos/create.php';
    }

    // Procesa el formulario de creación (POST)
    public function store(array $post): void
    {
        // Regla: nombre obligatorio (validación en el modelo)
        $errors = Contacto::validate($post);

        if (!empty($errors)) {
            $this->create($post, $errors);
            return;
        }

        Contacto::create($post);

        header('Location: index.php?action=index');
        exit;
    }

    // Muestra el formulario de edición
    public function edit(int $id, array $old = [], array $errors = []): void
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            echo "Contacto no encontrado";
            return;
        }

        require __DIR__ . '/../views/contactos/edit.php';
    }

    // Procesa el formulario de edición (POST)
    public function update(int $id, array $post): void
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            echo "Contacto no encontrado";
            return;
        }

        $errors = Contacto::validate($post);

        if (!empty($errors)) {
            $this->edit($id, $post, $errors);
            return;
        }

        Contacto::update($id, $post);

        header('Location: index.php?action=index');
        exit;
    }

    // Borrar (POST)
    public function destroy(int $id): void
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            echo "Contacto no encontrado";
            return;
        }

        Contacto::delete($id);

        header('Location: index.php?action=index');
        exit;
    }
}
