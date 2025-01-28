<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus user berdasarkan ID
    $stmt = $pdo->prepare("DELETE FROM users WHERE Id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Reset nilai AUTO_INCREMENT
    $pdo->query("ALTER TABLE users AUTO_INCREMENT = 1");

    // Redirect ke halaman index setelah penghapusan
    header("Location: index.php");
    exit();
}
?>