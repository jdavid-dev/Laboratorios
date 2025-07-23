<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos de cursos</title>
</head>
<header>
  <h1>Cursos</h1>
</header>

<body>
  <nav>
    <ul>
      <li><a href="Menu.html">Regresar</a></li>
    </ul>
    <main>
      <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Curso</th>
      <th>Modalidad</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $stmt = $pdo->query("SELECT * FROM matricula ORDER BY id DESC");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>".htmlspecialchars($row['nombre'])."</td>
              <td>".htmlspecialchars($row['correo'])."</td>
              <td>".htmlspecialchars($row['curso'])."</td>
              <td>".htmlspecialchars($row['modalidad'])."</td>
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
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #dcdcdc;
    margin: 10px;
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

  fieldset {
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 30px;
    border: none;
    margin: 150px;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    max-width: 1000px;
    margin: 20px auto;
    background-color: #fff;
  }

  th,td {
    border: 1px solid #ccc;
    padding: 12px 15px;
    text-align: center;
  }

  th {
    background-color: #f66661;
    color: #0f6cbf;
    font-family: Arial black, sans-serif;
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

</html>