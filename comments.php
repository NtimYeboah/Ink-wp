<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

?>
<div class="md:w-7/12 md:mx-auto flex flex-col">
    <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
        <?php if ($numOfComments = get_comments_number()): ?>
        <div class="flex flex-row gap-3">
            <div>
                <div class="h-5 my-3 border-l-2 border-l-rose-500">
                </div>
            </div>
            <div>
                <div class="mt-2 mb-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                        <?php
                            echo number_format_i18n($numOfComments);
                            if ($numOfComments > 1) _e(' comments', 'ink'); else _e(' comment', 'ink');
                        ?>
                    </h2>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex flex-col mx-4 mb-4 space-y-10">
            <?php function comments_walker() {?>
            <figure class="flex flex-col" id="comment-<?php comment_ID(); ?>">
                <div class="flex flex-row gap-4 mb-4">
                    <div>
                        <?php
                            $authorEmail = get_comment_author_email();
                            $gravatar = get_avatar($authorEmail, 60, '', 'avatar placeholder image', ['class' => 'w-14 h-14']);
                            $gravatarUrl = esc_url(home_url() . '/wp-content/themes/ink/resources/img/gravatar_400x400.png');
                        ?>
                        <?php if ($gravatar):
                            echo $gravatar;
                        else:
                        ?>
                        <img class="w-14 h-14" src="<?php echo $gravatarUrl ?>" alt="" width="60" height="60">
                        <?php endif; ?>
                    </div>
                    <figcaption>
                        <div class="flex flex-col dark:text-gray-300 font-sarabun">
                            <div>
                                <p><?php echo get_comment_author(); ?></p>
                            </div>
                            <div class="flex flex-row gap-5">
                                <span><?php echo get_comment_date(); ?></span>
                            </div>
                        </div>
                    </figcaption>
                </div>

                <!-- For comment -->
                <div class="mb-4 dark:text-gray-300">
                    <p>
                        <?php echo get_comment_text(); ?>
                    </p>
                </div>
                <!-- End of for comment -->

                <?php
                    comment_reply_link([
                        'add_below' => true,
                        'depth' => 20,
                        'max_depth' => 200,
                    ]);
                ?> 
            </figure>
            <?php } ?>
            
            <?php
                $comments = get_comments([
                    'post_id' => get_the_ID(),
                ]);

                wp_list_comments([
                    'type' => 'comment',
                    'reverse_top_level' => true,
                    'max_depth' => 20,
                    'callback' => 'comments_walker',
                ], $comments);
            ?>
        </div>
    </div>
</div>
