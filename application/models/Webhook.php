<?php
class Webhook extends CI_Model {

        public $id;
		
        public $method;
        public $url;
        public $content;
		public $expect_code;
		
		public $user_id;
		public $created_at;
		
		public function get_webhook($id) {
			$query = $this->db->query("SELECT * FROM webhooks WHERE id = ?", array($id));
			if ($query->num_rows() == 0) {
				return false;
			}
			return $query->custom_result_object("Webhook")[0];
		}
		
		public function get_webhooks($user_id) {
			$query = $this->db->query("SELECT * FROM webhooks WHERE user_id = ?", array($user_id));
			if ($query->num_rows() == 0) {
				return false;
			}
			return $query->custom_result_object("Webhook");
		}

        public function new_webhook($method, $url, $content, $expect_code, $user_id)
        {
			// sanity check: is valid method?
			$this->method = $method;
			
			// sanity check: is valid url?
			$this->url  = $url;
			
			// sanity check: not more than x characters
			$this->content = $content;
			
			// sanity check: is valid code?
			$this->expect_code = $expect_code;
			
			$this->user_id = $user_id;
			$this->created_at = time();
			
			$this->db->insert('webhooks', $this);
			$this->id = $this->db->insert_id();
			return $this;
        }
		
		public function delete() {
			$this->db->query('DELETE FROM webhooks WHERE id = ?', array($this->id));
			return true;
		}
		
		public function get_user() {
			$this->load->model("User");
			return $this->User->get_user($this->user_id);
		}

        public function save()
        {
			$this->db->update('webhooks', $this, array('id' => $this->id));
			return $this;
        }
}