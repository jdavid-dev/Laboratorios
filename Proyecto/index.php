<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Matrícula</title>
</head>
<header>
  <h1>¡Matriculá ya!</h1>
</header>

<body>

  <nav>
    <ul>
      <li><a href="Menu.html">Regresar</a></li>
    </ul>
  </nav>
  <main>
    <form action="procesar.php" method="POST">
      <fieldset>
        <legend>Registro de Usuario</legend>
        <div class="form-group">
          <div>
            <label for="id">Identificación:</label>
            <input class="form-input" type="number" id="id" name="id" required>
          </div>
          <div>
            <label for="nombre">Nombre completo:</label>
            <input class="form-input" type="text" id="nombre" name="nombre" required>
          </div>
          <div>
            <label for="correo">Correo Electrónico:</label>
            <input class="form-input" type="email" id="correo" name="correo" required>
          </div>
        </div>

        <div class="flex-container">
          <fieldset>
            <legend>Curso</legend>
            <div class="form-group">
              <label for="curso">
                <select class="form-control" id="curso" name="curso" required>
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
          </fieldset>
          <fieldset>
            <legend>Modalidad de preferencia</legend>
            <div>
              <input type="radio" id="mod1" name="modalidad" value="Presencial" />
              <label for="mod1">Presencial</label>
            </div>
            <div>
              <input type="radio" id="mod2" name="modalidad" value="Híbrida" />
              <label for="mod2">Híbrida</label>
            </div>
            <div>
              <input type="radio" id="mod3" name="modalidad" value="Virtual" />
              <label for="mod3">Virtual</label>
          </fieldset>
        </div>
        <button type="submit" class="submit-button">Registrar</button>
      </fieldset>
    </form>

  </main>
</body>

<footer>
  <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
</footer>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #dcdcdc;
    margin: 15px;
    padding: 20px;
  }

  nav ul {
    list-style: none;
    background-color: #f66661;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    max-width: 10%;
    margin-top: -58px;
    transition: all 0.3s ease;
  }

  nav ul:hover {
    color: #f66661;
    background-color: #003150;
    padding: 15px 15px;
    border-radius: 5px;
  }


  nav ul li a {
    color: #e4e4e4;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
  }

  nav ul li a:hover {
    color: #f66661;
    background-color: #003150;
    padding: 10px 5px;
    border-radius: 5px;
  }

  h1 {
    text-align: center;
    color: rgb(0, 0, 0);
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

  .form-input {
    box-sizing: border-box;
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 10px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    padding: 3px;
  }

  main {
    width: 80%;
    margin: auto;
    padding: 20px;
    margin-top: 10px;
    background-color: #ffffff;
    border-radius: 10px;
    padding: 10px;
  }

  .flex-container {
    margin-top: 5px;
  }

  .submit-button {
    display: block;
    margin: 0 auto;
    width: 155px;
    margin-top: 5px;
    padding: 10px 50px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
    box-shadow: 5px 5px 3px rgba(0, 0, 0, 0.3)
  }

  .submit-button:hover {
    background-color: #a4a8b2;
  }
</style>

</html>