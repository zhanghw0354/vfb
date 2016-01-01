<?php
require_once(dirname(__FILE__) . '/CustomException.php');
/**
  * 参数非法异常
  */
class ParamsInvalid extends CustomException {

    protected $message = '参数不合法';
    protected $code = 1;
}
