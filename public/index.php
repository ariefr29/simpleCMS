<?php include('header.php') ?>

<header id="hero-section" class="bg-dark text-white text-center py-5">
    <div class="container">
        <div class="w-75 mx-auto py-4">
            <h1 class="fw-bold mb-3">Selamat datang di <?php echo APP_NAME ?>!</h1>
            <p class="lead mb-4"><?php echo APP_TAGLINE ?></p>
            <a class="btn btn-danger" href="<?php echo CTA_LINK ?>"><?php echo CTA_NAME ?></a>
        </div>
    </div>
</header><!-- #hero-section -->

<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Tentang Kami</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="lead">
                    <?php echo ABOUT_TEXT ?>
                </p>
            </div>
        </div>
    </div>
</section><!-- #about -->

<section id="produk" class="bg-white py-5">
    <div class="container">
        <h2 class="text-center mb-5">Produk Kami</h2>
        <div class="row">
        <?php $posts = getPosts(); foreach ($posts as $post): ?>
            <div class="produk col-md-4 mb-4">
                <div class="card h-100">
                    <div class="cover-image ratio">
                        <img src="<?php echo featured_image_url() ?>" alt="<?php echo $post['title']; ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post['title']; ?></h5>
                        <p class="card-text"><?php echo substr(strip_tags($post['content']), 0, 30); ?>...</p>
                        <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-danger w-100">Lihat Detail</a>
                    </div>
                </div>
            </div><!-- .produk -->
        <?php endforeach; ?>
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- #produk -->

<section id="kontak" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Kontak Kami</h2>
        <div class="d-md-flex">
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-6 pe-md-4">
                <iframe width="100%" height="350" style="border:0" loading="lazy" allowfullscreen
                src="https://www.google.com/maps/embed/v1/place?q=<?php echo ALAMAT_NAME ?>&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe> 
            </div>
            <div class="col-md-5 ps-md-4">
                <span class="fw-bolder mt-5 mb-2 d-block">Alamat</span>
                <p><?php echo ALAMAT_TEXT ?></p>
                <a class="btn btn-success mt-4" href="https://web.whatsapp.com/send?phone=<?= WA_NUMBER ?>">Hubungi kami</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div><!-- .container -->
</section><!-- #kontak -->

<?php include('footer.php') ?>