<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function add_note($note) {
		$query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
		$values = array($note['title'], $note['description']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_notes() {
		return $this->db->query("SELECT id, title, description FROM notes ORDER BY created_at DESC")->result_array();
	}

	public function update_note($note) {
		$query = "UPDATE notes SET description = ?, updated_at = NOW() WHERE id = ?";
		$values = array($note['description'], $note['id']);
		return $this->db->query($query, $values);
	}

	public function delete_note($id) {
		return $this->db->query("DELETE FROM notes WHERE id=?", array($id));
	}

}