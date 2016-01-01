<?php
require_once(dirname(__FILE__) . '/CustomException.php');
/**
  * 操作失败异常
  */
class OperateFailed extends CustomException {

    protected $message = '操作失败';
    protected $code = 2;
    protected $_level = 1;
}
