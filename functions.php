<?php

/**
 * Theme setup.
 */
if (! function_exists('ink_setup')) { 
    /**
     * Sets up theme defaults and registers support for various Wordpress features.
     * 
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails
     */
    function ink_setup() {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('ink', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Let Wordpress manage the document title.
         * By adding theme support, we declare that this theme does not use
         * a hard-coded HTML <title> tag in the document head, and expect Wordpress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        
        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        /**
         * Switch default core markup for search form, gallery and caption
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'gallery',
            'caption',
        ]);

        // Add support for core custom logo.
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        // Add Post Type Support
        add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

        add_theme_support('align-wide');
	    add_theme_support('wp-block-styles');
	    add_theme_support('editor-styles');
        add_theme_support('responsive-embeds');
        add_theme_support('custom-header', []);
        add_theme_support('custom-background', []);

        // Register menu bars
        register_nav_menus([
            'primary' => esc_html__('Primary Menu', 'ink'),
            'footer' => esc_html__('Footer Menu', 'ink'),
        ]);
    }
}
add_action('after_setup_theme', 'ink_setup');

/**
 * Enqueue theme assets.
 */
if (! function_exists('ink_enqueue_scripts')) {
    function ink_enqueue_scripts() {
        $theme = wp_get_theme();
    
        wp_enqueue_style( 'ink', ink_asset( 'assets/css/app.css' ), array(), $theme->get( 'Version' ) );
        wp_enqueue_script( 'ink', ink_asset( 'assets/js/app.js' ), array('jquery'), $theme->get( 'Version' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'ink_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
if (! function_exists('ink_asset')) {
    function ink_asset( $path ) {
        if ( wp_get_environment_type() === 'production' ) {
            return get_stylesheet_directory_uri() . '/' . $path;
        }
    
        return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
    }
}

if (! function_exists('excerpt_more_notation')) {
    // Notation for read more in excerpt
    function excerpt_more_notation() {
        return '...';
    }
}
add_filter('excerpt_more','excerpt_more_notation', 11);

if (! function_exists('numeric_post_pagination')) {
    /**
     * Custom numeric pagination
     */
    function numeric_post_pagination() {
        $max_pages = wp_count_posts()->publish;

        // Stop execution if there's only 1 page
        if ($max_pages <= 1) {
            return [];
        }

        // Get the paged query variable in the WP Query class
        // This is 1, 2, 3, etc for each of the query
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

        // This will be 1 2 3 on the pagination bar
        $total_pagination_number = intval(ceil($max_pages / get_query_var('posts_per_page')));

        // Links will hold everything that needs to be displayed on the pagination bar
        //. url, active, disabled
        $links = [];

        $url = home_url(). '/articles/page/';

        $prevPage = $paged - 1;
        $prev_link = [
            'url' => $url . ($prevPage) ?: '',
            'active' => $paged > 1,
            'disabled' => $paged <= 1,
        ];

        $nextPaged = $paged + 1;
        $next_link = [
            'url' => $url . ($nextPaged) ?: '',
            'active' => $paged < $total_pagination_number,
            'disabled' => $paged === $total_pagination_number,
        ];

        $prev_next = [];
        $prev_next[] = $prev_link;
        $prev_next[] = $next_link;

        $links[] = $prev_next;

        $num_pagination = [];

        foreach (range(1, $total_pagination_number) as $number) {
            $link = [
                'url' => $url . $number,
                'label' => $number,
                'active' => $paged === $number,
                'disabled' => false,
            ];

            $num_pagination[] = $link;
        }

        $links[] = $num_pagination;

        return $links;
    }
}

require get_stylesheet_directory() . '/inc/ink_customizer.php';

if (! function_exists('ink_giscus_script')) {
    /**
     * Add Giscus comments
     */
    function ink_giscus_script() {
        if (is_single() && get_theme_mod('commenting_system_to_display') == 'giscus') {
            ?>
                <?php echo get_theme_mod('giscus_script'); ?>
            <?php
        }
    }
} // esc_js(get_theme_mod('giscus_script'));
add_action('wp_footer', 'ink_giscus_script');

if (! function_exists('ink_register_sidebars')) {
    function ink_register_sidebars() {
        // Main sidebar
        register_sidebar([
            'name' => __('Main sidebar', 'ink'),
            'id' => 'main-sidebar',
            'description' => __('Main sidebar to be displayed on front page and article details page', 'ink'),
            'before_sidebar' => '<div>',
            'after_sidebar' => '</div>',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        ]);

        // Related articles sidebar
        register_sidebar([
            'name' => __('Related articles sidebar', 'ink'),
            'id' => 'related-articles-sidebar',
            'description' => __('Related articles sidebar shown in article details page', 'ink'),
        ]);

        // Related articles sidebar
        register_sidebar([
            'name' => __('Footer sidebar', 'ink'),
            'id' => 'footer-articles-sidebar',
            'description' => __('Footer sidebar in the footer', 'ink'),
        ]);
    }
}
add_action('widgets_init', 'ink_register_sidebars');

require get_stylesheet_directory() . '/inc/widgets/ink_search_widget.php';
require get_stylesheet_directory() . '/inc/widgets/ink_categories_widget.php';
require get_stylesheet_directory() . '/inc/widgets/ink_recent_articles_widget.php';
require get_stylesheet_directory() . '/inc/widgets/ink_tags_widget.php';
require get_stylesheet_directory() . '/inc/widgets/ink_related_articles_widget.php';


if (! function_exists('register_ink_widgets')) {
    function register_ink_widgets() {
        register_widget('Ink_Search_Widget');
        register_widget('Ink_Categories_Widget');
        register_widget('Ink_Recent_Articles_Widget');
        register_widget('Ink_Tags_Widget');
        register_widget('Ink_Related_Articles_Widget');
    }
}
add_action('widgets_init', 'register_ink_widgets');

if (! function_exists('ink_get_nav_menu_items')) {
    function ink_get_nav_menu_items($location) {
        $menu_locations = get_nav_menu_locations();
        $menu_id = $menu_locations[$location];

        return wp_get_nav_menu_items($menu_id);
    }
}

if (! function_exists('ink_current_path')) {
    function ink_current_path() {
        global $wp;
        $current_url = home_url($wp->request);

        return parse_url($current_url, PHP_URL_PATH);
    }
}
