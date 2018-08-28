<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<footer class="bgc--gray pd_y--x50">
    <div class="container">
        <div class="txt_center">
            <a href="<?php the_field('slogan_link', 'options'); ?>" class="btn btn_line btn_innove" data-aos="flip-up" target="_blank">
                <?php the_field('button_slogan', 'options'); ?>
            </a>
        </div>
    </div>
</footer>
<footer class="bgc--black pd_y--x50">
    <div class="container">
        <div class="cl--white txt_center">
            <small>
                Copyright 1998-<?php the_field('year_copy', 'options'); ?> ©
                <span>
                    <a href="<?php the_field('url_copyright', 'options'); ?>" target="_blank">
                        <?php the_field('data_optime', 'options'); ?>
                    </a>
                </span>
                All Rights Reserved.
            </small>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

</body>

</html>

