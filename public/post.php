<?php include('header.php'); ?>

<div class="container p-4 layout bg-white border">
    <img src="<?php echo featured_image_url() ?>" alt="gambar">
    <h1 class="h2 my-4 fw-semibold"><?php echo $post['title']; ?></h1>
    <?php echo $post['content']; ?>
</div><!-- .container -->

<div class="sticky-bottom bg-white p-3 border container">
    <a class="btn btn-success w-100" href="<?php echo WA_LINK ?>"><?php echo WA_BTN_NAME ?></a>
</div><!-- .sticky-bottom -->

<?php include('footer.php') ?>
