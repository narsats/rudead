<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function use_token($token = false)
	{
		if (!$token) {
			show_404();
		}
		$this->load->model("token");
		$t = $this->token->get($token);
		if ($t) {
			$t->use_token();
		} else {
			show_404();
		}
		echo "You can now close this window.";
	}
}
