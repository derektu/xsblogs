<?php
/*
    Copyright (C) 2015  SysJust Co.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/*
Plugin Name: FBDefaultImage
Plugin URI: https://github.com/derektu/fb-default-image
Description: Provide default image when post to facebook
Version: 1.0.0
Author: Derek Tu
Author URI: https://github.com/derektu
*/

/*
 * TODO: currently there is no management UI to set the default image.
 */

/**
 * Add site-specific Open Graph protocol customizations to the Facebook plugin
 *
 * @param array $meta_tags an associative array of Open Graph protocol properties with keys expressed as full IRIs
 * @return array plugin default values with site-specific customizations
 */
function my_ogp_filter( $meta_tags ) {
    $meta_tags['http://ogp.me/ns#image'][] = array(
        'url' => get_site_url() . '/wp-content/plugins/fb-default-image/default.png',
        'type' => 'image/png',
        'width' => 250,
        'height' => 250
    );
    return $meta_tags;
}
add_filter( 'fb_meta_tags', 'my_ogp_filter' );
