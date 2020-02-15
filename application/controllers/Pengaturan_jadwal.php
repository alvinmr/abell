<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('pengaturan_jadwal_model');	
	}

    public function index(){
		$data = array(
			'title' => "Pengaturan Jadwal Bell",
			'hari' => $this->pengaturan_jadwal_model->get_hari(),
			'jadwal' => $this->pengaturan_jadwal_model->get_all_hari(),
			'audio' => $this->pengaturan_jadwal_model->get_audio(),
			'jadwal_hari' => $this->jadwal_model->get_hari()
		);
		$this->load->view('template/header', $data);
		$this->load->view('jadwal/pengaturan_jadwal', $data);
		$this->load->view('template/footer');
	}

	public function jadwal(){
		$data = $this->pengaturan_jadwal_model->get_all_hari();
		echo json_encode($data);
	}

	public function addjadwal(){
		$data = array(
			'title' => "Pengaturan Jadwal Bell",
			'jadwal' => $this->pengaturan_jadwal_model->get_all_hari(),
			'hari' => $this->pengaturan_jadwal_model->get_hari(),
			'audio' => $this->pengaturan_jadwal_model->get_audio()
		);
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('jam', 'Jam', 'trim|required');
        $this->form_validation->set_rules('audio', 'Audio', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('jadwal/pengaturan_jadwal', $data);
			$this->load->view('template/footer');
		} else {			 
			$data_table =[
				'hari' => $this->input->post('hari'),
				'jam' => str_replace(':', '', $this->input->post('jam')),
				'audio' => $this->input->post('audio'),
				'keterangan' => $this->input->post('keterangan')
			];
			$this->pengaturan_jadwal_model->simpan($data_table);			
		}		
	}

	public function editjadwal()
	{
		$id = $this->input->post('id');
		$hari = $this->input->post('hari');
		$jam = $this->input->post('jam');
		$audio = $this->input->post('audio');
		$keterangan = $this->input->post('keterangan');
		$this->pengaturan_jadwal_model->edit($id,$hari,$jam,$audio,$keterangan);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jadwal berhasil diedit!
        </div>');
        redirect('pengaturan_jadwal');
	}
	
	public function deletejadwal($id){
		$this->pengaturan_jadwal_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Jadwal berhasil diahpus!
		</div>');
		redirect('pengaturan_jadwal');
	}
}

/* End of file Pengaturan_model.php */


?>