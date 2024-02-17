<div class="min-h-screen container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-5">
    <div class="flex flex-col md:w-7/12 md:mx-auto mb-5">
        <!-- All articles container -->
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">All Articles</h2>
                    </div>
                </div>
            </div>
            <!-- End of Text container -->

            <!-- Article container -->
            <?php
            $primary_posts = new WP_Query([
                'tag' => 'article',
                'posts_per_page' => get_query_var('posts_per_page'),
                'paged' => get_query_var('paged'),
            ]);
            
            if ($primary_posts->have_posts()):
            ?>
            <div>
                <div class="flex flex-col md:grid md:grid-cols-2 md:gap-4 mx-4 mb-2">
                    <?php
                        while ($primary_posts->have_posts()):
                            $primary_posts->the_post();
                            get_template_part('template-parts/posts/content');
                        endwhile;

                        wp_reset_postdata();
                    ?>
                </div>
                
                <?php
                    $links = numeric_post_pagination();
                    
                    if (count($links) > 0):
                        $prev = $links[0][0];
                        $next = $links[0][1];

                        $num_paginations = $links[1];
                ?>
                <div class="flex flex-row bg-slate-100 dark:bg-slate-900 justify-between px-4 font-semibold py-2 mb-4 mx-4 dark:text-gray-200">
                    <div>
                        <?php if ($prev['disabled']): ?>
                        <p class="text-gray-500 dark:text-gray-400">Prev</p>
                        <?php else: ?>
                        <a href="<?php echo $prev['url'] ?>" class="hover:text-rose-500">Prev</a>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-row justify-between gap-10">
                        <?php foreach ($num_paginations as $num_pagination): ?>
                        <span>
                            <a href="<?php echo $num_pagination['url']; ?>" class="hover:text-rose-500 <?php if ($num_pagination['active']) echo ' text-rose-500'?>"><?php echo $num_pagination['label']; ?></a>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <?php if ($next['disabled']): ?>
                        <p class="text-gray-500 dark:text-gray-400">Next</p>
                        <?php else: ?>
                        <a href="<?php echo $next['url'] ?>" class="hover:text-rose-500">Next</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php else: ?>
                <section class="container md:w-6/12 md:mx-auto">
                    <header class="my-4">
                        <div class="flex justify-center">
                            <h1 class="font-extrabold dark:text-slate-100">No articles available.</h1>
                        </div>
                    </header>
                </section>
            <?php endif; ?>
        </div>
        <!-- End of all articles container -->
    </div>
</div>