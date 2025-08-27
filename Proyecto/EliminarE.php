<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("DELETE FROM registro_e WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: Estudiantes.php');
exit;
?>

