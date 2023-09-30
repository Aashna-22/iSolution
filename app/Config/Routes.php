<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// CRUD RESTful Routes
$routes->get('/', 'StudentController::index');
$routes->get('create', 'StudentController::create');
$routes->post('store', 'StudentController::store');
$routes->get('edit/(:num)', 'StudentController::edit/$1');
$routes->post('update', 'StudentController::update');
$routes->get('show/(:num)', 'StudentController::show/$1');
$routes->get('delete/(:num)', 'StudentController::delete/$1');