<?php

class DashboardController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('TemplateModel');
    }
    function index(){
        $this->TemplateModel->load('content/dashboard');
    }
}