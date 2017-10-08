<?php

class SettingController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('TemplateModel');
        $this->load->model('SettingModel');
        $this->load->model('NotifModel');
        $this->load->helper('url');
        $this->load->library('form_validation');
        
    }
    function currency(){
        $this->form_validation->set_rules('mata_uang', 'Mata Uang', 'required');        
        $this->form_validation->set_rules('symbol', 'symbol', 'required');        
        $this->form_validation->set_rules('value_idr', 'value', 'required');        
        if(!$this->form_validation->run()){
            $setting['currency'] = $this->SettingModel->GetCurrency();
            $this->TemplateModel->SetDataContent($setting);
            $this->TemplateModel->load('content/setting/currency');
        }
        else{
            $data = array(
                "mata_uang"=>$this->input->post('mata_uang'),
                "alias"=>$this->input->post('symbol'),
                "value_idr"=>$this->input->post('value_idr')
            );
            if($this->input->post('id_currency')!=null){
                $upd = $this->SettingModel->UpdateCurrency($data,$this->input->post('id_currency',true));
                             
            }
            else
               $upd = $this->SettingModel->SetCurrency($data);     
            if($upd)
                $this->NotifModel->set('success','Data berhasil di Update');
            else
                $this->NotifModel->set('error','Data gagal di Update');          
            redirect('setting/currency');
        }
    }
    function category(){
        $this->form_validation->set_rules('category', 'category', 'required');            
        if(!$this->form_validation->run()){
            $setting['category'] = $this->SettingModel->GetCategory();
            $this->TemplateModel->SetDataContent($setting);
            $this->TemplateModel->load('content/setting/category');
        }
        else{
            $data = array(
                "nama_category"=>$this->input->post('category',true),

            );
            if($this->input->post('id_category')!=null)
                $upd = $this->SettingModel->UpdateCategory($data,$this->input->post('id_category'));
            else
                $upd = $this->SettingModel->SetCategory($data);      
            if($upd)
                $this->NotifModel->set('success','Data berhasil di Update');
            else
                $this->NotifModel->set('error','Data gagal di Update');         
            redirect('setting/category');
        }
    }
    function id_po(){
        $this->form_validation->set_rules('ido', 'id po', 'required');            
        if(!$this->form_validation->run()){
            $setting['idpo'] = $this->SettingModel->GetPosupplier();
            $this->TemplateModel->SetDataContent($setting);
            $this->TemplateModel->load('content/setting/category');
        }
        else{
            $data = array(
                "nama_category"=>$this->input->post('category',true),

            );
            if($this->input->post('id_category')!=null)
                $upd = $this->SettingModel->UpdateCategory($data,$this->input->post('id_category'));
            else
                $upd = $this->SettingModel->SetCategory($data);      
            if($upd)
                $this->NotifModel->set('success','Data berhasil di Update');
            else
                $this->NotifModel->set('error','Data gagal di Update');         
            redirect('setting/category');
        }
    }
    function barang(){
        $this->form_validation->set_rules('nama_barang', 'barang', 'required');        
        $this->form_validation->set_rules('id_category', 'barang', 'required');   
        $this->form_validation->set_rules('satuan', 'satuan', 'required');                
        if(!$this->form_validation->run()){
            $setting['category'] = $this->SettingModel->GetCategory();
            $setting['barang'] = $this->SettingModel->GetBarang();
            
            $this->TemplateModel->SetDataContent($setting);
            $this->TemplateModel->load('content/setting/barang');
        }
        else{
            $data = array(
                "nama_barang"=>$this->input->post('nama_barang',true),
                "id_category"=>$this->input->post('id_category',true),
                "satuan"=>$this->input->post('satuan',true)                
            );
            if($this->input->post('id_barang')!=null)
                $upd = $this->SettingModel->UpdateBarang($data,$this->input->post('id_barang'));
            else
                $upd = $this->SettingModel->SetBarang($data); 
            if($upd)
                $this->NotifModel->set('success','Data berhasil di Update');
            else
                $this->NotifModel->set('error','Data gagal di Update');   
            redirect('setting/barang');
        }
    }
    function ajaxGetBarang($id=""){
        $data = array(
            "id_category"=>$id
        );
        $d = $this->SettingModel->GetBarang($data);
        $res = "";
        foreach($d->result() as $dt){
            $res .= "<option value=\"$dt->id\">$dt->nama_barang</option>";
        }
        echo $res;
    }
    function ajaxGetBarangPO($id=""){
        $data = array(
            "id_po"=>$id
        );
        $d = $this->SettingModel->GetBarangPO($data);
        $res = "";
        foreach($d->result() as $dt){
            $res .= "<option value=\"$dt->id\">$dt->nama_barang</option>";
        }
        echo $res;
    }
    
} 