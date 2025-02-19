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
$routes->match(['get','post'],'enroll-tournament/(:num)', 'FrontendController::enroll_tournament/$1');
$routes->post('enroll_tournament_payment/(:num)','Enroll_tournamentController::enroll_tournament_payment/$1');
$routes->get('investment', 'FrontendController::investment');
$routes->match(['get','post'],'investment-details/(:num)', 'InvestmentUsersController::investment_details/$1');
$routes->get('privacy-policy', 'FrontendController::privacy_policy');
$routes->get('term-condition', 'FrontendController::term_condition');
$routes->get('refund-policy', 'FrontendController::refund_policy');
$routes->get('contact-us', 'FrontendController::contact_us');

$routes->post('razorpay/success(:num)', 'Enroll_tournamentController::success/$1');
$routes->get('razorpay/failed', 'Enroll_tournamentController::failed');
$routes->post('verify-payment', 'Enroll_tournamentController::verify_payment');


$routes->match(['get','post'],'admin/login', 'AdminController::admin_login');
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){
    $routes->get('/','AdminController::index');
    $routes->match(['get','post'],'add-tournament','TournamentController::add_tournament');
    $routes->match(['get','post'],'tournament-list','TournamentController::tournament_list');

    $routes->match(['get','post'],'game-category','SportsController::game_category');
    $routes->match(['get','post'],'sports-category','SportsController::sports_category');
    $routes->match(['get','post'],'sports-sub-category','SportsController::sports_sub_category');
    $routes->match(['get','post'],'league-session','LeagueController::league_session');
    $routes->match(['get','post'],'league-category','LeagueController::league_category');
    $routes->match(['get','post'],'teams','AdminController::teams');

    $routes->match(['get','post'],'investment-list','InvestmentController::investment_list');
    $routes->match(['get','post'],'add-investment','InvestmentController::add_investment');
    $routes->match(['get','post'],'investment-plan','InvestmentController::investment_plan');
    $routes->match(['get','post'],'investment-duration','InvestmentController::investment_duration');
});
$routes->get('admin/logout', 'AdminController::admin_logout');

$routes->post('findcity', 'UniversalController::findcity');
$routes->post('fetch_sports_subcategory', 'UniversalController::fetch_sports_subcategory');
$routes->get('test_mail', 'UniversalController::test_mail');
$routes->post('getDuration', 'UniversalController::getDuration');
$routes->post('getprofit', 'UniversalController::getprofit'); 