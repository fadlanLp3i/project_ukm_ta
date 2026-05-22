<?php
// RUTE KHUSUS PENGURUS UKM (Ketua, Sekertaris, Bendahara)
// URL Contoh: /manage/dashboard/5

// --- RUTE PUBLIK (Bisa diakses tanpa login/sebelum login) ---
// $routes->get('/', 'AuthController::index');
// $routes->get('/login', 'AuthController::index');
// $routes->post('/login/process', 'AuthController::login');
// $routes->get('/logout', 'AuthController::logout');

// --- RUTE KHUSUS ADMIN (PEMBINA BEM) ---
// $routes->group('admin', ['filter' => 'role:admin'], function($routes) {
// $routes->get('pembina', 'Pembina\Home::index'); // Dashboard Utama

// Kelola User
// $routes->get('pembina/user', 'Pembina\UserController::index');
// $routes->get('pembina/user/create', 'Pembina\UserController::create');
// $routes->post('pembina/user/store', 'Pembina\UserController::store');
// $routes->get('pembina/user/edit/(:num)', 'Pembina\UserController::edit/$1');
// $routes->match(['post', 'put'], 'pembina/user/update/(:num)', 'Pembina\UserController::update/$1');
// $routes->get('pembina/user/delete/(:num)', 'Pembina\UserController::delete/$1');
// $routes->get('user/create', 'Admin\UserController::create');
// $routes->post('user/store', 'Admin\UserController::store');
// $routes->get('user/edit/(:num)', 'Admin\UserController::edit/$1');
// $routes->post('user/update/(:num)', 'Admin\UserController::update/$1');
// $routes->get('user/delete/(:num)', 'Admin\UserController::delete/$1');

//     // Kelola UKM (Pindahkan rute /ukm ke sini agar aman)
//     $routes->get('ukm', 'UkmController::index');
//     $routes->get('ukm/create', 'UkmController::create');
//     $routes->post('ukm/store', 'UkmController::store');
//     $routes->get('ukm/edit/(:num)', 'UkmController::edit/$1');
//     $routes->post('ukm/update/(:num)', 'UkmController::update/$1');
//     $routes->get('ukm/delete/(:num)', 'UkmController::delete/$1');

//     // Kelola Periode (Contoh tambahan)
//     $routes->get('periode', 'PeriodeController::index');

//     // Kelola Pengurus (Menghubungkan User ke UKM)
//     $routes->get('pengurus', 'PengurusController::index');
//     $routes->post('pengurus/store', 'PengurusController::store');
// });

// // --- RUTE KHUSUS PENGURUS UKM ---
// $routes->group('manage', ['filter' => 'role:ketua,sekretaris,bendahara'], function($routes) {
//     $routes->get('dashboard/(:num)', 'UkmController::index/$1');
//     $routes->get('laporan/(:num)', 'LaporanController::report/$1');
//     $routes->post('update-proker/(:num)', 'UkmController::update/$1');
//     $routes->get('getdatauser', 'AuthController::getdatauser'); // Rute yang kita tes tadi
// });

// // --- RUTE PESERTA ---
// $routes->group('user', ['filter' => 'role:peserta'], function($routes) {
//     $routes->get('profile', 'UserController::profile');
//     $routes->get('daftar-ukm', 'UserController::list_ukm');
// });




//OLD//

// $routes->group('manage', ['filter' => 'role:ketua,sekretaris,bendahara'], function($routes) {
//     $routes->get('dashboard/(:num)', 'UkmController::index/$1');
//     $routes->get('laporan/(:num)', 'LaporanController::report/$1');
//     $routes->post('update-proker/(:num)', 'UkmController::update/$1');
// });

// // RUTE ADMIN (Bisa akses semua)
// $routes->group('admin', ['filter' => 'role:admin'], function($routes) {
//     $routes->get('dashboard', 'AdminController::index');
//     $routes->get('users', 'AdminController::user_list');
//     $routes->get('ukm-all', 'AdminController::ukm_list');
// });

// // RUTE PESERTA / USER UMUM (Tanpa terikat ID UKM spesifik di session)
// $routes->group('user', ['filter' => 'role:peserta'], function($routes) {
//     $routes->get('profile', 'UserController::profile');
//     $routes->get('daftar-ukm', 'UserController::list_ukm');
// });     
// // $routes->get('/ukm', 'UkmController::index');
// // $routes->get('/ukm/lcc', 'UkmController::lcc');
// // $routes->get('/ukm/lac', 'UkmController::lac');
// // $routes->get('/ukm/seal', 'UkmController::seal');
// // $routes->get('/ukm/kamil', 'UkmController::kamil');

// // //PEMBINA BEM
// $routes->get('/login', 'AuthController::index');
// $routes->post('/login/process', 'AuthController::login');
// $routes->get('/logout', 'AuthController::logout');


