<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 19:27
 * To change this template use File | Settings | File Templates.
 */
function flash_message()
{
    // get flash message from CI instance
    $ci =& get_instance();
    $flashmsg = $ci->session->flashdata('message');

    $html = '';
    if (is_array($flashmsg))
    {
        $html = '<div id="flashmessage" class="'.$flashmsg['type'].'">
            <img style="float: right; cursor: pointer" id="closemessage" src="'.base_url().'images/cross.png" />
            <strong>'.$flashmsg['title'].'</strong>
            <p>'.$flashmsg['content'].'</p>
            </div>';
    }
    return $html;
}