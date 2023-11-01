<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/students', 'StudentApiController::index');
$routes->post('/students', 'StudentApiController::create');
$routes->get('/students/(:num)', 'StudentApiController::show/$1');
$routes->post('/students/(:num)', 'StudentApiController::update/$1');
$routes->delete('/students/(:num)', 'StudentApiController::delete/$1');