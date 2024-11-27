<?php include('header.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ambil input dari form dan bersihkan
    $title = cleanInput($_POST['title']);
    $content = $_POST['content'];

   // variabel untuk menyimpan nama file
   $featuredImage = null;

   // periksa apakah ada file yang diunggah
   if (!empty($_FILES['featured_image']['name'])) {
       $uploadDir = '../uploads/images/'; // folder untuk menyimpan gambar
       $fileName = basename($_FILES['featured_image']['name']);
       $targetFile = $uploadDir . uniqid() . '_' . $fileName; // nama file unik

       // validasi tipe file (hanya gambar)
       $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
       if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
           if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetFile)) {
               $featuredImage = basename($targetFile); // simpan nama file
           } else {
               echo "Gagal mengunggah gambar.";
               exit();
           }
       } else {
           echo "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF.";
           exit();
       }
   }

   // insert data ke database
   $stmt = $pdo->prepare("INSERT INTO posts (title, content, featured_image) VALUES (:title, :content, :featured_image)");
   $stmt->execute([
       'title' => $title,
       'content' => $content,
       'featured_image' => $featuredImage
   ]);

   // redirect ke halaman edit dengan ID konten baru
   $lastId = $pdo->lastInsertId();
   header("Location: edit-content.php?id=$lastId");
   exit();
} ?>

<div class="wrapper">
    <h2>Tambah Konten</h2>

    <form action="add-content.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Masukan judul" required>
        Cover Gambar
        <input type="file" name="featured_image" accept="image/*">

        <textarea name="content" placeholder="tambahkan deskripsi" required> </textarea><br><br>

        <button type="submit">Tambah Konten</button>
    </form>

    <br>
    <a href="index.php">Kembali</a>
</div>

<?php include('footer.php'); ?>