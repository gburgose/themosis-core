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

class Projects extends Hookable
{
    /**
     *
     */
    public function register(): void
    {
        PostType::make('projects', 'Proyectos', 'Proyectos')->setArguments([
            'public' => true,
            'capability_type' => 'page',
            'has_archive' => true,
            'menu_position' => 60,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-image-filter',
            'supports' => ['title', 'thumbnail', 'revisions', 'editor', 'excerpt'],
            'query_var' => false,
            'rewrite' => ['slug' => 'proyectos']
        ])->set();
    }
}
