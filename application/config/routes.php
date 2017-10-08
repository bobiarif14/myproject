<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'DashboardController';

$route['dashboard'] = 'DashboardController';
$route['customer'] = 'CustomerController';
$route['customer/add'] = 'CustomerController/add';
$route['customer/view/(:num)'] = 'CustomerController/view/$1';
$route['customer/edit/(:num)'] = 'CustomerController/edit/$1';
$route['customer/po'] = 'POController/customerPO';
$route['customer/po/add'] = 'POController/add';
$route['customer/po/(:num)/download'] = 'POController/customerDownloadPO/$1';
$route['customer/po/(:num)'] = 'POController/customerViewPO/$1';
$route['customer/sj'] = 'CustomerController/suratJalan';
$route['customer/sj/(:num)/download'] = 'CustomerController/suratJalanDownload/$1';
$route['customer/sj/add'] = 'CustomerController/suratJalanAdd';


$route['login'] = 'LoginController';
$route['logout'] = 'LoginController/logout';



$route['supplier'] = 'SupplierController';
$route['supplier/add'] = 'SupplierController/add';
$route['supplier/view/(:num)'] = 'SupplierController/view/$1';
$route['supplier/edit/(:num)'] = 'SupplierController/edit/$1';
$route['supplier/po/add'] = 'POController/supplierAddPO';
$route['supplier/po/add_invoice'] = 'POController/supplierAddInvoice';
$route['supplier/po'] = 'POController/supplierPO';
$route['supplier/invoice'] = 'POController/supplierInvoice';//ini buatan gua bro
$route['supplier/po/(:num)/download'] = 'POController/supplierDownloadPO/$1';
$route['supplier/invoice/(:num)/download'] = 'POController/supplierDownloadInvoice/$1';
$route['supplier/po/(:num)'] = 'POController/supplierViewPO/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['setting/currency'] = "SettingController/currency";
$route['setting/category'] = "SettingController/category";
$route['setting/barang'] = "SettingController/barang";



// ajax
$route['ajax/pic/customer/delete/(:any)'] = "CustomerController/delPicAjax/$1";
$route['ajax/pic/supplier/delete/(:any)'] = "SupplierController/delPicAjax/$1";
$route['ajax/pic/supplier/(:any)'] = "SupplierController/getPicAjax/$1";
$route['ajax/pic/customer/(:any)'] = "CustomerController/getPicAjax/$1";
$route['ajax/po/customer/(:any)'] = "CustomerController/getPOAjax/$1";
$route['ajax/po/(:any)'] = "CustomerController/getPODetailAjax/$1";
$route['ajax/barang/(:any)'] = "SettingController/ajaxGetBarang/$1";

$route['ajax/barangPO/(:any)'] = "SettingController/ajaxGetBarang/$1";

//$route['ajax/gantipo/(:any)'] = "SettingController/ajaxGetPO/$1";

$route['tes'] = "CustomerController/tes";
