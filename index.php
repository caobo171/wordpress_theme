<?php get_header(); ?>

<?php if (strlen($s) <= 0) :  ?>
    <h1 style="margin-top:60px;"> Không tìm thấy trang này</h1>
<?php else : ?>
    <!-- Products show case -->

    <?php
        $have = 0;

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'paged' => $paged,
            's' => $s,
            'sentence' => true
        );


        $productposts = new WP_Query($args);

        if ($productposts->have_posts()) : ?>
        <div class="section">
            <div class="divider"></div>
            <div class="section-header">
                <span class="section-title"> SẢN PHẨM </span>
            </div>
            <div class="section-body">

                <div class="row product-row">
                    <?php

                            $have += 1;
                            while ($productposts->have_posts()) {
                                $productposts->the_post();

                                $_product = wc_get_product(get_the_ID());

                                $imguri = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : 'https://dongduoccongduc.com/upload/product/550x500x2/188299688684.jpg';

                                ?>


                        <div class="col-lg-3  col-md-6 col-sm-12 col-12 product-item">
                            <a class= "product-image-wrapper"  href="<?php the_permalink(); ?>">
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
    <?php endif ?>

    <!-- End PRoducts-->



    <!-- Posts show case -->


    <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 8,
            'paged' => $paged,
            's' => $s,
            'sentence' => true
        );
        $blogposts = new WP_Query($args);

        ?>

    <?php if ($blogposts->have_posts()) : ?>
        <div class="section">
            <div class="divider"></div>
            <div class="section-header">
                <span class="section-title"> BÀI VIẾT</span>
            </div>
            <div class="section-body">

                <div class="row post-row">

                    <?php
                            $have += 1;

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
    <?php endif ?>

    <?php if($have <= 0 ): ?>
    <h1 style="margin-top:60px;"> Không tìm thấy sản phẩm hay bài viết phù  hợp </h1>
    <?php endif ?>

    <!-- End Posts-->
<?php endif ?>





<?php get_footer(); ?>