<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        
    }
    
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {            
            $this->load->view('auth/login');            
        } else {
            //sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // if(password_verify($password, $user['password'])){
        //     echo $password;
        // }else
        //  echo $password;


        if ($user) {
            if (md5($password) == $user['password']) {

                $data = [
                    'name' => $user['name'],
                    'email' => $user['email']
                ];

                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Found!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logout!</div>');
        redirect('auth');
    }

    private function _sendEmail($type)
    {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if(!$user){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth/forgotpassword');
        }

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'create_at' => time()
        ];
        $this->db->insert('user_token', $user_token);

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_user' => '22b3c7d77d3302',
            'smtp_pass' => '409c127140459f',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];
		$this->load->library('email', $config);

        $this->email->from('abellsmkti@gmail.com', 'Kelompok 1 RPL');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset password : <a href="'. base_url() . 'auth/reset?token=' . urlencode($token) . '&email=' . $email .' ">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    
    public function forgotpassword(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgotpassword');            
        } else {
            $email = $this->input->post('email');
            $this->_sendEmail('forgot');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Chek Your Email To Riset Password!</div>');
            redirect('auth');
        }
    }


    public function reset()
    {
        $token = $this->input->get('token');
        $email = $this->input->get('email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
        $this->form_validation->set_rules('confirm-password', 'Password Confirmation', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {            
            $this->load->view('auth/resetpassword');
        } else{            
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if(!$user_token){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal! Token tidak ada</div>');
                redirect('auth');
            }else{
                $this->db->delete('user_token', ['email' => $email]);    
                $password = md5($this->input->post('password'));   
                $this->db->set('password', $password);
                $this->db->where('email', $email);                
                $this->db->update('user');  
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil direset!</div>');
                    redirect('auth');   
            }
        }
        
    }
}