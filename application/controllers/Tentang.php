<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->helper('format');
        is_logged_in();
	}
    public function index()
    {
        $data = array(
            'title' => "Tentang Kami"
        );
        $this->load->view('template/header', $data);
        $this->load->view('tentang/index');
        $this->load->view('template/footer');
    }

}

/* End of file Dashboard.php */


?>