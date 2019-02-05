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

      if (!$user->validate($data) || !$user->checkUnique()) {
        // получаем и записываем ошибки в сессию
        $user->getErrors();
      } else {
        $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
        if ($user->save('user')) {
          $_SESSION['success'] = 'Пользователь зарегистрирован';
        } else {
          $_SESSION['error'] = 'Ошибка';
        }
      }
      redirect();
    }
  }

  public function loginAction()
  {

  }

  public function logoutAction()
  {

  }
}