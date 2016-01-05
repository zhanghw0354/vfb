<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storagemonitor extends MY_Controller {

	public function batteryStatus() {
		$this->load->view('storage_monitor/battery_status');
	}

	public function batteryOperation() {
		$this->load->view('storage_monitor/battery_operation');
	}

	public function getBatteryOperationInfo() {
		$operationInfo = array(
			'is_fan_running' => 0,
			'is_pump_running' => 0,
			'is_auto_mode' => 0,
			'is_manual_mode_running' => 0,
			'time_sec_1_hour' => 0,
			'time_sec_1_min' => 0,
			'time_sec_1_last_hour' => 1,
			'time_sec_1_is_charging' => 0,
			'time_sec_2_hour' => 0,
			'time_sec_2_min' => 0,
			'time_sec_2_last_hour' => 1,
			'time_sec_2_is_charging' => 0,
			'time_sec_3_hour' => 0,
			'time_sec_3_min' => 0,
			'time_sec_3_last_hour' => 1,
			'time_sec_3_is_charging' => 0,
		);
		$this->echoJson($operationInfo);
	}
}
