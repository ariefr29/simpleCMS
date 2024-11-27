<?php 
include('../includes/auth.php');
include('../includes/functions.php');
include('../includes/db.php'); 

// cek apakah admin sudah login
if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

$currentFile = basename($_SERVER['SCRIPT_NAME']); // hanya mengambil nama file, misal "xcontent.php"
switch ($currentFile) {
    case 'add-content.php':
        $titleweb = "Tambah Konten";
        break;
    case 'edit-content.php':
        $titleweb = "Edit Konten";
        break;
    case 'settings.php':
        $titleweb = "Pengaturan Umum";
        break;
    // case 'xxx.php':
    //     # code...
    //     break;
    // case 'xxx.php':
    //     # code...
    //     break;
    
    default:
        $titleweb = "Dashboard Admin";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titleweb ?></title>
    <link rel="stylesheet" href="./assets/style.css">
    <?php if ($currentFile == "add-content.php" || "edit-content.php") : 
        // wysiwig untuk add- atau edit- content.php?>
        <script src="./assets/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                height: 400,
                menubar: false,
                plugins: 'link lists table preview wordcount',
                toolbar: 'blocks | bold italic  underline | alignleft aligncenter alignright | numlist bullist | table link image | preview'
            });
        </script>
    <?php endif; ?>
</head>
<body>
    <div class="wrapper">
        <div class="head">
            <h2><?php echo $titleweb ?></h2>
            <p>Halo <?php echo $_SESSION['username']; ?>, selamat datang di dashboard pengelola konten !</p>
        </div>
        <div class="menu">
            <a href="index.php">Kelola Konten</a>
            <a href="<?php echo BASE_URL_SITE ?>">Lihat Situs</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>