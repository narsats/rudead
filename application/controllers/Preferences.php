<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->data["is_logged"]) {
			redirect("login");
		}
	}	
	public function index() {
		$this->data["error"] = $this->session->flashdata("error");
		$this->data["success"] = $this->session->flashdata("success");
		$this->load->template('preferences', $this->data);
	}
	
	public function set() {
		$check_every = $this->input->post("check_every", TRUE);
		$send_after = $this->input->post("send_after", TRUE);
		
		if(!$check_every || !$send_after) {
			$error = "Please fill all fields";
			$this->session->set_flashdata('error', $error);
		}
		
		if (!$error && (!is_numeric($check_every) || !is_numeric($send_after))) {
			$error = "Values must be numeric";
			$this->session->set_flashdata('error', $error);
		}
		
		if (!isset($error)) {
			$this->data["user"]->check_every_days = $check_every;
			$this->data["user"]->send_after_days = $send_after;
			$this->data["user"]->save();
			$success = "You have set your preferences";
			$this->session->set_flashdata('success', $success);
		}
		redirect("preferences");
	}
}