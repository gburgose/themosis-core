<?php

namespace App\Hooks;
use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Filter;

class Front extends Hookable
{
    /*
    |--------------------------------------------------------------------------
    | JS Global vars
    |--------------------------------------------------------------------------
    */
    public function register(): void
    {
        Filter::add('themosis_front_global', function ($data) {
            $data['imagessurl'] = env('APP_URL')  . '/images';
            return $data;
        });
    }
}
