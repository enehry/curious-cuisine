<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class Home extends BaseController
{
  public function index(): string
  {
    $recipeModel = new RecipeModel();

    $data['recipes'] = $recipeModel->orderBy('created_at', 'DESC')->findAll();

    return view('home/index', $data);
  }
}
