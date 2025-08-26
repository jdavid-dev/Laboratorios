<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Alumnos</title>
  <link rel="stylesheet" href="Estilos.css">
</head>
<body>
  <div class="contenedor">
    <h2>Registro de Alumnos</h2>
    <form action="procesar.php" method="POST">
      <div class="campo">
        <label>Primer nombre:</label>
        <input type="text" name="primer_nombre" required>
      </div>
      <div class="campo">
        <label>Primer apellido:</label>
        <input type="text" name="primer_apellido" required>
      </div>
      <div class="campo">
        <label>Segundo apellido:</label>
        <input type="text" name="segundo_apellido" required>
      </div>
      <div class="campo">
        <label>Correo electrónico:</label>
        <input type="email" name="correo" required>
      </div>
      <div class="campo">
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
      </div>
      <button type="submit">Enviar</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Primer nombre</th>
          <th>Primer apellido</th>
          <th>Segundo apellido</th>
          <th>Correo</th>
          <th>Fecha</th>
          <th>Fecha de Nacimiento</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $stmt = $pdo->query("SELECT * FROM alumnos ORDER BY fecha_registro DESC");
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>".htmlspecialchars($row['primer_nombre'])."</td>
                    <td>".htmlspecialchars($row['primer_apellido'])."</td>
                    <td>".htmlspecialchars($row['segundo_apellido'])."</td>
                    <td>".htmlspecialchars($row['correo'])."</td>
                    <td>{$row['fecha_registro']}</td>
                    <td>{$row['fecha_nacimiento']}</td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
