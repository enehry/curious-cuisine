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
    // sort by date descending
    $data['recipes'] = $this->recipeModel->where('user_id', session('id'))->orderBy('created_at', 'DESC')->findAll();

    return view('recipes/index', $data);
  }

  public function create()
  {
    helper(['form']);

    $data = [];

    return view('recipes/create', $data);
  }


  public function show($id)
  {

    // $recipe = $this->recipeModel->find($id);

    $recipe = $this->recipeModel->select('recipes.*')
      ->select('users.name')
      ->join('users', 'users.id = recipes.user_id')
      ->where('recipes.id', $id)->first();

    if (!$recipe) {

      return redirect()->to(base_url() . 'recipe')->with(
        'message',
        [
          'type' => 'Error',
          'text' => 'Recipe not found.'
        ]
      );
    }

    $data['recipe'] = $recipe;



    return view('recipes/show', $data);
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
      'user_id' => session('id'),
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

  public function edit($id)
  {

    helper(['form']);

    $recipe = $this->recipeModel;

    $data['recipe'] = $recipe->find($id);

    return view('recipes/edit', $data);
  }

  public function update()
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

    $id = $this->request->getPost('id');

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('recipes/edit/' . $id))->withInput()->with('validation', $this->validator);
    }

    $data = [
      'title' => $this->request->getPost('title'),
      'ingredients' => $this->request->getPost('ingredients'),
      'instructions' => $this->request->getPost('instructions'),
      'description' => $this->request->getPost('description'),
      'preparation' => $this->request->getPost('preparation'),
      'cook' => $this->request->getPost('cook'),
      'type' => $this->request->getPost('type'),
    ];

    if ($this->request->getFile('image')->isValid()) {
      $data['image_url'] = $this->saveImage($this->request->getFile('image'));
    }

    $this->recipeModel->update(
      $id,
      $data
    );

    return redirect()->to(base_url('recipes/'))->with(
      'message',
      [
        'type' => 'success',
        'text' => 'Recipe updated successfully.'
      ]
    );
  }

  public function delete($id)
  {

    $recipe = $this->recipeModel->find($id);

    if (!$recipe) {
      // Recipe not found, you can handle this case accordingly (e.g., show an error message)
      return redirect()->to(base_url('recipes/'))->with(
        'message',
        [
          'type' => 'error',
          'text' => 'Recipe does not exist.'
        ]
      );
    }

    $this->recipeModel->delete($id);

    return redirect()->to(base_url('recipes/'))->with(
      'message',
      [
        'type' => 'success',
        'text' => 'Recipe deleted successfully.'
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
