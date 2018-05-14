<?php
class Token extends CI_Model {

	public $id;
	public $user_id;
	public $token;
	public $date_added;

	public function new_token($user_id)
	{
		$this->user_id  = $user_id;
		$this->date_added  = time();
		$this->token = $this->generate_token();
		
		$this->db->insert('tokens', $this);
		$this->id = $this->db->insert_id();
		$this->set_now();
		return $this;
	}
	
	public function get($token)
	{
		$query = $this->db->query("SELECT * FROM tokens WHERE token = ?", array($token));
		if ($query->num_rows() == 0) {
			return false;
		}
		$row = $query->row();
		foreach($row as $key => $value) {
			$this->$key = $value;
		}
		$this->id = (int)$this->id;
		return $this;
	}
	
	public function remove_tokens($user_id) {
		$query = $this->db->query("DELETE FROM tokens WHERE user_id = ?", array($user_id));
	}
	
	private function generate_token() {
		$this->load->helper("string");
		return random_string("alnum", 20);
	}
	
	private function set_now() {
		$this->db->query("UPDATE tokens SET date_added = NOW() WHERE id = ?", array($this->id));
		return $this;
	}
	
	public function use_token() {
		log_message("debug", "User [#".$this->user_id."] has checked from token!");
		$this->db->query("UPDATE users SET last_checked = NOW() WHERE id = ?", array($this->user_id));
		$this->db->query("DELETE FROM tokens WHERE id = ?", array($this->id));
	}
		
}