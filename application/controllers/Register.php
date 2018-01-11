<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->data["is_logged"])
			redirect("messages");
	}
	public function index()
	{	
		$email = $this->input->post("email", TRUE);
		$password1 = $this->input->post("password1", TRUE);
		$password2 = $this->input->post("password2", TRUE);
		$first_name = $this->input->post("first_name", TRUE);
		$last_name = $this->input->post("last_name", TRUE);
		
		if ($password1 !== $password2) {
			$this->data["error"] = "Password did not match.";
		}
		
		if ($email && $password1 && $first_name && $last_name) {
			$this->load->model("User", "user");
			$user = $this->user->new_user($email, $password1, $first_name, $last_name);
			if (!$user) {
				// something went wrong
				$this->data["error"] = "Could not create account.";
			} else {
				// created account
				$this->session->set_userdata("userid", $user->id);
				redirect("messages");
			}
		} elseif ($email || $password1 || $first_name || $last_name) {
			// missing field
			$this->data["error"] = "One or more fields were empty.";
		}
		
		
		$this->load->view('register', $this->data);
	}
}
