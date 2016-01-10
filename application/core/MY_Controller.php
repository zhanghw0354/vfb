<?php
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
	    $this->load->helper('url');
        $this->load->library('session');
    }

    /**
      * controller处理成功后，返回给前端json字符串
      */
    public function echoJson($data = null) {
        $this->load->library('RetWrapper');
        echo $this->retwrapper->ok($data);
    }

    public function setDefaultPageParams($params) {
        if (!isset($params['page_index'])) {
            $params['page_index'] = 1;
        }
        if (!isset($params['page_count'])) {
            $params['page_count'] = 10;
        }
        return $params;
    }

    public function setUserIdForApp($params) {
        if (isset($params['from_app']) && $params['from_app'] == 1 && !isset($params['user_id'])) {
            $this->load->library('Exception/ParamsInvalid');
            $this->paramsinvalid->throwException();
        }
        if (isset($params['from_app']) && $params['from_app'] == 1) {
            $this->load->library('session');
            $data = array(
                    'userid' => $params['user_id'],
                    );
            $this->session->set_userdata($data);
        }
    }

    public function isFromApp($params) {
        if (isset($params['from_app']) && $params['from_app'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}
