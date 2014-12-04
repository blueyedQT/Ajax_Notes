<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function index() {
		$this->load->model('Note');
		$posts = $this->Note->get_posts();
		$display['posts'] = $posts;
		$this->load->view('algorithm', $display);
	}

	public function create() {
		$data = $this->input->post('post');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('post', 'Note', 'required');
		if($this->form_validation->run() != FALSE) {
			$this->load->model('Note');
			$result = $this->Note->add_post($data);
			if($result > 0) {
				echo json_encode($data);
			}
		}
	}

	// public function class() {
	// 	$this->load->view('algorithm');
	// }

}