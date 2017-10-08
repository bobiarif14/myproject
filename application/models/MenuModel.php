<?php

class MenuModel extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    function GetParent(){
        $parent = $this->db->get_where('menu',array("parent"=>0));
        return $parent;
    }
    function GetChild($parentid){
        $child = $this->db->get_where('menu',array("parent"=>$parentid));
        return $child;
    }
}