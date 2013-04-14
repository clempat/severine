<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 13/04/2013
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */

function get_json($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $json = curl_exec($ch);
    $data = json_decode($json);
    return $data;

}