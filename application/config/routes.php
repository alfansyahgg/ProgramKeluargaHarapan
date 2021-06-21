<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index']		= 'C_Index/index';
$route['login']		= 'C_Index/index';
$route['login/act'] = 'C_Index/login'; 
$route['login/logout'] = 'C_Index/logout'; 

$route['daftar'] = 'C_Daftar/index';
$route['daftar/action'] = 'C_Daftar/action';
$route['daftar/hasil'] = 'C_Daftar/hasil';

$route['dashboard/datadiri'] = 'C_Dashboard/datadiri';
$route['dashboard/datadiri/update'] = 'C_Dashboard/updateDataDiri';
$route['dashboard/about'] = 'C_Dashboard/about';

$route['dashboard/admin/(:any)'] = 'C_Dashboard/$1';

$route['PKH/input'] = 'C_PKH/index';
$route['PKH/hasil'] = 'C_PKH/hasil';
$route['PKH/inputDataPKH'] = 'C_PKH/inputDataPKH';

$route['PKH/editDataPkh'] = 'C_PKH/editDataPkh';
$route['PKH/editDataPkh/(:any)'] = 'C_PKH/editDataPkh/$1';

$route['PKH/updateDataPkh'] = 'C_PKH/updateDataPkh';

$route['PKH/cetak'] = 'C_PKH/cetakData';
$route['PKH/cetak/(:any)'] = 'C_PKH/cetakData/$1';

$route['PKH/admin/seleksi'] = 'C_PKH/seleksi';
$route['PKH/seleksi/detail'] = 'C_PKH/detailSeleksi';
$route['PKH/seleksi/formseleksi'] = 'C_PKH/inputSeleksi';



