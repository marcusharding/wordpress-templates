<?php
/**
 * Functions
 */

// Site theme setup
add_action('after_setup_theme', 'boilerplate_site_theme_setup');
if (!function_exists('boilerplate_site_theme_setup'))
{
    function boilerplate_site_theme_setup(): void
    {

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'primary' => esc_html('Primary Menu')
        ]);

        add_theme_support('wp-block-styles'); // Add support for Block Styles.
        add_theme_support('align-wide'); // Add support for full and wide align images.
        add_theme_support('editor-styles'); // Add support for editor styles.
        add_editor_style('style-editor.css'); // Enqueue editor styles.
    }
}

add_filter('show_admin_bar', '__return_false');

add_action('after_setup_theme', 'boilerplate_site_custom_logo');
function boilerplate_site_custom_logo(): void
{
    add_theme_support('custom-logo', [
        'flex-height' => true,
        'flex-width' => true
    ]);
}

// Enqueue main site styles

add_action('wp_enqueue_scripts', 'boilerplate_site_enqueue_styles', 9);
function boilerplate_site_enqueue_styles(): void
{
    wp_enqueue_style( 'boilerplate-site', get_stylesheet_directory_uri() . '/styles/main.min.css');
}

// Header functions

if (!function_exists('boilerplate_site_logo'))
{
    function boilerplate_site_logo(): void
    {
        $custom_logo_id = get_theme_mod('custom_logo');

        if(!empty($custom_logo_id)) {
            $logo = '<img src="'. wp_get_attachment_url($custom_logo_id) .'" alt="'. esc_attr(get_bloginfo('name')) .' logo">';
        } else {
            $logo = esc_attr(get_bloginfo('name'));
        }

        $logo_html = '
        <figure class="fvp-header__logo">
            <a href="/" title="Home">' . $logo .'</a>
        </figure>';

        echo $logo_html;
    }
}

if (!function_exists('boilerplate_site_nav'))
{
    function boilerplate_site_nav(): void
    {
        $navigation = '';

        if (has_nav_menu('primary')) {

            $navigation .= (string) wp_nav_menu([
                'theme_location' => 'primary',
                'container' => 'ul',
                'container_class' => 'fvp-nav_menu',
                'items_wrap' => '<ul class="fvp-nav__menu" role="member" aria-label="boilerplate site menu">%3$s</ul>',
            ]);
        };

        echo $navigation;
    }
}