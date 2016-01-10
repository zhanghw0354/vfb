<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batteryoperation extends MY_Controller {

	public function getOperationInfo() {
		$operationInfo = array(
			'is_fan_running' => 1,
			'is_pump_running' => 1,
			'is_auto_mode' => 1,
			'auto_mode_is_charging' => 1,
			'auto_mode_is_discharging' => 0,
			'manual_mode_is_running' => 1,
			'periods' => array(
				array(
					'start_time' => '01:10',
					'end_time' => '03:00',
					'is_charging' => 1,
				),
				array(
					'start_time' => '04:00',
					'end_time' => '07:00',
					'is_charging' => 0,
				),
				array(
					'start_time' => '09:00',
					'end_time' => '15:00',
					'is_charging' => 1,
				),
			),
		);
		$this->echoJson($operationInfo);
	}
}
