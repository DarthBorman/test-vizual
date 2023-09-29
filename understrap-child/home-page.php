<?php
/**
 * Template Name: home-page
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

                <?php
                // Do the left sidebar check and open div#primary.
                get_template_part( 'global-templates/left-sidebar-check' );
                ?>

                <main class="site-main" id="main">
                    <?php
                    if ( have_posts() ) {
                        // Start the Loop.
                        while ( have_posts() ) {
                            the_post();
                            ?>
                            <div class="container">
                                <div class="row">
                                    <form id="dad-form" class="dad-form">
                                        <label for="house-type">Тип будівлі</label>
                                        <select name="house-type" id="house-type">
                                            <option value="0">Усі</option>
                                            <option value="панель">Панель</option>
                                            <option value="цегла">Цегла</option>
                                            <option value="піноблок">Піноблок</option>
                                        </select>
                                        <label for="number-of-floors">Поверховість</label>
                                        <select name="number-of-floors" id="number-of-floors">
                                            <option value="0">Усі</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>
                                        <button id="filter-button" class="real-estate-item-link" type="submit">фільтрувати</button>
                                    </form>
                                </div>
                            </div>
                            <ul>
                                <li id="filter-error" class="real-estate-item hide-item">На жаль, по вибраним фільтрам немає результату.</li>
                                <?php

                                $posts_Query = new WP_Query(array(
                                    "post_type" => "real_estate_object",
                                    "posts_per_page" => -1,
                                ));
                                if ($posts_Query->have_posts()) {
                                    while ($posts_Query->have_posts()) {
                                        $posts_Query->the_post(); ?>
                                        <!--number_of_floors -->
                                        <li id="real-estate-item-<?php echo $post->ID?>" class="real-estate-item">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <h2><?php the_field("name"); ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col"><img src="<?php the_field("image"); ?>" alt="img"></div>
                                                    <div class="col">
                                                        <p>Координати: <?php the_field("coordinates"); ?></p>
                                                        <p>Поверховість: <?php the_field("number_of_floors"); ?></p>
                                                        <p>Тип будівлі: <?php the_field("building_type"); ?></p>
                                                        <a class="real-estate-item-link" href="<?php the_permalink(); ?>">детальніше</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                    wp_reset_postdata();
                                } ?>
                            </ul>
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
