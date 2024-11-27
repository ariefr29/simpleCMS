<?php
include('../includes/db.php');
include('../includes/functions.php');

// running jika hanya file post.php yang dijalankan
if (basename($_SERVER['SCRIPT_NAME']) === 'post.php'): 
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit();
    }
    
    if (isset($_GET['id'])) {
        $postId = cleanInput($_GET['id']);
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute(['id' => $postId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    } 
endif;

$currentFile = basename($_SERVER['SCRIPT_NAME']);
switch ($currentFile) {
    case 'post.php':
        $titleweb = $post['title'] . ' - ' . APP_NAME;
        break;
    case 'index.php':
        $titleweb = (APP_TAGLINE) ? APP_NAME . " - " . APP_TAGLINE : APP_NAME;
        break;
    default:
        $titleweb = APP_NAME;
        break;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titleweb ?></title>
    <!-- Bootstrap CSS -->
    <link href="./assets/bootstrap.css" rel="stylesheet">
    <style>
        img {
            max-width: 100%;
        }
        .card, .btn {
            border-radius: 0;
        }
        .cover-image {
            padding-top: 67%;
        }
        .cover-image > img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">
<?php admin_header(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL_SITE ?>"><?php echo APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL_SITE ?>#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_SITE ?>#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_SITE ?>#produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_SITE ?>#kontak">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav><!-- .navbar -->