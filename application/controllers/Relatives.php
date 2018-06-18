<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatives extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->data["is_logged"]) {
			redirect("login");
		}
	}	
	public function index() {
		$this->data["relatives"] = $this->data["user"]->get_relatives();
		$this->load->template('relatives/list', $this->data);
	}
	public function newrelative()
	{
		$name = $this->input->post("name", TRUE);
		$email = $this->input->post("email", TRUE);
		
		if ($name && $email) {
			$this->load->model("Relative", "relative");
			$relative = $this->relative->new_relative($this->data["userid"], $name, $email);
			if (!$relative) {
				// something went wrong
				$this->data["error"] = "Could not create relative";
			} else {
				// created relative
				//$this->data["success"] = print_r($user);
				redirect("relatives");
			}
		} elseif ($name || $email) {
			// missing field
			$this->data["error"] = "One or more fields were empty";
		}
		
		
		$this->load->template('relatives/new', $this->data);
	}
	
	public function delete($id = false) {
		if (!$id) {
			show_404();
		}
		$this->load->model("Relative", "relative");
		$rel = $this->relative->get_relative($id);
		if (!$rel) {
			show_404();
		}
		
		if ($rel->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$rel->delete();
		redirect("relatives");
	}
	
	public function edit($id = false) {
		if (!$id) {
			show_404();
		}
		
		$this->load->model("Relative", "relative");
		$rel = $this->relative->get_relative($id);
		if (!$rel) {
			show_404();
		}
		
		if ($rel->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$name = $this->input->post("name", TRUE);
		$email = $this->input->post("email", TRUE);
		
		if ($name && $email) {		
			$rel->name = $name;
			$rel->email = $email;
			$rel->save();
			redirect("relatives");
		} elseif ($name || $email) {
			// missing field
			$this->data["error"] = "One or more fields were empty";
		}
		
		
		$this->data["relative"] = $rel;
		
		$this->load->template('relatives/edit', $this->data);
	}
}