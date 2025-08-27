<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id     = intval($_GET['id']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $curso = trim($_POST['curso']);
    $modalidad = trim($_POST['modalidad']);

    $sql = "UPDATE registro_c 
            SET nombre = :nombre, correo = :correo , curso = :curso, modalidad = :modalidad
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':nombre' => $nombre,
      ':correo' => $correo,
      ':id'     => $id,
      ':curso'  => $curso,
      ':modalidad'  => $modalidad
    ]);

    header('Location: Cursos.php');
    exit;
}

if (isset($_GET['id'])) {
    $id   = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM registro_c WHERE id = :id");
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
<main>
<body>
  <h1>Editar Registro #<?php echo $row['id']; ?></h1>
  <div class="form-group">
  <form action="EditarC.php?id=<?php echo $row['id']; ?>" method="POST">
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

    <div class="flex-container">
            <legend>Curso:</legend>
            <div class="form-group">
              <label for="curso">
                <select class="form-control" id="curso" name="curso" 
                 value="<?php echo htmlspecialchars($row['correo']); ?>" required>
                  <option>Matemática I | Miércoles 6:30 PM - 9:30 PM</option>
                  <option>Programación III | Martes 6:30 PM - 9:30 PM</option>
                  <option>Base de Datos II | Jueves 6:30 PM - 9:30 PM</option>
                  <option>Álgebra Lineal | Lunes 6:30 PM - 9:30 PM</option>
                  <option>Redes I | Miércoles 6:30 PM - 9:30 PM</option>
                  <option>Diseño Gráfico I | Jueves 6:30 PM - 9:30 PM</option>
                  <option>Ética Profesional | Martes 6:30 PM - 9:30 PM</option>
                  <option>Programación Orientada a Objetos | Lunes 6:30 PM - 9:30 PM</option>
                  <option>Computación en la Nube II | Miércoles 6:30 PM - 9:30 PM</option>
                </select>
            </div>
        </div>

        <legend>Modalidad de preferencia</legend>
            <div class="form-group">
            <div>
              <input type="radio" id="mod1" name="modalidad" value="Presencial" value="<?php echo htmlspecialchars($row['modalidad']); ?>" required>
              <label for="mod1">Presencial</label>
            </div>
            <div>
              <input type="radio" id="mod2" name="modalidad" value="Híbrida" value="<?php echo htmlspecialchars($row['modalidad']); ?>" required>
              <label for="mod2">Híbrida</label>
            </div>
            <div>
              <input type="radio" id="mod3" name="modalidad" value="Virtual" value="<?php echo htmlspecialchars($row['modalidad']); ?>" required>
              <label for="mod3">Virtual</label>
            </div>
            </div>

    <button type="submit" class="submit-button">Guardar cambios</button>
    <a href="Cursos.php">Cancelar</a>
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
    margin-top: 15px;
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