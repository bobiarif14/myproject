<?php

class TemplateModel extends CI_Model{
    function __construct(){
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('MenuModel');
        $this->load->model('SessionModel');
        $this->load->model('NotifModel');
        
        $this->SessionModel->is_login();
    }
    function SetDataHeader($data = array()){
        $this->DataHeader = $data;
    }
    function SetDataNav($data = array()){
        $this->DataNav = $data;
    }
    function SetDataContent($data = array()){
        $this->DataContent = $data;
    }
    function GetDataHeader(){
        return isset($this->DataHeader) ? $this->DataHeader : array() ;
    }
    function GetDataNav(){
        return isset($this->DataNav) ? $this->DataNav : array() ;
    }
    function GetDataContent(){
        return isset($this->DataContent) ? $this->DataContent : array() ;
    }
    function load($template = 'content/dashboard'){
        if(($this->NotifModel->type() && $this->NotifModel->message())){
            $this->DataNav = $this->GetDataNav();
            $this->DataNav['notiftipe'] = $this->NotifModel->type();
            $this->DataNav['notifmsg'] = $this->NotifModel->message();   
        }
        $this->load->view('template/header',$this->GetDataHeader());
        $this->load->view('template/nav',$this->GetDataNav());
        $this->load->view($template,$this->GetDataContent());
        $this->NotifModel->clear();
    }
}