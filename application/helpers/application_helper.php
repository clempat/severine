<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 13/04/2013
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */

function get_json($url, $assoc = false)
{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $json = curl_exec($ch);
    $data = json_decode($json, $assoc);

    return $data;

}

function slug($string, $slug = '-', $extra = null)
{
    return strtolower(trim(preg_replace('~[^0-9a-z' . preg_quote($extra, '~') . ']+~i', $slug, unaccent($string)), $slug));
}

function unaccent($string) // normalizes (romanization) accented chars
{
    if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false) {
        $string = html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i', '$1', $string), ENT_QUOTES, 'UTF-8');
    }

    return $string;
}