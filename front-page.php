<?php get_header(); ?>

<!-- Carousel boostrap -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://dongduoccongduc.com/upload/photo/1366x492x1/0720813606.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://dongduoccongduc.com/upload/photo/1366x492x1/83129004670.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://dongduoccongduc.com/upload/photo/1366x492x1/0720813606.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Carousel -->


<!-- Products show case -->
<div class="section">
    <div class="section-header">
        <span class="section-title"> SẢN PHẨM NỔI BẬT </span>
    </div>
    <div class="section-body">

        <div class="row product-row">

            <?php

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();

                $_product = wc_get_product(get_the_ID());
                ?>


                <div class="col col-md-3 col-12 product-item">
                    <a href="<?php the_permalink(); ?>">
                        <img class="product-image img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), array(250, 250)); ?>" alt="">
                    </a>

                    <span class="product-name"><? the_title() ?></span>
                    <span class="product-description">Mã SP:</span>
                    <div><span class="product-description">Giá:</span>
                        <span class="product-price"><?php echo $_product->get_regular_price(); ?>đ</span></div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>

</div>

<!-- End PRoducts-->



<!-- Posts show case -->
<div class="section">
    <div class="section-header">
        <span class="section-title"> BÀI VIẾT NỔI BẬT </span>
    </div>
    <div class="section-body">

        <div class="row post-row">

            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 8
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();

                ?>
                <div class="col col-md-4 col-12 post-item">

                    <img class="post-image img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), array(250, 250)); ?>" alt="">
                    <span class="post-name"><?php the_title() ?></span>
                    <span class="post-description"><?php echo the_excerpt(); ?>...</span>
                    <a href="<?php the_permalink(); ?>"><span class="post-more">Xem thêm</span></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- End Posts-->

<?php get_footer(); ?>