<?php
/**
 * Curl请求客户端类
 */
class CurlClient {

    private $_retry;
    private $_proxy;
    private $_urls;
    private $_retryIfTimeout;

    public function __construct($params) {
        $urls = $params['urls'];
        $retry = isset($params['retry']) ? $params['retry'] : 3;
        $timeout = isset($params['timeout']) ? $params['timeout'] : 0;
        if (is_string($urls)) {
            $this->_urls = array($urls);
        } else {
            $this->_urls = $urls;
        }

        $this->_proxy = curl_init();
        $this->_retry = $retry;
        $this->_retryIfTimeout = true;

        curl_setopt($this->_proxy,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($this->_proxy,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($this->_proxy,CURLOPT_SSL_VERIFYHOST,0);
        //curl_setopt($this->_proxy,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($this->_proxy,CURLOPT_CONNECTTIMEOUT_MS,2000);
        curl_setopt($this->_proxy,CURLOPT_TIMEOUT_MS,$timeout);
        curl_setopt($this->_proxy,CURLOPT_NOSIGNAL,1);
    }

    public function setHeader($arrHeaderInfo) {
        if(empty($arrHeaderInfo)) {
            return;
        }
        $arrHeaderSet = array();
        foreach ($arrHeaderInfo as $key => $header) {
            $arrHeaderSet[] = $key . ':' . $header;
        }
        curl_setopt($this->_proxy,CURLOPT_HTTPHEADER,$arrHeaderSet);
        return $arrHeaderSet;
    }

    /*
     * 设置超时是否重试
     * @params $retryIfTimeout true或者false
     */
    public function setRetryIfTimeout($retryIfTimeout) {
        $this->_retryIfTimeout = $retryIfTimeout;
    }

    public function get($params = null) {
        $succ = false;
        $i = -1;
        $retry = $this->_retry;
        shuffle($this->_urls);

        while (!$succ && $retry--) {
            $i = ($i + 1) % count($this->_urls);
            $url = $this->_urls[$i];
            if (!empty($params)) {
                $realUrl = $url.'?'.http_build_query($params);
            } else {
                $realUrl = $url;
            }
            curl_setopt($this->_proxy,CURLOPT_URL,$realUrl);
            $result = curl_exec($this->_proxy);
            $errno = curl_errno($this->_proxy);
            $errMsg = curl_error($this->_proxy);

            if ($errno === 0) {
                $succ = true;
            } elseif (strpos($errMsg,"Operation timed out") !== false && !$this->retryIfTimeout) {
                break;
            }
        }

        if ($succ) {
            return $result;
        }

        $errMsg = curl_error($this->_proxy);
        $logParams = array(
                'url' => $realUrl,
                'message' => $errMsg,
                );
        $ci =& get_instance();
        $ci->log->log('warning','curl failed',$logParams);
        return false;
    }

    public function post($postData,$bolJoin = true) {
        $succ = false;
        $i = -1;
        $retry = $this->_retry;
        shuffle($this->_urls);

        while (!$succ && $retry--) {
            $i = ($i + 1) % count($this->_urls);
            $url = $this->_urls[$i];
            curl_setopt($this->_proxy, CURLOPT_POST, 1);
            if (!empty($postData) && $bolJoin) {
                $data = "";
                foreach($postData as $key => $value) {
                    $data .= urlencode($key) . "=" . urlencode($value) . "&";
                }
                curl_setopt($this->_proxy, CURLOPT_POSTFIELDS, $data);
            } else {
                curl_setopt($this->_proxy,CURLOPT_POSTFIELDS, $postData);
            }
            
            curl_setopt($this->_proxy, CURLOPT_URL, $url);
            $result = curl_exec($this->_proxy);
            $errno = curl_errno($this->_proxy);
            $errMsg = curl_error($this->_proxy);
            if ($errno === 0) {
                $succ = true;
            } else if (strpos($errMsg,"Operation timed out") !== false && !$this->_retryIfTimeout) {
                break;
            }
        }

        if ($succ) {
            return $result;
        }

        $errMsg = curl_error($this->_proxy);
        $logParams = array(
                'url' => $url,
                'message' => $errMsg,
                );
        $ci =& get_instance();
        $ci->log->log('warning','curl failed',$logParams);
        return false;
    }

    public function __destruct() {
        curl_close($this->_proxy);
    }
}
