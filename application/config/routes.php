<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route untuk halaman publik
$route['tentang'] = 'home/tentang';
$route['project'] = 'home/project';
$route['sertifikat'] = 'home/sertifikat';
$route['kontak'] = 'home/kontak';

// Route untuk admin
$route['admin'] = 'admin/dashboard';
$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';