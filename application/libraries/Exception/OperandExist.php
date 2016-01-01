<?php
require_once(dirname(__FILE__) . '/CustomException.php');
/**
  * 操作对象已存在异常
  */
class OperandExist extends CustomException {

    protected $message = '操作对象已存在';
    protected $code = 4;
}
