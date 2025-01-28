<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('userlogin', 'AuthController::userlogin');
$routes->get('userlogout', 'AuthController::userlogout');

$routes->match(['get','post'],'user-registration', 'FrontendController::user_registration');
$routes->match(['get','post'],'team-registration', 'FrontendController::team_registration');
$routes->get('select-league/(:num)', 'FrontendController::select_league/$1');
$routes->match(['get','post'],'enroll-tournament/(:num)/(:num)', 'FrontendController::enroll_tournament/$1/$2');
$routes->post('enroll_tournament_payment/(:num)/(:num)','FrontendController::enroll_tournament_payment/$1/$2');
$routes->get('privacy-policy', 'FrontendController::privacy_policy');
$routes->get('term-condition', 'FrontendController::term_condition');
$routes->get('refund-policy', 'FrontendController::refund_policy');


$routes->match(['get','post'],'admin/login', 'AdminController::admin_login');
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){
    $routes->get('/','AdminController::index');
    $routes->match(['get','post'],'add-tournament','TournamentController::add_tournament');
    $routes->match(['get','post'],'tournament-list','TournamentController::tournament_list');

    $routes->match(['get','post'],'sports-category','SportsController::sports_category');
    $routes->match(['get','post'],'league-session','LeagueController::league_session');
    $routes->match(['get','post'],'league-category','LeagueController::league_category');
});
$routes->get('admin/logout', 'AdminController::admin_logout');

$routes->post('findcity', 'UniversalController::findcity');