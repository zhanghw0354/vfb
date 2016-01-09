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
