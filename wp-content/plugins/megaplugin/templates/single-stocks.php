<?php
/**
 * Template Name: Stocks
 * Template Post Type: stocks
 */

get_header();

while (have_posts()) :
    the_post();
    ?>

    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2><?php the_title(); ?></h2>
        <div class="content">
            <?php

            $first_field_value = get_field('first_field');
            $second_field_value = get_field('second_field');
            $third_field_value = get_field('third_field');


            if (!empty($first_field_value)) {  ?>
                <div><?php echo  $first_field_value; ?></div>
            <?php }

            if (!empty($second_field_value)) {  ?>
                <div><?php echo  $second_field_value; ?></div>
            <?php }

            if (!empty($third_field_value)) {  ?>
                <div><?php echo  $third_field_value; ?></div>
            <?php }
            ?>

            <?php the_content(); ?>
        </div>
    </section>

<?php
endwhile;

get_footer();
