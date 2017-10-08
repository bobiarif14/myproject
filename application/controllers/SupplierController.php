<?php

class SupplierController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form_helper');
        $this->load->helper('form_helper');
        $this->load->library('form_validation');
        $this->load->model('TemplateModel');
        $this->load->model('SupplierModel');
        $this->load->model('SettingModel');

        
    }
    function index(){
        $konten['supplier'] = $this->SupplierModel->Supplier();                
        $this->TemplateModel->SetDataContent($konten);
        $this->TemplateModel->load('content/supplier/supplier');
    }
    function view($id){
        $supp = $this->SupplierModel->Supplier($id);
        if($supp->num_rows()==0)
            redirect('supplier');
        else{
            $data = $supp->row();
            $konten['nama'] = $data->supplier_name;
            $konten['alamat'] = $data->address;
            $konten['phone'] = $data->phone;
            $konten['daerah'] = $data->daerah;
            $konten['email'] = $data->email;
            $pic = $this->SupplierModel->SupplierPIC($data->id);
            $konten['pic'] = array();
            foreach($pic->result() as $res){
                $konten['pic']['email'][] = $res->email_pic;
                $konten['pic']['nama'][] = $res->name_pic;
                $konten['pic']['nomor'][] = $res->nomor_pic;                
                $konten['pic']['bagian'][] = $res->bagian_pic;
            }
            // var_dump($data);
            $this->TemplateModel->SetDataContent($konten);
            $this->TemplateModel->load('content/supplier/supplierview');    
        }
    }
    function edit($id){
        $this->form_validation->set_rules('nsupp', 'nsupp', 'required');        
        if(!$this->form_validation->run()){
            $supp = $this->SupplierModel->Supplier($id);
            if($supp->num_rows()==0)
                redirect('supplier'); 
            else{
                $data = $supp->row();
                $konten['nama'] = $data->supplier_name;
                $konten['alamat'] = $data->address;
                $konten['phone'] = $data->phone;
                $konten['daerah'] = $data->daerah;
                $konten['email'] = $data->email;
                $konten['currency'] = $data->id_currency;                
                $konten['urlform'] = "supplier/edit/$id";
                $pic = $this->SupplierModel->SupplierPIC($data->id);
                $konten['pic'] = $pic;            
                // var_dump($data);
                $konten['matauang'] = $this->SettingModel->GetCurrency();
                $this->TemplateModel->SetDataContent($konten);
                $this->TemplateModel->load('content/supplier/supplieredit');        
            }
        }
        else{
            $supplier = array(
                "supplier_name"=>$this->input->post('nsupp'),
                "id_currency"=>$this->input->post('mata_uang'),
                "phone"=>$this->input->post('psupp'),
                "address"=>$this->input->post('asupp'),
                "daerah"=>$this->input->post('dsupp'),
                "email"=>$this->input->post('esupp')                
            );
            for($i = 0; $i < count($this->input->post('npic')); $i++){
                $email = $this->input->post('epic');                   
                $npic = $this->input->post('npic');
                $pic = $this->input->post('pic');
                $bpic = $this->input->post('bpic');  
                if(($email[$i] && $npic[$i] && $pic[$i] && $bpic[$i])!=""){
                    $supplier_pic = array(
                        "id_supplier"=>$id,
                        "email_pic"=>$email[$i],
                        "name_pic"=>$npic[$i],                    
                        "nomor_pic"=>$pic[$i],
                        "bagian_pic"=>$bpic[$i]
                    );
                    $this->SupplierModel->AddPIC($supplier_pic);  
                }              
            }
            for($i = 0; $i < count($this->input->post('nxpic')); $i++){
                $email = $this->input->post('expic');                    
                $npic = $this->input->post('nxpic');
                $pic = $this->input->post('xpic');
                $idpic = $this->input->post('idxpic');
                $bpic = $this->input->post('bxpic');
                $supplier_pic = array(
                    "email_pic"=>$email[$i],
                    "name_pic"=>$npic[$i],                    
                    "nomor_pic"=>$pic[$i],
                    "bagian_pic"=>$bpic[$i]
                );
                $where = array(
                    "id_supplier"=>$id,
                    "id"=>$idpic[$i]
                );
                $this->SupplierModel->UpdatePIC($supplier_pic,$where);
            }
            $supp = $this->SupplierModel->Update($supplier,$id);
            redirect('supplier');
        }
    }    
    function getPicAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->SupplierModel->SupplierPIC($id);
        $pic = "";
        foreach($gpic->result() as $i){
            $pic .= "<option value=\"$i->id\">$i->name_pic</option>";            
        }
        echo $pic;
    }
    function delPicAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->SupplierModel->delPIC(array("status"=>0),array("id"=>$id));
        if($gpic)
        echo "ok";
        else
        echo "error";
    }
    function add(){
        $this->form_validation->set_rules('nsupp', 'nsupp', 'required');        
        if (!$this->form_validation->run()){            
            $konten['matauang'] = $this->SettingModel->GetCurrency();
            $this->TemplateModel->SetDataContent($konten);            
            $this->TemplateModel->load('content/supplier/supplieradd');        
        }
        else{
            $supplier = array(
                "supplier_name"=>$this->input->post('nsupp'),
                "id_currency"=>$this->input->post('mata_uang'),
                "phone"=>$this->input->post('psupp'),
                "daerah"=>$this->input->post('dsupp'),
                "address"=>$this->input->post('asupp'),
                "email"=>$this->input->post('esupp')                
            );
            $add = $this->SupplierModel->Add($supplier);
            if($add){
                for($i = 0; $i < count($this->input->post('npic')); $i++){
                $email = $this->input->post('epic');
                $npic = $this->input->post('npic');
                $pic = $this->input->post('pic');
                $bpic = $this->input->post('bpic');
                $supplier_pic = array(
                    "id_supplier"=>$add,
                    "email_pic"=>$email[$i],
                    "name_pic"=>$npic[$i],                    
                    "nomor_pic"=>$pic[$i],
                    "bagian_pic"=>$bpic[$i]
                );
                $this->SupplierModel->AddPIC($supplier_pic);
                }
            }
            redirect('supplier');        
        }
    }
}