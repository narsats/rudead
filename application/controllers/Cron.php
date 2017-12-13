<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{	
		$this->load->model("User", "user");
		$users = $this->user->get_all_users();
		$this->load->helper("email");
		
		foreach($users as $user) {
			$last_checked = new DateTime($user->last_checked, new DateTimeZone("Europe/Paris"));
			$check_days = new DateInterval("P".$user->check_every_days."D");
			$send_after_days = new DateInterval("P".$user->send_after_days."D");
			if((clone $last_checked)->add($check_days)->add($send_after_days) < new DateTime()) {
				echo $user->email." is dead. RIP.";
			} elseif ((clone $last_checked)->add($check_days) < new DateTime()) {
				echo $user->email." has not given sign of life. Sending check mail";
				$this->load->model("Token", "token");
				$token = $this->token->new_token($user->id);
				$this->data = array();
				$this->data["user"] = $user;
				$this->data["token"] = $token;
				
				$this->data["messages_sent_in"] = (clone $last_checked)->add($send_after_days)->diff(new DateTime())->d;				
				
				//$this->load->view("emails/check", $this->data);
				$body = $this->load->view("emails/check", $this->data, TRUE);
				send_email($user->email, "RUDEAD - Alive check", $body);
			}
		}
	}
}
