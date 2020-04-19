<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class Pages extends Hookable
{
    /*
    |--------------------------------------------------------------------------
    | Remove Emojis
    |--------------------------------------------------------------------------
    */
    public function register(): void
    {
        Action::add('init', function () {
            // Servicios

            if (function_exists('acf_add_options_sub_page')) {

                // Servicios

                acf_add_options_sub_page(array(
                    'page_title' => 'Servicios',
                    'menu_title' => 'Servicios',
                    'menu_slug' => 'services-archive',
                    'parent_slug' => 'edit.php?post_type=services',
                ));

                // Proyectos

                acf_add_options_sub_page(array(
                    'page_title' => 'Proyectos',
                    'menu_title' => 'Proyectos',
                    'menu_slug' => 'projects-archive',
                    'parent_slug' => 'edit.php?post_type=projects',
                ));

                // Blog

                acf_add_options_sub_page(array(
                    'page_title' => 'Blog',
                    'menu_title' => 'Blog',
                    'menu_slug' => 'blog-archive',
                    'parent_slug' => 'edit.php?post_type=blog',
                ));

                // Opciones Generales

                acf_add_options_sub_page(array(
                    'page_title' => 'Globales',
                    'menu_title' => 'Globales',
                    'parent_slug' => 'options-general.php',
                ));
            }
        });
    }
}
