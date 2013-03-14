<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 20:16
 * To change this template use File | Settings | File Templates.
 */

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    function index() {
        if($this->User_model->isLoggedIn()){
            redirect('admin/dashboard','refresh');

        } else {
            redirect ('admin/login', 'refresh');
        }
    }


    function login() {
        $this->load->library('encrypt');
        if($this->User_model->isLoggedIn()){
            redirect('admin', 'refresh');
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Login', 'required');
            $this->form_validation->set_rules('password', 'Mot de passe', 'required');

            if (!$this->form_validation->run()) {
                $data['page'] = "Séverine Lenglet : Login";
                //view
                $this->load->view('layouts/header', $data);
                $this->load->view('admin/login_form', $data);
                $this->load->view('layouts/footer', $data);
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = $this->encrypt->sha1($password);
                $validCredentials= $this->User_model-> validCredentials($username,$password);

                if($validCredentials){
                    redirect('admin/dashboard', 'refresh');
                } else {
                    $data['page'] = "Séverine Lenglet : Login";
                    $data['error_credentials'] = 'Wrong Username/Password';
                    //view
                    $this->load->view('layouts/header', $data);
                    $this->load->view('admin/login_form', $data);
                    $this->load->view('layouts/footer', $data);
                }
            }
        }
    }

    function dashboard() {
        if($this->User_model->isLoggedIn()){
            $data['page'] = "Séverine Lenglet : Login";
            $this->load->view('layouts/header', $data);
            $this->load->view('admin/admin');
            $this->load->view('layouts/footer', $data);
        }
    }
}