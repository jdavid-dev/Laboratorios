<?php
include 'db.php';

$id = trim($_POST['id'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$asignatura = trim($_POST['asignatura'] ?? '');
$codigo = trim($_POST['codigo'] ?? '');
$password = trim($_POST['password'] ?? '');

$sql  = "INSERT INTO registro_p (id, nombre, correo, asignatura, codigo, password) VALUES (:id, :nombre, :correo, :asignatura, :codigo, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id, ':nombre' => $nombre, ':correo' => $correo, ':asignatura' => $asignatura, ':codigo' => $codigo, ':password' => $password]);

header('Location: Registro_p.php');
exit;
?>