<?php include('header.php');

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$postId = cleanInput($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $postId]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = cleanInput($_POST['title']);
    $content = $_POST['content'];
    $featuredImage = $post['featured_image']; // gambar saat ini

    // periksa apakah ada gambar baru yang diunggah
    if (!empty($_FILES['featured_image']['name'])) {
        $uploadDir = '../uploads/images/';
        $fileName = basename($_FILES['featured_image']['name']);
        $targetFile = $uploadDir . uniqid() . '_' . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetFile)) {
                // hapus gambar lama jika ada
                if ($featuredImage) {
                    unlink($uploadDir . $featuredImage);
                }
                $featuredImage = basename($targetFile);
            } else {
                echo "Gagal mengunggah gambar.";
                exit();
            }
        } else {
            echo "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF.";
            exit();
        }
    }

    // update data di database
    $stmt = $pdo->prepare("UPDATE posts SET title = :title, content = :content, featured_image = :featured_image WHERE id = :id");
    $stmt->execute([
        'title' => $title,
        'content' => $content,
        'featured_image' => $featuredImage,
        'id' => $postId
    ]);


    header("Location: ../public/post.php?id=$postId");
    exit();
} ?>

<div class="wrapper">    
    <h2 style="display: inline-block;margin-right: 10px;">Edit Konten</h2>
    <a href="add-content.php" class="btn-add">tambah baru</a>

    <form action="edit-content.php?id=<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="kiri">
            <input type="text" name="title" placeholder="masukan judul" value="<?php echo htmlspecialchars($post['title']); ?>" required>
            <textarea name="content" required> <?php echo htmlspecialchars($post['content']); ?> </textarea>
        </div>

        <div class="kanan">
            <button type="submit">Perbarui Konten</button>
            <div style="margin-bottom: 1.5rem;margin-top: 5px;">
                <a href="<?php echo BASE_URL_SITE . 'post.php?id=' . $post['id']; ?>">lihat konten</a> / 
                <a href="delete-content.php?id=<?php echo $post['id'] ?>" style="color: red;">hapus konten</a>
            </div>
            
            <?php if ($post['featured_image']): ?>
                <div class="cover">
                    <img src="../uploads/images/<?php echo htmlspecialchars($post['featured_image']); ?>" alt="Featured Image" style="max-width: 100%;">
                </div>
            <?php else: echo "Cover Gambar"; endif; ?>
            <input type="file" name="featured_image" accept="image/*"><br><br>
        </div>
        <div style="clear: both !important;"></div>
    </form>
</div>

<?php include('footer.php') ?>