<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');


$routes->get('/login', 'AuthController::login', ['filter' => 'guest-guard', 'as' => 'login']);
$routes->post('/login', 'AuthController::submitLogin', ['filter' => 'guest-guard', 'as' => 'submit-login']);
$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);
$routes->get('/register', 'AuthController::register', ['filter' => 'guest-guard', 'as' => 'register']);
$routes->post('/register', 'AuthController::submitRegister', ['filter' => 'guest-guard', 'as' => 'submit-register']);



$routes->get('/', 'Home::index');

$routes->get('/profile', 'AuthController::profile', ['filter' => 'authGuard', 'as' => 'user-profile']);
$routes->post('/profile', 'AuthController::updateProfile', ['filter' => 'authGuard', 'as' => 'update-profile']);

$routes->post('/comment', 'RecipeController::addComment', ['filter' => 'authGuard', 'as' => 'add-comment']);
$routes->delete('/comment/(:num)', 'RecipeController::deleteComment/$1', ['filter' => 'authGuard', 'as' => 'delete-comment']);


$routes->group('recipes', ['filter' => 'authGuard'], function ($routes) {
  $routes->get('/', 'RecipeController::index');
  $routes->get('show/(:num)', 'RecipeController::show/$1', ['as' => 'show-recipe']);
  $routes->get('create', 'RecipeController::create', ['as' => 'create-recipe']);
  $routes->post('store', 'RecipeController::store', ['as' => 'store-recipe']);
  $routes->get('edit/(:num)', 'RecipeController::edit/$1', ['as' => 'edit-recipe']);
  $routes->post('update', 'RecipeController::update', ['as' => 'update-recipe']);
  $routes->delete('delete/(:num)', 'RecipeController::delete/$1', ['as' => 'delete-recipe']);
});
