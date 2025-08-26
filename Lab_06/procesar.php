<?php
include 'db.php';

$primer_nombre = trim($_POST['primer_nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$apellido1 = trim($_POST['primer_apellido'] ?? '');
$apellido2 = trim($_POST['segundo_apellido'] ?? '');
$fecha_nacimiento = trim($_POST['fecha_nacimiento'] ?? '');

$errores = [];
if ($primer_nombre === '')  $errores[] = 'El nombre es obligatorio.';
if ($apellido1 === '')  $errores[] = 'El primer apellido es obligatorio.';
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errores[] = 'Correo inválido.';

if (count($errores) > 0) {
  foreach ($errores as $err) {
    echo "<p style='color:red;'>$err</p>";
  }
  echo "<p><a href='index.php'>Volver</a></p>";
  exit;
}

$sql  = "INSERT INTO alumnos (primer_nombre, primer_apellido, segundo_apellido, correo, fecha_nacimiento) VALUES (:primer_nombre, :primer_apellido, :segundo_apellido, :correo, :fecha_nacimiento)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':primer_nombre' => $primer_nombre, ':primer_apellido' => $apellido1, ':segundo_apellido' => $apellido2, ':correo' => $correo, ':fecha_nacimiento' => $fecha_nacimiento]);

header('Location: index.php');
exit;
?>