<?php

class Ink_Categories_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_options = [
            'classname' => 'ink_categories_widget',
            'description' => __('Widget to list all post categories', 'ink'),
        ];

        parent::__construct('ink_categories_widget', 'Ink Categories Widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        $categories = get_categories(); ?>

        <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
            <div class="flex flex-row gap-3">
                <div class="flex flex-col">
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                            <?php if (empty($instance['title'])):
                                echo _e('Categories', 'ink');
                            else:
                                echo $instance['title'];
                            endif;
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mx-4 mb-4">
                <div class="flex flex-col">
                    <?php foreach ($categories as $category): ?>
                        <a href="<?php echo esc_url(home_url('category/' . $category->slug)); ?>" class="hover:underline text-base font-medium capitalize">
                            <span class="dark:text-gray-300 dark:hover:underline"><?php echo $category->name; ?></span>
                            <span class="text-gray-500 dark:text-gray-400">[<?php echo $category->count; ?>]</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><?php
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