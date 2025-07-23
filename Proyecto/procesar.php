<?php
include 'db.php';

$id = trim($_POST['id'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$curso = trim($_POST['curso'] ?? '');
$modalidad = trim($_POST['modalidad'] ?? '');

$sql  = "INSERT INTO matricula (id, nombre, correo, curso, modalidad) VALUES (:id, :nombre, :correo, :curso, :modalidad)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id, ':nombre' => $nombre, ':correo' => $correo, ':curso' => $curso, ':modalidad' => $modalidad]);

header('Location: index.php');
exit;
?>