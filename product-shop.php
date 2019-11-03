<?php

/**
 * 
 * Template Name: Products Shop
 */


get_header(); ?>



<!-- Products show case -->
<div class="section">
    <div class="section-header">
        <span class="section-title"> SẢN PHẨM </span>
    </div>
    <div class="section-body">

        <div class="row">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'product',
                'paged' => $paged,
            );

            $blogposts = new WP_Query($args);

            while ($blogposts->have_posts()) {
                $blogposts->the_post();

                $_product = wc_get_product(get_the_ID());

                $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/product/550x500x2/188299688684.jpg';
                ?>


                <div class="col col-md-4 col-12 product-item">
                    <a class="product-image-wrapper" href="<?php the_permalink(); ?>">
                        <img class="product-image img-fluid" src="<?php echo  $imguri; ?>" alt="">
                    </a>

                    <span class="product-name"><?php the_title() ?></span>
                    <span class="product-description">Mã SP:</span>
                    <div><span class="product-description">Giá:</span>
                        <span class="product-price"><?php echo $_product->get_regular_price(); ?>đ</span></div>
                </div>

            <?php
            }
            ?>


            <?php
            // Reset the post to the original after loop. otherwise the current page becomes the last item from the while loop.
            // https://codex.wordpress.org/Function_Reference/wp_reset_query
            wp_reset_query();
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

</div>

<!-- End PRoducts-->



<?php get_footer(); ?>