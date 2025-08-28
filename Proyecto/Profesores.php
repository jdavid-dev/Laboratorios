<?php
include 'db.php';

$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $sql  = "SELECT * 
             FROM registro_p 
             WHERE nombre    LIKE :s
                OR correo    LIKE :s
                OR asignatura LIKE :s
                OR id        LIKE :s
             ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':s' => "%{$search}%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM registro_p ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style.css">
  <title>Datos de profesores</title>
</head>
<header>
  <h1>Profesores</h1>
</header>

<body>
  <nav>
    <ul>
      <li><a href="Menu.html">Regresar</a></li>
    </ul>
    <main>

      <div class="search-container">
      <form method="GET" action="">
        <input
          type="text"
          name="search"
          placeholder="Buscar"
          value="<?= htmlspecialchars($search, ENT_QUOTES) ?>"
        >
        <button type="submit">Buscar</button>
      </form>

      <?php if ($search !== ''): ?>
        <a href="Profesores.php" class="reset">Mostrar todos</a>
      <?php endif; ?>
    </div>

      <fieldset>
      <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Asignatura</th>
      <th>Acciones</th>
    </tr>
  </thead>
  </fieldset>
  <tbody>
  <?php if ($stmt->rowCount()): ?>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nombre'], ENT_QUOTES) ?></td>
        <td><?= htmlspecialchars($row['correo'], ENT_QUOTES) ?></td>
        <td><?= htmlspecialchars($row['asignatura'], ENT_QUOTES) ?></td>
        <td>
          <a href="EditarP.php?id=<?= $row['id'] ?>" class="btn-1">Editar</a> |
          <a href="EliminarP.php?id=<?= $row['id'] ?>" class="btn-2"
             onclick="return confirm('¿Deseas eliminar este registro? Esta opción solo está disponible para administradores.')">
            Eliminar
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="5">
        No se encontraron registros
        <?= $search !== '' ? " para «".htmlspecialchars($search, ENT_QUOTES)."»" : "" ?>.
      </td>
    </tr>
  <?php endif; ?>
</tbody>

</table>
    </main>
</body>
<footer>
  <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
</footer>
</html>
