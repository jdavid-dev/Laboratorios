<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Estilos.css">
  <title>Datos de estudiantes</title>
</head>

<body>
  <header>
    <h1>Estudiantes</h1>
  </header>

  <nav>
    <ul>
      <li><a href="Menu.html">Regresar</a></li>
    </ul>
  </nav>

  <main>
    <fieldset>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $stmt = $pdo->query("SELECT * FROM registro_e ORDER BY id DESC");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>
                      <td>{$row['id']}</td>
                      <td>".htmlspecialchars($row['nombre'])."</td>
                      <td>".htmlspecialchars($row['correo'])."</td>
                      <td>
                        <a href=\"EditarE.php?id={$row['id']}\">Editar</a> |
                        <a href=\"EliminarE.php?id={$row['id']}\" 
                           onclick=\"return confirm('¿Deseas eliminar este registro? Esta opción solo se muestra para los administradores')\">
                          Eliminar
                        </a>
                      </td>
                    </tr>";
            }
          ?>
        </tbody>
      </table>
    </fieldset>
  </main>

  <footer>
    <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
  </footer>
</body>
</html>
