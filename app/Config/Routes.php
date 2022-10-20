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
//$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Login
$routes->get('login', 'loginController::index');
$routes->post('login/signin', 'loginController::signin');
$routes->get('login/ver_usuario', 'loginController::ver_usuario');
$routes->get('login/signout', 'loginController::signout');

//Maintenance
$routes->get('maintenance', 'maintenanceController::index');

//administrator
$routes->get('administrator', 'administratorController::index');
$routes->get('administrator/detail', 'administratorController::detail');
$routes->get('administrator/new', 'administratorController::new');
$routes->get('administrator/profile', 'administratorController::profile');
$routes->get('administrator/edit', 'administratorController::edit');
$routes->get('administrator/delete', 'administratorController::delete');
$routes->post('administrator/save', 'administratorController::save');

//assembly
$routes->get('assembly', 'assemblyController::index');
$routes->get('assembly/detail', 'assemblyController::detail');
$routes->get('assembly/new', 'assemblyController::new');
$routes->get('assembly/edit', 'assemblyController::edit');
$routes->get('assembly/delete', 'assemblyController::delete');
$routes->post('assembly/save', 'assemblyController::save');

//relative
$routes->get('relative', 'relativeController::index');
$routes->get('relative/detail', 'relativeController::detail');
$routes->get('relative/new', 'relativeController::new');
$routes->get('relative/profile', 'relativeController::profile');
$routes->get('relative/edit', 'relativeController::edit');
$routes->get('relative/delete', 'relativeController::delete');
$routes->post('relative/save', 'relativeController::save');

//common_area
$routes->get('common_area', 'common_areaController::index');
$routes->get('common_area/detail', 'common_areaController::detail');
$routes->get('common_area/new', 'common_areaController::new');
$routes->get('common_area/edit', 'common_areaController::edit');
$routes->get('common_area/delete', 'common_areaController::delete');
$routes->post('common_area/save', 'common_areaController::save');

//authorized
$routes->get('authorized', 'authorizedController::index');
$routes->get('authorized/detail', 'authorizedController::detail');
$routes->get('authorized/new', 'authorizedController::new');
$routes->get('authorized/edit', 'authorizedController::edit');
$routes->get('authorized/delete', 'authorizedController::delete');
$routes->post('authorized/save', 'authorizedController::save');

//condo_owner
$routes->get('condo_owner', 'condo_ownerController::index');
$routes->get('condo_owner/detail', 'condo_ownerController::detail');
$routes->get('condo_owner/profile', 'condo_ownerController::profile');
$routes->get('condo_owner/new', 'condo_ownerController::new');
$routes->get('condo_owner/edit', 'condo_ownerController::edit');
$routes->get('condo_owner/delete', 'condo_ownerController::delete');
$routes->post('condo_owner/save', 'condo_ownerController::save');

//assembly_voting
$routes->get('assembly_voting', 'assembly_votingController::index');
$routes->get('assembly_voting/detail', 'assembly_votingController::detail');
$routes->get('assembly_voting/new', 'assembly_votingController::new');
$routes->get('assembly_voting/edit', 'assembly_votingController::edit');
$routes->get('assembly_voting/delete', 'assembly_votingController::delete');
$routes->post('assembly_voting/save', 'assembly_votingController::save');

//officer
$routes->get('officer', 'officerController::index');
$routes->get('officer/detail', 'officerController::detail');
$routes->get('officer/new', 'officerController::new');
$routes->get('officer/edit', 'officerController::edit');
$routes->get('officer/delete', 'officerController::delete');
$routes->post('officer/save', 'officerController::save');

//patrol
$routes->get('patrol', 'patrolController::index');
$routes->get('patrol/detail', 'patrolController::detail');
$routes->get('patrol/new', 'patrolController::new');
$routes->get('patrol/edit', 'patrolController::edit');
$routes->get('patrol/delete', 'patrolController::delete');
$routes->post('patrol/save', 'patrolController::save');

//relative_vehicle
$routes->get('relative_vehicle', 'relative_vehicleController::index');
$routes->get('relative_vehicle/detail', 'relative_vehicleController::detail');
$routes->get('relative_vehicle/new', 'relative_vehicleController::new');
$routes->get('relative_vehicle/edit', 'relative_vehicleController::edit');
$routes->get('relative_vehicle/delete', 'relative_vehicleController::delete');
$routes->post('relative_vehicle/save', 'relative_vehicleController::save');

//vote
$routes->get('vote', 'voteController::index');
$routes->get('vote/detail', 'voteController::detail');
$routes->get('vote/new', 'voteController::new');
$routes->get('vote/edit', 'voteController::edit');
$routes->get('vote/delete', 'voteController::delete');
$routes->post('vote/save', 'voteController::save');

//reservation
$routes->get('reservation', 'reservationController::index');
$routes->get('reservation/common_areas', 'reservationController::common_areas');
$routes->get('reservation/request', 'reservationController::request');
$routes->post('reservation/ajaxschedule', 'reservationController::ajaxschedule');
$routes->post('reservation/reserve', 'reservationController::reserve');
$routes->get('reservation/detail', 'reservationController::detail');
$routes->get('reservation/new', 'reservationController::new');
$routes->get('reservation/edit', 'reservationController::edit');
$routes->get('reservation/delete', 'reservationController::delete');
$routes->post('reservation/save', 'reservationController::save');

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