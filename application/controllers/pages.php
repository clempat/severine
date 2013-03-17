<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:23
 * To change this template use File | Settings | File Templates.
 */

class Pages extends MY_Controller {
    public function view($page='home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $this->layout->title("Séverine Lenglet : ".ucfirst($page));

        $data = array();
        $this->layout->view("pages/".$page, $data);
    }
}