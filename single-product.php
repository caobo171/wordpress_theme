<?php get_header(); ?>

<?php
while (have_posts()) : the_post();

    $_product = wc_get_product(get_the_ID());
    ?>

    <!--Product Detail Section-->
    <div class="product-detail-section">

        <div class=" row">
            <img class="col col-md-6 col-12" src="https://dongduoccongduc.com/upload/product/550x500x2/730895015444.jpg" alt="">
            <div class="col col-md-6 col-12 product-detail-main-info">
                <h3 class="product-detail-title"> <?php the_title() ?> </h3>
                <p class="product-detail-property">Mã sản phẩm:</p>
                <div class="product-detail-property"><span>Giá:</span>
                    <?php
                        if ($_product->get_regular_price() !== $_product->get_price()) :  ?>
                        <span class="product-detail-regular-price"><?php echo $_product->get_regular_price() ?> đ</span>
                    <?php endif ?>
                    <span class="product-detail-price"><?php echo $_product->get_price() ?> đ</span>
                </div>
                </p>

            </div>
        </div>


        <!--Nav-tab boostrap-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Mô tả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="false">Nội dung</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="product-detail-tab-body">
                    <?php echo the_excerpt() ?>
                </div>

            </div>
            <div class="tab-pane fade" id="content" role="content" aria-labelledby="content-tab">
                <div class="product-detail-tab-body">
                    <?php echo $_product->get_description() ?>
                </div>
            </div>
        </div>

        <!--End Nav-tab -->
    </div>
    <!-- End Product Detail -->

    <div class="section">
        <div class="section-header">
            <span class="section-title"> SẢN PHẨM LIÊN QUAN </span>
        </div>
        <div class="section-body">

            <div class="row">

                <?php
                    $related_products = wc_get_related_products(get_the_ID());
                    for ($i = 0; $i < count($related_products); $i++) {

                        $related = wc_get_product($related_products[$i]);
                        $imguri = wp_get_attachment_url($related->get_image_id() ) ? wp_get_attachment_url( $related->get_image_id() ) : 'https://dongduoccongduc.com/upload/product/550x500x2/188299688684.jpg';
                        ?>


                    <div class="col col-md-3 col-12 product-item">
                        <a href="<?php the_permalink(); ?>">
                            <img class="product-image img-fluid" src="<?php echo  $imguri; ?>" alt="">
                        </a>

                        <span class="product-name"><?php echo $related -> get_name(); ?></span>
                        <span class="product-description">Mã SP:</span>
                        <div><span class="product-description">Giá:</span>
                            <span class="product-price"><?php echo $related->get_regular_price(); ?>đ</span></div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </div>


<?php endwhile ?>






<?php get_footer(); ?>