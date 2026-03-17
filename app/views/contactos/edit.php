<?php
// views/contactos/edit.php
// Formulario de edición de contacto.
$old = $old ?? [];
$errors = $errors ?? [];

// Decide qué valor mostrar: el enviado con errores (old) o el de la BD (contacto)
function val(string $key, array $contacto, array $old): string {
    if (isset($old[$key])) return (string)$old[$key];
    return (string)($contacto[$key] ?? '');
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar contacto</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    label { display:block; margin-top: 10px; }
    input, textarea { width: 320px; padding: 8px; display: block; }
    textarea { height: 80px; }
    .error { color:#c62828; font-size:14px; margin-top: 4px; }
    button { margin-top: 12px; padding:8px 12px; cursor: pointer; }
  </style>
</head>
<body>

  <p><a href="index.php?action=index">← Volver al listado</a></p>
  <h1>Editar contacto #<?php echo (int)$contacto['id']; ?></h1>

  <form method="post" action="index.php?action=update&id=<?php echo (int)$contacto['id']; ?>">
    <label>
      Nombre (Obligatorio)
      <input name="nombre" value="<?php echo htmlspecialchars(val('nombre', $contacto, $old)); ?>">
      <?php if (isset($errors['nombre'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['nombre']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Teléfono
      <input name="telefono" value="<?php echo htmlspecialchars(val('telefono', $contacto, $old)); ?>">
    </label>

    <label>
      Email
      <input name="email" value="<?php echo htmlspecialchars(val('email', $contacto, $old)); ?>">
    </label>

    <label>
      Notas
      <textarea name="notas"><?php echo htmlspecialchars(val('notas', $contacto, $old)); ?></textarea>
    </label>

    <button type="submit">Actualizar contacto</button>
  </form>

</body>
</html>
