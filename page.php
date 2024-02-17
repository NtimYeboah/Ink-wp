<?php
/**
 * Page contents - This is used all pages
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

    get_template_part('template-parts/pages/content', $path);
?>
<?php
get_footer();
