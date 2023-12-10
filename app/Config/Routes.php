<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');


$routes->get('/login', 'AuthController::login', ['as' => 'login']);
$routes->post('/login', 'AuthController::submitLogin', ['as' => 'submit-login']);
$routes->get('/register', 'AuthController::register', ['as' => 'register']);
$routes->post('/register', 'AuthController::submitRegister', ['as' => 'submit-register']);


// $routes->group('', static function ($routes) {
//   $routes->get('/', 'Home::index');
// });

$routes->group('recipes', function ($routes) {
  $routes->get('/', 'RecipeController::index');
  $routes->get('create', 'RecipeController::create', ['as' => 'create-recipe']);
  $routes->post('store', 'RecipeController::store', ['as' => 'store-recipe']);
});
