<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->data["is_logged"]) {
			redirect("login");
		}
	}
	public function index() {
		$messages = $this->data["user"]->get_messages();
		$this->data["messages"] = $messages;
		$this->load->template('messages/list', $this->data);
	}
	
	public function newdeath()
	{
		$to_relative = $this->input->post("to_relative", TRUE);
		$text = $this->input->post("text", TRUE);
		
		if ($to_relative && $text) {
			$this->load->model("Message", "message");
			$message = $this->message->new_message($this->data["userid"], $text, $to_relative);
			if (!$message) {
				// something went wrong
				$this->data["error"] = "Could not create message";
			} else {
				// created relative
				//$this->data["success"] = print_r($user);
				redirect("messages");
			}
		} elseif ($to_relative || $text) {
			// missing field
			$this->data["error"] = "One or more fields were empty";
		}
				
		$this->load->model("Relative", "relative");
		$relatives = $this->data["user"]->get_relatives();
		$this->data["relatives"] = $relatives;
		$this->load->template('messages/new', $this->data);
	}
	
	public function delete($id = false) {
		if (!$id) {
			show_404();
		}
		$this->load->model("Message", "message");
		$msg = $this->message->get($id);
		if (!$msg) {
			show_404();
		}
		if ($msg->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$msg->delete();
		redirect("messages");
	}
	
	public function edit($id = false) {
		if (!$id) {
			show_404();
		}
		
		$this->load->model("Message", "message");
		$msg = $this->message->get($id);
		if (!$msg) {
			show_404();
		}
		if ($msg->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$text = $this->input->post("text", TRUE);
		
		if ($text) {		
			$msg->text = $text;
			$msg->save();
			redirect("messages");
		}
		
		$this->load->model("Relative", "relative");
		$msg->relative = $this->relative->get_relative($msg->to_relative);
		$this->data["message"] = $msg;
		
		$this->load->template('messages/edit', $this->data);
	}
	
	public function view($id = false) {
		if (!$id) {
			show_404();
		}
		$this->load->model("Message", "message");
		$msg = $this->message->get($id);
		
		if (!$msg) {
			show_404();
		}

		if ($msg->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$this->load->model("Relative", "relative");
		$msg->relative = $this->relative->get_relative($msg->to_relative);
		$this->data["message"] = $msg;
		
		$this->load->view("emails/message", $this->data);
	}
}
