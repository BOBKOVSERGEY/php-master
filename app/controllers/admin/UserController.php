<?php


namespace app\controllers\admin;


use app\models\User;

class UserController extends AppController
{
  public function loginAdminAction()
  {
    $this->layout = 'login';

    if (!empty($_POST)) {
      $user = new User();

      if ($user->login(true)) {
        $_SESSION['success'] = 'Вы успешно авторизованы';
      } else {
        $_SESSION['error'] = 'Логин/пароль введены не верно';
      }
      if (User::isAdmin()) {
        redirect(ADMIN);
      } else {
        redirect();
      }
    }
  }
}