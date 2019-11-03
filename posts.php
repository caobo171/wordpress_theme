<?php

/**
 * 
 * Template Name: Posts
 */


get_header(); ?>



<!-- Products show case -->
<div class="section">
    <div class="section-header">
        <span class="section-title"> BÀI VIẾT </span>
    </div>
    <div class="posts-section-body ">

        <div class="row">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'paged' => $paged,
            );

            $blogposts = new WP_Query($args);


            while ($blogposts->have_posts()) {
                $blogposts->the_post();
                $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/news/380x248x1/642496309091.jpg';
                ?>
                <div class="col col-md-6 col-12 posts-item">

                    <img class="posts-image img-fluid" src="<?php echo $imguri; ?>" alt="">

                    <div class="posts-description">
                        <span class="posts-name"><?php the_title() ?></span>
                        <span class="post-description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?>...</span>
                        <a href="<?php the_permalink(); ?>"><span class="post-more">Xem thêm</span></a>
                    </div>

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