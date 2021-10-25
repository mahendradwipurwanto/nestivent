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

// LOGIN
$route['agree-cookies'] 				= 'template/cookie_agrement';

$route['login']         				= 'authentication';
$route['logout']        				= 'authentication/logout';
// $route['daftar']        				= 'authentication/daftar';

$route['pendaftaran/pengguna']        	= 'authentication/daftar/1';
$route['pengajuan/penyelenggara']     	= 'authentication/daftar/2';


$route['pendaftaran']       			= 'authentication/daftar/1';
$route['pengajuan-penyelenggara']     	= 'authentication/daftar/2';

$route['aktivasi/(:any)']             	= 'authentication/aktivasi/$1';
$route['email-verification']          	= 'authentication/aktivasi_email';
$route['hold-verification']           	= 'authentication/waiting';

$route['lupa-password']               	= 'authentication/recovery';
$route['recovery-password/(:any)']    	= 'authentication/ubah_pass/$1';

$route['ubah-password']         		= 'authentication/ubah_password';

// END LOGIN

// ADMIN
$route['data-pengguna']               	= 'admin/data_pengguna';

$route['pengajuan-kpanel']            	= 'admin/pengajuan_kpanel';
$route['riwayat-pengajuan-kpanel']    	= 'admin/riwayat_kpanel';

$route['data-penyelenggara']    	  	= 'admin/data_penyelenggara';
$route['data-event']    	  			    = 'admin/data_event';
$route['data-kompetisi']    	  	  	= 'admin/data_kompetisi';


$route['pengaturan-admin']				      = 'admin/pengaturan';
$route['pengaturan-admin/akun-admin']	  = 'admin/pengaturan_akunAdmin';
$route['pengaturan-admin/sistem']		    = 'admin/pengaturan_sistem';
$route['pengaturan-admin/website']		  = 'admin/pengaturan_website';

$route['aktivitas-sistem']            	= 'admin/aktivitas';
$route['aktivitas-sistem/(:num)']     	= 'admin/aktivitas';
$route['notifikasi-sistem']           	= 'admin/notifikasi';
$route['notifikasi-sistem/(:num)']    	= 'admin/notifikasi';
// END ADMIN

// PENGGUNA

$route['pengguna/k-panel'] 				= 'pengguna/k_panel';


// END PENGGUNA

// K-PANEL

$route['dashboard-penyelenggara/init/(:any)']					    = 'handlers/init_kpanel/$1';
$route['akses-event/(:any)']					    = 'handlers/akses_event/$1';
$route['akses-kompetisi/(:any)']				  = 'handlers/akses_kompetisi/$1';

$route['dashboard-penyelenggara'] 								        = 'k_panel';
$route['dashboard-penyelenggara/notifikasi-k-panel']			= 'k_panel/notifikasi';
$route['dashboard-penyelenggara/aktivitas-k-panel']				= 'k_panel/aktivitas';

$route['dashboard-penyelenggara/pengaturan-k-panel']			= 'k_panel/pengaturan_umum';
$route['dashboard-penyelenggara/pengaturan-umum']				  = 'k_panel/pengaturan_umum';
$route['dashboard-penyelenggara/pengaturan-landing-page']		= 'k_panel/pengaturan_landing';
$route['dashboard-penyelenggara/pengaturan-kolabolator']		= 'k_panel/pengaturan_kolabolator';

$route['dashboard-penyelenggara/eventku']						    = 'k_panel/eventku';
$route['dashboard-penyelenggara/buat-event']					  = 'k_panel/buat_event';
$route['dashboard-penyelenggara/kompetisiku']					  = 'k_panel/kompetisiku';
$route['dashboard-penyelenggara/buat-kompetisi']				= 'k_panel/buat_kompetisi';

// END K-PANEL

// MANAGE EVENT
$route['manage-event']							= 'manage_event';
$route['manage-event/notifikasi-event']			= 'manage_event/notifikasi';
$route['manage-event/aktivitas-event']			= 'manage_event/aktivitas';

$route['manage-event/pengaturan']				= 'manage_event/pengaturan';
$route['manage-event/atur-pendaftaran']			= 'manage_event/atur_pendaftaran';
$route['manage-event/data-peserta']				= 'manage_event/data_peserta';
$route['manage-event/verifikasi-peserta']		= 'manage_event/verifikasi_berkas';

$route['manage-event/pengaturan-umum']			= 'manage_event/pengaturan_umum';

// END MANAGE EVENT

// MANAGE KOMPETISI
$route['manage-kompetisi']						= 'manage_kompetisi';
$route['manage-kompetisi/notifikasi-kompetisi']	= 'manage_kompetisi/notifikasi';
$route['manage-kompetisi/aktivitas-kompetisi']	= 'manage_kompetisi/aktivitas';

