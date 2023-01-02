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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Import::index');
$routes->group('wla', ['filter' => 'role:user'], function($routes) {
    $routes->get('import', 'Import::importform');
    $routes->get('dataemployee', 'Import::employee');
    $routes->get('datapegawai', 'Import::datapegawai');
    $routes->get('datapegawai/(:any)', 'Import::datapegawai/$1');
    $routes->get('datapegawai/(:any)/(:any)', 'Import::datapegawai/$1/$2');
    $routes->get('printwla/(:any)', 'ExportPDF::printpdf/$1');
    $routes->get('deletewla/(:any)', 'Import::deletewla/$1');
    $routes->post('upload', 'Import::upload');
});
$routes->group('events', ['filter' => 'role:user'], function($routes) {
    $routes->get('', 'EventController::index');
    $routes->get('create', 'EventController::formadd');
    $routes->get('editdata/(:any)', 'EventController::editpage/$1');    
    $routes->get('dataevent/(:any)', 'EventController::dataevent/$1');
    $routes->post('upload', 'EventController::upload');
    $routes->post('editdata/(:any)', 'EventController::updateevent/$1');
});
$routes->group('employee', ['filter' => 'role:user'], function($routes) {
    $routes->get('listemployee', 'MasterEmployeeController::index');
    $routes->get('detailemployee/(:any)', 'MasterEmployeeController::detailemployee/$1');
    $routes->get('editdetailpage/(:any)', 'MasterEmployeeController::editpage/$1');
    $routes->post('editdata/(:any)', 'MasterEmployeeController::updatedata/$1');
});
$routes->group('storage', ['filter' => 'role:user'], function($routes) {
    $routes->get('', 'StorageController::index');
    $routes->get('uploadpage', 'StorageController::uploadpage');
    $routes->get('downloadfile/(:any)', 'StorageController::download/$1');
    $routes->post('upload', 'StorageController::upload');
    $routes->get('viewfile/(:any)', 'StorageController::myPdfPage/$1');
});
$routes->group('request', ['filter' => 'role:user'], function($routes) {
    $routes->get('surat', 'ExportPDF::formsurat');
    $routes->get('image', 'ExportPDF::changeimg');
    $routes->get('formsurat', 'RequestController::formsurat');
    
});
$routes->get('/formpesertaevent/(:any)', 'EventController::cektime/$1');
$routes->get('/testing', 'DynamicController::index');
$routes->get('/testingperiode', 'MasterEmployeeController::getPeriode');


$routes->post('/absen/check/(:any)', 'EventController::checkabsen/$1');
$routes->post('/absen/checkin/(:any)', 'EventController::checkin/$1');
$routes->post('/absen/vote/(:any)', 'EventController::voting/$1');
$routes->post('/getprogram/(:any)', 'DynamicController::getprogram/$1');
$routes->post('/getemployee', 'DynamicController::getemployee');

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
