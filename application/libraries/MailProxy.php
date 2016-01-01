<?php
class MailProxy {

    protected $_title = "";
    protected $_fromName = "";
    protected $_body = null;
    protected $_bodyType = null;
    protected $_rcvAddrs = array();
    protected $_ccAddrs = array();
    protected $_attachs = array();

    public function __construct() {
        require_once dirname(__FILE__) . "/PHPMailer/class.phpmailer.php";
    }

    public function addRcver($address) {
        $this->_rcvAddrs[$address] = $address;
    }

    public function delRcver($address) {
        unset($this->_rcvAddrs[$address]);
    }

    public function addCcRecver($address) {
        $this->_ccAddrs[$address] = $address;
    }

    public function delCcRecver($address) {
        unset($this->_ccAddrs[$address]);
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setFromName($fromName) {
        $this->_fromName = $fromName;
    }

    public function setBody($body) {
        $this->_body = $body;
    }

    public function setBodyType($bodyType) {
        $this->_bodyType = $bodyType;
    }

    public function addAttach($fileName) {
        $this->_attachs[$fileName] = $fileName;
    }

    public function delAttach($fileName) {
        unset($this->_attachs[$fileName]);
    }

    public function send($retry = 3) {
        $this->ci =& get_instance();
        $configFile = 'email';
        $this->ci->config->load($configFile,true);
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // set mailer to use SMTP

        $mail->Host = $this->ci->config->item('smtp_host',$configFile);
        $mail->Port = $this->ci->config->item('smtp_port',$configFile);
        $mail->Username = $this->ci->config->item('smtp_user',$configFile);
        $mail->Password = $this->ci->config->item('smtp_passwd',$configFile);
        $mail->From = $this->ci->config->item('from',$configFile);
        $mail->SMTPAuth = true;
        $mail->CharSet = "utf-8";
        if(!empty($this->_fromName)){
            $mail->FromName = $this->_fromName;
        }else{
            $mail->FromName = $this->ci->config->item('from_name',$configFile);;
        }
        foreach($this->_rcvAddrs as $rcver) {
            $mail->AddAddress($rcver);
        }
        foreach($this->_ccAddrs as $ccAddr){
            $mail->AddCC($ccAddr);
        }
        $mail->IsHTML(true); // set email format to HTML
        $mail->Subject = $this->_title;
        if ($this->_bodyType == 'plain') {
            $mail->Body = nl2br($this->_body);
        } else if ($this->_bodyType == 'html') {
            $mail->Body = $this->_body;
        } else {
            $mail->Body = $this->_body;
        }

        foreach($this->_attachs as $attachFile) {
            $mail->AddAttachment($attachFile, basename($attachFile));
        }

        while ($retry) {
            try {
                $mail->Send();
                return true;
            } catch (Exception $e) {
                $retry--;
            }
        }
        $logParams = array(
                'message' => $e->getMessage(),
                'receiver' => $this->_rcvAddrs,
                'cc' => $this->_ccAddrs,
                'title' => $this->_title,
                'body' => $this->_body,
                );
        $ci =& get_instance();
        $ci->log->log('warning','mail failed',$logParams);
        return false;
    }
}
