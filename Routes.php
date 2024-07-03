<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('admin'); // This will handle all CRUD operations

// If you need to manually define routes for specific methods, you can do so as shown below
// However, since you have already defined resource routes, these are optional
$routes->delete('admin/(:num)', 'Admin::delete/$1');
$routes->put('admin/(:segment)', 'Admin::update/$1');
  