// // $routes->get('/pembina', 'Home::index');

// // $routes->get('/pembina/ukm', 'UkmController::index');
// // $routes->get('/pembina/ukm/create', 'PembinaController::createUkm');
// // $routes->post('/pembina/ukm/store', 'PembinaController::storeUkm');
// // $routes->get('/pembina/ukm/edit/(:num)', 'PembinaController::editUkm/$1');
// // $routes->post('/pembina/ukm/update/(:num)', 'PembinaController::updateUkm/$1');
// // $routes->get('/pembina/ukm/delete/(:num)', 'PembinaController::deleteUkm/$1');

// $routes->get('/pembina', 'PembinaController::index');

// // CRUD UKM
// $routes->get('/ukm', 'UkmController::index');
// $routes->get('/ukm/create', 'UkmController::create');
// $routes->post('/ukm/store', 'UkmController::store');
// $routes->get('/ukm/edit/(:num)', 'UkmController::edit/$1');
// $routes->post('/ukm/update/(:num)', 'UkmController::update/$1');
// $routes->get('/ukm/delete/(:num)', 'UkmController::delete/$1');


// --- RUTE PUBLIK (Authentication) ---
// Route untuk menampilkan halaman login
$routes->get('/', 'AuthController::index');
$routes->get('login', 'AuthController::index');

// Route untuk memproses form login
$routes->post('login/auth', 'AuthController::auth');

// Route untuk logout
$routes->get('logout', 'AuthController::logout');

// --- RUTE PEMBINA (ADMIN) ---
$routes->group('pembina', ['filter' => 'role:pembina'], function ($routes) {
    // USERS
    $routes->get('user', 'UserController::index');
    $routes->get('user/create', 'UserController::create');
    $routes->post('user/store', 'UserController::store');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::update/$1');
    $routes->get('user/delete/(:num)', 'UserController::delete/$1');

    // PERIODE
    $routes->get('periode', 'PeriodeController::index');
    $routes->get('periode/create', 'PeriodeController::create');
    $routes->post('periode/store', 'PeriodeController::store');
    $routes->get('periode/edit/(:num)', 'PeriodeController::edit/$1');
    $routes->post('periode/update/(:num)', 'PeriodeController::update/$1');
    $routes->get('periode/delete/(:num)', 'PeriodeController::delete/$1');


    // UKM
    $routes->get('ukm', 'UkmController::index');
    $routes->get('ukm/create', 'UkmController::create');
    $routes->post('ukm/save', 'UkmController::save');
    $routes->post('ukm/store', 'UkmController::store');
    $routes->get('ukm/edit/(:num)', 'UkmController::edit/$1');
    $routes->post('ukm/update/(:num)', 'UkmController::update/$1');
    $routes->get('ukm/delete/(:num)', 'UkmController::delete/$1');

    $routes->get('dokumen', 'LaporanDokumenController::index');

    // app/Config/Routes.php
});

// --- RUTE PENGURUS (KETUA/SEKRETARIS/BENDAHARA) ---
$routes->group('sekretaris', ['filter' => 'role:sekretaris'], function ($routes) {
    // Peserta CRUD
    $routes->get('peserta', 'PesertaController::index');
    $routes->get('peserta/create', 'PesertaController::create');
    $routes->post('peserta/save', 'PesertaController::save');
    $routes->get('peserta/edit/(:num)', 'PesertaController::edit/$1');
    $routes->post('peserta/update/(:num)', 'PesertaController::update/$1');
    $routes->post('peserta/delete/(:num)', 'PesertaController::delete/$1');

    // Pengajar CRUD
    $routes->get('pengajar', 'PengajarController::index');
    $routes->get('pengajar/create', 'PengajarController::create');
    $routes->post('pengajar/save', 'PengajarController::save');
    $routes->get('pengajar/edit/(:num)', 'PengajarController::edit/$1');
    $routes->post('pengajar/update/(:num)', 'PengajarController::update/$1');
    $routes->post('pengajar/delete/(:num)', 'PengajarController::delete/$1');


    // Registrasi Routes
    $routes->get('registrasi', 'RegistrasiController::index');
    $routes->get('registrasi/create', 'RegistrasiController::create');
    $routes->post('registrasi/save', 'RegistrasiController::save');
    $routes->get('registrasi/edit/(:num)', 'RegistrasiController::edit/$1');
    $routes->post('registrasi/update/(:num)', 'RegistrasiController::update/$1');
    $routes->post('registrasi/delete/(:num)', 'RegistrasiController::delete/$1');

    //Jadwal Routes
    $routes->get('jadwal', 'JadwalController::index');
    $routes->get('jadwal/create', 'JadwalController::create');
    $routes->post('jadwal/save', 'JadwalController::save');
    $routes->get('jadwal/edit/(:num)', 'JadwalController::edit/$1');
    $routes->post('jadwal/update/(:num)', 'JadwalController::update/$1');
    $routes->post('jadwal/delete/(:num)', 'JadwalController::delete/$1'); // diubah ke POST sesuai form template-mu

    //Routes Dokumen
    $routes->get('dokumen', 'DokumenController::index');
    $routes->get('dokumen/create', 'DokumenController::create');
    $routes->post('dokumen/save', 'DokumenController::save');
    $routes->get('dokumen/edit/(:num)', 'DokumenController::edit/$1');
    $routes->post('dokumen/update/(:num)', 'DokumenController::update/$1');
    $routes->post('dokumen/delete/(:num)', 'DokumenController::delete/$1');

    // Other routes
    $routes->get('pelatihan', 'PelatihanController::index');
    $routes->get('laporankeuangan', 'LaporanKeuanganController::index');
    $routes->get('laporankegiatan', 'LaporanKegiatanController::index');
});

