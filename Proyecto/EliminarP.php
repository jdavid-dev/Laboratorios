<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("DELETE FROM registro_p WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: Profesores.php');
exit;
?>