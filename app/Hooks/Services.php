<?php
/**
 * Created by PhpStorm.
 * User: alexanderfigueroa
 * Date: 8/18/19
 * Time: 1:22 AM
 */

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Facades\Taxonomy;

class Services extends Hookable
{
    /**
     *
     */
    public function register(): void
    {
        PostType::make('services', 'Servicios', 'Servicio')->setArguments([
            'public' => true,
            'capability_type' => 'page',
            'has_archive' => true,
            'menu_position' => 60,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-analytics',
            'supports' => ['title', 'thumbnail', 'revisions', 'editor', 'excerpt'],
            'query_var' => false,
            'rewrite' => ['slug' => 'servicios']
        ])->set();
    }
}
