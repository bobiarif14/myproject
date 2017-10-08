<?php

class NotifModel extends CI_Model{
    function __construct(){
        $this->load->library('session');
    }
    function set($type = false,$msg = false){
        $this->session->set_userdata('NotifTipe',$type);
        $this->session->set_userdata('NotifMsg',$msg);
    }
    function type(){
        $tipe = $this->session->has_userdata('NotifTipe') ? $this->session->userdata('NotifTipe') : false;
        return $tipe;
    }
    function message(){
        $tipe = $this->session->has_userdata('NotifMsg') ? $this->session->userdata('NotifMsg') : false;
        return $tipe;
    }
    function clear(){
        $this->session->unset_userdata('NotifMsg');
        $this->session->unset_userdata('NotifTipe');
    }
}