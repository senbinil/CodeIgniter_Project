<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// $routes->get('/', 'Home::index');

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/admin-home' , 'Dashboard::index',['filter'=>'auth']);
$routes->get( 'logout', 'Login::logout');
$routes->get('/(:segment)', 'Pages::view/$1');
$routes->get('/login/(:segment)','Login::views/$1');
$routes->get('/register/(:segment)','Register::index');
$routes->get('/precovery/(:segment)','PassRecovery::pviews/$1');
// guest route
$routes->match(['get','post'],'/guest/register','Guest::sendMail');
$routes->match(['get','post'],'/guest/registerComplete','Guest::completeReg');

$routes->get('guest/(:segment)','Guest::guestView/$1',['filter'=>'guest']);
$routes->get('/guest/postregister/hash=(:any)&email=(:any)','Guest::Postreg/$1/$2');

$routes->match(['post'],'login/guest','Login::guestLogin');
$routes->match(['post'],'/guest/completeRegistration','Guest::completeReg');
$routes->match(['post'],'/guest/csfetch','Guest::fetchCs');

$routes->get('admin-home/(:segment)' , 'Dashboard::adminView/$1',['filter'=>'auth']);
$routes->match(['get', 'post'], 'dashboard/enroll', 'Dashboard::enroll',['filter'=>'auth']);
$routes->match(['get', 'post'], 'dashboard/staff-enroll', 'Dashboard::staffEnroll',['filter'=>'auth']);
$routes->get('faculty/(:segment)','Faculty::Pagger/$1',['filter'=>'fauth']);
$routes->match(['get', 'post'], 'dashboard/announce', 'Dashboard::announce',['filter'=>'auth']);
$routes->match(['get', 'post'], 'dashboard/fee-collector/(:segment)', 'Dashboard::feeMod/$1',['filter'=>'auth']);
$routes->match(['get', 'post'], 'login/auth', 'Login::auth');
$routes->match(['get', 'post'], 'dashboard/Search/(:segment)', 'Dashboard::getDetails/$1',['filter'=>'auth']);
$routes->match(['get', 'post'], 'passrecovery/user/chk', 'PassRecovery::userchk');
$routes->match(['get', 'post'], 'passrecovery/user/student', 'PassRecovery::studentchk');
$routes->match(['get', 'post'], 'user/log_fetch', 'Login::getLog',['filter'=>'dauth']);
$routes->match(['get', 'post'],'/user/suggestion','Pages::logSuggest');
$routes->match(['get', 'post'], 'login/stafflogin', 'Login::staffLogin');
$routes->match(['get', 'post'], 'login/studentlogin', 'Login::studLogin');
$routes->get('admin/common/(:segment)','Common::Pagger/$1',['filter'=>'common']);
$routes->match(['get','post'],'admin/common/Payment','Common::getFee',['filter'=>'common']);




/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
