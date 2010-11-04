<?php
/*
Plugin Name: Embed4Play
Plugin URI: http://github.com/TV4/Embed4Play
Description: Publish video clips from Swedish TV channels on a Wordpress blog
Author: David Hall (TV4 AB)
Version: 0.0.2
Author URI: http://http.tv4.se/
License: GPL2
*/

/*
 *  Embed4Play, Wordpress plugin to automatically make posts with TV4Play embeds.
 *  Copyright (C) 2010 TV4 AB
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


return '<object id="flashObj" width="'.$width.'" height="'.$height.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0"><param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9?isSlim=1" /><param name="bgcolor" value="#FFFFFF" /><param name="flashVars" value="videoId='.$id.'&playerID=68226258001&playerKey=AQ~~,AAAABUmivxk~,SnCsFJuhbr0O790OdBzSy64LLzE3A9J1&domain=embed&dynamicStreaming=true" /><param name="base" value="http://admin.brightcove.com" /><param name="seamlesstabbing" value="false" /><param name="allowFullScreen" value="true" /><param name="swLiveConnect" value="true" /><param name="allowScriptAccess" value="always" /><embed src="http://c.brightcove.com/services/viewer/federated_f9?isSlim=1" bgcolor="#FFFFFF" flashVars="videoId='.$id.'&playerID=68226258001&playerKey=AQ~~,AAAABUmivxk~,SnCsFJuhbr0O790OdBzSy64LLzE3A9J1&domain=embed&dynamicStreaming=true" base="http://admin.brightcove.com" name="flashObj" width="'.$width.'" height="'.$height.'" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" swLiveConnect="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>';

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


return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://svt.se/embededflash/'.$id.'/play.swf"></param><param name="wmode" value="transparent"></param><param name="allowfullscreen" value="true"></param><param name="allowScriptAccess" value="sameDomain"></param><embed src="http://svt.se/embededflash/'.$id.'/play.swf" type="application/x-shockwave-flash" wmode="transparent" allowfullscreen="true" allowScriptAccess="sameDomain" width="'.$width.'" height="'.$height.'"></embed></object>';
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
                return '<object width="'.$width.'" height="'.$height.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="tv4play_'.$id.'"><param name="movie" value="http://embed.tv4.se/tv4play/v0/tv4video.swf?vid='.$id.'"></param><param name="allowfullscreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="base" value="http://embed.tv4.se/tv4play/v0/"></param><embed src="http://embed.tv4.se/tv4play/v0/tv4video.swf?vid='.$id.'" type="application/x-shockwave-flash" allowfullscreen="true" base="http://embed.tv4.se/tv4play/v0/" allowScriptAccess="always" width="'.$width.'" height="'.$height.'"></embed><a href="http://www.tv4play.se/search?text='.$id.'&utm_medium=sharing&utm_source=embed&utm_name=tv4play.se" target="_blank">Se videon på TV4 Play</a></object>';

    }
}
    $embedfour = new Embed4Play();

}
?>