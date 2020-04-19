<?php

/**
 * Edit this file in order to configure additional
 * image sizes for your theme.
 *
 * @see https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * @key string The size name.
 *
 * @param int         $width  The image width.
 * @param int         $height The image height.
 * @param bool|array  $crop   Crop option. Since 3.9, define a crop position with an array.
 * @param bool|string $media  Add to media selection dropdown. Make it also available
 *                            to the media custom field. If string, used as the display name ;)
 */
return [
    'themosis_sample' => [200, 125, false],
    'author_service' => [200, 150, false],
    'service_single' => [450, 450, true],
    'service_gallery' => [960, 700, true],

    'project_single' => [450, 550, true],

];
