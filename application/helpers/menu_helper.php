<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 13.03.13
 * Time: 15:28
 * To change this template use File | Settings | File Templates.
 */

function menu_link_to($uri = '', $icon ='', $title = '', $attributes = '')
{
    if ( ! is_array($uri))
    {
        $site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
    }
    else
    {
        $site_url = site_url($uri);
    }
    if ($title == '') {
         $title = ucfirst($uri);
     }
    if ($attributes != '')
    {
        $attributes = _parse_attributes($attributes);
    }
    if (uri_string() == $uri) {
        $li_class="active";
    }
    else {
        $li_class="";
    }
    if ($icon != '') {
        $icon = '<i class="'.$icon.'"></i> ';
    }
    return '<li class="'.$li_class.'"><a href="'.$site_url.'" '.$attributes.'>'.$icon.$title.'</a></li>';
}