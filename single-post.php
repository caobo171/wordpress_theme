<?php get_header(); ?>

<?php while (have_posts()) {
    the_post();
    ?>



    <div class="post-detail-section">
        <h1 class="post-detail-title"> <?php the_title() ?> </h1>
        <p class="post-detail-author">Đăng bởi <strong><?php the_author(); ?></strong></p>
        <p class="post-detail-author"> <?php the_author_description(); ?></p>
        <?php the_content() ?>

    </div>



    <!-- Products show case -->
    <div class="section">
        <div class="section-header">
            <span class="section-title"> BÀI VIẾT LIÊN QUAN </span>
        </div>

        <div class="post-section-body ">

            <div class="row">
                <?php

                    $related = get_posts(array('category__in' => wp_get_post_categories(get_the_ID()), 'numberposts' => 5, 'post__not_in' => array(get_the_ID())));
                    if ($related) foreach ($related as $post) {
                        setup_postdata($post);
                        $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/news/380x248x1/642496309091.jpg';
                        ?>
                    <div class="col col-md-4 col-12 post-item">

                        <img class="post-image img-fluid" src="<?php echo $imguri; ?>" alt="">
                        <span class="post-name"><?php the_title() ?></span>
                        <span class="post-description"><?php echo wp_trim_words(get_the_excerpt(), 30); ?>...</span>
                        <a href="<?php the_permalink(); ?>"><span class="post-more">Xem thêm</span></a>
                    </div>
                <?php }
                    wp_reset_postdata(); ?>
            </div>
        </div>
    </div>



<?php } ?>

<?php get_footer(); ?>