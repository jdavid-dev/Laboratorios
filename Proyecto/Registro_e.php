<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
</head>
<header>
  <h1>¡Regístrate ya!</h1>
</header>

<body>

  <nav>
    <ul>
      <li><a href="Eleccion.html">Regresar</a></li>
    </ul>
  </nav>
  <main>
    <form action="procesar_e.php" method="POST">
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
          <div>
            <label for="password">Contraseña:</label>
            <input class="form-input" type="password" id="password" name="password" required>
          </div>
        </div>
        <button type="submit" class="submit-button">Guardar</button>
    </form>

    <section id="video">
    <iframe width="1326" height="746" src="https://www.youtube.com/embed/GPFOw1-VIHI" title="LA UNIVERSIDAD QUE MEJOR TE ENTIENDE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>

  </main>
</body>

<footer>
  <p>&copy; 2023 Plataforma Educativa Universidad Central</p>
</footer>
<style>

  main form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #25405a;
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
    background-color: #f9625dff;
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
    color: #25405a;
    background-color: #f66661;
    padding: 10px 5px;
    border-radius: 5px;
  }

  h1 {
    text-align: center;
    color: rgba(255, 255, 255, 1);
  }


  footer {
    text-align: center;
    margin-top: 50px;
    color: rgba(255, 255, 255, 1);
    font-size: 14px;
  }

  .form-input {
    margin: 3px 0;
    box-sizing: border-box;
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 10px;
  }

  .form-group {
    color: #ffffffff;
    background-color: #25405a;
    border-radius: 5px;
    display: block;
    font-weight: bold;
    padding: 3px;
  }

  main {
    width: 80%;
    margin: auto;
    padding: 20px;
    margin-top: 10px;
    background-color: #25405a;
    border-radius: 10px;
    padding: 10px;
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
    transition: all 0.4s ease;
  }

  .submit-button:hover {
    background-color: #1b5891ff;
    color: #f66661;
    font-weight: bold;
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
</style>

</html>