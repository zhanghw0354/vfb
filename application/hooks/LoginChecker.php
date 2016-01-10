<?php
class LoginChecker {
    public function isLogin() {
        $this->ci =& get_instance();
        if(($this->ci->router->class != 'cli')
            && (!$this->ci->session->userdata('is_login'))) {
            $this->ci->config->load('login',true);
            $whitelist = $this->ci->config->item('whitelist','login');
            $requestPath = $this->ci->router->class.':'.$this->ci->router->method;
            if (!in_array($requestPath,$whitelist)) {
                $this->ci->load->helper('url');
                redirect('user/login');
            }
        }
    }
}
