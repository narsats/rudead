<?php
class Relative extends CI_Model {

        public $id;
        public $user_id;
        public $name;
        public $email;
		public $date_added;

        /*public function get_relative($id)
        {
			$query = $this->db->query("SELECT * FROM relatives WHERE id = ?", array($id));
			if ($query->num_rows() == 0) {
				return false;
			}
			$row = $query->row();
			foreach($row as $key => $value) {
				$this->$key = $value;
			}
			$this->id = (int)$this->id;
			$this->user_id = (int)$this->user_id;
			return $this;
        }*/
		
		public function get_relative($id) {
			$query = $this->db->query("SELECT * FROM relatives WHERE id = ?", array($id));
			if ($query->num_rows() == 0) {
				return false;
			}
			return $query->custom_result_object("Relative")[0];
		}

        public function new_relative($user_id, $name, $email)
        {
			$this->user_id  = $user_id;
			$this->name  = $name;
			$this->email = $email;
			$this->date_added = time();

			$this->db->insert('relatives', $this);
			$this->id = $this->db->insert_id();
			
			return $this;
        }

        public function save()
        {
			$this->db->update('relatives', $this, array('id' => $this->id));
			return $this;
        }
		
		public function delete() {
			$this->db->query('DELETE FROM relatives WHERE id = ?', array($this->id));
			return true;
		}
}