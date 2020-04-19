<?php

/**
 * Edit this file in order to configure your theme templates.
 *
 * You can define just a template slug by only defining a key.
 * For a better user experience, you can define a display title as a
 * value and as a second argument, you can specify a list of post types
 * where your template is available.
 */


return [
    'welcome-template' => [__('Welcome Template', THEME_TD), ['page']],
    'archive-template' => [__('Archive Template', THEME_TD), ['page']],
    'single-template' => [__('Single Template', THEME_TD), ['page']],
    'about' => [__('Nosotros', THEME_TD), ['page']],
    'contact' => [__('Contacto', THEME_TD), ['page']],
];
