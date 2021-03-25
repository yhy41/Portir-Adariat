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
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index', ['as' => 'homepage']);
$routes->group('kegiatan', function($routes) {
	$routes->get('/', 'Home::list_kegiatan', ['as' => 'list-kegiatan']);
	$routes->get('(:any)', 'Home::detail/$1', ['as' => 'detail-public']);
});
$routes->get('about', 'Home::about', ['as' => 'about']);
$routes->get('donasi', 'Home::donasi', ['as' => 'donasi']);
$routes->get('bergabung', 'Home::bergabung', ['as' => 'bergabung']);

$routes->group('admin', function($routes) {
	$routes->get('/', 'Auth::index', ['as' => 'index']);
	$routes->post('login', 'Auth::login', ['as' => 'login']);
	$routes->post('logout', 'Auth::logout', ['as' => 'logout']);
	$routes->get('dashboard', 'Dashboard::index', ['as' => 'dashboard']);
	$routes->get('edit-profile', 'Dashboard::edit_profile', ['as' => 'edit-profile']);
	$routes->post('update-profile', 'Dashboard::update_profile', ['as' => 'update-profile']);
	$routes->group('kegiatan', function($routes) {
		$routes->get('/', 'Dashboard::posts', ['as' => 'posts']);
		$routes->get('add', 'Dashboard::create', ['as' => 'create']);
		$routes->post('store', 'Dashboard::store', ['as' => 'store']);
		$routes->get('edit/(:any)', 'Dashboard::edit/$1', ['as' => 'edit']);
		$routes->post('update/(:any)', 'Dashboard::update/$1', ['as' => 'update']);
		$routes->get('galeri/(:any)', 'Dashboard::edit_galeri/$1', ['as' => 'edit-gallery']);
		$routes->delete('delete-photo/(:any)', 'Dashboard::delete_photo/$1', ['as' => 'delete-photo']);
		$routes->post('update-gallery/(:any)', 'Dashboard::update_gallery/$1', ['as' => 'update-gallery']);
		$routes->get('(:any)', 'Dashboard::detail/$1', ['as' => 'detail']);
		$routes->delete('(:any)', 'Dashboard::destroy/$1', ['as' => 'destroy']);
	});
});

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
