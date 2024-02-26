<?php

class Ink_Customizer
{
    public function __construct()
    {
        add_action('customize_register', array($this, 'register_sections'));
    }

    public function register_sections($wp_customize)
    {
        $this->ink_homepage_section($wp_customize);
        $this->ink_article_details_section($wp_customize);
    }

    private function ink_article_details_section($wp_customize)
    {
        $wp_customize->add_section('article_details_page', array(
            'title' => 'Article Detail Page Settings',
            'priority' => 121,
            'description' => __('You can choose the type of commenting system on this page.
                It can be Wordpress native commenting or Giscus. For Giscus you need to supply Giscus credentials.
                You can choose to display the container for articles you might be interested in.', 'ink')
        ));

        // Commenting system
        $wp_customize->add_setting('commenting_system_to_display', array(
            'default' => 'native',
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'choose_commenting_system_control', array(
            'label' => __('Choose commenting system'),
            'section' => 'article_details_page', // The section name specified in a.
            'settings' => 'commenting_system_to_display', // The setting name specified in b.
            'type' => 'radio',
            'choices' => array(
                'native' => __('Native'),
                'giscus' => __('Giscus'),
            ),
        )));


        // Giscus text
        $wp_customize->add_setting('giscus_script', array(
            'default' => '',
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'giscus_script_control', array(
            'label' => __('Add Giscus Script'),
            'description' => __('Add your Giscus script here.'),
            'section' => 'article_details_page',
            'settings' => 'giscus_script',
            'type' => 'textarea',
            'active_callback' => function () {return get_theme_mod('commenting_system_to_display') == 'giscus'; },
        )));
    }

    private function ink_homepage_section($wp_customize)
    {
        // Featured article setting
        $wp_customize->add_setting('featured_article_display', array(
            'default' => 'No',
            'sanitize_callback' => array($this, 'sanitize_select_type')
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_article_display_control', array(
            'label' => __('Display featured article'), // Label to be displayed for the control
            'section' => 'static_front_page', // The section name specified in a.
            'settings' => 'featured_article_display', // The setting name specified in b.
            'type' => 'select',
            'choices' => array(
                'No' => __('No'),
                'Yes' => __('Yes')
            ),
        )));


        // Tips & snippet setting
        $wp_customize->add_setting('tips_and_snippet_display', array(
            'default' => 'No',
            'sanitize_callback' => array($this, 'sanitize_select_type')
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tips_and_snippet_display_control', array(
            'label' => __('Display tips & snippet'),
            'section' => 'static_front_page',
            'settings' => 'tips_and_snippet_display',
            'type' => 'select',
            'choices' => array(
                'No' => __('No'),
                'Yes' => __('Yes')
            ),
        )));


        // Sidebar setting
        $wp_customize->add_setting('sidebar_display', array(
            'default' => 'No',
            'sanitize_callback' => array($this, 'sanitize_select_type')
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sidebar_display_control', array(
            'label' => __('Display sidebar'),
            'section' => 'static_front_page',
            'settings' => 'sidebar_display',
            'type' => 'select',
            'choices' => array(
                'No' => __('No'),
                'Yes' => __('Yes')
            ),
        )));
    }

    public function sanitize_select_type($input) {
        return ($input === 'No') ? 0 : 1;
    } 
}

new Ink_Customizer();
