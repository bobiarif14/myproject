<?php

class LoginController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('SessionModel');
        $this->load->model('NotifModel');        
    }
    function index(){
        $this->form_validation->set_rules('email', 'email', 'required');        
        $this->form_validation->set_rules('password', 'password', 'required');        
        if(!$this->form_validation->run()){
            $data = array();
            if($this->NotifModel->type() && $this->NotifModel->message()){
                $data['notiftype'] = $this->NotifModel->type();
                $data['notifmsg'] = $this->NotifModel->message();
                $this->NotifModel->clear();
            }
            $this->load->view('content/login',$data);
        }
        else{
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $cek = $this->db->get_where('user',array("email"=>$email,"password"=>hash('sha256',$pass),"status"=>1));
            if($cek->num_rows()>0){
                $cek = $cek->row();
                $this->SessionModel->login($cek->email,$cek->full_name,$cek->level);
                redirect('dashboard');
            }
            else{
                $this->NotifModel->set('error',"Email atau Password salah");
                redirect('login');
            }
        }
    }
    function logout(){
        $this->SessionModel->logout();
    }
}
?>