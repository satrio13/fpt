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
$route['default_controller'] = 'produk';
$route['produk'] = 'produk';
$route['produk/get_data_produk'] = 'produk/get_data_produk';
$route['produk/get_produk_by_id/(:num)'] = 'produk/get_produk_by_id/$1';
$route['produk/tambah-produk'] = 'produk/tambah-produk';
$route['produk/edit-produk'] = 'produk/edit-produk';
$route['produk/hapus-produk/(:num)'] = 'produk/hapus-produk/$1'; 
$route['produk/bisa-dijual'] = 'produk/bisa-dijual';
$route['produk/get_data_produk_bisa_dijual'] = 'produk/get_data_produk_bisa_dijual';

//API
$route['api/list-kategori']['GET'] = 'api/produk/list-kategori';
$route['api/list-status']['GET'] = 'api/produk/list-status';
$route['api/list-produk']['GET'] = 'api/produk/list-produk';
$route['api/listproduk']['GET'] = 'api/produk/listproduk';
$route['api/tambah-produk']['POST'] = 'api/produk/tambah-produk';
$route['api/edit-produk/(:num)']['PUT'] = 'api/produk/edit-produk/$1';
$route['api/hapus-produk/(:num)']['DELETE'] = 'api/produk/hapus-produk/$1';
$route['api/get_produk_by_id/(:num)']['GET'] = 'api/produk/get_produk_by_id/$1';
$route['api/list-produk-bisa-dijual']['GET'] = 'api/produk/list-produk-bisa-dijual';
$route['api/listproduk-bisa-dijual']['GET'] = 'api/produk/listproduk-bisa-dijual';
$route['api/get_kategori_by_id/(:num)']['GET'] = 'api/produk/get_kategori_by_id/$1';
$route['api/get_status_by_id/(:num)']['GET'] = 'api/produk/get_status_by_id/$1';

//FE
$route['produk-api'] = 'produk-api';
$route['produk-api/get_data_produk'] = 'produk-api/get_data_produk';
$route['produk-api/get_produk_by_id/(:num)'] = 'produk-api/get_produk_by_id/$1';
$route['produk-api/tambah-produk'] = 'produk-api/tambah-produk';
$route['produk-api/edit-produk'] = 'produk-api/edit-produk';
$route['produk-api/hapus-produk'] = 'produk-api/hapus-produk';
$route['produk-api/bisa-dijual'] = 'produk-api/bisa-dijual';
$route['produk-api/get_data_produk_bisa_dijual'] = 'produk-api/get_data_produk_bisa_dijual';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;