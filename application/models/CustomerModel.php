<?php

class CustomerModel extends CI_Model{
    function __consturct(){
        $this->load->database();        
    }
    function Add($data = array()){
        $ins = $this->db->insert('customer',$data);
        return $ins ? $this->db->insert_id() : false;
    }
    function AddPIC($data = array()){
        $ins = $this->db->insert('customer_pic',$data);
        return $ins;
    }
    function DelPIC($data = array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('customer_pic');
        return $ret;
    }
    function UpdatePIC($data = array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('customer_pic');
        return $ret;
    }
    function Customer($id=""){
        $this->db->select('*');
        $this->db->from('customer a'); 
        $this->db->join('(select max(create_date) as tanggal_po,id_customer from po_customer group by id_customer) b','b.id_customer = a.id','left');
        if($id!=""){
            $this->db->where('a.id',$id);
            $this->db->limit(1);
        }
        $get = $this->db->get();
        return $get;  
    }
    function CustomerDetail($id = ""){
        $this->db->select('*');
        $this->db->from('customer a');
        $this->db->join('customer_pic b','b.id_customer = a.id');
        $this->db->where('a.id',$id);
        $ret = $this->db->get();
        return $ret;
    }
    function CustomerPIC($idcust){
        $ret = $this->db->get_where('customer_pic',array("id_customer"=>$idcust,"status"=>1));
        return $ret;
    }
    function Update($data=array(),$id=""){
        $this->db->set($data);
        $this->db->where("id",$id);
        $ret = $this->db->update('customer');
        return $ret;
    }
    function getSuratJalan($where=array()){
        $this->db->select('*,a.id as id_suratjalan');
        $this->db->from('delivery a');
        $this->db->join("delivery_detail b","b.id_delivery=a.id");
        $this->db->join('customer c','c.id = a.id_customer');
        // $this->db->join('(select sum(qty_kirim) as qty_kirim_jumlah,id_delivery,id_po_detail from delivery_detail group by id_po_detail) d','d.id_delivery = a.id');
        // $this->db->join('(select jumlah,id from po_customer_detail) e','e.id = d.id_po_detail');
        if(count($where)>0)
            $this->db->where($where);
        $this->db->group_by('b.id_delivery');
        return $this->db->get();
    }
    function suratJalanDetail($where=array()){
        $this->db->select('*');
        $this->db->from('delivery a');
        $this->db->join('delivery_detail b','b.id_delivery = a.id');
        $this->db->join('po_customer_detail c','c.id = b.id_po_detail');
        $this->db->join('barang d','d.id = c.id_barang');       
        $this->db->join('po_customer e','e.id = c.id_po');     
        $this->db->join('customer f','f.id = a.id_customer');
        if(count($where)>0)
            $this->db->where($where);
        $this->db->order_by('no_po');
        return $this->db->get();
    }
    function CustomerPO($idcust){
        $ret = $this->db->get_where('po_customer',array("id_customer"=>$idcust,"status !="=>0));
        return $ret;
    }
    function CustomerPODetail($where = array()){
        $this->db->select('*,a.id as id_po_detail');
        $this->db->from('po_customer_detail a');
        $this->db->join('barang b','b.id=a.id_barang');
        if(count($where)>0)
            $this->db->where($where);
        return $this->db->get();
    }
    function addDelivery($data=array()){
        $ins = $this->db->insert('delivery',$data);
        return $ins ? $this->db->insert_id() : false;
    }
    function addDeliveryDetail($data=array()){
        $ins = $this->db->insert('delivery_detail',$data);
        return $ins ? $this->db->insert_id() : false;
    }
    function getDeliveryNo(){
        $tahun = date('Y');
        $bulan = date('m');
        $where = array(
            'month(create_date)'=>$bulan,
            'year(create_date)'=>$tahun
        );
        $ex = $this->db->get_where('delivery',$where)->num_rows()+1;
        $no =  str_pad($ex, 3, "0", STR_PAD_LEFT);
        $sj = "$no/$tahun/$bulan";
        return $sj;
        // $this->db->select('*');
        // $this->db->from('delivery');
        // $this->db->where('month(create_date)',date('m'));
        // $this->db->where('year(create_date)',date('y'));
        // return $this->db->get()->num_rows();
    }
}