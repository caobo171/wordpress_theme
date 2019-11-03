<?php get_header(); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post()
        ?>

        <div class="contact-section row">
            <div class="col col-md-7 col-12">
                <?php
                        the_content()
                ?>
            </div>
        </div>

<?php
    }
} ?>

<?php get_footer(); ?>