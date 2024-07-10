<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('Admin'); // This will handle all CRUD operations

// If you need to manually define routes for specific methods, you can do so as shown below
// However, since you have already defined resource routes, these are optional
$routes->delete('admin/(:num)', 'Admin::delete/$1');
$routes->put('admin/(:segment)', 'Admin::update/$1');
$routes->resource('Penyewa'); // This will handle all CRUD operations

// If you need to manually define routes for specific methods, you can do so as shown below
// However, since you have already defined resource routes, these are optional
$routes->delete('penyewa/(:num)', 'Penyewa::delete/$1');
$routes->put('penyewa/(:segment)', 'Penyewa::update/$1');
$routes->resource('Penyewaan'); // This will handle all CRUD operations

// If you need to manually define routes for specific methods, you can do so as shown below
// However, since you have already defined resource routes, these are optional
$routes->delete('penyewaan/(:num)', 'Penyewaan::delete/$1');
$routes->put('penyewaan/(:segment)', 'Penyewaan::update/$1');
$routes->post('admin/login', 'Admin::login');
$routes->post('admin/register', 'Admin::register');
$routes->post('penyewa/tambahPenyewa', 'Penyewa::tambahPenyewa');