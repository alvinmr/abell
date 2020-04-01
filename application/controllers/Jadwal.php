<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('format');
		is_logged_in();
	}
	

	public function index() {
		$data = array(
			'title' => "Jadwal Bell",
			'jadwal_hari' => $this->jadwal_model->get_hari()
		);
		$this->load->view('template/header', $data);
		$this->load->view('jadwal/index', $data);
		$this->load->view('template/footer');
	}

	
}