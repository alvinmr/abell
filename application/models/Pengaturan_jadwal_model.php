<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_jadwal_model extends CI_Model {
    private $_table = "jadwal";    

    public function get_jadwal(){
        $this->db->select('jadwal.*, hari.hari as hari, audio.file_name as audio');        
        $this->db->join('hari', 'hari.id = jadwal.hari', 'left');    
        $this->db->join('audio', 'audio.id = jadwal.audio', 'left');
        return $this->db->get($this->_table)->result_array();        
    }

    public function get_hari(){
        return $this->db->get('hari')->result_array();        
    }

    public function get_audio(){
        return $this->db->get('audio')->result_array();        
    }

    public function simpan($data_table){      
        $this->db->insert($this->_table, $data_table);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jadwal berhasil ditambah!
        </div>');
        redirect('pengaturan_jadwal');
    }

    public function delete($id){
        return $this->db->delete($this->_table,['id' => $id]);    
    }

    public function edit($id,$hari,$jam,$audio,$keterangan)
    {
         $this->db->where('id', $id);
         $this->db->update('jadwal', array( 
            'hari' => $hari, 
            'jam' => $jam,
            'audio' => $audio,
            'keterangan' => $keterangan
        ));
        
    }

}

/* End of file Pengaturan_jadwal_model.php */


?>