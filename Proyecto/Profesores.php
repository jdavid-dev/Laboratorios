<?php include 'db.php'; ?>
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
      <fieldset>
      <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Asignatura</th>
    </tr>
  </thead>
  </fieldset>
  <tbody>
  <?php
    $stmt = $pdo->query("SELECT * FROM registro_p ORDER BY id DESC");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>".htmlspecialchars($row['nombre'])."</td>
              <td>".htmlspecialchars($row['correo'])."</td>
              <td>".htmlspecialchars($row['asignatura'])."</td>
            </tr>";
    }
  ?>
</tbody>
</table>
    </main>
</body>
<footer>
  <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
</footer>
</html>