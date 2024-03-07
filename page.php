<?php
/**
 * Page contents
 */
get_header();
?>

<?php
    global $wp;
    $current_url = home_url($wp->request);
    $parsed = parse_url($current_url, PHP_URL_PATH);
    $path = substr($parsed, 1);
    
    if (strpos($path, '/') !== false) {
        list($path, $fragmants) = explode('/', $path);
    }

    if (file_exists(get_stylesheet_directory() . '/template-parts/pages/content-' . $path . '.php')) {
        get_template_part('template-parts/pages/content', $path);
    } else {
        get_template_part('template-parts/pages/content', 'default');
    }
?>

<?php
get_footer();
