<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batteryoperation extends MY_Controller {

	public function getOperationInfo() {
        if ($this->session->userdata('battery_operation_info')) {
            $operationInfo = $this->session->userdata('battery_operation_info');
        } else {
            $operationInfo = array(
                'is_fan_running' => 1,
                'is_pump_running' => 1,
                'is_auto_mode' => 0,
                'auto_mode_is_charging' => 1,
                'auto_mode_is_discharging' => 1,
                'manual_mode_is_running' => 1,
                'periods' => array(
                    array(
                        'start_time' => '00:00',
                        'end_time' => '03:00',
                        'is_charging' => 1,
                    ),
                    array(
                        'start_time' => '06:00',
                        'end_time' => '09:00',
                        'is_charging' => 1,
                    ),
                    array(
                        'start_time' => '12:00',
                        'end_time' => '15:00',
                        'is_charging' => 1,
                    ),
                ),
            );
            $this->session->set_userdata('battery_operation_info',$operationInfo);
        }
		$this->echoJson($operationInfo);
	}

    public function setOperationInfo () {
        $postData = $this->input->post();
        if (!empty($postData)) {
            $bolSave = false;
            $operationInfo = $this->session->userdata('battery_operation_info');
            foreach ($postData as $key => $value) {
                if (isset($operationInfo[$key])) {
                    if ($key == 'periods') {
                        $periodIndex = $value['index'];
                        unset($value['index']);
                        $operationInfo[$key][$periodIndex] = $value;
                    } else {
                        $operationInfo[$key] = $value;
                    }
                    $bolSave = true;
                }
            }
            if ($bolSave) {
                $this->session->set_userdata('battery_operation_info',$operationInfo);
            }
        }
        $this->echoJson();
    }
}
