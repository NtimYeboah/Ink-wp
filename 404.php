<?php
/*
 * Not found page
 */
get_header();
?>
    <!-- Main container -->
    <div class="container min-h-screen flex flex-col px-4 mx-auto md:w-8/12 mb-5 mt-5">
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">Not found</h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mx-4 mb-4 dark:text-gray-300">
                <p>
                    The page you navigated to was not found. Go back!
                </p>
                
            </div>
        </div>
    </div>
    <!-- End of main container -->
<?php
get_footer();