<?php

class Ink_Related_Articles_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_options = [
            'classname' => 'ink_related_articles_widget',
            'description' => __('Widget to list post related articles', 'ink'),
        ];

        parent::__construct('ink_related_articles_widget', 'Ink Related Articles Widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        $category_slug = '';
        $categories = get_the_category();

        foreach ($categories as $category) {
            $category_slug .= $category->slug . ',';
        }

        $category_posts = new WP_Query([
            'post_per_page' => 3,
            'category_name' => $category_slug,
            'post__not_in' => [get_the_ID()]
        ]); ?>

        <?php if ($category_posts->have_posts()): ?>
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                            <?php if (empty($instance['title'])):
                                echo _e('You might be interested in these too', 'ink');
                            else:
                                echo $instance['title'];
                            endif;
                            ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:grid md:grid-cols-3 md:gap-4 mx-4 mb-4">
                <?php
                    while ($category_posts->have_posts()):
                        $category_posts->the_post();
                        get_template_part('template-parts/posts/content');
                    endwhile;
                ?>
            </div>
        </div>
        <?php endif; ?><?php
    }

    public function form( $instance )
    {
        $title = !empty($instance['title']) ? $instance['title'] : ''; ?>
        
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ink') ?>:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p><?php
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }
}