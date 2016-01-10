<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function login() {
		$this->load->view('user/login');
	}

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/login');
    }

    public function validate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $users = array(
            'deng' => '111111',
            'zhang' => '222222',
            'yu' => '333333',
        );
        if (!isset($users[$username])) {
            $array = array(
                'message' => '用户名不存在',
            );
            $this->load->library('Exception/OperateFailed',$array);
            $this->operatefailed->throwException();
        } elseif ($users[$username] != $password) {
            $array = array(
                'message' => '密码不正确',
            );
            $this->load->library('Exception/OperateFailed',$array);
            $this->operatefailed->throwException();
        } else {
            $session = array(
                'username' => $username,
                'is_login' => true,
            );
            $this->session->set_userdata($session);
            $data = array(
                'url' => base_url().'home',
            );
            $this->echoJson($data);
        }
    }
}
