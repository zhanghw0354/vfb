<?php
class MY_Session extends CI_Session {

    public function sess_update() {
        if ($this->sess_time_to_update == 0) {
            return;
        }
        parent::sess_update();
    }
    
    public function sess_destroy() {
		if (isset($this->userdata['session_id']) && isset($this->userdata['userid'])){
            $this->ci =& get_instance();
            $this->ci->load->model('opt_log_model');
            $this->ci->opt_log_model->log('logout');
        }
        parent::sess_destroy();
    }
}
