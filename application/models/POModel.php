<?php

class POModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function barangToId($namabarang=""){
        $rows = $this->db->get_where('barang',array("nama_barang"=>$namabarang));
        if($rows->num_rows() == 0){
            $id = $this->db->insert('barang',array("nama_barang"=>$namabarang));
            return $this->db->insert_id();
        }
        else{
            $ret = $rows->row();
            return $ret->id;
        }
    }
    function addPOSupplier($data = array()){
        $po = $this->db->insert('po_supplier',$data);
        if($po){
            $id = $this->db->insert_id();
            return $id;
        }
        else
            return false;
    }
    function addInvoiceSupplier($data = array()){
        $po = $this->db->insert('invoice_supplier',$data);
        if($po){
            $id = $this->db->insert_id();
            return $id;
        }
        else
            return false;
    }
    function addPOCustomer($data = array()){
        $po = $this->db->insert('po_customer',$data);
        if($po){
            $id = $this->db->insert_id();
            return $id;
        }
        else
            return false;
    }
    function POSupplier($where=array()){
        $this->db->select('a.id,a.no_po,name_pic,nomor_pic,b.supplier_name,a.create_date,a.status,d.mata_uang');
        $this->db->from('po_supplier a');
        $this->db->join('supplier b','b.id = a.id_supplier');
        $this->db->join('supplier_pic c','c.id = a.id_pic and c.id_supplier = b.id','left');
        $this->db->join('currency d','d.id = b.id_currency');        
        if(count($where)>0)
            $this->db->where($where);
        return $this->db->get();
    }
    //coba
    function InvoiceSupplier($where=array()){
        $this->db->select('a.id,a.inv_supplier,d.supplier_name,b.no_po,name_pic,nomor_pic,a.create_date,a.status,e.mata_uang');
        $this->db->from('invoice_supplier a');
        $this->db->join('po_supplier b','b.id = a.no_po');
        $this->db->join('supplier_pic c','c.id = a.id_pic and c.id_supplier = d.id','left' );
        $this->db->join('supplier d','d.id = a.id_supplier');  
        $this->db->join('currency e','e.id = d.id_currency');      
        if(count($where)>0)
            $this->db->where($where);
        return $this->db->get();
    }
    //
    function POItemSupplier($where = array()){
        $this->db->select('*');
        $this->db->from('po_supplier_detail a');
        $this->db->join('barang b','b.id = a.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }
    function InvoiceItemSupplier($where = array()){
        $this->db->select('*');
        $this->db->from('invoice_supplier_detail a');
        $this->db->join('barang b','b.id = a.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }
    function POItemCustomer($where = array()){
        $this->db->select('*');
        $this->db->from('po_customer_detail a');
        $this->db->join('barang b','b.id = a.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }
    function POCustomer($where=array()){
        $this->db->select('a.id,a.no_po,name_pic,nomor_pic,b.customer_name,a.create_date,a.status,d.mata_uang');
        $this->db->from('po_customer a');
        $this->db->join('customer b','b.id = a.id_customer');
        $this->db->join('customer_pic c','c.id = a.id_pic and c.id_customer = b.id','left');
        $this->db->join('currency d','d.id = b.id_currency');        
        if(count($where)>0)
            $this->db->where($where);
        return $this->db->get();
    }
    function POSupplierUpdate($data=array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('po_supplier');
        return $ret;
    }
    ///
    function InvoiceSupplierUpdate($data=array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('invoice_supplier');
        return $ret;
    }
    //
    function POCustomerUpdate($data=array(),$where=array()){
        $this->db->set($data);
        $this->db->where($where);
        $ret = $this->db->update('po_customer');
        return $ret;
    }
    function addPOSupplier_detail($data=array()){
        $po = $this->db->insert('po_supplier_detail',$data);
        if($po)
            return true;
        else
            return false;
    }
    function addInvoiceSupplier_detail($data=array()){
        $invoice = $this->db->insert('invoice_supplier_detail',$data);
        if($invoice)
            return true;
        else
            return false;
    }
    function addPOCustomer_detail($data=array()){
        $po = $this->db->insert('po_customer_detail',$data);
        if($po)
            return true;
        else
            return false;
    }
    function barang(){
        $barang = $this->db->get('barang');
        return $barang;
    }
}