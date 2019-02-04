<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
  public function signUpAction()
  {
    $this->setMeta('Регистрация');

    if (!empty($_POST)) {
      $user = new User();
      $data = $_POST;
      $user->load($data);
      debug($user);
    }
  }

  public function loginAction()
  {

  }

  public function logoutAction()
  {

  }
}