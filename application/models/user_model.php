<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:20
 * To change this template use File | Settings | File Templates.
 * @property mixed db
 * @property mixed load
 */
class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function validCredentials($username,$password){

        $q = "SELECT * FROM users WHERE username = ? AND encrypted_password = ?";

        $data = array($username,$password);
        $q = $this->db->query($q,$data);

        if ($q->num_rows() >0) {

            $r = $q->result();
            $this->updateData($r);

            $session_data = array('username' => $r[0]->username, 'logged_in' => true);
            $this->session->set_userdata($session_data);
            return true;
        }
        else {return false;}
    }
    function isLoggedIn() {
        if($this->session->userdata('logged_in'))
        { return true;} else {return false;}
    }

    private function updateData($user) {
        $last_sign_in_at = $user->current_sign_in_at;
        $last_sign_in_ip = $user->last_sign_in_ip;
        $id = $user->id;

        $now = date("Y-m-d H:i:s");
        $ip = $this->input->ip_address();

        $data = array(
            'id' => $id,
            'last_sign_in_at' => $last_sign_in_at,
            'last_sign_in_ip' => $last_sign_in_ip,
            'current_sign_in_at' => $now,
            'current_sign_in_ip' => $ip,
            'sign_in_count' => $user->sign_in_count+1
        );

        $this->db->where('id',$id);
        $this->db->update('users', $data);
    }
}