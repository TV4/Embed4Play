<?php
/*
Plugin Name: Embed4Play
Plugin URI: http://github.com/TV4/Embed4Play
Description: Publish video clips from TV4Play.se on a Wordpress blog
Author: David Hall (TV4 AB)
Version: 0.0.1
Author URI: http://http.tv4.se/
License: GPL2
*/

/*
 *  Embed4Play, Wordpress plugin to automatically make posts with TV4Play embeds.
 *  Copyright (C) 2010 TV4 AB
 *
 * Parts of this program are based on "Bambuser for Wordpress - Shortcode" by Mattias Norell
 * released under the GPL2 license. Copyright (C) 2010 Mattias Norell
 *
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 *
 */


if (!class_exists('Embed4Play')) {

    class Embed4Play
    {
             function Embed4Play() {
            $this->actions_filters();
        }


        function actions_filters() {
            add_shortcode('tv4play', array(&$this, 'shortcode'));
        }


        function shortcode($atts, $content=null) {
            extract(shortcode_atts(array(
                'id' 	=> '',
                'size' => '',
                'width' 	=> '480',
                'height' 	=> '270',
            ), $atts));
            
            switch ($size) {
    case 'small':
        $width=320;
        $height=160;
        break;
    case 'medium':
        $width=480;
        $height=270;
        break;
    case 'large':
        $width=640;
        $height=360;
        break;
}
                return '<object width="'.$width.'" height="'.$height.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="tv4play_'.$id.'"><param name="movie" value="http://embed.tv4.se/tv4play/v0/tv4video.swf?vid='.$id.'"></param><param name="allowfullscreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="base" value="http://embed.tv4.se/tv4play/v0/"></param><embed src="http://embed.tv4.se/tv4play/v0/tv4video.swf?vid='.$id.'" type="application/x-shockwave-flash" allowfullscreen="true" base="http://embed.tv4.se/tv4play/v0/" allowScriptAccess="always" width="'.$width.'" height="'.height.'"></embed><a href="http://www.tv4play.se/noje/bonde_soker_fru?title=annelie%253A_%22jonas_ar_jattecharmig%22&videoid='.$id.'&utm_medium=sharing&utm_source=embed&utm_name=tv4play.se" target="_blank"><img src="http://cdn01.tv4.se/polopoly_fs/1.1889164!picture/906893737.jpg_gen/derivatives/w180/906893737.jpg" alt="Annelie:%20%22Jonas%20%C3%A4r%20j%C3%A4ttecharmig%22" border="0" /></a></object>';

    }
}
    $embedfour = new Embed4Play();

}
?>