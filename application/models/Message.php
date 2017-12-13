<?php
class Message extends CI_Model {

        public $id;
        public $user_id;
        public $text;
        public $to_relative;
		public $date_added;

        public function get($id)
        {
			$query = $this->db->query("SELECT * FROM messages WHERE id = ?", array($id));
			if ($query->num_rows() == 0) {
				return false;
			}
			$row = $query->row();
			foreach($row as $key => $value) {
				$this->$key = $value;
			}
			$this->id = (int)$this->id;
			$this->user_id = (int)$this->user_id;
			$this->to_relative = (int)$this->to_relative;
			return $this;
        }

        public function new_message($user_id, $text, $to_relative)
        {
			$this->user_id  = $user_id;
			$this->text  = $text;
			$this->to_relative = $to_relative;
			$this->date_added = time();

			$this->db->insert('messages', $this);
			$this->id = $this->db->insert_id();
			
			return $this;
        }

        public function save()
        {
			$this->db->update('messages', $this, array('id' => $this->id));
			return $this;
        }
		
		public function delete() {
			$this->db->query('DELETE FROM messages WHERE id = ?', array($this->id));
			return true;
		}
}