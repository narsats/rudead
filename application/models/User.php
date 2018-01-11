<?php
class User extends CI_Model {

        public $id;
        public $email;
        public $first_name;
        public $last_name;
		public $hashed_password;
		public $last_checked;
		public $check_every_days;
		public $send_after_days;
		public $dead;

        public function get_user($id)
        {
			$query = $this->db->query("SELECT * FROM users WHERE id = ?", array($id));
			if ($query->num_rows() == 0) {
				return false;
			}
			$row = $query->row();
			foreach($row as $key => $value) {
				$this->$key = $value;
			}
			$this->id = (int)$this->id;
			$this->check_every_days = (int)$this->check_every_days;
			$this->send_after_days = (int)$this->send_after_days;
			$this->dead = (int)$this->dead;
			return $this;
        }
		
		public function get_user_by_email($email)
        {
			$query = $this->db->query("SELECT * FROM users WHERE email = ?", array($email));
			if ($query->num_rows() == 0) {
				return false;
			}
			$row = $query->row();
			foreach($row as $key => $value) {
				$this->$key = $value;
			}
			$this->id = (int)$this->id;
			$this->check_every_days = (int)$this->check_every_days;
			$this->send_after_days = (int)$this->send_after_days;
			return $this;
        }
		
		public function get_relatives()
        {
			$this->load->model("Relative");
			$query = $this->db->query("SELECT * FROM relatives WHERE user_id = ?", array($this->id));
			return $query->custom_result_object("Relative");
        }
		
		public function get_messages()
        {
			$this->load->model("Message");
			$query = $this->db->query("SELECT * FROM messages WHERE user_id = ?", array($this->id));
			return $query->custom_result_object("Message");
        }

        public function new_user($email, $plain_password, $first_name, $last_name)
        {
			$this->email    = $email;
			$this->hashed_password  = password_hash($plain_password, PASSWORD_BCRYPT);
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->check_every_days = 30;
			$this->send_after_days = 7;
			$this->last_checked = time();
			$this->dead = 0;
			
			if ($this->get_user_by_email($email)) {
				return false;
			} else {
				$this->db->insert('users', $this);
				$this->id = $this->db->insert_id();
				return $this;
			}
        }
		
		public function try_login($email, $plain_password) {
			$query = $this->db->query("SELECT * FROM users WHERE email = ? AND dead = 0", array($email));
			if ($query->num_rows() == 0) {
				return false;
			}
			$row = $query->row();
			
			if (!password_verify($plain_password, $row->hashed_password)) {
				return false;
			}
			
			return $this->get_user((int)$row->id);
		}
		
		public function get_all_users() {
			$query = $this->db->query("SELECT * FROM users");
			return $query->custom_result_object("User");
		}
		
		public function get_all_users_not_dead() {
			$query = $this->db->query("SELECT * FROM users WHERE dead = 0");
			return $query->custom_result_object("User");
		}
		
		public function check_now() {
			$query = $this->db->query("UPDATE users SET last_checked = NOW() WHERE id = ?", array($this->id));
			$this->last_checked = time();
			return $this;
		}

        public function save()
        {
			$this->db->update('users', $this, array('id' => $this->id));
			return $this;
        }
}