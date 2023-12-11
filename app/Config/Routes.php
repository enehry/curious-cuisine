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



$routes->get('/', 'Home::index');


$routes->group('recipes', function ($routes) {
  $routes->get('/', 'RecipeController::index');
  $routes->get('show/(:num)', 'RecipeController::show/$1', ['as' => 'show-recipe']);
  $routes->get('create', 'RecipeController::create', ['as' => 'create-recipe']);
  $routes->post('store', 'RecipeController::store', ['as' => 'store-recipe']);
  $routes->get('edit/(:num)', 'RecipeController::edit/$1', ['as' => 'edit-recipe']);
  $routes->post('update', 'RecipeController::update', ['as' => 'update-recipe']);
  $routes->delete('delete/(:num)', 'RecipeController::delete/$1', ['as' => 'delete-recipe']);
});
