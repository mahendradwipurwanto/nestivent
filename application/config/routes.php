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

// ADMIN
$route['data-pengguna']               = 'admin/data_pengguna';
$route['aktivitas-sistem']            = 'admin/aktivitas';
$route['aktivitas-sistem/(:num)']     = 'admin/aktivitas';
$route['notifikasi-sistem']           = 'admin/notifikasi';
$route['notifikasi-sistem/(:num)']    = 'admin/notifikasi';
// END ADMIN

// LOGIN
$route['agree-cookies'] = 'template/cookie_agrement';

$route['login']         = 'authentication';
$route['logout']        = 'authentication/logout';
$route['daftar']        = 'authentication/daftar';

$route['pendaftaran/pengguna']        = 'authentication/daftar/1';
$route['pendaftaran/penyelenggara']   = 'authentication/daftar/2';

$route['aktivasi/(:any)']             = 'authentication/aktivasi/$1';
$route['email-verification']          = 'authentication/aktivasi_email';
$route['hold-verification']           = 'authentication/waiting';

$route['lupa-password']               = 'authentication/recovery';
$route['recovery-password/(:any)']    = 'authentication/ubah_pass/$1';

$route['ubah-password']         = 'authentication/ubah_password';

// END LOGIN

// PENYELENGGARA
$route['penyelenggara/(:any)']  = 'penyelenggara/penyelenggara_detail/$1';

// END PENYELENGGARA

// KOMPETISI
$route['kompetisi-list']        = 'kompetisi/kompetisi_list';
$route['kompetisi/(:any)']      = 'kompetisi/kompetisi_detail/$1';
$route['galeri-karya/(:any)']   = 'kompetisi/galeri_karya/$1';

// END KOMPETISI

// EVENT
$route['event/(:any)']          = 'event/event_detail/$1';

// END EVENT

// UTIL PAGE
$route['maintenance']   = 'utilities/maintenance';
$route['coming-soon']   = 'utilities/coming_soon';
$route['404-not-found'] = 'utilities/e_404';

$route['about-us']      = 'utilities/about';
$route['contact-us']    = 'utilities/contact';
$route['pusat-bantuan'] = 'utilities/bantuan';

$route['pricing']       = 'utilities/package';

$route['careers']       = 'utilities/careers';
$route['careers/(:any)']= 'utilities/careers_detail/$1';
$route['hire-us']       = 'utilities/hireus';

$route['privacy-policy']  = 'utilities/privacy';
$route['term-of-service'] = 'utilities/term';

// END UTIL

// DEFAULT ROUTEs
$route['default_controller'] = 'home';
$route['404_override']       = 'utilities/e_404';
$route['translate_uri_dashes'] = TRUE;
