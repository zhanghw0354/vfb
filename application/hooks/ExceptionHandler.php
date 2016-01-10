<?php
/**
  * 异常处理钩子类，捕获系统抛出的所有异常
  * 统一异常输出格式，保证用户有较好的用户体验
  */
class ExceptionHandler {
    public function setExceptionHandler() {
        set_exception_handler(array($this, 'handleExceptions'));
    }

    /**
      * 输出表示异常信息的json字符串
      */
    public function handleExceptions($exception) {
        $this->ci =& get_instance();
        $this->ci->load->library('RetWrapper');
        if ($exception instanceof CustomException) {
            $statusInfo = $this->ci->retwrapper->getStatusInfo($exception->getMessage(),
                    $exception->getCode(),$exception->getLevel(),$exception->getData());
        } else {
            $message = '系统异常';
            $code = 0;
            $level = 1;
            $statusInfo = $this->ci->retwrapper->getStatusInfo($message,$code,$level);
            $logParams = array(
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'message' => $exception->getMessage(),
                    );
            $this->ci->log->log('error','uncaught exception',$logParams);
        }
        echo $this->ci->retwrapper->error($statusInfo);
    }
}
