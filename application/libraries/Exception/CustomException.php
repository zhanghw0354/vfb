<?php
/**
  * 自定义异常类，是Exception下其他类的父类
  * 表示由于业务逻辑主动抛出的异常
  */
class CustomException extends Exception {

    protected $_level = 0;
    protected $_data = '';

    /**
      * 构造函数
      * @param $params array类型,array($code,$message,$level,$data)
      * $code 异常的error code,默认为0,以后每种子类分配一个默认errorcode,从1开始
      * $message 异常描述信息,默认值为''
      * $level 异常的等级,分3个等级,0|1|2,分别为notice|warning|error等级,默认为0
      * $data 异常的详细数据信息,可以为任何数据类型,主要包括数字，字符串，布尔值，数组，对象，null
      */
    public function __construct($params = array()) {
        //$code = 0, $message = '', $level = 0, $data = ''
        $code = isset($params['code']) ? $params['code'] : $this->code;
        $message = isset($params['message']) ? $params['message'] : $this->message;
        parent::__construct($message,$code);
        if (isset($params['level'])) {
            $this->_level = $params['level'];
        }
        if (isset($params['data'])) {
            $this->_data = $params['data'];
        }
    }

    public function getLevel() {
        return $this->_level;
    }

    public function getData() {
        return $this->_data;
    }

    /**
      * 抛出异常
      */
    public function throwException() {
        throw $this;
    }
}
