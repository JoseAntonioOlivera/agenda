<?php
// views/contactos/index.php
// Lista de contactos con acciones: editar y borrar.
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Agenda de Contactos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    table { border-collapse: collapse; width: 100%; margin-top: 10px; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    th { background: #f5f5f5; text-align: left; }
    .top { display:flex; justify-content:space-between; align-items:center; }
    .danger { background:#c62828; color:#fff; border:0; padding:6px 10px; cursor:pointer; border-radius: 3px; }
    .btn-edit { text-decoration: none; color: #1976d2; margin-right: 10px; font-weight: bold; }
    .notas-cell { font-style: italic; color: #666; font-size: 0.9em; }
  </style>
</head>
<body>

  <div class="top">
    <h1>Contactos</h1>
    <a href="index.php?action=create" style="font-weight: bold; color: #2e7d32; text-decoration: none;">+ Nuevo contacto</a>
  </div>

  <?php if (empty($contactos)): ?>
    <p>No hay contactos en la agenda.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th>Notas</th>
          <th style="width: 150px;">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contactos as $c): ?>
          <tr>
            <td><?php echo (int)$c['id']; ?></td>
            <td><strong><?php echo htmlspecialchars($c['nombre']); ?></strong></td>
            <td><?php echo htmlspecialchars($c['telefono'] ?: '-'); ?></td>
            <td><?php echo htmlspecialchars($c['email'] ?: '-'); ?></td>
            <td class="notas-cell"><?php echo htmlspecialchars($c['notas'] ?: ''); ?></td>
            <td>
              <a class="btn-edit" href="index.php?action=edit&id=<?php echo (int)$c['id']; ?>">Editar</a>

              <form method="post"
                    action="index.php?action=destroy&id=<?php echo (int)$c['id']; ?>"
                    style="display:inline"
                    onsubmit="return confirm('¿Seguro que quieres borrar a <?php echo addslashes($c['nombre']); ?>?');">
                <button class="danger" type="submit">Borrar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</body>
</html>
