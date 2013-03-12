<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 12.03.13
 * Time: 15:23
 * To change this template use File | Settings | File Templates.
 */

class Pages extends CI_Controller {
    public function view($page='home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
            show_404();
        }

        $data['page'] = "Séverine Lenglet : ".ucfirst($page);



        $this->load->view('layouts/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('layouts/footer', $data);
    }
}