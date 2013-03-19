<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 20:16
 * To change this template use File | Settings | File Templates.
 */

class Pages extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');

        $this->layout->title( "Séverine Lenglet : Administration");
    }

    function index() {
        if($this->User->isLoggedIn()){
            redirect('admin/pages/dashboard','refresh');

        } else {
            redirect ('admin/pages/login', 'refresh');
        }
    }


    function login() {
        $this->load->library('encrypt');
        if($this->User->isLoggedIn()){
            redirect('admin', 'refresh');
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Login', 'required');
            $this->form_validation->set_rules('password', 'Mot de passe', 'required');

            if (!$this->form_validation->run()) {
                $this->layout->view('admin/login_form');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = $this->encrypt->sha1($password);
                $validCredentials= $this->User-> validCredentials($username,$password);

                if($validCredentials){
                    redirect('admin', 'refresh');
                } else {
                    $data['error_credentials'] = 'Wrong Username/Password';
                    //view
                    $this->layout->view('admin/login_form', $data);
                }
            }
        }
    }

    function dashboard() {
        if($this->User->isLoggedIn()){
            $this->layout->view('admin/admin');
        }
    }
}