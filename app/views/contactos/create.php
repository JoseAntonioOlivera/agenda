<?php
// views/contactos/create.php
// Formulario de creación de contacto.
$old = $old ?? [];
$errors = $errors ?? [];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nuevo contacto</title>
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
  <h1>Nuevo contacto</h1>

  <form method="post" action="index.php?action=store">
    <label>
      Nombre (Obligatorio)
      <input name="nombre" value="<?php echo htmlspecialchars($old['nombre'] ?? ''); ?>">
      <?php if (isset($errors['nombre'])): ?>
        <div class="error"><?php echo htmlspecialchars($errors['nombre']); ?></div>
      <?php endif; ?>
    </label>

    <label>
      Teléfono
      <input name="telefono" value="<?php echo htmlspecialchars($old['telefono'] ?? ''); ?>">
    </label>

    <label>
      Email
      <input name="email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
    </label>

    <label>
      Notas
      <textarea name="notas"><?php echo htmlspecialchars($old['notas'] ?? ''); ?></textarea>
    </label>

    <button type="submit">Guardar contacto</button>
  </form>

</body>
</html>
