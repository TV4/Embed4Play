<?php
/*
Plugin Name: Embed4Play
Plugin URI: http://github.com/TV4/Embed4Play
Description: Publish video clips from Swedish TV channels on a Wordpress blog
Author: David Hall (TV4 AB)
Version: 0.0.3
Author URI: http://http.tv4.se/
License: GPL2
*/

/*
 *  Embed4Play, Wordpress plugin to automatically make posts with TV4Play embeds.
 *  Copyright (C) 2010, 2014 TV4 AB
 *
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
            add_shortcode('tv4play', array(&$this, 'shortcode_tv4'));
            add_shortcode('svtplay', array(&$this, 'shortcode_svt'));
            add_shortcode('kanal5play', array(&$this, 'shortcode_kanal5'));
            add_shortcode('tv3play', array(&$this, 'shortcode_tv3'));
			add_shortcode('tv6play', array(&$this, 'shortcode_tv6'));
			add_shortcode('tv8play', array(&$this, 'shortcode_tv8'));
			add_shortcode('kanal9play', array(&$this, 'shortcode_kanal5'));
			add_shortcode('expressentv', array(&$this, 'shortcode_expressen'));
        }
        

function shortcode_tv8($atts, $content) {
	return $this->shortcode_viasat($atts, $content, '4se');
}
function shortcode_tv3($atts, $content) {
	return $this->shortcode_viasat($atts, $content, '2se');
}

function shortcode_tv6($atts, $content) {
	return $this->shortcode_viasat($atts, $content, '3se');
}
           
function shortcode_viasat($atts, $content=null, $affiliate) {
  extract(shortcode_atts(array(
                'id' 	=> '',
                'size' => '',
                'width' 	=> '400',
                'height' 	=> '250',
            ), $atts));
            
            switch ($size) {
    case 'small':
        $width=200;
        $height=137;
        break;
    case 'medium':
        $width=400;
        $height=250;
        break;
    case 'large':
        $width=640;
        $height=385;
        break;
}


return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://flvplayer.viastream.viasat.tv/flvplayer/play/swf/player.swf?affiliate='.$affiliate.'&country=se&id='.$id.'&playerVersion=embed"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://flvplayer.viastream.viasat.tv/flvplayer/play/swf/player.swf?affiliate='.$affiliate.'&country=se&id='.$id.'&playerVersion=embed" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';

}
        
 
function shortcode_expressen($atts, $content=null) {
 extract(shortcode_atts(array(
                'id' 	=> '',
                'size' => '',
                'width' 	=> '480',
                'height' 	=> '340',
            ), $atts));
            
            switch ($size) {
    case 'small':
        $width=360;
        $height=274;
        break;
    case 'medium':
        $width=480;
        $height=340;
        break;
    case 'large':
        $width=600;
        $height=410;
        break;
}

return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://tv.expressen.se/swf/swf/satellit/satellite.swf?e=1&xmlUrl=http%3A%2F%2Ftv%2Eexpressen%2Ese%2Fnyheter%2Fkungligt%2F'.urlencode($id).'%2Fkungen%2Dvagrade%2Dsvara%2Dpa%2Dfragor%3Foutput%3Dxml%26standAlone%3Dtrue"></param><param name="wmode" value="transparent"></param><param name="allowfullscreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="http://tv.expressen.se/swf/swf/satellit/satellite.swf?e=1&xmlUrl=http%3A%2F%2Ftv%2Eexpressen%2Ese%2Fnyheter%2Fkungligt%2F'.urlencode($id).'%2Fkungen%2Dvagrade%2Dsvara%2Dpa%2Dfragor%3Foutput%3Dxml%26standAlone%3Dtrue" type="application/x-shockwave-flash" wmode="transparent" allowfullscreen="false" allowScriptAccess="always" width="'.$width.'" height="'.$height.'"></embed></object>';

}


function shortcode_kanal5($atts, $content=null) {
  extract(shortcode_atts(array(
                'id' 	=> '',
                'size' => '',
                'width' 	=> '450',
                'height' 	=> '253',
            ), $atts));
            
            switch ($size) {
    case 'small':
        $width=375;
        $height=211;
        break;
    case 'medium':
        $width=450;
        $height=253;
        break;
    case 'large':
        $width=640;
        $height=360;
        break;
}


return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.kanal5play.se/embed/'.$id.'" frameborder="0" scrolling="no" allowFullScreen></iframe>';

}


function shortcode_svt($atts, $content=null) {
  extract(shortcode_atts(array(
                'id' 	=> '',
                'size' => '',
                'width' 	=> '416',
                'height' 	=> '258',
            ), $atts));
            
            switch ($size) {
    case 'small':
        $width=320;
        $height=160;
        break;
    case 'medium':
        $width=416;
        $height=258;
        break;
    case 'large':
        $width=640;
        $height=386;
        break;
}

return '<iframe src="http://www.svtplay.se/klipp/'.$id.'?type=embed&external=true" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no"></iframe>';
}


        function shortcode_tv4($atts, $content=null) {
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
                return '<iframe src="http://www.tv4play.se/iframe/video/'.$id.'?width='.$width.'&height='.$height.'&starttime=0" width="'.$width.'" height="'.$height.'" scrolling="no" frameborder="no"></iframe>';

    }
}
    $embedfour = new Embed4Play();

}
?>