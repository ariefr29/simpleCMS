<?php include('header.php') ?>

    <div class="wrapper">
        <a href="add-content.php" class="btn-add">tambah baru</a>
        <table>
            <thead>
                <tr>
                    <th style="min-width: 50%;">Judul</th>
                    <th>Lihat</th>
                    <th>Tanggal Dibuat</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $posts = getPosts();
                foreach ($posts as $post): ?>
                    <tr>
                        <td style="min-width: 50%;">
                            <strong><?php echo $post['title'] ?></strong>
                        </td>
                        <td><a href="<?php echo BASE_URL_SITE . 'post.php?id=' . $post['id']; ?>">Lihat</a></td>
                        <td><?php echo $post['created_at']; ?></td>
                        <td>
                            <a href="edit-content.php?id=<?php echo $post['id'] ?>">edit</a> | 
                            <a href="delete-content.php?id=<?php echo $post['id'] ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include('footer.php'); ?>
