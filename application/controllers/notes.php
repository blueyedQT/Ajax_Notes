<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function index() {
		$display['notes'] = $this->Note->get_notes();
		$this->load->view('ajax_notes', $display);
	}

	public function add_note() {
		$post = $this->input->post();
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run() != FALSE) {
			$display['title'] = $post['title'];
			$display['description'] = $post['description'];
			$result = $this->Note->add_note($post);
			if($result > 0) {
				$display['id'] = $result;
				$display['action'] = 'add';
				echo json_encode($display);
			}
		}
	}

	public function update_note() {
		$post = $this->input->post();
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run() != FALSE) {
			$result = $this->Note->update_note($post);
			if($result) {
			}
		}
	}

	public function delete_note() {
		$id = $this->input->post('id');
		$result = $this->Note->delete_note($id);
		if($result) {
			$display['action'] = 'delete';
			echo json_encode($display);
		}
	}
}