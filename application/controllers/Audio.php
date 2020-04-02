<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Audio extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('audio_model');      
        is_logged_in();  
    }
    

    public function index()
    {
        $data = array(
			'title' => "Upload Audio Bell punya dady",
            'audio' => $this->audio_model->get_all(),
            'jadwal_hari' => $this->jadwal_model->get_hari()
		);
		$this->load->view('template/header', $data);
		$this->load->view('audio/index', $data);
		$this->load->view('template/footer');
    }
    
    public function addaudio(){
        $config['upload_path']          = './assets/audio';
        $config['allowed_types']        = 'mp3|m4a';
        $config['max_size']             = 0;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('audio_file')) {            
            $data = array("file_name"=> $this->upload->data("file_name"));
            $this->audio_model->AudioInsertdata($data);
        }else{
            echo $this->upload->display_errors();    
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Audio Tidak ada!
        </div>');
        redirect('audio');
    }
    
    public function deleteaudio($id){
        $this->audio_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Audio berhasil dihapus!
        </div>');
        redirect('audio');
    }

}

/* End of file Auio.php */