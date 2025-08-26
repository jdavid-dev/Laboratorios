<?php
include 'db.php';

$id = trim($_POST['id'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$password = trim($_POST['password'] ?? '');

$sql  = "INSERT INTO registro_e (id, nombre, correo, password) VALUES (:id, :nombre, :correo, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id, ':nombre' => $nombre, ':correo' => $correo, ':password' => $password]);

header('Location: Registro_e.php');
exit;
?>