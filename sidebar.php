<div class="flex flex-col md:w-4/12">
    <div class="flex-col hidden md:flex w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
        <div class="flex flex-row gap-3">
            <div class="flex flex-col">
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">Search</h2>
                </div>
            </div>
        </div>
        <div class="flex flex-col ml-4 mb-4 pr-4">
            <?php get_search_form() ?>
        </div>
    </div>

    <?php
        $categories = get_categories();
        if ($categories && count($categories) > 0):
    ?>
    <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
        <div class="flex flex-row gap-3">
            <div class="flex flex-col">
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">Categories</h2>
                </div>
            </div>
        </div>
        <div class="flex flex-col mx-4 mb-4">
            <div class="flex flex-col">
                <?php foreach ($categories as $category):
                    printf(
                        '<a href="%1$s" class="hover:underline text-base font-medium capitalize">
                            <span class="dark:text-gray-300 dark:hover:underline">%2$s</span>
                            <span class="text-gray-500 dark:text-gray-400">[%3$s]</span>
                        </a>',
                        esc_url(home_url('articles/category/' . $category->slug)),
                        $category->name,
                        $category->count
                    );
                endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
        $recent_articles = new WP_Query([
            'tag' => 'article',
            'posts_per_page' => 3
        ]);

        if ($recent_articles->have_posts()):
    ?>
    <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
        <div class="flex flex-row gap-3">
            <div class="flex flex-col">
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">Recent Articles</h2>
                </div>
            </div>
        </div>
        <div class="flex flex-col mx-4 mb-4 font-sarabun">
            <?php while ($recent_articles->have_posts()):
                $recent_articles->the_post();
            ?>
            <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-2">
                <a id="recent-article-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>" class="">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-col basis-1/3">
                            <!-- Fix image height -->
                            <picture>
                                <img 
                                    class="w-full object-cover object-center md:h-14 h-28" 
                                    src="<?php echo the_post_thumbnail_url(); ?>"
                                    alt=""
                                >

                                <!-- <img class="w-full h-48 object-cover object-center mb-2" src="<?php echo the_post_thumbnail_url(); ?>" alt=""> -->
                            </picture>
                        </div>
                        <div class="flex flex-col px-4 basis-2/3">
                            <div class="flex flex-col">
                                <?php the_title('<h3 class="font-sarabun mt-5 md:mt-0 font-bold text-sm text-left dark:text-gray-300 tracking-wide line-clamp-1">', '</h3>'); ?>

                                <div>
                                    <p class="inline-flex text-gray-600 text-xs font-normal dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                                </div>
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
    </div>
    <?php endif; ?>

    <?php $tags = get_tags();
        if ($tags && count($tags) > 0):
    ?>
    <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
        <div class="flex flex-row gap-3">
            <div class="flex flex-col">
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">Tags</h2>
                </div>
            </div>
        </div>
        <div class="flex flex-row mx-4 mb-2 font-sarabun flex-wrap dark:text-gray-300">
            <?php foreach ($tags as $tag):
                printf(
                    '<div class="mb-5 mr-2">
                        <a href="%1$s" class="border px-2 pt-1 pb-2">%2$s</a>
                    </div>',
                    esc_url(home_url('articles/tag/' . $tag->slug)),
                    $tag->name
                );
            endforeach;
            ?>
        </div>
    </div>
    <?php endif; ?>
</div>