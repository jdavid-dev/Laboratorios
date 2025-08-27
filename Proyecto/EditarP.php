<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id     = intval($_GET['id']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);

    $sql = "UPDATE registro_p 
            SET nombre = :nombre, correo = :correo 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':nombre' => $nombre,
      ':correo' => $correo,
      ':id'     => $id
    ]);

    header('Location: Profesores.php');
    exit;
}

if (isset($_GET['id'])) {
    $id   = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM registro_p WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $row  = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
      exit("Registro no encontrado.");
    }
} else {
    exit("Falta el ID.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Estudiante</title>
</head>
<body>
  <h2>Editar Registro #<?php echo $row['id']; ?></h2>
  <form action="EditarP.php?id=<?php echo $row['id']; ?>" method="POST">
    <label>
      Nombre:<br>
      <input type="text" name="nombre" 
             value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
    </label><br><br>

    <label>
      Correo:<br>
      <input type="email" name="correo" 
             value="<?php echo htmlspecialchars($row['correo']); ?>" required>
    </label><br><br>

    <label>
      Contraseña:<br>
      <input type="password" name="contraseña" required>
    </label><br><br>

    <button type="submit">Guardar Cambios</button>
    <a href="Profesores.php">Cancelar</a>
  </form>
</body>
</html>