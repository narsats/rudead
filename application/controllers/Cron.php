<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$this->load->model("User", "user");
		$users = $this->user->get_all_users_not_dead();
		$this->load->helper("email");
		
		foreach($users as $user) {
			$last_checked = new DateTime($user->last_checked, new DateTimeZone("Europe/Paris"));
			$last_email_sent = new DateTime($user->last_email_sent, new DateTimeZone("Europe/Paris"));
			$check_days = new DateInterval("P".$user->check_every_days."D");
			$send_after_days = new DateInterval("P".$user->send_after_days."D");
			
			if((clone $last_checked)->add($check_days)->add($send_after_days) < new DateTime()) {
				log_message("debug", $user->email." is dead. RIP.");
				echo $user->email." is dead. RIP.";
				
				$user->dead = 1;
				$user->save();
				
				$messages = $user->get_messages();
				
				log_message("debug", $user->email." : sending ".count($messages)." emails");
				
				foreach ($messages as $message) {
					$relative = $message->get_relative();
					
					$this->data['user'] = $user;
					$this->data['message'] = $message;
					$this->data['relative'] = $relative;
					
					$body = $this->load->view("emails/message", $this->data, TRUE);
					
					log_message("debug", $user->email." : sending email to ".$relative->email);
					send_email($relative->email, "RUDEAD - A message from ".$user->first_name, $body);
					$user->last_email_sent = time();
					$user->save();
				}
				
				$webhooks = $user->get_webhooks();
				if ($webhooks) {
					foreach ($webhooks as $webhook) {
						$webhook->execute(); // perform the actual request
					}
				}
			} elseif ((clone $last_checked)->add($check_days) < new DateTime()) {
				if ((clone $last_email_sent)->add($check_days) < new DateTime()) {
					echo $user->email." has not given sign of life. Sending check mail";
					
					$user->last_email_sent_now();
				
					$this->load->model("Token", "token");
					$token = $this->token->new_token($user->id);
					$this->data = array();
					$this->data["user"] = $user;
					$this->data["token"] = $token;
					
					$this->data["messages_sent_in"] = (clone $last_checked)->add($send_after_days)->diff(new DateTime())->d;				
					
					$body = $this->load->view("emails/check", $this->data, TRUE);
					log_message("debug", $user->email." has not given sign of life. Sending check mail.");
					send_email($user->email, "RUDEAD - Alive check", $body);
				} else {
					echo $user->email." has not given sign of life but sent last email on ".$last_email_sent->format("Y-m-d H:i:s");
					log_message("debug", $user->email." has not given sign of life but sent last email on ".$last_email_sent->format("Y-m-d H:i:s"));
				}
			}
		}
	}
}
