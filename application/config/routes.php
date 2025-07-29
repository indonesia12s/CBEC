<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['siswa/dashboard'] = 'siswa/dashboard';
$route['pengajar/dashboard'] = 'pengajar/dashboard';
$route['jadwal/edit/(:num)'] = 'jadwal/edit/$1';
$route['jadwal/update/(:num)'] = 'jadwal/update/$1';

// Pastikan ini paling akhir
$route['presensi/lihat/(:num)'] = 'presensi/lihat/$1';
$route['presensi/input/(:num)'] = 'presensi/input/$1';
$route['presensi/edit/(:num)'] = 'presensi/edit/$1';

$route['presensi/rekap'] = 'presensi/rekap';

$route['presensi/cetak_pdf'] = 'presensi/cetak_pdf';
$route['presensi/export_excel'] = 'presensi/export_excel';
$route['siswa/presensi'] = 'presensi/siswa_presensi';
