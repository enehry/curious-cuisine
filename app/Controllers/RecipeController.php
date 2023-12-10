<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RecipeModel;

class RecipeController extends BaseController
{
  protected $recipeModel;

  public function __construct()
  {
    $this->recipeModel = new RecipeModel();
  }

  public function index()
  {

    $data['recipes'] = $this->recipeModel?->findAll();

    return view('recipes/index', $data);
  }

  public function create()
  {
    helper(['form']);

    $data = [];

    return view('recipes/create', $data);
  }

  public function store()
  {
    helper(['form']);

    $data = [];
    $rules = [
      'title' => 'required|min_length[3]|max_length[255]',
      'ingredients' => 'required|min_length[10]',
      'instructions' => 'required|min_length[10]',
      'preparation' => 'required|min_length[1]|numeric',
      'cook' => 'required|min_length[1]|numeric',
      'type' => 'required',
    ];

    if (!$this->validate($rules)) {

      return redirect()->to(base_url('recipes/create'))->withInput()->with('validation', $this->validator);
    }

    $data = [
      'title' => $this->request->getPost('title'),
      'ingredients' => $this->request->getPost('ingredients'),
      'instructions' => $this->request->getPost('instructions'),
      'description' => $this->request->getPost('description'),
      'image_url' => $this->saveImage($this->request->getFile('image')),
      'preparation' => $this->request->getPost('preparation'),
      'cook' => $this->request->getPost('cook'),
      'type' => $this->request->getPost('type'),
      'user_id' => 1
    ];

    $this->recipeModel->save($data);

    return redirect()->to(base_url('recipes/'))->with(
      'message',
      [
        'type' => 'success',
        'text' => 'Recipe created successfully.'
      ]
    );
  }

  private function saveImage($image)
  {
    if ($image->isValid() && !$image->hasMoved()) {
      // Generate a unique filename
      $newName = $image->getRandomName();

      // Move the uploaded file to the specified directory
      $image->move('uploads', $newName);

      // Return the path to the saved image
      return 'uploads/' . $newName;
    }

    return null;
  }
}
