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
// $routes->get('/petugaspegawai', 'Petugas\PegawaiPetugas::index');

// routes for pegawai
$routes->get('/pegawai', 'Pegawai\HomePegawai::index');
$routes->post('/save', 'Pegawai\MendataPegawai::save');
$routes->get('/mendatapgw', 'Pegawai\MendataPegawai::index');

//auth login
$routes->get('/', 'Auth\Login::login');
$routes->post('/process', 'Auth\Login::loginProcess');
$routes->get('/out', 'Auth\Login::logout');

// auth regis
$routes->get('/signup', 'Auth\Signup::index');

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
