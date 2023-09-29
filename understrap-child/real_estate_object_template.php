<?php
/**
 * Template Name: real_estate_object
 *
 * Template Post Type: real_estate_object
 *
 */
?>

<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
    <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

    <div class="wrapper" id="index-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">
                <main class="site-main" id="main">

                    <?php
                    if ( have_posts() ) {
                        // Start the Loop.
                        while ( have_posts() ) {
                            the_post();
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col"><img src="<?php the_field("image"); ?>" alt="img"></div>
                                    <div class="col">
                                        <p>Координати: <?php the_field("coordinates"); ?></p>
                                        <p>Поверховість: <?php the_field("number_of_floors"); ?></p>
                                        <p>Тип будівлі: <?php the_field("building_type"); ?></p>
                                        <a class="real-estate-item-link" href="<?php echo get_home_url(); ?>">На головну</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        get_template_part( 'loop-templates/content', 'none' );
                    }
                    ?>

                </main>
            </div><!-- .row -->
        </div><!-- #content -->
    </div><!-- #index-wrapper -->
<?php
get_footer();