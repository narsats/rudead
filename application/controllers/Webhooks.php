<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhooks extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->data["is_logged"]) {
			redirect("login");
		}
	}	
	public function index() {
		$this->data["webhooks"] = $this->data["user"]->get_webhooks();
		
		$this->data["error"] = $this->session->flashdata("error");
		$this->data["success"] = $this->session->flashdata("success");
		
		$this->load->template('webhooks/list', $this->data);
	}
	
	public function test($id = false) {
		if (!$id) {
			show_404();
		}
		$this->load->model("Webhook", "webhook");
		$whook = $this->webhook->get_webhook($id);
		if (!$whook) {
			show_404();
		}
		
		if ($whook->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$resp = $whook->execute();
		
		if ($resp->status_code != $whook->expect_code) {
			$this->session->set_flashdata('error', "Your request has been sent but got status code ".$resp->status_code);
		} else {
			$this->session->set_flashdata('success', "Your request has been sent and response matched expected code.");
		}
		
		redirect("webhooks");
		
	}
	
	public function newwebhook()
	{
		$method = $this->input->post("method", TRUE);
		$url = $this->input->post("url", TRUE);
		$content = $this->input->post("content", TRUE);
		$expect_code = $this->input->post("expect_code", TRUE);
		
		if ($method && $url) {
			$this->load->model("Webhook", "webhook");
			$webhook = $this->webhook->new_webhook($method, $url, $content, $expect_code, $this->data["userid"]);
			if (!$webhook) {
				// something went wrong
				$this->data["error"] = "Could not create webhook";
			} else {
				// created webhook
				redirect("webhooks");
			}
		} elseif ($method || $url) {
			// missing field
			$this->data["error"] = "One or more fields were empty";
		}
		
		
		$this->load->template('webhooks/new', $this->data);
	}
	
	public function delete($id = false) {
		if (!$id) {
			show_404();
		}
		$this->load->model("Webhook", "webhook");
		$whook = $this->webhook->get_webhook($id);
		if (!$whook) {
			show_404();
		}
		
		if ($whook->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$whook->delete();
		redirect("webhooks");
	}
	
	public function edit($id = false) {
		if (!$id) {
			show_404();
		}
		
		$this->load->model("Webhook", "webhook");
		$whook = $this->webhook->get_webhook($id);
		if (!$whook) {
			show_404();
		}
		
		if ($whook->user_id !== $this->data["userid"]) {
			show_404();
		}
		
		$method = $this->input->post("method", TRUE);
		$url = $this->input->post("url", TRUE);
		$content = $this->input->post("content", TRUE);
		$expect_code = $this->input->post("expect_code", TRUE);
		
		if ($method && $url) {		
			$whook->method = $method;
			$whook->url = $url;
			$whook->content = $content;
			$whook->expect_code = $expect_code;
			$whook->save();
			redirect("webhooks");
		} elseif ($method || $url) {
			// missing field
			$this->data["error"] = "One or more fields were empty";
		}
		
		
		$this->data["webhook"] = $whook;
		
		$this->load->template('webhooks/edit', $this->data);
	}
}