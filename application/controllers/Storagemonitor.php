<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storagemonitor extends MY_Controller {

	public function batteryStatus() {
		$this->load->view('storage_monitor/battery_status');
	}

	public function batteryOperation() {
		$this->load->view('storage_monitor/battery_operation');
	}
}
