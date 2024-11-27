<?php
include('../includes/db.php');
include('../includes/functions.php');
include('../includes/auth.php');

// cek apakah admin sudah login
if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

// cek jika ada id konten yang ingin dihapus
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$postId = cleanInput($_GET['id']);

// query untuk menghapus konten dari database
$stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
$stmt->execute(['id' => $postId]);

// redirect ke halaman kelola konten setelah menghapus
header('Location: index.php');
exit();
?>
