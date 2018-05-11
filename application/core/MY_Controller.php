<?php
class MY_Controller extends CI_Controller {
	
	protected $data = array();
	
    public function __construct() {
		parent::__construct();
		
		$this->load->model("User", "user");
		
		$this->data["userid"] = $this->session->userdata("userid");
		$this->data["user"] = $this->user->get_user($this->data["userid"]);
		$this->data["is_logged"] = $this->data["user"];
		
		if($this->data["user"]) {
			$this->data["user"]->check_now();
			log_message("error", "User has checked from controller!");
			$this->load->model("Token", "token");
			$this->token->remove_tokens($this->data["user"]->id);
		}
	}
}
