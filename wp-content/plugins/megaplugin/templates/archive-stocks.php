<?php
/**
 * Template Name: Stocks Archive
 * Template Post Type: stocks
 */

get_header();
?>
    <form id="stocks-filter-form">
        <label for="stocks-filter-select">Ajax filter:</label>
        <select id="stocks-filter-select" name="stocks-filter">
            <option value="">All posts</option>
            <?php

            $stocks_query = new WP_Query(array(
                'post_type' => 'stocks',
                'posts_per_page' => -1,
            ));

            if ($stocks_query->have_posts()) :
                while ($stocks_query->have_posts()) : $stocks_query->the_post();
                    ?>
                    <option value="<?php echo esc_attr(get_the_ID()); ?>"><?php the_title(); ?></option>
                <?php
                endwhile;
            endif;

            wp_reset_postdata();
            ?>
        </select>
    </form>

    <div id="stocks-results-container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <div><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></div>
            <?php
            endwhile;
        else :
            echo 'No stocks found';
        endif;
        ?>
    </div>


<?php

$response = wp_remote_get('https://catfact.ninja/fact');

if (!is_wp_error($response) && $response['response']['code'] === 200) {
    $data = json_decode($response['body'], true);
    $fact = $data['fact'];
    ?>
    <div><?php echo esc_html($fact); ?></div>
    <?php
}

get_footer();
