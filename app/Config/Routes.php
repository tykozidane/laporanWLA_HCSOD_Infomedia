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
$routes->get('/', 'Import::index', ['filter' => 'role:user']);
$routes->group('wla', ['filter' => 'role:hcsod, admin'], function($routes) {
    $routes->get('', 'Import::index');
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
    $routes->get('datareward', 'EventController::hcmlistreward');

    $routes->post('upload', 'EventController::upload');
    $routes->post('editdata/(:any)', 'EventController::updateevent/$1');
    $routes->post('updateabsen/(:any)', 'EventController::updateAbsen/$1');
    $routes->post('addspeaker/(:any)', 'EventController::addspeaker/$1');
    $routes->get('deletespeaker/(:any)', 'EventController::deletespeaker/$1');
    $routes->post('addreward', 'EventController::addreward');
    $routes->post('updatedatareward/(:any)', 'EventController::updatedatareward/$1');
    $routes->get('deletedatareward/(:any)', 'EventController::deletereward/$1');
    $routes->get('sendingreward/(:any)', 'EventController::sendingreward/$1');
    $routes->get('successsendingreward/(:any)', 'EventController::successsendingreward/$1');
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
    $routes->get('tandatangan', 'RequestController::tandatangan');
    $routes->post('addttd', 'RequestController::addttd');
    $routes->get('formsurat', 'RequestController::formsurat');
    $routes->post('formsurat/savetext', 'RequestController::savetext');
    $routes->get('formsurat/seepdf/(:any)', 'RequestController::seepdf/$1');
    $routes->get('dms', 'RequestController::dmspage');
});
$routes->group('themplate', ['filter' => 'role:user'], function($routes) {
    $routes->get('', 'ThemplateController::listthemplate');
    $routes->get('add', 'ThemplateController::addthemplate');
    $routes->post('add/savetext', 'ThemplateController::savetext');
    $routes->get('edit/(:any)', 'ThemplateController::editthemplate/$1');
    $routes->post('edit/saveupdate/(:any)', 'ThemplateController::saveupdate/$1');
    $routes->get('seethemplate/(:any)', 'ThemplateController::seethemplate/$1');
    $routes->get('seepdf/(:any)', 'ThemplateController::seepdf/$1');
});
$routes->group('agreement', ['filter' => 'role:user'], function($routes) {
    $routes->get('', 'AgreementController::index');
});
$routes->get('/formpesertaevent/(:any)', 'EventController::cektime/$1');
$routes->get('/testing', 'DynamicController::index');
$routes->get('/testingperiode', 'MasterEmployeeController::getPeriode');
$routes->get('/testingttd', 'RequestController::tandatangan');
$routes->get('/addnewdata/employee', 'RequestController::createagreement');
$routes->get('/cekreward', 'EventController::cekreward');
$routes->get('/claimreward', 'EventController::getotpview');
$routes->get('/dataclaimreward/(:any)', 'EventController::listreward/$1');
$routes->get('/cobahtmlemail', 'EventController::cobahtmlemail');
$routes->get('/claimthis/(:any)/(:any)', 'EventController::claimthis/$1/$2');
$routes->get('/cobaenkripsi', 'EventController::cobaenkripsi');

$routes->post('/cekreward', 'EventController::cekrewards');
$routes->post('/getthelink', 'EventController::getotp');
$routes->post('/absen/check/(:any)', 'EventController::checkabsen/$1');
$routes->post('/absen/checkin/(:any)', 'EventController::checkin/$1');
$routes->post('/absen/vote/(:any)', 'EventController::voting/$1');
$routes->post('/getprogram/(:any)', 'DynamicController::getprogram/$1');
$routes->post('/getemployee', 'DynamicController::getemployee');
$routes->post('/getabsen/(:any)', 'DynamicController::getabsen/$1');

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
