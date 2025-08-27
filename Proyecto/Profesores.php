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
  <link rel="stylesheet" href="Estilos.css">
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
          <a href="EditarP.php?id=<?= $row['id'] ?>">Editar</a> |
          <a href="EliminarP.php?id=<?= $row['id'] ?>"
             onclick="return confirm('¿Deseas eliminar este registro?')">
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

  <style>
    .search-container {
      margin-left : 75%;
      display: flex;
      gap: 0.5rem;
    }
    .search-container input {
      flex: 1;
      padding: 0.4rem;
      border-radius: 10px;
    }
    .search-container button,
    .search-container .reset {
      padding: 0.4rem 0.8rem;
      background: #f66661;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .search-container button:hover,
    .search-container .reset:hover {
      background-color: #003150;
      color: #f66661;
    }

    .search-container .reset {
      background: #f66661;
      line-height: 1.6;
    }
  </style>