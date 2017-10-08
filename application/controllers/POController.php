<?php

class POController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('TemplateModel');
        $this->load->model('SupplierModel');  
        $this->load->model('CustomerModel');        
        $this->load->model('SettingModel');        
              
        $this->load->model('POModel');     
        $this->load->library('form_validation');
        $this->load->helper('form_helper');        
        $this->load->helper('url');        
    }
    function index(){
        $this->TemplateModel->load('content/customer/POCustomer');
    }
    function add(){
        $this->form_validation->set_rules('customer', 'customer', 'required');        
        if(!$this->form_validation->run()){
            $data['customer'] = $this->CustomerModel->Customer()->result();
            $data['barang'] = $this->POModel->barang()->result();
            $data['category'] = $this->SettingModel->GetCategory();
    
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/customer/POAdd');        
        }
        else{
            $idcustomer = $this->input->post('customer');
            $idpic = $this->input->post('pic');    
            $no_po = $this->input->post('po');                        
            $barang = $this->input->post('barang');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');            
            $po = $this->POModel->addPOCustomer(array("no_po"=>$no_po,"id_customer"=>$idcustomer,"id_pic"=>$idpic));
            for($i = 0;$i<count($barang);$i++){
                $idbarang = $this->POModel->barangToId($barang[$i]);
                $this->POModel->addPOCustomer_detail(array("id_po"=>$po,"id_barang"=>$idbarang,"jumlah"=>$jumlah[$i],"harga"=>$harga[$i]));
            }
            
            redirect('customer/po');
        }
        
    }
    function supplierPO(){
        $this->form_validation->set_rules('idpo', 'id po', 'required');        
        if(!$this->form_validation->run()){
            $data['po'] = $this->POModel->POSupplier();
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/supplier/POSupplier');                
        }
        else{
            $id_po = $this->input->post('idpo',true);
            $status = $this->input->post('status',true);
            $update = $this->POModel->POSupplierUpdate(array("status"=>$status),array("id"=>$id_po));
            redirect('supplier/po');
        }

        
    }
    function supplierInvoice(){
        $this->form_validation->set_rules('idinv', 'id Invoice', 'required');        
        if(!$this->form_validation->run()){
            $data['invoice'] = $this->POModel->InvoiceSupplier();
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/supplier/InvoiceSupplier');                
        }
        else{
            $id_inv = $this->input->post('idinv',true);
            $status = $this->input->post('status',true);
            $update = $this->POModel->InvoiceSupplierUpdate(array("status"=>$status),array("id"=>$id_inv));
            redirect('supplier/invoice');
        }
    }
    function customerPO(){
        $this->form_validation->set_rules('idpo', 'id po', 'required');        
        if(!$this->form_validation->run()){
            $data['po'] = $this->POModel->POCustomer();
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/customer/POCustomer');                
        }
        else{
            $id_po = $this->input->post('idpo',true);
            $status = $this->input->post('status',true);
            $update = $this->POModel->POCustomerUpdate(array("status"=>$status),array("id"=>$id_po));
            redirect('customer/po');
        }       
    }
    function supplierAddPO(){
        $this->form_validation->set_rules('supplier', 'supplier', 'required');        
        if(!$this->form_validation->run()){
            $data['supplier'] = $this->SupplierModel->Supplier()->result();
            $data['barang'] = $this->POModel->barang()->result();
            $data['category'] = $this->SettingModel->GetCategory();        
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/supplier/POAddsupplier');
        }
        else{
            $idsupplier = $this->input->post('supplier');
            $idpic = $this->input->post('pic');    
            $no_po = $this->input->post('po');                        
            $barang = $this->input->post('barang');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');            
            $po = $this->POModel->addPOSupplier(array("no_po"=>$no_po,"id_supplier"=>$idsupplier,"id_pic"=>$idpic));
            for($i = 0;$i<count($barang);$i++){
                $idbarang = $this->POModel->barangToId($barang[$i]);
                $this->POModel->addPOSupplier_detail(array("id_po"=>$po,"id_barang"=>$idbarang,"jumlah"=>$jumlah[$i],"harga"=>$harga[$i]));
            }
            
            redirect('supplier/po');
        }
        
    }
    function supplierAddInvoice(){
        $this->form_validation->set_rules('supplier', 'supplier', 'required');        
        if(!$this->form_validation->run()){
            $data['supplier'] = $this->SupplierModel->Supplier()->result();
            $data['barang'] = $this->POModel->barang()->result();
            $data['category'] = $this->SettingModel->GetCategory();     
            $data['po'] = $this->POModel->POCustomer();   
            $this->TemplateModel->SetDataContent($data);
            $this->TemplateModel->load('content/supplier/InvoiceAddsupplier');
        }
        else{
            $idsupplier = $this->input->post('supplier');
            $idpic = $this->input->post('pic');    
            $inv_supplier = $this->input->post('invoice');                        
            $barang = $this->input->post('barang');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');            
            $po = $this->POModel->addInvoiceSupplier(array("inv_supplier"=>$inv_supplier,"id_supplier"=>$idsupplier,"id_pic"=>$idpic));
            for($i = 0;$i<count($barang);$i++){
                $idbarang = $this->POModel->barangToId($barang[$i]);
                $this->POModel->addInvoiceSupplier_detail(array("id_po"=>$po,"id_barang"=>$idbarang,"jumlah"=>$jumlah[$i],"harga"=>$harga[$i]));
            }
            
            redirect('supplier/invoice');
        }
        
    }
    function supplierDownloadPO($id_po=0){
        $dt = $this->POModel->POSupplier(array("a.id"=>$id_po))->row();
        $data['no_po'] = $dt->no_po;
        $data['supplier_name'] = $dt->supplier_name;
        $data['create_date'] = $dt->create_date;
        $data['name_pic'] = $dt->name_pic;
        $data['mata_uang'] = $dt->mata_uang;        
        $this->load->library('pdf');
        $data['barang'] = $this->POModel->POItemSupplier(array("a.id_po"=>$id_po));
        $this->pdf->load_view('content/download/po',$data);
        $this->pdf->render();
        $this->pdf->stream("$dt->no_po.pdf",array("Attachment" => false));
        // $this->pdf->stream("$dt->supplier_name.pdf");
    }
  
    function supplierDownloadInvoice($id_inv=0){
        $dt = $this->POModel->InvoiceSupplier(array("a.id"=>$id_inv))->row();
        $data['inv_supplier'] = $dt->inv_supplier;
        $data['no_po'] = $dt->no_po;
        $data['supplier_name'] = $dt->supplier_name;
        $data['create_date'] = $dt->create_date;
        $data['name_pic'] = $dt->name_pic;
        $data['mata_uang'] = $dt->mata_uang;        
        $this->load->library('pdf');
        $data['barang'] = $this->POModel->InvoiceItemSupplier(array("a.id"=>$id_inv));
        $this->pdf->load_view('content/download/invoice',$data);
        $this->pdf->render();
        $this->pdf->stream("$dt->inv_supplier.pdf",array("Attachment" => false));
        // $this->pdf->stream("$dt->supplier_name.pdf");
    }
    
    function supplierViewPO($id_po=0){
        $dt = $this->POModel->POSupplier(array("a.id"=>$id_po))->row();
        $data['no_po'] = $dt->no_po;
        $data['supplier_name'] = $dt->supplier_name;
        $data['create_date'] = $dt->create_date;
        $data['mata_uang'] = $dt->mata_uang;        
        $data['name_pic'] = $dt->name_pic;
        $data['barang'] = $this->POModel->POItemSupplier(array("a.id_po"=>$id_po));
        $this->load->view('content/download/po',$data);        
    }
    function customerDownloadPO($id_po=0){
        $dt = $this->POModel->POCustomer(array("a.id"=>$id_po))->row();
        $data['no_po'] = $dt->no_po;
        $data['customer_name'] = $dt->customer_name;
        $data['create_date'] = $dt->create_date;
        $data['name_pic'] = $dt->name_pic;
        $data['mata_uang'] = $dt->mata_uang;        
        $this->load->library('pdf');
        $data['barang'] = $this->POModel->POItemCustomer(array("a.id_po"=>$id_po));
        $this->pdf->load_view('content/download/pocustomer',$data);
        $this->pdf->render();
        $this->pdf->stream("$dt->no_po.pdf",array("Attachment" => false));
        // $this->pdf->stream("$dt->customer_name.pdf");
    }
    function customerViewPO($id_po=0){
        $dt = $this->POModel->POCustomer(array("a.id"=>$id_po))->row();
        $data['no_po'] = $dt->no_po;
        $data['customer_name'] = $dt->customer_name;
        $data['create_date'] = $dt->create_date;
        $data['mata_uang'] = $dt->mata_uang;        
        $data['name_pic'] = $dt->name_pic;
        $data['barang'] = $this->POModel->POItemCustomer(array("a.id_po"=>$id_po));
        $this->load->view('content/download/pocustomer',$data);        
    }
    
    
    
    
}