$routes->group('ketua', ['filter' => 'role:ketua'], function ($routes) {
    // Routes untuk Pelatihan CRUD
    $routes->get('pelatihan', 'PelatihanController::index');
    $routes->post('pelatihan/store', 'PelatihanController::store');
    $routes->post('pelatihan/update/(:num)', 'PelatihanController::update/$1');
    $routes->get('pelatihan/delete/(:num)', 'PelatihanController::delete/$1');
    $routes->get('dashboard', 'DashboardController::index');


    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::update/$1');
    $routes->get('user/delete/(:num)', 'UserController::delete/$1');

    // Contoh tambahan: Laporan Data Peserta
    $routes->get('laporan/datapeserta', 'LaporanDataPesertaController::index');
    $routes->get('laporan/datapeserta/export', 'LaporanDataPesertaController::export');
    $routes->get('laporan/datapeserta/print', 'LaporanDataPesertaController::print');

    $routes->get('dokumen', 'LaporanDokumenController::index');
});


// --- RUTE PENGAJAR & PESERTA ---
$routes->get('kegiatan', 'KegiatanController::index', ['filter' => 'role:pengajar']);
$routes->get('laporanpembayaran', 'PembayaranController::index', ['filter' => 'role:peserta']);

$routes->group('', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// // penerapan filter pada route User, Periode, Ukm agar hanya pembina  yang sudah login yang bisa masuk
// $routes->get('user', 'Dashboard::index');
// $routes->get('periode', 'Dashboard::index');
// $routes->get('ukm', 'Dashboard::index'
// , ['filter' => 'role:pembina']);

// // penerapan filter pada route data peserta, dokumen, jadwal, kegiatan agar hanya sekretaris yang bisa masuk
// $routes->get('peserta', 'Dashboard::index');
// $routes->get('dokumen', 'Dashboard::index');
// $routes->get('jadwal', 'Dashboard::index');
// $routes->get('pengajar', 'Dashboard::index'
// ,['filter' => 'role:sekretaris']);

// //penerapan filter pada route kegiatan agar hanya pengajar yang bisa masuk
// $routes->get('pembayaran', 'Dashboard::index',
// ['filter' => 'role:bendahara']);

// //penerapan filter pada route  kegiatan agar hanya pengajar yang bisa masuk
// $routes->get('kegiatan', 'Dashboard::index',
// ['filter' => 'role:pengajar']);

// //penerapan filter pada route  pelatihan, lporan data peserta agar hanya ketua yang bisa masuk
// $routes->get('pelatihan', 'Dashboard::index');
// $routes->get('LaporanDataPeserta', 'Dashboard::index',
// ['filter' => 'role:ketua']);

// //penerapan filter pada route laporan data dokumen agar hanya pembina dan ketua yang bisa masuk
// $routes->get('laporan/dokumen', 'Dashboard::index',
// ['filter' => 'role:pembina,ketua']);

// //penerapan filter pada route laporan data keuangan agar hanya sekretaris dan ketua yang bisa masuk
// $routes->get('laporankeuangan', 'Dashboard::index',
// ['filter' => 'role:sekretaris,ketua']);

// //penerapan filter pada route laporan data kegiatan agar hanya bendahara,sekretaris dan ketua yang bisa masuk
// $routes->get('laporankegiatan', 'Dashboard::index',
// ['filter' => 'role:bendahara,ketua']);

// //penerapan filter pada route laporan data pembayaran agar hanya peserta yang bisa masuk
// $routes->get('laporanpembayaran', 'Dashboard::index',
// ['filter' => 'role:peserta']);





$routes->get('dev/test-auth', 'TestAuth::testAuth');
