<?php
/*
Plugin Name: MegaPlugin
Plugin URI: https://plugin.test
Description: MegaPlugin for STOCK
Version: 1.0
Author: Konstantin

*/
function megaplugin_register_stocks_post_type() {
    $labels = array(
        'name' => 'Stocks',
        'singular_name' => 'Stock',
        'menu_name' => 'Stocks',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'template' => get_stylesheet_directory() . '/megaplugin/templates/single-stocks.php',
        'template_lock' => 'all',
    );

    register_post_type( 'stocks', $args );
}
add_action( 'init', 'megaplugin_register_stocks_post_type' );

function megaplugin_template_include( $template ) {
    if ( is_singular( 'stocks' ) ) {
        $template = plugin_dir_path( __FILE__ ) . 'templates/single-stocks.php';
    }

    return $template;
}
add_filter( 'template_include', 'megaplugin_template_include' );

function megaplugin_stocks_archive_template($archive_template) {
    if (is_post_type_archive('stocks')) {
        $archive_template = plugin_dir_path(__FILE__) . 'templates/archive-stocks.php';
    }
    return $archive_template;
}
add_filter('archive_template', 'megaplugin_stocks_archive_template');


function megaplugin_enqueue_scripts() {
    wp_enqueue_script( 'megaplugin-ajax', plugin_dir_url( __FILE__ ) . 'js/megaplugin-ajax.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( 'megaplugin-ajax', 'megaplugin_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'megaplugin_enqueue_scripts' );

function megaplugin_stocks_filter() {
    $filterValue = isset( $_POST['filter_value'] ) ? $_POST['filter_value'] : '';

    $args = array(
        'post_type' => 'stocks',
        'posts_per_page' => -1,
    );

    if ( ! empty( $filterValue ) ) {
        $args['p'] = $filterValue;
    }

    $query = new WP_Query( $args );

    ob_start();

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            ?>
            <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <?php
        endwhile;
    else :
        echo 'No stocks found.';
    endif;

    wp_reset_postdata();

    $response = ob_get_clean();

    wp_send_json_success( $response );
}
add_action( 'wp_ajax_stocks_filter', 'megaplugin_stocks_filter' );
add_action( 'wp_ajax_nopriv_stocks_filter', 'megaplugin_stocks_filter' );
