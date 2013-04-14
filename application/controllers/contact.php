<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 04.04.13
 * Time: 19:55
 * To change this template use File | Settings | File Templates.
 */
class contact extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->layout->title("Séverine Lenglet : Contact");
        $this->layout->js("assets/js/jqBootstrapValidation.js");
        $this->layout->js("assets/js/contact.js");
    }
    public function index()
    {
        $data['form']['name'] = array (
            'name' => 'name',
            'id' => 'name',
            'placeholder' => 'Last Name',
            'class'=>'span4'

        );
        $data['form']['firstName'] = array (
            'name' => 'firstName',
            'id' => 'firstName',
            'placeholder' => 'First Name',
            'class'=>'span4'
        );
        $data['form']['email'] = array (
            'name' => 'email',
            'id' => 'email',
            'type'=>'email',
            'placeholder' => 'Email',
            'class'=>'span8',
            'required' =>''
        );
        $data['form']['object'] = array (
            'name' => 'object',
            'id' => 'object',
            'placeholder' => 'Object',
            'class'=>'span8',
            'required' =>''
        );
        $data['form']['tel'] = array (
            'name' => 'tel',
            'id' => 'tel',
            'placeholder' => '0000000000',
            'class'=>'span4'
        );
        $data['form']['msg'] = array (
            'name' => 'msg',
            'id' => 'msg',
            'rows' => '10',
            'class' => 'span8',
            'required' =>''
        );
        $mail_sent = "non";
        if ($this->input->post('q'))
        {
            $message =nl2br($this->input->post('msg'));
            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $this->email->from($this->input->post('email', $this->input->post('firstName')." ".$this->input->post('name')));
            $this->email->to('s_lenglet@yahoo.fr');//s_lenglet@yahoo.fr
            $this->email->subject('Demande de contact émanant du site web : '.$this->input->post('object'));
            $this->email->message('Message de Mr/Mme '.$this->input->post('name').' '.$this->input->post('firstName').',<br><br>
            <b>Téléphone</b> : '.$this->input->post('tel').'<br>
            <b>Message</b> : <br>'.$message
            );

            if ($this->email->send())
            {
                $mail_sent = "ok";
            } else {
                $mail_sent = "error";
            }

        }
        $data['mail_sent']=$mail_sent;

        $this->layout->view('pages/contact', $data);
    }
}