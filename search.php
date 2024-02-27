<?php
/**
 * This is a template for displaying search results
 */
get_header(); 
?>

<!-- Main container -->
<div class="container min-h-screen flex flex-col px-4 mx-auto md:w-7/12 mb-5 mt-5">
    <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
        <div class="flex flex-row gap-3">
            <div>
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div>
                <div class="h-5 mt-2">
                    <?php
                        global $wp;
                        $queryString = $wp->query_string;
                        $searchTerm = '';
                        if (strpos($queryString, '=') != false) {
                            $searchTerm = substr($queryString, 2);
                        }
                    ?>
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                        <?php
                        if ($searchTerm): 
                            echo 'Search Term: ' . $searchTerm;
                        else:
                            the_archive_title();
                        endif;
                        ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-4 mb-4 dark:text-gray-300">
            <!-- Result card -->
            <?php if (have_posts()):
                while (have_posts()):
            ?>
            <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                <?php the_post(); ?>
                <a href="<?php echo esc_url(get_permalink()) ?>" class="">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-col basis-1/3">
                            <picture>
                                <img 
                                    class="w-full object-cover object-center md:h-32 h-28"
                                    src="<?php echo the_post_thumbnail_url(); ?>"
                                    alt=""
                                >
                            </picture>
                        </div>
                        <div class="flex flex-col px-4 basis-2/3">
                            <div class="flex flex-col">
                                <?php the_title('<h3 class="font-sarabun mt-5 md:mt-0 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">', '</h3>') ?>

                                <div class="text-base text-gray-900 dark:text-gray-300 mt-3 md:line-clamp-2">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <?php
                endwhile;
                else:
                    printf('<h1>No article matches your search term!</h1>');
                endif;
            ?>
            <!-- End of result card -->
        </div>
    </div>
</div>
<!-- End of main container -->

<?php
get_footer();