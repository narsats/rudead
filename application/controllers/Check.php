<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{	
		$this->load->view("emails/check", $this->data);
	}
	public function message()
	{	
		$this->load->view("emails/message", $this->data);
	}
}
