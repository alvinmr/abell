<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

    private $_table = "jadwal";

    public function get_hari(){         
        $this->db->select('jadwal.*, hari.hari as hari, audio.file_name as audio');        
        $this->db->join('hari', 'hari.id = jadwal.hari', 'left');    
        $this->db->join('audio', 'audio.id = jadwal.audio', 'left');   
        $this->db->where('hari.hari', nama_hari(date('Y-m-d')) ); 
        return $this->db->get_where($this->_table)->result_array();
    }    

}

/* End of file Jadwal_model.php */
