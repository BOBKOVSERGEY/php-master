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
        $_SESSION['form_data'] = $data;
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
    if (!empty($_POST)) {
      $user = new User();

      if ($user->login()) {
        $_SESSION['success'] = 'Вы успешно авторизованы!';
      } else {
        $_SESSION['error'] = 'Логин/пароль введены не верно';
      }
      redirect();
    }
    $this->setMeta('Вход');
  }

  public function logoutAction()
  {
    if (isset($_SESSION['user'])) unset($_SESSION['user']);
    redirect();
  }
}