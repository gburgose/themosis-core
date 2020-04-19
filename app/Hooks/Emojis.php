<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class Emojis extends Hookable
{
    /*
    |--------------------------------------------------------------------------
    | Remove Emojis
    |--------------------------------------------------------------------------
    */
    public function register(): void
    {
        Action::add('init', function () {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        });
    }
}
