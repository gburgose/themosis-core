<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class Acf extends Hookable
{
    /**
     *
     */
    public function register(): void
    {

        /*
        |--------------------------------------------------------------------------
        | ACF
        |--------------------------------------------------------------------------
        */
        Action::add('acf/settings/save_json', function () {
            $path =  __DIR__ . '/../../acf-json';
            return $path;
        });
        
        Action::add('acf/settings/load_json', function ($paths) {
            unset($paths[0]);
            $paths[] =  __DIR__ . '/../../acf-json';
            return $paths;
        });

        Action::add('acf/fields/google_map/api', function () {
            $api['key'] = env('GOOGLE_MAPS_API_KEY');
            return $api;
        });
        
    }
}
