<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->data["is_logged"])
			redirect("messages");
	}
	public function index()
	{	
		$email = $this->input->post("email", TRUE);
		$password = $this->input->post("password", TRUE);
		
		if ($email && $password) {
			$this->load->model("User", "user");
			$user = $this->user->try_login($email, $password);
			if (!$user) {
				// bad login/password
				$this->data["error"] = "Bad login/password";
			} else {
				// logged in
				$this->session->set_userdata("userid", $user->id);
				redirect("messages");
			}
		} elseif ($email || $password) {
			// missing field
			$this->data["error"] = "A field was missing";
		}
		
		
		$this->load->view('login', $this->data);
	}
}
