<?php

class SupplierModel extends CI_Model{
    function __consturct(){
        $this->load->database();        
    }
    function Add($data = array()){
        $ins = $this->db->insert('supplier',$data);
        return $ins ? $this->db->insert_id() : false;
    }
    function AddPIC($data = array()){
        $ins = $this->db->insert('supplier_pic',$data);
        return $ins;
    }
    function DelPIC($data = array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('supplier_pic');
        return $ret;
    }
    function UpdatePIC($data = array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('supplier_pic');
        return $ret;
    }
    function Supplier($id=""){
        $this->db->select('*');
        $this->db->from('supplier a'); 
        $this->db->join('(select max(create_date) as tanggal_po,id_supplier from po_supplier group by id_supplier) b','b.id_supplier = a.id','left');
        if($id!=""){
            $this->db->where('a.id',$id);
            $this->db->limit(1);
        }
        $get = $this->db->get();
        return $get;        
    }
    function SupplierDetail($id = ""){
        $this->db->select('*');
        $this->db->from('supplier a');
        $this->db->join('supplier_pic b','b.id_supplier = a.id');
        $this->db->where('a.id',$id);
        $ret = $this->db->get();
        return $ret;
    }
    function SupplierPIC($idcust){
        $ret = $this->db->get_where('supplier_pic',array("id_supplier"=>$idcust,"status"=>1));
        return $ret;
    }
    function Update($data=array(),$id=""){
        $this->db->set($data);
        $this->db->where("id",$id);
        $ret = $this->db->update('supplier');
        return $ret;
    }
}