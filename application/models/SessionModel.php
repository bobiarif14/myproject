<?php

class SessionModel extends CI_Model{
    function __construct(){
        $this->load->library('session'); 
    }
    function login($email = "",$nama = "",$level = ""){
        $this->setNama($nama);
        $this->setEmail($email);
        $this->setLevel($level);
        $this->session->set_userdata('is_login',true);
    }
    function setLevel($level = 0){
        $this->session->set_userdata('level',$level);
    }
    function getLevel(){
        return $this->session->userdata('level');
    }
    function is_login(){
        $is_login = $this->session->has_userdata('is_login');
        if(!$is_login)
            redirect('login');
    }
    function setNama($nama = ""){
        $this->session->set_userdata('nama',$nama);
    }
    function setEmail($email = ""){
        $this->session->set_userdata('email',$email);
    }
    function getNama(){
        return $this->session->userdata('nama');
    }
    function getEmail(){
        return $this->session->userdata('email');        
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}