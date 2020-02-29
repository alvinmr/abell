<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Audio_model extends CI_Model {
    private $_table = "audio";
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function AudioInsertdata($data){
        $query = $this->db->insert($this->_table, $data);
        if($query){
            $this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Success! Audio data submit done. </div>");
            return redirect('audio');
        }else{
            $this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Error! Audio data submit faild.</div>");
            return redirect('audio');
        }
    }

    public function get_all(){
        return $this->db->get($this->_table)->result_array();
        
    }

    public function delete($id){                
        $path = $this->db->where('id', $id)->get('audio')->row()->file_name;        
        $this->db->delete($this->_table,['id' => $id]);
        unlink( 'assets/audio/'.$path );
     }

}

/* End of file Audio_model.php */

?>