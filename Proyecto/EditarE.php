<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id     = intval($_GET['id']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);

    $sql = "UPDATE registro_e 
            SET nombre = :nombre, correo = :correo 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':nombre' => $nombre,
      ':correo' => $correo,
      ':id'     => $id
    ]);

    header('Location: Estudiantes.php');
    exit;
}

if (isset($_GET['id'])) {
    $id   = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM registro_e WHERE id = :id");
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
  <title>Editar</title>
</head>
<body>
  <main>
  <h1>Editar Registro #<?php echo $row['id']; ?></h1>
  <div class="form-group">
  <form action="EditarE.php?id=<?php echo $row['id']; ?>" method="POST">
    <label>
      Nombre:<br>
      <input class="form-input" type="text" name="nombre" 
             value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
    </label><br><br>

    <label>
      Correo:<br>
      <input class="form-input" type="email" name="correo" 
             value="<?php echo htmlspecialchars($row['correo']); ?>" required>
    </label><br><br>

    <label>
      Contraseña:<br>
      <input class="form-input" type="password" name="contraseña" required>
    </label><br><br>

    <button class="submit-button" type="submit">Guardar Cambios</button>
    <a href="Estudiantes.php">Cancelar</a>
  </form>
  </div>
</body>
</main>

<section id="video">
    <iframe width="853" height="480" src="https://www.youtube.com/embed/7YGcHb9LC_U" title="La vida no te califica, pero la Universidad Central te prepara para ella 💪🏼" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>
<footer>
  <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
</footer>

</html>

<style>

  main form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #dcdcdc;
    margin: 15px;
    padding: 20px;
  }

  h1 {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    color: rgb(0, 0, 0);
  }

  .form-input {
    box-sizing: border-box;
    width: 100%;
    margin-right: 70px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 10px;
  }

  .form-group {
    display: block;
    font-weight: bold;
    padding: 3px;
    border-radius: 100px;
  }

  main {
    width: 40%;
    margin: auto;
    padding: 20px;
    margin-top: 10px;
    background-color: #ffffff;
    border-radius: 10px;
    padding: 10px;
  }

  .flex-container {
    margin-top: -30px;
    margin-bottom: 20px;
  }

  .submit-button {
    display: block;
    margin-bottom: 10px;
    width: 155px;
    padding: 10px 10px;
    background-color: #f66661;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .submit-button:hover {
    background-color: #003150;
    color: #f66661;
  }

  #video {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 30px;
  margin-bottom: 30px;
}

#video iframe {
  width: 500%;
  max-width: 600px;
  height:  400px;
  border-radius: 10px;
}

footer {
    text-align: center;
    margin-top: 50px;
    color: rgb(0, 0, 0);
    font-size: 14px;
  }

  footer a {
    color: #000000;
  }
</style>