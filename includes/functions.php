<?php
// fungsi untuk memeriksa apakah pengguna sudah login (untuk admin)
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// fungsi untuk mengamankan input dari user
function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

// fungsi untuk mengakses data dari database
function getPosts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mendapatkan url featured iamge
function featured_image_url() {
    global $post; // Mengakses variabel global $post

    // cek apakah featured_image tersedia di $post
    if (isset($post['featured_image']) && !empty($post['featured_image'])) {
        return BASE_URL_UPLOADS . 'images/' . htmlspecialchars($post['featured_image']);
    }

    // URL default jika tidak ada gambar unggulan
    return BASE_URL_UPLOADS . 'no-image.jpg';
}


// funfsi navar admin untuk public (jika admin login)
function admin_header() {
    include_once('../includes/auth.php');
    if (isLoggedIn()) :
    echo '<div id="header-admin" class="sticky-top z-3 bg-black small text-white-50">';
    echo '  <div class="container">
                <a href="' . BASE_URL_ADMIN . '" class="text-decoration-none text-white-50">admin</a> / 
                <a href="' . BASE_URL_ADMIN . 'add-content.php" class="text-decoration-none text-white-50">tambah baru</a>';
                if (basename($_SERVER['SCRIPT_NAME']) === 'post.php') { $idpost = $_GET['id']; echo ' / 
                    <a href="' . BASE_URL_ADMIN . 'edit-content.php?id=' .$idpost. '" class="text-decoration-none text-white-50">edit post ini</a>
                '; }
    echo        '<a href="' . BASE_URL_ADMIN . 'logout.php" class="text-decoration-none text-white-50 float-end">Logout</a>';
    echo '  </div>';
    echo '</div>';
    endif;
}