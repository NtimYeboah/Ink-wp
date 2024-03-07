<?php
/* 
 * Template for displaying sticky post
 */
?>
<div class="flex flex-col">
    <!-- Sticky Article -->
    <div class="flex flex-col mb-5 bg-slate-50 dark:bg-gray-950">
        <div class="flex flex-row gap-3">
            <div>
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div>
                <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200"><?php _e('Featured Article', 'ink'); ?></h2>
                </div>
            </div>
        </div>
        
        <div class="hidden flex-row md:grid md:grid-cols-2 dark:hover:bg-slate-900 hover:bg-slate-100 md:gap-4 mx-4 mb-4 bg-50% bg-no-repeat bg-right" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
            <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                <a id="feature-article-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>">
                    <div class="flex flex-col px-4">
                        <div class="flex flex-col text-lg text-gray-900 dark:text-gray-300">
                            <?php the_title('<h3 class="font-sarabun mt-5 font-extrabold text-2xl text-left dark:text-gray-300 tracking-wide">', '</h3>'); ?>
                            <div class="line-clamp-6 mt-5">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <div class="flex flex-row py-4 gap-2 justify-left">
                            <div>
                                <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                            </div>
                            <?php $cats = get_the_category(); ?>
                            <?php if (count($cats) > 0): ?>
                            <div>
                                <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                            </div>
                            <div>
                                <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400 uppercase"><?php echo $cats[0]->name; ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </article>
        </div>

        <div class="md:hidden flex flex-col mx-4 mb-2">
            <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <div class="flex-col">
                        <picture>
                            <img class="w-full h-48 object-cover object-center mb-2" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                        </picture>
                    </div>
                    <div class="flex flex-col px-4">
                        <div class="flex flex-col text-gray-900 dark:text-gray-300">
                            <?php the_title('<h3 class="font-sarabun mt-5 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">', '</h3>'); ?>

                            <p class="text-base text-gray-900 dark:text-gray-300 line-clamp-4 mt-5">
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                        <div class="flex flex-row py-4 gap-2 justify-left">
                            <div>
                                <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                            </div>
                            <?php $cats = get_the_category(); ?>
                            <?php if (count($cats) > 0): ?>
                            <div>
                                <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                            </div>
                            <div>
                                <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400 uppercase"><?php echo $cats[0]->name; ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </article>
        </div>
    </div>
    <!-- End of sticky article -->
</div>