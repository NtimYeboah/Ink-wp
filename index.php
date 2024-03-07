
<?php
/*
 * Main template file
 */
get_header();

$display_sticky_article = get_theme_mod('sticky_article_display');
$display_tips_and_snippet = get_theme_mod('tips_and_snippet_display');
$display_sidebar = get_theme_mod('sidebar_display');

$sticky_posts = get_option('sticky_posts');
?>

<?php if ($display_sidebar == 1): ?>
<div class="min-h-screen container flex flex-col px-4 mx-auto md:w-8/12 mb-5 mt-5">
<?php else: ?>
<div class="min-h-screen container flex flex-col px-4 mx-auto mb-5 mt-5">
<div class="md:w-7/12 md:mx-auto flex flex-col">
<?php endif; ?>

    <?php if ($display_sidebar == 1): ?>
    <div class="flex flex-col">
        <div class="flex flex-col md:w-8/12">
            <!-- Search for sm screens -->
            <div id="sm-search" class="hidden flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200"><?php _e('Search', 'ink'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-4 mb-4 pr-4">
                    <?php get_search_form() ?>
                </div>
            </div>
            <!-- End of search for sm screens -->
        </div>
    </div>
    <?php endif; ?>
    <?php

    if ($display_sticky_article == 1):
        $args = [
            'post_type' => 'post',
            'post__in' => $sticky_posts,
        ];

        $sticky_article = new WP_Query($args);

        if ($sticky_article->have_posts()):
            $sticky_article->the_post();
            get_template_part('template-parts/posts/content', 'sticky');
        endif;
    endif;

    wp_reset_postdata();
    ?>

    <?php
    $args = [
        'post_type' => 'post',
        'post__not_in' => $sticky_posts,
        'posts_per_page' => 4
    ];
    
    $primary_posts = new WP_Query($args);

    if ($primary_posts->have_posts()):
    ?>
    <div class="flex flex-col md:flex-row gap-4">
        <?php if ($display_sidebar == 1): ?>
        <div class="flex flex-col md:w-8/12">
        <?php else: ?>
        <div class="flex flex-col md:w-12/12">
        <?php endif; ?>
            <!-- Articles -->
            <div class="flex flex-col mb-5 bg-slate-50 dark:bg-gray-950">
                <div class="flex flex-row gap-3">
                    <div>
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div>
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200"><?php _e('Latest Articles', 'ink'); ?></h2>
                        </div>
                    </div>
                </div>

                <!-- Article container -->
                <div class="flex flex-col md:grid md:grid-cols-2 md:gap-4 mx-4 mb-4">
                    <?php
                        while ($primary_posts->have_posts()):
                            $primary_posts->the_post();
                            get_template_part('template-parts/posts/content');
                        endwhile;

                        wp_reset_postdata();
                    ?>
                </div>
                <!-- End of Articles -->

            </div>
            <!-- End of Articles -->

            <?php
            if ($display_tips_and_snippet == 1):

                $tips_query = new WP_Query([
                    'tag' => 'tip',
                    'posts_per_page' => 4
                ]);

                if ($tips_query->have_posts()):
            ?>
            <!-- Tips & Snipperts -->
            <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
                <!-- Text container -->
                <div class="flex flex-row gap-3">
                    <div class="">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div>
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200"><?php _e('Tips & Snippets', 'ink'); ?></h2>
                        </div>
                    </div>
                </div>
                <!-- End of Text Container -->

                <!-- Tips container -->
                <div class="flex flex-col md:grid md:grid-cols-2 pb-5 px-4 gap-3">
                    <?php
                        while ($tips_query->have_posts()):
                            $tips_query->the_post();
                    ?>
                    <article class="mb-5">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <div class="flex flex-row">
                                <div class="w-12/12 dark:text-gray-300">
                                    <?php the_title('<h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">', '</h3>'); ?>
                                    <div class="line-clamp-4">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php
                        endwhile;

                        wp_reset_postdata();
                    ?>
                </div>
                <!-- End of tips container -->
            </div>
            <!-- End of Tips & Snippets -->
            <?php
            endif;
                endif;
            ?>
        </div>

        <?php
        if ($display_sidebar == 1):
            get_sidebar('main');
        endif;
        ?>
    </div>

    <?php else: ?>
    <div class="container md:w-6/12 md:mx-auto">
        <header class="my-4">
            <div class="flex justify-center">
                <h1 class="font-extrabold dark:text-slate-100"><?php _e('No articles available.', 'ink'); ?></h1>
            </div>
        </header>
    </div>
    <?php endif; ?>

<?php if ($display_sidebar == 0): ?>
</div>
<?php endif; ?>
</div>

<?php
get_footer();
