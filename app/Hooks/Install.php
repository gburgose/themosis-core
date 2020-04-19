<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class Install extends Hookable
{
    public function register(): void
    {
        $option_name = 'install_pages_teeedssdd';
        if (!get_option($option_name)) {
            $this->create_pages();
            add_option($option_name, true);
        }
    }

    public function create_pages()
    {
        Action::add('init', function () {
            $default_pages = array(
                array(
                    'title' => 'Inicio',
                    'content' => '',
                ),
                array(
                    'title' => 'Nosotros',
                    'content' => '',
                    'template' => 'about-template'
                ),
                array(
                    'title' => 'Contacto',
                    'content' => '',
                    'template' => 'contact-template'
                )
            );
            $existing_pages = get_pages();
            $existing_titles = array();

            foreach ($existing_pages as $page) {
                $existing_titles[] = $page->post_title;
            }

            foreach ($default_pages as $new_page) {
                if (!in_array($new_page['title'], $existing_titles)) {
                    // create post object
                    $add_default_pages = array(
                        'post_title' => $new_page['title'],
                        'post_content' => $new_page['content'],
                        'post_status' => 'publish',
                        'post_type' => 'page'
                    );
                    // insert the post into the database
                    $result = wp_insert_post($add_default_pages);

                    // insert template
                    if (!add_post_meta($result, '_wp_page_template', $new_page['template'], true)) {
                        update_post_meta($result, '_wp_page_template', $new_page['template']);
                    }
                }
            }
        });
    }

    public function activate_plugins()
    {
    }
}
