<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['get','post'],'team-registration', 'FrontendController::team_registration');
$routes->get('privacy-policy', 'FrontendController::privacy_policy');
$routes->get('term-condition', 'FrontendController::term_condition');
$routes->get('refund-policy', 'FrontendController::refund_policy');

$routes->get('admin', 'AdminController::index');
