<?php

class Ink_Recent_Articles_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_options = [
            'classname' => 'ink_recent_articles_widget',
            'description' => __('Widget to list recent articles', 'ink'),
        ];

        parent::__construct('ink_recent_articles_widget', 'Ink Recent Articles Widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        $recent_articles = new WP_Query([
            'tag' => 'article',
            'posts_per_page' => 3
        ]); ?>

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
                                echo _e('Recent Articles', 'ink');
                            else:
                                echo $instance['title'];
                            endif;
                        ?>
                        </h2>
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