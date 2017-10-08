<?php

class SettingModel extends CI_Model{
    function __construct(){
        $this->load->database();        
    }
    function GetCurrency(){
        $get = $this->db->get('currency');
        return $get;
    }
    function SetCurrency($data = array()){
        $set = $this->db->insert('currency',$data);
        return $set;
    }
    function UpdateCurrency($data = array(),$id = 0){
        $set = $this->db->where('id',$id)->update('currency',$data);
        return $set;
    }
    function GetCategory(){
        $get = $this->db->get('category');
        return $get;
    }
    //had
    function GetPosupplier(){
        $get = $this->db->get('po_supplier');
        return $get;
    }
    //dsd
    function SetCategory($data = array()){
        $set = $this->db->insert('category',$data);
        return $set;
    }
    function UpdateCategory($data = array(),$id = 0){
        $set = $this->db->where('id',$id)->update('category',$data);
        return $set;
    }
    function GetBarang($where=array()){
        $this->db->select('*,a.id as id_barang,b.id as id_category');
        $this->db->from('barang a');
        $this->db->join('category b','b.id = a.id_category');
        if(count($where)>0)
            $this->db->where($where);
        $get = $this->db->get();
        return $get;
    }
    function GetBarangPO($where=array()){
        $this->db->select('b.no_po as id_po , c.nama_barang ,a.jumlah , a.harga');
        $this->db->from('po_supplier_detail a');
        $this->db->join('po_supplier b','b.id = a.id_po');
        $this->db->join('barang c','c.id = a.id_barang'); 
        if(count($where)>0)
            $this->db->where($where);
        $get = $this->db->get();
        return $get;
    }
    /*function GetPO($where=array()){
        $this->db->select('*,a.id as id_barang,b.id as id_category');
        $this->db->from('barang a');
        $this->db->join('category b','b.id = a.id_category');
        if(count($where)>0)
            $this->db->where($where);
        $get = $this->db->get();
        return $get;
    }*/
    function SetBarang($data = array()){
        $set = $this->db->insert('barang',$data);
        return $set;
    }
    function UpdateBarang($data = array(),$id = 0){
        $set = $this->db->where('id',$id)->update('barang',$data);
        return $set;
    }
}