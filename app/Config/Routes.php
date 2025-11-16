<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home Routes
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

// CV Routes Group
$routes->group('', function($routes) {
    $routes->get('pendidikan', 'Pendidikan::index');
    $routes->get('pengalaman', 'Pengalaman::index');
    $routes->get('keahlian', 'Keahlian::index');
    $routes->get('portofolio', 'Portofolio::index');
});