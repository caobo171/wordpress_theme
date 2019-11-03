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
    <div class="divider"></div>
    <div class="section-header">
        <span class="section-title"> SẢN PHẨM NỔI BẬT </span>
    </div>
    <div class="section-body">

        <div class="row product-row">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'paged' => $paged
            );


            $productposts = new WP_Query($args);

            while ($productposts->have_posts()) {
                $productposts->the_post();

                $_product = wc_get_product(get_the_ID());

                $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/product/550x500x2/188299688684.jpg';

                ?>


                <div class="col-lg-3  col-md-6 col-sm-12 col-12 product-item">
                    <a href="<?php the_permalink(); ?>">
                        <img class="product-image img-fluid" src="<?php echo $imguri; ?>" alt="">
                    </a>

                    <span class="product-name"><?php echo the_title(); ?></span>
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
        <?php
        $total_pages = $productposts->max_num_pages;

        if ($total_pages > 1) {

            $current_page = max(1, get_query_var('paged'));

            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('« prev'),
                'next_text'    => __('next »'),
            ));
        }
        ?>
    </ul>



</div>

<!-- End PRoducts-->



<!-- Posts show case -->
<div class="section">
    <div class="divider"></div>
    <div class="section-header">
        <span class="section-title"> BÀI VIẾT NỔI BẬT </span>
    </div>
    <div class="section-body">

        <div class="row post-row">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => $paged
            );



            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();
                $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/news/380x248x1/642496309091.jpg';
                ?>
                <div class="col col-md-4 col-12 post-item">

                    <img class="post-image img-fluid" src="<?php echo $imguri; ?>" alt="">
                    <span class="post-name"><?php the_title() ?></span>
                    <span class="post-description"><?php echo wp_trim_words(get_the_excerpt(), 30); ?>...</span>
                    <a href="<?php the_permalink(); ?>"><span class="post-more">Xem thêm</span></a>
                </div>
            <?php
            }
            ?>
        </div>


    </div>

    <ul class="pagination">
        <?php
        $total_pages = $blogposts->max_num_pages;

        if ($total_pages > 1) {

            $current_page = max(1, get_query_var('paged'));

            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('« prev'),
                'next_text'    => __('next »'),
            ));
        }
        ?>
    </ul>


    <div class="divider"></div>
</div>

<!-- End Posts-->

<?php get_footer(); ?>