$route['manage-kompetisi/pengaturan']			= 'manage_kompetisi/pengaturan';
$route['manage-kompetisi/atur-pendaftaran']		= 'manage_kompetisi/atur_pendaftaran';
$route['manage-kompetisi/data-peserta']			= 'manage_kompetisi/data_peserta';
$route['manage-kompetisi/data-transaksi']			= 'manage_kompetisi/data_transaksi';
$route['manage-kompetisi/data-peserta/(:num)']			= 'manage_kompetisi/data_peserta/$1';
$route['manage-kompetisi/verifikasi-berkas']	= 'manage_kompetisi/verifikasi_berkas';
$route['manage-kompetisi/verifikasi-berkas/(:num)']	= 'manage_kompetisi/verifikasi_berkas/$1';
$route['manage-kompetisi/berkas-lomba']       = 'manage_kompetisi/berkas_lomba';

$route['manage-kompetisi/pengaturan-umum']		= 'manage_kompetisi/pengaturan_umum';

$route['manage-kompetisi/data-juri']						= 'manage_kompetisi/data_juri';
$route['manage-kompetisi/data-koordinator']     = 'manage_kompetisi/data_koordinator';
$route['manage-kompetisi/bidang-lomba']						= 'manage_kompetisi/bidang_lomba';
$route['manage-kompetisi/tahap-penilaian']					= 'manage_kompetisi/tahap_penilaian';
$route['manage-kompetisi/kriteria-penilaian']				= 'manage_kompetisi/kriteria_penilaian';
$route['manage-kompetisi/seleksi']			  	        = 'manage_kompetisi/seleksi';
$route['manage-kompetisi/kriteria-penilaian/(:num)/(:num)']	= 'manage_kompetisi/data_kriteria/$1/$2';
$route['manage-kompetisi/hasil-penilaian']					= 'manage_kompetisi/hasil_penilaian';
$route['manage-kompetisi/hasil-penilaian/(:num)/(:num)']					= 'manage_kompetisi/hasil_penilaian/$1/$2';

// END MANAGE KOMPETISI

// PENYELENGGARA
$route['penyelenggara/page/(:num)']  	= 'penyelenggara';
$route['penyelenggara/(:any)']  		= 'penyelenggara/penyelenggara_detail/$1';
$route['laporkan-penyelenggara']	   	= 'penyelenggara/laporkan_penyelenggara';
$route['kirim-pesan-penyelenggara']   	= 'penyelenggara/kirimPesan_penyelenggara';

// END PENYELENGGARA

// KOMPETISI
$route['kompetisi-list']        		= 'kompetisi/kompetisi_list';
$route['kompetisi/(:any)']      		= 'kompetisi/kompetisi_detail/$1';
$route['galeri-karya/(:any)']   		= 'kompetisi/galeri_karya/$1';

// END KOMPETISI

// EVENT
$route['event/(:any)']         	 		= 'event/event_detail/$1';

// END EVENT

// ETC

$route['daftar/(:any)']			                = 'pendaftaran/daftar/$1';
$route['daftar-kompetisi/(:any)']			      = 'pendaftaran/daftar_kompetisi/$1';
$route['detail-daftar/(:any)']	            = 'pengguna/detail_daftar/$1';
// NEW
$route['detail-daftar-event/(:any)']	    = 'pengguna/detail_daftar/$1';
$route['detail-daftar-kompetisi/(:any)']	= 'pengguna/detail_daftarKompetisi/$1';
$route['pengguna/data-anggota/(:any)']    = 'pengguna/anggota_kompetisi/$1';
$route['pengguna/berkas-kompetisi/(:any)']= 'pengguna/berkas_daftarKompetisi/$1';
$route['pengguna/pembayaran-kompetisi/(:any)']= 'pengguna/data_pembayaranKompetisi/$1';
$route['pengguna/data-karya/(:any)']      = 'pengguna/data_karya/$1';

$route['ajx-data-pts-all']                = 'pendaftaran/ajx_dataPtsAll'; 

// JURI
$route['juri/riwayat-penilaian']					= 'juri/riwayat_penilaian';
$route['juri/riwayat-penilaian/(:num)']		= 'juri/riwayat_penilaian/$1';

$route['juri/hasil-penilaian']					  = 'juri/hasil_penilaian';
$route['juri/hasil-penilaian/(:num)']			= 'juri/hasil_penilaian/$1';
// END ETC

// UTIL PAGE
$route['maintenance']   = 'utilities/maintenance';
$route['coming-soon']   = 'utilities/coming_soon';
$route['404-not-found'] = 'utilities/e_404';

$route['about-us']      = 'utilities/about';
$route['contact-us']    = 'utilities/contact';
$route['pusat-bantuan'] = 'utilities/bantuan';

$route['artikel/(:any)']= 'blog/artikel/$1';

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
$route['translate_uri_dashes'] = FALSE;
