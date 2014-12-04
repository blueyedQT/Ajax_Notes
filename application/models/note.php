<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function get_posts() {
		return $this->db->query("SELECT post FROM posts ORDER BY created_at DESC")->result_array();
	}

	public function add_post($post) {
		$query = "INSERT INTO posts (post, created_at, updated_at) VALUES (?,?,?)";
		$values = array($post, date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

}