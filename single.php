<?php
get_header();

$display_commenting_system = get_theme_mod('commenting_system_to_display');
?>

<!-- Main content -->
<section class="min-h-screen container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-10">
    <!-- Main content container -->
    <div class="md:w-7/12 md:mx-auto flex flex-col mb-5">
        <div class="flex justify-center mb-10">
            <?php
                the_title('<h1 class="font-sarabun text-2xl font-extrabold text-slate-900 dark:text-gray-300">', '</h1>');
            ?>
        </div>
        <?php
            $category_slug = '';
            $categories = get_the_category();

            if (count($categories) > 0):
        ?>
        <div class="flex justify-center gap-5">
            <?php foreach ($categories as $category):
                $category_slug .= $category->slug . ',';
            ?>
            <span class="text-base font-bold text-gray-600 dark:text-gray-400"><?php echo $category->name; ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="flex justify-center gap-5 mt-5">
            <span class="text-base font-normal text-gray-600 dark:text-gray-400"><?php the_time('m.d.Y')?></span>
        </div>

        <?php if (has_post_thumbnail()): ?>
        <div class="flex justify-center">
            <img class="rounded-md w-full md:h-96 object-cover object-center mt-10" src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="feature-image">
        </div>
        <?php endif; ?>

        <div id="content" class="mt-10 text-lg dark:text-gray-300 mb-10">
            <?php the_content(); ?>

            <?php
            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ink'),
                'after' => '</div>'
            ]);
            ?>
        </div>

        <?php if ($display_commenting_system == 'giscus'): ?>
        <!-- Giscus comments section -->
        <div class="giscus mb-10">
        </div>
        <!-- End of Giscus comments section-->
        <?php endif; ?>
    </div>

    <!-- Comments list container -->
    <?php
        if ($display_commenting_system == 'native'):
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
    ?>
    <!-- End of comments list container -->

    <!-- Comments Form -->
    <div class="md:w-7/12 md:mx-auto flex flex-col mb-5">
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="mt-2 mb-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200"><?php _e('Leave a comment', 'ink'); ?></h2>
                        <?php if (is_user_logged_in()):
                            global $wp;
                            $currentUrl = home_url(add_query_arg([], $wp->request));
                        ?>
                        <p class="font-sarabun dark:text-gray-300"><?php _e('Logged in as', 'ink'); ?> <?php echo wp_get_current_user()->display_name ?>. <a href="<?php echo wp_logout_url($currentUrl) ?>" class="hover:underline underline"><?php _e('Log out?', 'ink'); ?></a> <?php _e('Required fields are marked', 'ink'); ?> *</p>
                        <?php else: ?>
                        <div class="dark:text-gray-300">
                            <p><?php _e('Your email address will not be published. Required fields are marked', 'ink'); ?> * </p>
                            <p><?php _e('Having trouble posting comment?', 'ink'); ?> <a class="hover:underline underline" href="<?php echo wp_login_url(); ?>"><?php _e('Log in', 'ink'); ?></a>.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mx-4 mb-4">
                <div class="flex flex-col">
                    <form action="<?php echo esc_url_raw(home_url() . '/wp-comments-post.php'); ?>" method="post" id="commentform">
                        <label for="comment" class="text-gray-700 dark:text-gray-400"><?php _e('Comment', 'ink'); ?> *</label>
                        <textarea name="comment" class="w-full form-textarea mb-2 dark:bg-gray-900 dark:text-gray-300" rows="5"></textarea>
                        <button type="submit" name="submit" class="bg-slate-600 p-2 text-white font-base inset-0 hover:bg-slate-700"><?php _e('Post Comment', 'ink'); ?></button>
                        <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>" id="comment_post_ID">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of comments form -->
    <?php endif; ?>

    <?php get_sidebar('related-articles'); ?>

</section>
<!-- End of main content -->

<?php
get_footer();
