<?php

class CustomerController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form_helper');
        $this->load->library('form_validation');
        $this->load->model('TemplateModel');
        $this->load->model('CustomerModel');
        $this->load->model('SettingModel');
        
        
    }
    function index(){
        $konten['customer'] = $this->CustomerModel->Customer();                
        $this->TemplateModel->SetDataContent($konten);
        $this->TemplateModel->load('content/customer/customer');
    }
    function view($id){
        $cust = $this->CustomerModel->Customer($id);
        if($cust->num_rows()==0)
            redirect('customer');
        else{
            $data = $cust->row();
            $konten['nama'] = $data->customer_name;
            $konten['alamat'] = $data->address;
            $konten['phone'] = $data->phone;
            $konten['daerah'] = $data->daerah;
            $konten['email'] = $data->email;
            $pic = $this->CustomerModel->CustomerPIC($data->id);
            $konten['pic'] = array();
            foreach($pic->result() as $res){
                $konten['pic']['email'][] = $res->email_pic;
                $konten['pic']['nama'][] = $res->name_pic;
                $konten['pic']['nomor'][] = $res->nomor_pic;          
                $konten['pic']['bagian'][] = $res->bagian_pic;
            }
            // var_dump($data);
            $this->TemplateModel->SetDataContent($konten);
            $this->TemplateModel->load('content/customer/customerview');        
        }
    }
    function getPicAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->CustomerModel->CustomerPIC($id);
        $pic = "";
        foreach($gpic->result() as $i){
            $pic .= "<option value=\"$i->id\">$i->name_pic</option>";            
        }
        echo $pic;
    }
    function getPOAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->CustomerModel->CustomerPO($id);
        $pic = "";
        foreach($gpic->result() as $i){
            $pic .= "<option value=\"$i->id\">$i->no_po</option>";            
        }
        echo $pic;
    }
    function getPODetailAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->CustomerModel->CustomerPODetail(array("id_po"=>$id));
        $pic = "";
        foreach($gpic->result() as $i){
            $pic .= "<option id=\"total$i->id_po_detail\" value=\"$i->id_po_detail\" jumlah=\"$i->jumlah\">$i->nama_barang</option>";            
        }
        echo $pic;
    }
    function delPicAjax($id=""){
        if($id=="")
            echo "";
        $gpic = $this->CustomerModel->delPIC(array("status"=>0),array("id"=>$id));
        if($gpic)
            echo "ok";
        else
            echo "error";
    }
    function edit($id){
        $this->form_validation->set_rules('ncust', 'ncust', 'required');        
        if(!$this->form_validation->run()){
            $cust = $this->CustomerModel->Customer($id);
            if($cust->num_rows()==0)
                redirect('customer'); 
            else{
                $data = $cust->row();
                $konten['nama'] = $data->customer_name;
                $konten['alamat'] = $data->address;
                $konten['phone'] = $data->phone;
                $konten['daerah'] = $data->daerah;
                $konten['email'] = $data->email;
                $konten['currency'] = $data->id_currency;                
                $konten['urlform'] = "customer/edit/$id";
                $pic = $this->CustomerModel->CustomerPIC($data->id);
                $konten['pic'] = $pic;            
                // var_dump($data);
                $konten['matauang'] = $this->SettingModel->GetCurrency();
                $this->TemplateModel->SetDataContent($konten);
                $this->TemplateModel->load('content/customer/customeredit');        
            }
        }
        else{
            $customer = array(
                "customer_name"=>$this->input->post('ncust'),
                "phone"=>$this->input->post('pcust'),
                "daerah"=>$this->input->post('dcust'),
                "address"=>$this->input->post('acust'),
                "id_currency"=>$this->input->post('mata_uang'),
                "email"=>$this->input->post('ecust')                
            );
            for($i = 0; $i < count($this->input->post('npic')); $i++){
                $email = $this->input->post('epic');                   
                $npic = $this->input->post('npic');
                $pic = $this->input->post('pic');
                $bpic = $this->input->post('bpic');                
                if(($email[$i] && $npic[$i] && $pic[$i])!=""){
                    $customer_pic = array(
                        "id_customer"=>$id,
                        "email_pic"=>$email[$i],
                        "name_pic"=>$npic[$i],                    
                        "nomor_pic"=>$pic[$i],        
                        "bagian_pic"=>$bpic[$i]
                    );
                    $this->CustomerModel->AddPIC($customer_pic);  
                }              
            }
            for($i = 0; $i < count($this->input->post('nxpic')); $i++){
                $email = $this->input->post('expic');                    
                $npic = $this->input->post('nxpic');
                $pic = $this->input->post('xpic');
                $bpic = $this->input->post('bxpic');
                $idpic = $this->input->post('idxpic');
                $customer_pic = array(
                    "email_pic"=>$email[$i],
                    "name_pic"=>$npic[$i],                    
                    "nomor_pic"=>$pic[$i],
                    "bagian_pic"=>$bpic[$i]
                );
                $where = array(
                    "id_customer"=>$id,
                    "id"=>$idpic[$i]
                );
                $this->CustomerModel->UpdatePIC($customer_pic,$where);
            }
            $cust = $this->CustomerModel->Update($customer,$id);
            redirect('customer');
        }
    }
    function suratJalan(){
        $konten['sj'] = $this->CustomerModel->getSuratJalan();
        echo $this->db->last_query();
        $this->TemplateModel->SetDataContent($konten);            
        $this->TemplateModel->load('content/customer/suratjalan');        
    }
    function suratJalanDownload($id=0){
        $dt = $this->CustomerModel->suratJalanDetail(array("a.id"=>$id));
        $data['create_date'] =$dt->row()->create_date;
        $data['customer_name'] =$dt->row()->customer_name;
        $data['delivery_no'] =$dt->row()->delivery_no;
        $data['barang'] = $dt;
        $this->load->library('pdf');
        $this->pdf->load_view('content/download/suratjalan',$data);
        $this->pdf->render();
        $this->pdf->stream("download.pdf",array("Attachment" => false));
    }
    function suratJalanAdd(){
        $this->form_validation->set_rules('customer','id customer','required');
        if(!$this->form_validation->run()){
            $konten['sj'] = $this->CustomerModel->getSuratJalan();
            $konten['customer'] = $this->CustomerModel->Customer()->result();        
            $this->TemplateModel->SetDataContent($konten);            
            $this->TemplateModel->load('content/customer/suratjalanadd');        
        }
        else{
            $id_cust = $this->input->post('customer',true);
            $sjno = $this->CustomerModel->getDeliveryNo();
            $deliv = array(
                "delivery_no"=>$sjno,
                "id_customer"=>$id_cust
            );
            $d = $this->CustomerModel->addDelivery($deliv);
            if($d){
                for($i = 0; $i < count($this->input->post('barang')); $i++){
                    $id_barang = $this->input->post('barang',true);
                    $qty = $this->input->post('qtykirim',true);    
                    $note = $this->input->post('note',true);
                    $deliv2 = array(
                        "id_delivery"=>$d,
                        "id_po_detail"=>$id_barang[$i],
                        "note"=>$note[$i],
                        "qty_kirim"=>$qty[$i]
                    );
                    $this->CustomerModel->addDeliveryDetail($deliv2);
                }
            }
        }
    }
    function add(){
        $this->form_validation->set_rules('ncust', 'ncust', 'required');        
        if (!$this->form_validation->run()){
            $konten['matauang'] = $this->SettingModel->GetCurrency();
            $this->TemplateModel->SetDataContent($konten);            
            $this->TemplateModel->load('content/customer/customeradd');        
        }
        else{
            $customer = array(
                "customer_name"=>$this->input->post('ncust'),
                "id_currency"=>$this->input->post('curcust'),
                "phone"=>$this->input->post('pcust'),
                "daerah"=>$this->input->post('dcust'),
                "address"=>$this->input->post('acust'),
                "marketer"=>$this->input->post('mcust'),
                "kategori_customer"=>$this->input->post('kcust'),
                "tipe_customer"=>$this->input->post('tcust'),                
                "email"=>$this->input->post('ecust')                
            );
            $add = $this->CustomerModel->Add($customer);
            if($add){
                for($i = 0; $i < count($this->input->post('npic')); $i++){
                $email = $this->input->post('epic');
                $npic = $this->input->post('npic');
                $pic = $this->input->post('pic');
                $bpic = $this->input->post('bpic');
                $customer_pic = array(
                    "id_customer"=>$add,
                    "email_pic"=>$email[$i],
                    "name_pic"=>$npic[$i],                    
                    "nomor_pic"=>$pic[$i],
                    "bagian_pic"=>$pic[$i]
                );
                $this->CustomerModel->AddPIC($customer_pic);                
                }
            }
            redirect('customer');            
        }
    }
    function tes(){
        echo $this->CustomerModel->addDelivery();
    }
}