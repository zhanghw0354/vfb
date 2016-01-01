<?php
require_once(dirname(__FILE__) . '/CustomException.php');
/**
  * 操作对象不存在异常
  */
class OperandNotExist extends CustomException {

    protected $message = '操作对象不存在';
    protected $code = 3;
}
