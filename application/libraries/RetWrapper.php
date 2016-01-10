<?php
/**
  * 输出结果包装类
  * 对controller返回给前端的数据进行封装为统一格式的json字符串
  */
class RetWrapper {
    /**
      * 获得statusInfo数组
      */
    public function getStatusInfo($message = null, $code = null, $level = null, $errorData = null) {
        return array(
                'error_code' => $code,
                'error_msg' => $message,
                'error_level' => $level,
                'error_data' => $errorData,
                );
    }

    /**
      * 获得异常信息json字符串
      */
    public function error($statusInfo) {
        if (!is_array($statusInfo)) {
            $statusInfo = $this->getStatusInfo($statusInfo);
        }
        $ret = array(
                'status' => 0,
                'status_info' => $statusInfo,
                'data' => null,
                );
        return json_encode($ret);
    }

    /**
      * 获得正常信息json字符串
      */
    public function ok($data) {
        $statusInfo = $this->getStatusInfo();
        $ret = array(
                'status' => 1,
                'status_info' => $statusInfo,
                'data' => $data,
                );
        return json_encode($ret);
    }
}
