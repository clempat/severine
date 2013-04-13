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
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}