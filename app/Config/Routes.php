<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomePetugas');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// routes for petugas
// $routes->get('/', 'Petugas\HomePetugas::index');
$routes->get('/home', 'Petugas\HomePetugas::index');
$routes->post('/save_d', 'Petugas\HomePetugas::save');
$routes->get('/petugasuser', 'Petugas\UserPetugas::index');
// instansi
$routes->get('/addInstansi', 'Petugas\InstansiPetugas::index');
$routes->post('/save_inst', 'Petugas\InstansiPetugas::save');
$routes->get('/delete_inst/(:num)', 'Petugas\InstansiPetugas::delete/$1');
$routes->get('/edit_inst/(:segment)', 'Petugas\InstansiPetugas::edit/$1');
$routes->post('/update_inst/(:any)', 'Petugas\InstansiPetugas::update/$1');

// routes for pegawai
$routes->get('/', 'Pegawai\HomePegawai::index');
$routes->get('/mendatapgw', 'Pegawai\MendataPegawai::index');
$routes->post('/pegawaiFormat', 'Pegawai\MendataPegawai::save');
$routes->post('/pegawaiFoto', 'Pegawai\MendataPegawai::simpan');
$routes->get('/delete_foto/(:num)', 'Pegawai\MendataPegawai::delete/$1');
$routes->get('/edit_foto/(:num)', 'Pegawai\MendataPegawai::edit/$1');
$routes->post('/update_foto/(:any)', 'Pegawai\MendataPegawai::update/$1');
$routes->post('/update_foto', 'Pegawai\MendataPegawai::update');

//auth login
$routes->get('/signin', 'Auth\Login::login');
$routes->post('/process', 'Auth\Login::loginProcess');
$routes->get('/out', 'Auth\Login::logout');

// auth regis
$routes->get('/signup', 'Auth\Signup::index');
$routes->post('/save_user', 'Auth\Signup::save');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
