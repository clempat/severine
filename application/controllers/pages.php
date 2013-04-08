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

        $data = array();
        if($page =='home'){
            $this->load->model('Video');
            $this->load->helper('videos');
            $data['i'] = 0;
            $data['j'] = 0;
            $data['v'] = 0;
            $data['headers']= $this->Video->get_for_header();
            thumbnail_or_image($data['headers']);
            $data['videos']= $this->Video->get_all();
            thumbnail_or_image($data['videos']);
            $this->layout->js('assets/js/jquery.quicksand.js');
        }


        $this->layout->title("Séverine Lenglet : ".ucfirst($page));


        if($page =='home'){
            $this->layout->view(array("pages/home","videos/index"), $data);
        } else {
            $this->layout->view("pages/".$page, $data);
        }
    }
}