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
                'errorCode' => $code,
                'errorMsg' => $message,
                'errorLevel' => $level,
                'errorData' => $errorData,
                );
    }

    private function _getDataList($data) {
        if (isset($data['total_count']) && isset($data['data_list'])) {
            return array(
                    'totalCount' => $data['total_count'],
                    'dataList' => $data['data_list'],
                    );
        }
        return $data;
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
                'statusInfo' => $statusInfo,
                'data' => null,
                );
        return json_encode($ret);
    }

    /**
      * 获得正常信息json字符串
      */
    public function ok($data) {
        $statusInfo = $this->getStatusInfo();
        $data = $this->_getDataList($data);
        $ret = array(
                'status' => 1,
                'statusInfo' => $statusInfo,
                'data' => $data,
                );
        return json_encode($ret);
    }
}
