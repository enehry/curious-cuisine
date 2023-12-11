<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
  public function index()
  {
    //
  }

  public function login()
  {
    helper(['form']);

    $data = [];

    return view('auth/login', $data);
  }

  public function submitLogin()
  {
    helper(['form']);

    $data = [];

    $rules = [
      'email'         => 'required|min_length[4]|max_length[100]|valid_email',
      'password'      => 'required|min_length[6]|max_length[100]',
    ];

    if (!$this->validate($rules)) {
      $data['validation'] = $this->validator;

      return view('auth/login', $data);
    }

    $session = session();

    $userModel = new UserModel();

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $user = $userModel->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      $auth = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'isLoggedIn' => TRUE
      ];

      $session->set($auth);

      return redirect()->to(base_url('recipes'));
    }

    return redirect()->to(base_url('login'))->with('message', [
      'type' => 'error',
      'text' => 'The email or password you entered is incorrect!'
    ]);
  }

  public function register()
  {
    helper(['form']);
    $data = [];

    return view('auth/register', $data);
  }

  public function submitRegister()
  {

    helper(['form']);

    $rules = [
      'name'          => 'required|min_length[2]|max_length[100]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
      'password'      => 'required|min_length[6]|max_length[100]',
      'confirm_password'  => 'matches[password]'
    ];

    if ($this->validate($rules)) {
      $userModel = new UserModel();
      $data = [
        'name'     => $this->request->getPost('name'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];
      $userModel->save($data);
      return redirect()->to(base_url('login'))->with('message', [
        'type' => 'success',
        'text' => 'Your account has been successfully registered, you can now login.'
      ]);
    } else {
      $data['validation'] = $this->validator;

      return view('auth/register', $data);
    }
  }

  // logout the current user
  public function logout()
  {
    session()->destroy();

    return redirect()->to(base_url('login'))->with('message', [
      'type' => 'success',
      'text' => 'Your account has been successfully logged out',
    ]);
  }

  public function profile()
  {

    $id = session('id');

    $userModel = new UserModel();

    $data['user'] = $userModel->find($id);

    return view('auth/profile', $data);
  }

  public function updateProfile()
  {

    helper(['form']);

    $id = session('id');
    $userModel = new UserModel();

    $rules = [
      'name'          => 'required|min_length[2]|max_length[100]',
      'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email,id,' . $id . ']',
      'password'      => 'min_length[6]|max_length[100]',
      'confirm_password'  => 'matches[password]'
    ];

    if (empty($this->request->getPost('password'))) {
      unset($rules['password']);
      unset($rules['confirm_password']);
    }

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $this->validator);
    }
    $userModel = new UserModel();
    $data = [
      'name'     => $this->request->getPost('name'),
      'email'    => $this->request->getPost('email'),
    ];

    if (!empty($this->request->getPost('password'))) {
      $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
    }

    $userModel->update($id, $data);
    return redirect()->to(base_url('profile'))->with('message', [
      'type' => 'success',
      'text' => 'Your account has been successfully updated.'
    ]);
  }
}
