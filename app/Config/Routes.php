<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Auth routes
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');
$routes->get('logout', 'AuthController::logout');

// -----------------------------
// STAFF ROUTES
// -----------------------------
$routes->group('staff', ['filter' => 'authRole:staff'], function($routes){
    $routes->get('dashboard', 'StaffController::dashboard');
    $routes->get('bookings', 'StaffController::bookings');
    $routes->get('bookings/update/(:num)/(:any)', 'StaffController::updateStatus/$1/$2');
});
$routes->get('services/create', 'ServiceController::create');
$routes->get('services', 'ServiceController::index');
$routes->post('services/store', 'ServiceController::store');
$routes->get('services/edit/(:num)', 'ServiceController::edit/$1');
$routes->post('services/update/(:num)', 'ServiceController::update/$1');
$routes->get('services/delete/(:num)', 'ServiceController::delete/$1');
// -----------------------------
// CUSTOMER ROUTES
// -----------------------------
$routes->group('customer', ['filter' => 'authRole:customer'], function($routes){
    $routes->get('dashboard', 'CustomerController::dashboard');
    $routes->get('requests', 'CustomerController::requests');
    $routes->get('request-cancel/(:num)', 'CustomerController::cancelRequest/$1');

    // Booking routes
    $routes->get('request-service', 'CustomerController::requestService');
    $routes->get('request-service/(:num)', 'CustomerController::requestService/$1');
    $routes->post('request-service', 'CustomerController::storeBooking');
});

// -----------------------------
// GENERAL BOOKINGS ROUTES
// -----------------------------
$routes->get('bookings/create/(:num)', 'CustomerController::requestService/$1', ['filter' => 'auth']);
$routes->post('bookings/store/(:num)', 'CustomerController::storeBooking/$1', ['filter' => 'auth']);

$routes->get('bookings/approve/(:num)', 'BookingController::approve/$1');
$routes->get('bookings/reject/(:num)', 'BookingController::reject/$1');

