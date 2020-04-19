<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class Menu extends Hookable
{
    /**
     *
     */
    public function register(): void
    {
        Action::add('admin_menu', function () {
            // remove_menu_page('index.php');                  //Dashboard
            // remove_menu_page('jetpack');                    //Jetpack* 
            remove_menu_page('edit.php');                      //Posts
            // remove_menu_page('upload.php');                 //Media
            // remove_menu_page('edit.php?post_type=page');    //Pages
            // remove_menu_page('edit-comments.php');          //Comments
            // remove_menu_page('themes.php');                 //Appearance
            // remove_menu_page('plugins.php');                //Plugins
            // remove_menu_page('users.php');                  //Users
            // remove_menu_page('tools.php');                  //Tools
            // remove_menu_page('options-general.php');        //Settings
        });
    }
}
