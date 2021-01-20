<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$link = explode('/', (isset($_SERVER['HTTPS'])?"https":"http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
if ($link[4] == 'admin'){
	$this->set_directory("Admin");
	$request = $this->uri->segment(2);
	if (!empty($request)) {
		$route['admin/'.$request.''] = str_replace('-', '_', $request);
	}
	$route['admin/(:any)/(:any)'] = '$1/$2';
	$route['admin/(:any)/(:any)/(:any)'] = '$1/$2/$3';
	$route['admin/logout'] = 'login/logout';
	$route['admin/profile'] = 'login/profile';
	$route['admin'] = 'dashboard';
	$route['default_controller'] = 'admin';
	$route['404_override'] = 'login/not_found';
	$route['translate_uri_dashes'] = FALSE;

} else if($link[4] == 'client'){
	$this->set_directory("Client");
	$request = $this->uri->segment(2);
	if (!empty($request)) {
		$route['client/'.$request.''] = str_replace('-', '_', $request);
	}
	$route['client/(:any)/(:any)'] = '$1/$2';
	$route['client/(:any)/(:any)/(:any)'] = '$1/$2/$3';
	$route['client/logout'] = 'login/logout';
	$route['client/profile'] = 'login/profile';
	$route['client'] = 'dashboard';
	$route['default_controller'] = 'client';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
} else if($link[4] == 'prospect'){
	$this->set_directory("Prospect");
	$request = $this->uri->segment(2);
	if (!empty($request)) {
		$route['prospect/'.$request.''] = str_replace('-', '_', $request);
	}
	$route['prospect/(:any)/(:any)'] = '$1/$2';
	$route['prospect/(:any)/(:any)/(:any)'] = '$1/$2/$3';
	$route['prospect/logout'] = 'login/logout';
	$route['prospect/profile'] = 'login/profile';
	$route['prospect'] = 'dashboard';
	$route['default_controller'] = 'prospect';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
} else if($link[4] == 'front'){
	$this->set_directory("Front");
	$request = $this->uri->segment(2);
	if (!empty($request)) {
		$route['front/'.$request.''] = str_replace('-', '_', $request);
	}
	$route['front/register/pay/(:any)/(:any)'] = 'register/pay/$1/$2';
	$route['front/(:any)'] = '$1/$2';
	$route['front/(:any)/(:any)'] = '$1/$2/$3';
	$route['front/(:any)/(:any)/(:num)'] = '$1/$2/$3/$4/$5';
	$route['default_controller'] = 'front';
	$route['404_override'] = 'register/not_found';
	$route['translate_uri_dashes'] = FALSE;
} 
?>