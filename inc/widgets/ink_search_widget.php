<?php

class Ink_Search_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_options = [
            'classname' => 'ink_search_widget',
            'description' => __('Widget to search for resources on the page', 'ink'),
        ];

        parent::__construct('ink_search_widget', 'Ink Search Widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="flex-col hidden md:flex w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
            <div class="flex flex-row gap-3">
                <div class="flex flex-col">
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                            <?php if (empty($instance['title'])):
                                echo _e('Search', 'ink');
                            else:
                                echo $instance['title'];
                            endif;
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-4 mb-4 pr-4">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="flex flex-row w-full">
                        <input
                            type="search"
                            name="s" value="<?php echo get_search_query(); ?>"
                            placeholder="<?php if (empty($instance['p_text'])): _e('Type search term', 'ink'); else: echo $instance['p_text']; endif; ?>"
                            class="w-full form-input border-r-0 dark:bg-gray-900 dark:text-gray-300">
                        <button
                            type="submit"
                            class="bg-slate-600 hover:bg-slate-700 p-2"
                            value="Search"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2.0"
                                stroke="currentColor"
                                class="w-5 h-5 text-white dark:text-gray-200"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div><?php
    }

    public function form( $instance )
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $p_text = !empty($instance['p_text']) ? $instance['p_text'] : ''; ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ink') ?>:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" />

          <label for="<?php echo $this->get_field_id('p_text'); ?>"><?php _e('Placeholder Text', 'ink') ?>:</label>
          <input type="text" id="<?php echo $this->get_field_id('p_text'); ?>" name="<?php echo $this->get_field_name('p_text'); ?>" value="<?php echo esc_attr($p_text); ?>" />
        </p><?php
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['p_text'] = strip_tags($new_instance['p_text']);

        return $instance;
    }
}