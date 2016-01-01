<?php
class MY_Log extends CI_Log {

    public function __construct() {
        parent::__construct();
        $config =& get_config();
        $this->_levels = $config['log_levels'];
        $this->_template = $config['log_template'];
        $this->_ip = $this->_getIp();
        $this->_logId = intval(microtime(true) * 1000000) + mt_rand(0, 999);
    }

    public function log($level = 'error', $message = '', array $params = array()) {
        $this->write_log($level,$message,FALSE,$params);
    }

	public function write_log($level = 'error', $message = '', $php_error = FALSE, array $params = array()) {
		if ($this->_enabled === FALSE) {
			return FALSE;
		}

		$level = strtoupper($level);

		if (!isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold)) {
			return FALSE;
		}

        $ext = strtolower($level);
		$filepath = $this->_log_path.date('Ymd').".$ext";

		if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE)) {
			return FALSE;
		}

        $time = date('Y-m-d H:i:s');
        $trace = debug_backtrace();
        $depth = count($trace)>1?1:0;
        $current = $trace[$depth];
        $file  = basename($current['file']);
        $line  = $current['line'];
        unset($trace, $current);
        $ip = $this->_ip;
        $logid = $this->_logId;
        $params = $this->_arrayToString($params);

        $log = preg_replace('/%(\w+)%/e', '$\\1', $this->_template)."\n";

		flock($fp, LOCK_EX);
		fwrite($fp, $log);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($filepath, FILE_WRITE_MODE);
		return TRUE;
	}

    private function _arrayToString($params) {
        $params = var_export($params,true);
        $replaceStr = array("\r\n","\n","\r","\t");
        return str_replace($replaceStr,"",$params);
    }

    private function _getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
            $ip = getenv("REMOTE_ADDR");
        } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],"unknown")) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = "unknown";
        }
        return $ip;
    }
}
