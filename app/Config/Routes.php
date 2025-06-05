<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->get('/dashboard-admin', 'Admin::index');
$routes->get('/api/user-coordinates', 'Admin::getCoordinates');

$routes->get('/', 'User::index');
$routes->get('/pengaduan', 'User::pengaduan');

$routes->get('/bantuan', 'User::bantuan');

// Route untuk halaman utama komentar, default page 1
$routes->get('user/halefekprogram', 'User\Halefekprogram::index');

// Route untuk halaman paginasi komentar dengan parameter halaman (nomor halaman)
$routes->get('user/halefekprogram/(:num)', 'User\Halefekprogram::index/$1');

$routes->get('/program', 'User::program');          // halaman 1 default
$routes->get('/program/(:num)', 'User::program/$1'); // halaman pagination
$routes->post('/program/save_feedback', 'User::save_feedback');



$routes->get('profile_trace_food', 'Profile::traceFood');

$routes->get('faq', 'Faq::index');

//keuangan controller routes by ben
$routes->get('keuangan', 'Keuangan::index');
$routes->get('keuangan/create', 'Keuangan::create');
$routes->post('keuangan/create', 'Keuangan::create');
$routes->get('keuangan/edit/(:num)', 'Keuangan::edit/$1');
$routes->post('keuangan/edit/(:num)', 'Keuangan::edit/$1');
$routes->get('keuangan/delete/(:num)', 'Keuangan::delete/$1');

//untuk contact
$routes->get('contact', 'Contact::index');
$routes->post('contact/sendEmail', 'Contact::sendEmail');


//untuk login
$routes->match(['get', 'post'], '/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Routes Dashboard
$routes->get('/admin', 'Admin::index', ['filter' => 'authfilter:admin']);
$routes->get('/vendor', 'Vendor::index', ['filter' => 'authfilter:vendor']);
$routes->get('/masyarakat', 'Masyarakat::index', ['filter' => 'authfilter:masyarakat']);

$routes->match(['get', 'post'], '/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->match(['get', 'post'], '/register', 'Auth::register');
