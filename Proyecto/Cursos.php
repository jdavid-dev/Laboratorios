<?php
include 'db.php';

$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $sql  = "SELECT * 
             FROM registro_c 
             WHERE nombre    LIKE :s
                OR correo    LIKE :s
                OR curso     LIKE :s
                OR modalidad LIKE :s
                OR id        LIKE :s
             ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':s' => "%{$search}%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM registro_c ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="Style.css">
  <title>Datos de cursos</title>
</head>
<body>
  <header>
    <h1>Cursos</h1>
  </header>

  <nav>
    <ul>
      <li><a href="Menu.html">Regresar</a></li>
    </ul>
  </nav>

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
        <a href="cursos.php" class="reset">Mostrar todos</a>
      <?php endif; ?>
    </div>

    <fieldset>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Curso</th>
            <th>Modalidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($stmt->rowCount()): ?>
          <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['nombre']) ?></td>
              <td><?= htmlspecialchars($row['correo']) ?></td>
              <td><?= htmlspecialchars($row['curso']) ?></td>
              <td><?= htmlspecialchars($row['modalidad']) ?></td>
              <td>
                <a href="EditarC.php?id=<?= $row['id'] ?>" class="btn-1">Editar</a> |
                <a href="EliminarC.php?id=<?= $row['id'] ?>" class="btn-2"
                   onclick="return confirm('¿Deseas eliminar este registro? Esta opción solo está disponible para administradores.')">
                  Eliminar
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="6">No se encontraron registros<?= $search !== '' ? " para «".htmlspecialchars($search)."»" : "" ?>.</td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </fieldset>
  </main>

  <footer>
    <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
  </footer>
</body>
</html>
